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
class TntMercurio_ParcelasFreteWebService
{

    /**
     *
     * @var string $dsParcela
     * @access public
     */
    public $dsParcela = null;

    /**
     *
     * @var string $vlParcela
     * @access public
     */
    public $vlParcela = null;

    /**
     *
     * @return string
     */
    public function getDsParcela()
    {
        return $this->dsParcela;
    }

    /**
     *
     * @return string
     */
    public function getVlParcela()
    {
        return $this->vlParcela;
    }

    /**
     *
     * @param string $dsParcela            
     * @return TntMercurio_ParcelasFreteWebService
     *
     */
    public function setDsParcela($dsParcela)
    {
        $this->dsParcela = $dsParcela;
        return $this;
    }

    /**
     *
     * @param string $vlParcela            
     * @return TntMercurio_ParcelasFreteWebService
     *
     */
    public function setVlParcela($vlParcela)
    {
        $this->vlParcela = $vlParcela;
        return $this;
    }
}
