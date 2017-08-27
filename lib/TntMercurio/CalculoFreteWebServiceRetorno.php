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
class TntMercurio_CalculoFreteWebServiceRetorno
{

    /**
     *
     * @var String[] $errorList
     * @access public
     */
    public $errorList = null;

    /**
     *
     * @var string $nmDestinatario
     * @access public
     */
    public $nmDestinatario = null;

    /**
     *
     * @var string $nmMunicipioDestino
     * @access public
     */
    public $nmMunicipioDestino = null;

    /**
     *
     * @var string $nmMunicipioOrigem
     * @access public
     */
    public $nmMunicipioOrigem = null;

    /**
     *
     * @var string $nmRemetente
     * @access public
     */
    public $nmRemetente = null;

    /**
     *
     * @var string $nrDDDFilialDestino
     * @access public
     */
    public $nrDDDFilialDestino = null;

    /**
     *
     * @var string $nrDDDFilialOrigem
     * @access public
     */
    public $nrDDDFilialOrigem = null;

    /**
     *
     * @var string $nrTelefoneFilialDestino
     * @access public
     */
    public $nrTelefoneFilialDestino = null;

    /**
     *
     * @var string $nrTelefoneFilialOrigem
     * @access public
     */
    public $nrTelefoneFilialOrigem = null;

    /**
     *
     * @var TntMercurio_ParcelasFreteWebService[] $parcelas
     * @access public
     */
    public $parcelas = null;

    /**
     *
     * @var int $prazoEntrega
     * @access public
     */
    public $prazoEntrega = null;

    /**
     *
     * @var TntMercurio_ServicoAdicionalWebService[] $servicosAdicionais
     * @access public
     */
    public $servicosAdicionais = null;

    /**
     *
     * @var string $vlDesconto
     * @access public
     */
    public $vlDesconto = null;

    /**
     *
     * @var string $vlICMSubstituicaoTributaria
     * @access public
     */
    public $vlICMSubstituicaoTributaria = null;

    /**
     *
     * @var string $vlImposto
     * @access public
     */
    public $vlImposto = null;

    /**
     *
     * @var string $vlTotalCtrc
     * @access public
     */
    public $vlTotalCtrc = null;

    /**
     *
     * @var string $vlTotalFrete
     * @access public
     */
    public $vlTotalFrete = null;

    /**
     *
     * @var string $vlTotalServico
     * @access public
     */
    public $vlTotalServico = null;

    /**
     *
     * @return multitype:String
     */
    public function getErrorList()
    {
        return $this->errorList;
    }

    /**
     *
     * @return string
     */
    public function getNmDestinatario()
    {
        return $this->nmDestinatario;
    }

    /**
     *
     * @return string
     */
    public function getNmMunicipioDestino()
    {
        return $this->nmMunicipioDestino;
    }

    /**
     *
     * @return string
     */
    public function getNmMunicipioOrigem()
    {
        return $this->nmMunicipioOrigem;
    }

    /**
     *
     * @return string
     */
    public function getNmRemetente()
    {
        return $this->nmRemetente;
    }

    /**
     *
     * @return string
     */
    public function getNrDDDFilialDestino()
    {
        return $this->nrDDDFilialDestino;
    }

    /**
     *
     * @return string
     */
    public function getNrDDDFilialOrigem()
    {
        return $this->nrDDDFilialOrigem;
    }

    /**
     *
     * @return string
     */
    public function getNrTelefoneFilialDestino()
    {
        return $this->nrTelefoneFilialDestino;
    }

    /**
     *
     * @return string
     */
    public function getNrTelefoneFilialOrigem()
    {
        return $this->nrTelefoneFilialOrigem;
    }

    /**
     *
     * @return multitype:TntMercurio_ParcelasFreteWebService
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     *
     * @return int
     */
    public function getPrazoEntrega()
    {
        return $this->prazoEntrega;
    }

    /**
     *
     * @return multitype:TntMercurio_ServicoAdicionalWebService
     */
    public function getServicosAdicionais()
    {
        return $this->servicosAdicionais;
    }

    /**
     *
     * @return string
     */
    public function getVlDesconto()
    {
        return $this->vlDesconto;
    }

    /**
     *
     * @return string
     */
    public function getVlICMSubstituicaoTributaria()
    {
        return $this->vlICMSubstituicaoTributaria;
    }

