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
class TntMercurio_ServicoAdicionalWebService
{

    /**
     *
     * @var string $dsComplemento
     * @access public
     */
    public $dsComplemento = null;

    /**
     *
     * @var string $nmServico
     * @access public
     */
    public $nmServico = null;

    /**
     *
     * @var string $sgMoeda
     * @access public
     */
    public $sgMoeda = null;

    /**
     *
     * @var string $vlServico
     * @access public
     */
    public $vlServico = null;

    /**
     *
     * @return string
     */
    public function getDsComplemento()
    {
        return $this->dsComplemento;
    }

    /**
     *
     * @return string
     */
    public function getNmServico()
    {
        return $this->nmServico;
    }

    /**
     *
     * @return string
     */
    public function getSgMoeda()
    {
        return $this->sgMoeda;
    }

    /**
     *
     * @return string
     */
    public function getVlServico()
    {
        return $this->vlServico;
    }

    /**
     *
     * @param string $dsComplemento            
     * @return TntMercurio_ServicoAdicionalWebService
     *
     */
    public function setDsComplemento($dsComplemento)
    {
        $this->dsComplemento = $dsComplemento;
        return $this;
    }

    /**
     *
     * @param string $nmServico            
     * @return TntMercurio_ServicoAdicionalWebService
     *
     */
    public function setNmServico($nmServico)
    {
        $this->nmServico = $nmServico;
        return $this;
    }

    /**
     *
     * @param string $sgMoeda            
     * @return TntMercurio_ServicoAdicionalWebService
     *
     */
    public function setSgMoeda($sgMoeda)
    {
        $this->sgMoeda = $sgMoeda;
        return $this;
    }

    /**
     *
     * @param string $vlServico            
     * @return TntMercurio_ServicoAdicionalWebService
     *
     */
    public function setVlServico($vlServico)
    {
        $this->vlServico = $vlServico;
        return $this;
    }
}
