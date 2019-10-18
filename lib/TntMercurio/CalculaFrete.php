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
class TntMercurio_CalculaFrete
{

    const NAMESPACE = 'http://model.vendas.lms.mercurio.com';

    /**
     *
     * @var TntMercurio_CotacaoWebService $in0
     * @access public
     */
    public $in0 = null;

    /**
     *
     * @param TntMercurio_CotacaoWebService $in0            
     * @access public
     */
    public function __construct($in0)
    {
        $in0->setCdDivisaoCliente(
            new SoapVar($in0->getCdDivisaoCliente(), XSD_LONG, 'long', null, 'cdDivisaoCliente', self::NAMESPACE)
        )->setLogin(
            new SoapVar($in0->getLogin(), XSD_STRING, 'string', null, 'login', self::NAMESPACE)
        )->setNrIdentifClienteDest(
            new SoapVar($in0->getNrIdentifClienteDest(), XSD_STRING, 'string', null, 'nrIdentifClienteDest', self::NAMESPACE)
        )->setNrIdentifClienteRem(
            new SoapVar($in0->getNrIdentifClienteRem(), XSD_STRING, 'string', null, 'nrIdentifClienteRem', self::NAMESPACE)
        )->setCepDestino(
            new SoapVar($in0->getCepDestino(), XSD_STRING, 'string', null, 'cepDestino', self::NAMESPACE)
        )->setCepOrigem(
            new SoapVar($in0->getCepOrigem(), XSD_STRING, 'string', null, 'cepOrigem', self::NAMESPACE)
        )->setNrInscricaoEstadualDestinatario(
            new SoapVar($in0->getNrInscricaoEstadualDestinatario(), XSD_STRING, 'string', null, 'nrInscricaoEstadualDestinatario', self::NAMESPACE)
        )->setNrInscricaoEstadualRemetente(
            new SoapVar($in0->getNrInscricaoEstadualRemetente(), XSD_STRING, 'string', null, 'nrInscricaoEstadualRemetente', self::NAMESPACE)
        )->setPsReal(
            new SoapVar($in0->getPsReal(), XSD_STRING, 'string', null, 'psReal', self::NAMESPACE)
        )->setTpFrete(
            new SoapVar($in0->getTpFrete(), XSD_STRING, 'string', null, 'tpFrete', self::NAMESPACE)
        )->setTpPessoaDestinatario(
            new SoapVar($in0->getTpPessoaDestinatario(), XSD_STRING, 'string', null, 'tpPessoaDestinatario', self::NAMESPACE)
        )->setTpPessoaRemetente(
            new SoapVar($in0->getTpPessoaRemetente(), XSD_STRING, 'string', null, 'tpPessoaRemetente', self::NAMESPACE)
        )->setTpServico(
            new SoapVar($in0->getTpServico(), XSD_STRING, 'string', null, 'tpServico', self::NAMESPACE)
        )->setTpSituacaoTributariaDestinatario(
            new SoapVar($in0->getTpSituacaoTributariaDestinatario(), XSD_STRING, 'string', null, 'tpSituacaoTributariaDestinatario', self::NAMESPACE)
        )->setTpSituacaoTributariaRemetente(
            new SoapVar($in0->getTpSituacaoTributariaRemetente(), XSD_STRING, 'string', null, 'tpSituacaoTributariaRemetente', self::NAMESPACE)
        )->setVlMercadoria(
            new SoapVar($in0->getVlMercadoria(), XSD_STRING, 'string', null, 'vlMercadoria', self::NAMESPACE)
        );

        $this->in0 = $in0;
    }

    /**
     *
     * @return TntMercurio_CotacaoWebService
     */
    public function getIn0()
    {
        return $this->in0;
    }

    /**
     *
     * @param TntMercurio_CotacaoWebService $in0            
     * @return TntMercurio_CalculaFrete
     */
    public function setIn0($in0)
    {
        $this->in0 = $in0;
        return $this;
    }
}
