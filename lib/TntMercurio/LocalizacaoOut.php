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

class TntMercurio_LocalizacaoOut
{

    /**
     * @var string $cnpjDevedor
     * @access public
     */
    public $cnpjDevedor = null;

    /**
     * @var string $conhecimento
     * @access public
     */
    public $conhecimento = null;

    /**
     * @var string $dataEntrega
     * @access public
     */
    public $dataEntrega = null;

    /**
     * @var string $emissaoConhecimento
     * @access public
     */
    public $emissaoConhecimento = null;

    /**
     * @var String[] $erros
     * @access public
     */
    public $erros = null;

    /**
     * @var string $localizacao
     * @access public
     */
    public $localizacao = null;

    /**
     * @var string $motivoNaoEntrega
     * @access public
     */
    public $motivoNaoEntrega = null;

    /**
     * @var string $notaFiscal
     * @access public
     */
    public $notaFiscal = null;

    /**
     * @var string $pedido
     * @access public
     */
    public $pedido = null;

    /**
     * @var string $peso
     * @access public
     */
    public $peso = null;

    /**
     * @var string $previsaoEntrega
     * @access public
     */
    public $previsaoEntrega = null;

    /**
     * @var string $qtdVolumes
     * @access public
     */
    public $qtdVolumes = null;

    /**
     * @access public
     */
    public function __construct()
    {
    
    }

}
