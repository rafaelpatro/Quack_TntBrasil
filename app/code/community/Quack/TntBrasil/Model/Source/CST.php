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

class Quack_TntBrasil_Model_Source_CST
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    const CO = 'CO';
    const NC = 'NC';
    const CI = 'CI';
    const CM = 'CM';
    const CN = 'CN';
    const ME = 'ME';
    const MN = 'MN';
    const PR = 'PR';
    const PN = 'PN';
    const OP = 'OP';
    const ON = 'ON';
    const OF = 'OF';
    
    public function toOptionArray()
    {
        return array(
            array('value' => self::CO, 'label' => 'Contribuinte'),
            array('value' => self::NC, 'label' => 'Não Contribuinte'),
            array('value' => self::CI, 'label' => 'Contribuinte Incentivado - CI'),
            array('value' => self::CM, 'label' => 'Contribuinte Incentivado - CM'),
            array('value' => self::CN, 'label' => 'Cia Mista Não Contribuinte'),
            array('value' => self::ME, 'label' => 'ME / EPP / Simples Nacional Contribuinte'),
            array('value' => self::MN, 'label' => 'ME / EPP / Simples Nacional Não Contribuinte'),
            array('value' => self::PR, 'label' => 'Produtor Rural Contribuinte'),
            array('value' => self::PN, 'label' => 'Produtor Rural Não Contribuinte'),
            array('value' => self::OP, 'label' => 'Órgão Público Contribuinte'),
            array('value' => self::ON, 'label' => 'Órgão Público Não Contribuinte'),
            array('value' => self::OF, 'label' => 'Órgão Público - Programas de fortaleciomento e modernização Estadual'),
        );
    }
    
    /**
     * (non-PHPdoc)
     * @see Mage_Eav_Model_Entity_Attribute_Source_Interface::getAllOptions()
     */
    public function getAllOptions()
    {
        return self::toOptionArray();
    }
}