    /**
     *
     * @return string
     */
    public function getVlImposto()
    {
        return $this->vlImposto;
    }

    /**
     *
     * @return string
     */
    public function getVlTotalCtrc()
    {
        return $this->vlTotalCtrc;
    }

    /**
     *
     * @return string
     */
    public function getVlTotalFrete()
    {
        return $this->vlTotalFrete;
    }

    /**
     *
     * @return string
     */
    public function getVlTotalServico()
    {
        return $this->vlTotalServico;
    }

    /**
     *
     * @param String[] $errorList            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setErrorList($errorList)
    {
        $this->errorList = $errorList;
        return $this;
    }

    /**
     *
     * @param string $nmDestinatario            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNmDestinatario($nmDestinatario)
    {
        $this->nmDestinatario = $nmDestinatario;
        return $this;
    }

    /**
     *
     * @param string $nmMunicipioDestino            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNmMunicipioDestino($nmMunicipioDestino)
    {
        $this->nmMunicipioDestino = $nmMunicipioDestino;
        return $this;
    }

    /**
     *
     * @param string $nmMunicipioOrigem            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNmMunicipioOrigem($nmMunicipioOrigem)
    {
        $this->nmMunicipioOrigem = $nmMunicipioOrigem;
        return $this;
    }

    /**
     *
     * @param string $nmRemetente            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNmRemetente($nmRemetente)
    {
        $this->nmRemetente = $nmRemetente;
        return $this;
    }

    /**
     *
     * @param string $nrDDDFilialDestino            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNrDDDFilialDestino($nrDDDFilialDestino)
    {
        $this->nrDDDFilialDestino = $nrDDDFilialDestino;
        return $this;
    }

    /**
     *
     * @param string $nrDDDFilialOrigem            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNrDDDFilialOrigem($nrDDDFilialOrigem)
    {
        $this->nrDDDFilialOrigem = $nrDDDFilialOrigem;
        return $this;
    }

    /**
     *
     * @param string $nrTelefoneFilialDestino            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNrTelefoneFilialDestino($nrTelefoneFilialDestino)
    {
        $this->nrTelefoneFilialDestino = $nrTelefoneFilialDestino;
        return $this;
    }

    /**
     *
     * @param string $nrTelefoneFilialOrigem            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setNrTelefoneFilialOrigem($nrTelefoneFilialOrigem)
    {
        $this->nrTelefoneFilialOrigem = $nrTelefoneFilialOrigem;
        return $this;
    }

    /**
     *
     * @param TntMercurio_ParcelasFreteWebService[] $parcelas            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
        return $this;
    }

    /**
     *
     * @param int $prazoEntrega            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setPrazoEntrega($prazoEntrega)
    {
        $this->prazoEntrega = $prazoEntrega;
        return $this;
    }

    /**
     *
     * @param TntMercurio_ServicoAdicionalWebService[] $servicosAdicionais            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setServicosAdicionais($servicosAdicionais)
    {
        $this->servicosAdicionais = $servicosAdicionais;
        return $this;
    }

    /**
     *
     * @param string $vlDesconto            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlDesconto($vlDesconto)
    {
        $this->vlDesconto = $vlDesconto;
        return $this;
    }

    /**
     *
     * @param string $vlICMSubstituicaoTributaria            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlICMSubstituicaoTributaria($vlICMSubstituicaoTributaria)
    {
        $this->vlICMSubstituicaoTributaria = $vlICMSubstituicaoTributaria;
        return $this;
    }

    /**
     *
     * @param string $vlImposto            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlImposto($vlImposto)
    {
        $this->vlImposto = $vlImposto;
        return $this;
    }

    /**
     *
     * @param string $vlTotalCtrc            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlTotalCtrc($vlTotalCtrc)
    {
        $this->vlTotalCtrc = $vlTotalCtrc;
        return $this;
    }

    /**
     *
     * @param string $vlTotalFrete            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlTotalFrete($vlTotalFrete)
    {
        $this->vlTotalFrete = $vlTotalFrete;
        return $this;
    }

    /**
     *
     * @param string $vlTotalServico            
     * @return TntMercurio_CalculoFreteWebServiceRetorno
     *
     */
    public function setVlTotalServico($vlTotalServico)
    {
        $this->vlTotalServico = $vlTotalServico;
        return $this;
    }
}
