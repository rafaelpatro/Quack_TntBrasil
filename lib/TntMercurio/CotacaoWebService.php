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
class TntMercurio_CotacaoWebService
{

    /**
     *
     * @var int $cdDivisaoCliente
     * @access public
     */
    public $cdDivisaoCliente = null;

    /**
     *
     * @var string $cepDestino
     * @access public
     */
    public $cepDestino = null;

    /**
     *
     * @var string $cepOrigem
     * @access public
     */
    public $cepOrigem = null;

    /**
     *
     * @var string $login
     * @access public
     */
    public $login = null;

    /**
     *
     * @var string $nrIdentifClienteDest
     * @access public
     */
    public $nrIdentifClienteDest = null;

    /**
     *
     * @var string $nrIdentifClienteRem
     * @access public
     */
    public $nrIdentifClienteRem = null;

    /**
     *
     * @var string $nrInscricaoEstadualDestinatario
     * @access public
     */
    public $nrInscricaoEstadualDestinatario = null;

    /**
     *
     * @var string $nrInscricaoEstadualRemetente
     * @access public
     */
    public $nrInscricaoEstadualRemetente = null;

    /**
     *
     * @var string $psReal
     * @access public
     */
    public $psReal = null;

    /**
     *
     * @var string $senha
     * @access public
     */
    public $senha = null;

    /**
     *
     * @var string $tpFrete
     * @access public
     */
    public $tpFrete = null;

    /**
     *
     * @var string $tpPessoaDestinatario
     * @access public
     */
    public $tpPessoaDestinatario = null;

    /**
     *
     * @var string $tpPessoaRemetente
     * @access public
     */
    public $tpPessoaRemetente = null;

    /**
     *
     * @var string $tpServico
     * @access public
     */
    public $tpServico = null;

    /**
     *
     * @var string $tpSituacaoTributariaDestinatario
     * @access public
     */
    public $tpSituacaoTributariaDestinatario = null;

    /**
     *
     * @var string $tpSituacaoTributariaRemetente
     * @access public
     */
    public $tpSituacaoTributariaRemetente = null;

    /**
     *
     * @var string $vlMercadoria
     * @access public
     */
    public $vlMercadoria = null;

    /**
     *
     * @return int
     */
    public function getCdDivisaoCliente()
    {
        return $this->cdDivisaoCliente;
    }

    /**
     *
     * @return string
     */
    public function getCepDestino()
    {
        return $this->cepDestino;
    }

    /**
     *
     * @return string
     */
    public function getCepOrigem()
    {
        return $this->cepOrigem;
    }

    /**
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     *
     * @return string
     */
    public function getNrIdentifClienteDest()
    {
        return $this->nrIdentifClienteDest;
    }

    /**
     *
     * @return string
     */
    public function getNrIdentifClienteRem()
    {
        return $this->nrIdentifClienteRem;
    }

    /**
     *
     * @return string
     */
    public function getNrInscricaoEstadualDestinatario()
    {
        return $this->nrInscricaoEstadualDestinatario;
    }

    /**
     *
     * @return string
     */
    public function getNrInscricaoEstadualRemetente()
    {
        return $this->nrInscricaoEstadualRemetente;
    }

    /**
     *
     * @return string
     */
    public function getPsReal()
    {
        return $this->psReal;
    }

    /**
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     *
     * @return string
     */
    public function getTpFrete()
    {
        return $this->tpFrete;
    }

    /**
     *
     * @return string
     */
    public function getTpPessoaDestinatario()
    {
        return $this->tpPessoaDestinatario;
    }

    /**
     *
     * @return string
     */
    public function getTpPessoaRemetente()
    {
        return $this->tpPessoaRemetente;
    }

    /**
     *
     * @return string
     */
    public function getTpServico()
    {
        return $this->tpServico;
    }

    /**
     *
     * @return string
     */
    public function getTpSituacaoTributariaDestinatario()
    {
        return $this->tpSituacaoTributariaDestinatario;
    }

    /**
     *
     * @return string
     */
    public function getTpSituacaoTributariaRemetente()
    {
        return $this->tpSituacaoTributariaRemetente;
    }

    /**
     *
     * @return string
     */
    public function getVlMercadoria()
    {
        return $this->vlMercadoria;
    }

    /**
     *
     * @param int $cdDivisaoCliente            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setCdDivisaoCliente($cdDivisaoCliente)
    {
        $this->cdDivisaoCliente = $cdDivisaoCliente;
        return $this;
    }

    /**
     *
     * @param string $cepDestino            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setCepDestino($cepDestino)
    {
        $this->cepDestino = $cepDestino;
        return $this;
    }

    /**
     *
     * @param string $cepOrigem            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setCepOrigem($cepOrigem)
    {
        $this->cepOrigem = $cepOrigem;
        return $this;
    }

    /**
     *
     * @param string $login            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     *
     * @param string $nrIdentifClienteDest            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setNrIdentifClienteDest($nrIdentifClienteDest)
    {
        $this->nrIdentifClienteDest = $nrIdentifClienteDest;
        return $this;
    }

    /**
     *
     * @param string $nrIdentifClienteRem            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setNrIdentifClienteRem($nrIdentifClienteRem)
    {
        $this->nrIdentifClienteRem = $nrIdentifClienteRem;
        return $this;
    }

    /**
     *
     * @param string $nrInscricaoEstadualDestinatario            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setNrInscricaoEstadualDestinatario($nrInscricaoEstadualDestinatario)
    {
        $this->nrInscricaoEstadualDestinatario = $nrInscricaoEstadualDestinatario;
        return $this;
    }

    /**
     *
     * @param string $nrInscricaoEstadualRemetente            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setNrInscricaoEstadualRemetente($nrInscricaoEstadualRemetente)
    {
        $this->nrInscricaoEstadualRemetente = $nrInscricaoEstadualRemetente;
        return $this;
    }

    /**
     *
     * @param string $psReal            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setPsReal($psReal)
    {
        $this->psReal = $psReal;
        return $this;
    }

    /**
     *
     * @param string $senha            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     *
     * @param string $tpFrete            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpFrete($tpFrete)
    {
        $this->tpFrete = $tpFrete;
        return $this;
    }

    /**
     *
     * @param string $tpPessoaDestinatario            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpPessoaDestinatario($tpPessoaDestinatario)
    {
        $this->tpPessoaDestinatario = $tpPessoaDestinatario;
        return $this;
    }

    /**
     *
     * @param string $tpPessoaRemetente            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpPessoaRemetente($tpPessoaRemetente)
    {
        $this->tpPessoaRemetente = $tpPessoaRemetente;
        return $this;
    }

    /**
     *
     * @param string $tpServico            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpServico($tpServico)
    {
        $this->tpServico = $tpServico;
        return $this;
    }

    /**
     *
     * @param string $tpSituacaoTributariaDestinatario            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpSituacaoTributariaDestinatario($tpSituacaoTributariaDestinatario)
    {
        $this->tpSituacaoTributariaDestinatario = $tpSituacaoTributariaDestinatario;
        return $this;
    }

    /**
     *
     * @param string $tpSituacaoTributariaRemetente            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setTpSituacaoTributariaRemetente($tpSituacaoTributariaRemetente)
    {
        $this->tpSituacaoTributariaRemetente = $tpSituacaoTributariaRemetente;
        return $this;
    }

    /**
     *
     * @param string $vlMercadoria            
     * @return TntMercurio_CotacaoWebService
     *
     */
    public function setVlMercadoria($vlMercadoria)
    {
        $this->vlMercadoria = $vlMercadoria;
        return $this;
    }
}
