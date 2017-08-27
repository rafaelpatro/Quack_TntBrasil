<?php

/**
 * Este arquivo é parte do programa TntMercurio
 *
 * Este programa é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da Licença Pública Geral GNU como
 * publicada pela Fundação do Software Livre (FSF); na versão 3 da
 * Licença, ou (na sua opinião) qualquer versão.
 *
 * Este programa é distribuído na esperança de que possa ser  útil,
 * mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO
 * a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 * Licença Pública Geral GNU para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral GNU junto
 * com este programa, Se não, veja <http://www.gnu.org/licenses/>.
 *
 * @category   Shipping
 * @package    TntMercurio
 * @author     Rafael Patro <rafaelpatro@gmail.com>
 * @copyright  Copyright (c) 2017 Rafael Patro (rafaelpatro@gmail.com)
 * @license    http://www.gnu.org/licenses/gpl.txt
 * @link       https://github.com/rafaelpatro/TntMercurio
 */
class TntMercurio_CalculoFrete extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
      'CotacaoWebService' => '\TntMercurio_CotacaoWebService',
      'calculaFrete' => '\TntMercurio_CalculaFrete',
      'calculaFreteResponse' => '\TntMercurio_CalculaFreteResponse',
      'CalculoFreteWebServiceRetorno' => '\TntMercurio_CalculoFreteWebServiceRetorno',
      'ServicoAdicionalWebService' => '\TntMercurio_ServicoAdicionalWebService',
      'ParcelasFreteWebService' => '\TntMercurio_ParcelasFreteWebService');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $wsdl = 'http://ws.tntbrasil.com.br/servicos/CalculoFrete?wsdl')
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      
      parent::__construct($wsdl, $options);
    }

    /**
     * @param TntMercurio_CalculaFrete $parameters
     * @access public
     * @return TntMercurio_CalculaFreteResponse
     */
    public function calculaFrete(TntMercurio_CalculaFrete $parameters)
    {
      return $this->__soapCall('calculaFrete', array($parameters));
    }

}
