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

class TntMercurio_LocalizacaoIn
{

    /**
     * @var string $cnpj
     * @access public
     */
    public $cnpj = null;

    /**
     * @var int $nf
     * @access public
     */
    public $nf = null;

    /**
     * @var string $nfSerie
     * @access public
     */
    public $nfSerie = null;

    /**
     * @var int $pedido
     * @access public
     */
    public $pedido = null;

    /**
     * @var string $usuario
     * @access public
     */
    public $usuario = null;

    /**
     * @access public
     */
    public function __construct()
    {
    
    }

}
