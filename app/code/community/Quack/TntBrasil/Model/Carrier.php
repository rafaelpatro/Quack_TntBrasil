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

class Quack_TntBrasil_Model_Carrier extends Quack_TntBrasil_Model_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'tntbrasil';
    
    /**
     * (non-PHPdoc)
     * @see Mage_Shipping_Model_Carrier_Abstract::isTrackingAvailable()
     */
    public function isTrackingAvailable()
    {
        return true;
    }
    
    /**
     * (non-PHPdoc)
     * @see Mage_Shipping_Model_Carrier_Interface::getAllowedMethods()
     */
    public function getAllowedMethods()
    {
        $methods = array();
        $options = Mage::getSingleton('tntbrasil/source_transportType')->getAllOptions();
        foreach ($options as $option) {
            $methods["{$this->getCarrierCode()}_{$option['value']}"] = $option['label'];
        }
        return $methods;
    
    }
    
    /**
     * (non-PHPdoc)
     * @see Mage_Shipping_Model_Carrier_Abstract::proccessAdditionalValidation()
     */
    public function proccessAdditionalValidation(Mage_Shipping_Model_Rate_Request $request)
    {
        $this->_rawRequest = $request;
        return $this->validateAllowedZips($request->getDestPostcode());
    }

    /**
     * (non-PHPdoc)
     * @see Mage_Shipping_Model_Carrier_Abstract::collectRates()
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        Mage::log('Quack_TntBrasil_Model_Carrier::collectRates');
        $rateResult = Mage::getModel('shipping/rate_result');
        foreach ($this->getRateCollection($request) as $item) {
            $out = null;
            $errors = null;
            if ($item->getResponse()) {
                $out = $item->getResponse()->getOut();
                $errors = (array) $out->getErrorList();
            }
            if (empty($errors)) {
                $method = $this->getRateResultMethod();
                $method->setMethod("{$this->getCarrierCode()}_{$item->getRequest()->getTpServico()}");
                $method->setMethodTitle($this->getMethodTitle($item));
                $method->setPrice($this->getFinalPriceWithHandlingFee($out->getVlTotalFrete()));
                $method->setCost($out->getVlTotalFrete());
            } else {
                Mage::logException(Mage::exception('Mage_Core', print_r($errors, true)));
                $method = $this->getRateResultError();
                $method->setErrorMessage(array_pop($errors));
            }
            $rateResult->append($method);
        }
        
        return $rateResult;
    }
    
    /**
     * Get Tracking Info
     *
     * @param mixed $trackingCodes Tracking
     *
     * @return mixed
     */
    public function getTrackingInfo($trackingCodes)
    {
        $result = Mage::getModel('shipping/tracking_result');
        foreach ((array) $trackingCodes as $code) {
            $error = Mage::getModel('shipping/tracking_result_error');
            $error->setTracking($code);
            $error->setCarrier($this->getCarrierCode());
            $error->setCarrierTitle($this->getConfigData('title'));
            
            list($nf, $nfSerie) = explode('-', $code);
            $params = new TntMercurio_LocalizacaoIn();
            $params->nf = (int)$nf;
            $params->nfSerie = (int)$nfSerie;
            $params->cnpj = (string)$this->getConfigData('api_vat');
            $params->usuario = $this->getConfigData('api_login');
            $request = new TntMercurio_Localizacao(array(), $this->getConfigData('url_tracking'));
            
            try {
                $response = $request->localizaMercadoria(new TntMercurio_LocalizaMercadoria($params));
                Mage::log(print_r($response, true));
                $err = (array)$response->out->erros;
                if (!empty($err)) {
                    throw new Exception(print_r($err, true));
                }
            } catch (Exception $e) {
                $error->setErrorMessage($e->getMessage());
                $result->append($error);
                continue;
            }
    
            $progress = $this->_getTrackingProgress($response);
            if (!empty($progress)) {
                $track = array_pop($progress);
                $track['progressdetail'] = $progress;
                $status = Mage::getModel('shipping/tracking_result_status');
                $status->setTracking($code);
                $status->setCarrier($this->getCarrierCode());
                $status->setCarrierTitle($this->getConfigData('title'));
                $status->addData($track);
                $result->append($status);
                continue;
            } else {
                $result->append($error);
                continue;
            }
        }
    
        if ($trackings = $result->getAllTrackings()) {
            return $trackings[0];
        }
    
        return false;
    }
    
}
