<?php
/**
 * Este arquivo é parte do programa Quack TntBrasil
 *
 * Quack TntBrasil é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 3 da
 * Licença, ou (na sua opinião) qualquer versão.
 *
 * Este programa é distribuído na esperança de que possa ser útil,
 * mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO
 * a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a Licença
 * Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU junto
 * com este programa, Se não, veja <http://www.gnu.org/licenses/>.
 *
 * @category   Quack
 * @package    Quack_TntBrasil
 * @author     Rafael Patro <rafaelpatro@gmail.com>
 * @copyright  Copyright (c) 2017 Rafael Patro (rafaelpatro@gmail.com)
 * @license    http://www.gnu.org/licenses/gpl.txt
 * @link       https://github.com/rafaelpatro/Quack_TntBrasil
 */

class Quack_TntBrasil_Model_Rate extends Varien_Object
{
    protected $request;
    protected $response;

    /**
     * @return TntMercurio_CotacaoWebService
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return TntMercurio_CalculaFreteResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param TntMercurio_CotacaoWebService $request
     * @return Quack_TntBrasil_Model_Rate
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param TntMercurio_CalculaFreteResponse $response
     * @return Quack_TntBrasil_Model_Rate
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return int
     */
    public function getConfigTimeout()
    {
        return Mage::getStoreConfig('carriers/tntbrasil/timeout');
    }
    
    /**
     * @return int
     */
    public function getDefaultTimeout()
    {
        return ini_get('default_socket_timeout');
    }
    
    /**
     * @return Quack_TntBrasil_Model_Rate
     */
    public function setDefaultTimeout($value)
    {
        ini_set('default_socket_timeout', $value);
        return $this;
    }
    
    protected function _getCacheId()
    {
        $cacheCode = "TNTBRASIL";
        $vat = $this->getRequest()->getNrIdentifClienteRem();
        $zip = $this->getRequest()->getCepDestino();
        $type = $this->getRequest()->getTpServico();
        $payer = $this->getRequest()->getTpSituacaoTributariaDestinatario();
        $weight = $this->getRequest()->getPsReal();
        $id = "{$cacheCode}_{$vat}_{$zip}_{$type}_{$payer}_{$weight}";
        $id = preg_replace("/[^[:alnum:]^_]/", "", $id);
        return $id;
    }
    
    protected function _getCacheTags()
    {
        $cacheCode = "TNTBRASIL";    
        $tags = array(
            $cacheCode,
            "VAT_{$this->getRequest()->getNrIdentifClienteRem()}",
            "ZIP_{$this->getRequest()->getCepDestino()}",
            "TYPE_{$this->getRequest()->getTpServico()}",
            "TAXPAYER_{$this->getRequest()->getTpSituacaoTributariaDestinatario()}",
            "WEIGHT_{$this->getRequest()->getPsReal()}",
        );
        return $tags;
    }
    
    protected function _getCacheSave($response)
    {
        if (Mage::app()->useCache('tntbrasil') && $response) {
            $id = $this->_getCacheId();
            Mage::log("saving to cache: id = {$id}");
            try {
                Mage::app()->getCache()->save(serialize($response), $id, $this->_getCacheTags());
            } catch (Exception $e) {
                Mage::log("Cant save cache: {$e->getMessage()}");
            }
        }
    }
    
    protected function _getCacheLoad()
    {
        $response = null;
        if (Mage::app()->useCache('tntbrasil')) {
            $id = $this->_getCacheId();
            Mage::log("loading from cache: id = {$id}");
            $data = Mage::app()->getCache()->load($id);
            $response = unserialize($data);
        }
        return $response;
    }
    
    /**
     * @throws Exception
     * @return boolean
     */
    public function sendRequest($url)
    {
        $response = null;
        if ($response = $this->_getCacheLoad()) {
            Mage::log("cache hit");
        } else {
            $configTimeout = $this->getConfigTimeout();
            $defaultTimeout = $this->getDefaultTimeout();
            if (is_numeric($configTimeout)) {
                $this->setDefaultTimeout($configTimeout);
            }
            
            try {
                $ws = new TntMercurio_CalculoFrete(array('connection_timeout' => $configTimeout), $url);
                $response = $ws->calculaFrete(new TntMercurio_CalculaFrete($this->getRequest()));
                $this->setDefaultTimeout($defaultTimeout);
                
                if ($out = $response->getOut()) {
                    $errors = (array) $out->getErrorList();
                    if (!empty($errors)) {
                        $this->setResponse($response);
                        return true;
                    }
                }
            } catch (Exception $e) {
                Mage::log($e->getMessage());
                return false;
            }
        
            $this->_getCacheSave($response);
        }
        
        $this->setResponse($response);
        return true;
    }
}
