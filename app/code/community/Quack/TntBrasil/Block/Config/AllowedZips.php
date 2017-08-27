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

class Quack_TntBrasil_Block_Config_AllowedZips extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{

    public function _prepareToRender()
    {
        $this->addColumn('from', array(
            'label' => Mage::helper('tntbrasil')->__('Zip From'),
            'style' => 'width:100px'
        ));
        $this->addColumn('to', array(
            'label' => Mage::helper('tntbrasil')->__('Zip To'),
            'style' => 'width:100px'
        ));
        
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('tntbrasil')->__('Add');
    }
}
