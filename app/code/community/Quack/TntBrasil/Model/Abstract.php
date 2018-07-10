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

abstract class Quack_TntBrasil_Model_Abstract extends Mage_Shipping_Model_Carrier_Abstract
{
    const STATUS_FROM_TO = 'EM VIAGEM';
    const STATUS_DELIVERED = 'ENTREGA REALIZADA';
    const STATUS_DOC_ISSUED = 'EMISSÃO DE DOCUMENTO';
    const TAXVAT_STANDARD = '00000000000';
    const CUBIC_FACTOR = 250;
    
    /**
     * List of fit itens
     *
     * @var array
     */
    protected $_fitItemHash = array();
    
    /**
     * Maximum of posting days of all itens in cart
     * 
     * @var int
     */
    protected $_postingDays = 0;
    
    /**
     * Raw rate request data
     *
     * @var Mage_Shipping_Model_Rate_Request|null
     */
    protected $_rawRequest = null;

    /**
     * Retrieve all visible items from request
     *
     * @param Mage_Shipping_Model_Rate_Request $request Mage request
     *
     * @return array
     */
    protected function _getRequestItems(Mage_Shipping_Model_Rate_Request $request)
    {
        $allItems = $request->getAllItems();
        $items = array();
    
        foreach ( $allItems as $item ) {
            if ( !$item->getParentItemId() ) {
                $items[] = $item;
            }
        }
    
        $items = $this->_loadBundleChildren($items);
    
        return $items;
    }
    
    /**
     * Filter visible and bundle children products.
     *
     * @param array $items Product Items
     *
     * @return array
     */
    protected function _loadBundleChildren($items)
    {
        $visibleAndBundleChildren = array();
        /* @var $item Mage_Sales_Model_Quote_Item */
        foreach ($items as $item) {
            $product = $item->getProduct();
            $isBundle = ($product->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_BUNDLE);
            if ($isBundle) {
                /* @var $child Mage_Sales_Model_Quote_Item */
                foreach ($item->getChildren() as $child) {
                    $visibleAndBundleChildren[] = $child;
                }
            } else {
                $visibleAndBundleChildren[] = $item;
            }
        }
        return $visibleAndBundleChildren;
    }

    /**
     * Retrieves the simple product attribute
     * 
     * @param Mage_Catalog_Model_Product $product Catalog Product
     * @param string $attribute Attribute Code
     * 
     * @return mixed(string|int|float)
     */
    protected function _getProductAttribute($product, $attribute)
    {
        $type = $product->getTypeInstance(true);
        if ($type->getProduct($product)->hasCustomOptions() &&
            ($simpleProductOption = $type->getProduct($product)->getCustomOption('simple_product'))
        ) {
            $simpleProduct = $simpleProductOption->getProduct($product);
            if ($simpleProduct) {
                return $this->_getProductAttribute($simpleProduct, $attribute);
            }
        }
        return $type->getProduct($product)->getData($attribute);
    }
    
    /**
     * Added a fit size for items in large quantities.
     * Means you can join items like two or more glasses, pots and vases.
     * The calc is applied only for height side.
     * Required attribute fit_size. Example:
     *
     *         code: fit_size
     *         type: varchar
     *
     * After you can set a fit size for all products and improve your sells
     *
     * @param Mage_Eav_Model_Entity_Abstract $item Order Item
     *
     * @return number
     */
    protected function _getFitHeight($item)
    {
        $product = $item->getProduct();
        $height  = $this->_getProductAttribute($product, $this->getConfigData('attribute_height'));
        $fitSize = (float) $this->_getProductAttribute($product, $this->getConfigData('attribute_fitsize'));
    
        if ($item->getQty() > 1 && is_numeric($fitSize) && $fitSize > 0) {
            $totalSize = $height + ($fitSize * ($item->getQty() - 1));
            $height    = $totalSize / $item->getQty();
        }
    
        return $height;
    }
    
    /**
     * Saves a hash of different itens that can be perfectly fitted for further adjustment
     *
     * @param Mage_Eav_Model_Entity_Abstract $item Product Item
     *
     * @return bool
     */
    protected function _setFitItem($item)
    {
        $product = $item->getProduct();
        $height  = $this->_getProductAttribute($product, $this->getConfigData('attribute_height'));
        $width   = $this->_getProductAttribute($product, $this->getConfigData('attribute_width'));
        $length  = $this->_getProductAttribute($product, $this->getConfigData('attribute_length'));
        $fitSize = $this->_getProductAttribute($product, $this->getConfigData('attribute_fitsize'));
        $weight  = $product->getWeight();
        if (!(empty($fitSize) || empty($height) || empty($width) || empty($length))) {
            $itemKey = "{$height}_{$width}_{$length}_{$fitSize}_{$weight}";
            if (isset($this->_fitItemHash[$itemKey]) || $this->_fitItemHash[$itemKey] = 0) {
                $this->_fitItemHash[$itemKey]++;
            }
            return true;
        }
        return false;
    }
    
    /**
     * Returns the total saved for different fitted items
     *
     * @return int
     */
    protected function _getFitSaved()
    {
        $cubicWeight = 0;
        // Qty means how many different perfect fit items can be saved
        foreach ($this->_fitItemHash as $itemKey => $qty) {
            if ($qty > 1) {
                list($height,$width,$length,$fitSize,$weight) = explode('_', $itemKey);
                $height -= $fitSize;
                $cubicWeight += $height * $width * $length * ($qty-1);
            }
        }
        return $cubicWeight;
    }
    
    /**
     * Retrieves the customer tax/vat number based on the tracking code
     * and obviously the carrier code.
     * 
     * @param string $code
     * @return string
     */
    protected function _getCustomerTaxvatByTracking($code)
    {
        $taxvat = null;
        $track = Mage::getModel('sales/order_shipment_track');
        $collection = $track->getCollection()
            ->addAttributeToFilter('track_number', $code)
            ->addAttributeToFilter('carrier_code', $this->getCarrierCode());
        foreach ($collection as $track) {
            $order = Mage::getModel('sales/order')->load($track->getOrderId());
            $taxvat = $order->getCustomerTaxvat();
            break;
        }
        return $taxvat;
    }

    /**
     * Loads tracking progress details
     *
     * @param TntMercurio_LocalizacaoOut $state History State Element
     * @param bool $isDelivered Delivery Flag
     *
     * @return array
     */
    protected function _getTrackingProgressDetails(TntMercurio_LocalizacaoOut $state, $isDelivered=false)
    {
        $date = DateTime::createFromFormat('d/m/Y H:i:s', $state->emissaoConhecimento);
        $details = array(
            'deliverydate'  => $date->format('Y-m-d'),
            'deliverytime'  => $date->format('H:i:s'),
            'status'        => $state->localizacao,
        );
        if (!$isDelivered) {
            $msg = $state->localizacao;
            $details['activity'] = $msg;
            $details['deliverylocation'] = "";
        }
        return $details;
    }
    
    /**
     * Loads progress data using the WSDL response
     *
     * @param TntMercurio_LocalizaMercadoriaResponse $response Request response
     *
     * @return array
     */
    protected function _getTrackingProgress(TntMercurio_LocalizaMercadoriaResponse $response)
    {
        $progress = array();
        $finalStep = array();
        $trackings = array($response->out);
        
        foreach ($trackings as $track) {
            $progress[] = $this->_getTrackingProgressDetails($track);
            if ($track->localizacao == self::STATUS_DELIVERED) {
                $finalStep = $this->_getTrackingProgressDetails($track, true);
            }
        }
        
        $progress[] = $finalStep;
        return $progress;
    }
    
    /**
     * Retrieves the package size in m3
     * 
     * @param Mage_Shipping_Model_Rate_Request $request Mage request
     * 
     * @return float
     */
    public function getPackageSize(Mage_Shipping_Model_Rate_Request $request)
    {
        $volumeWeight = 0;

        $items = $this->_getRequestItems($request);

        foreach ($items as $item) {
            if ($_product = $item->getProduct()) {
                $_product->load($_product->getId());
    
                $itemAltura = $this->_getProductAttribute($_product, $this->getConfigData('attribute_height'));
                $itemLargura = $this->_getProductAttribute($_product, $this->getConfigData('attribute_width'));
                $itemComprimento = $this->_getProductAttribute($_product, $this->getConfigData('attribute_length'));
    
                $itemAltura = $this->_getFitHeight($item);
                $volumeWeight += ($itemAltura * $itemLargura * $itemComprimento * $item->getTotalQty());
    
                $this->_postingDays = max(
                    $this->_postingDays,
                    (int) $this->_getProductAttribute($_product, $this->getConfigData('attribute_postingdays'))
                );
                $this->_setFitItem($item);
            }
        }

        $volumeWeight -= $this->_getFitSaved();
        $volumeWeight /= pow(10, 6);
        return $volumeWeight;
    }
    
    public function getMethodTitle($item)
    {
        $tpServico = new Quack_TntBrasil_Model_Source_TransportType();
        $name = $tpServico->getOptionText($item->getRequest()->getTpServico());
        $companyTime = $item->getResponse()->getOut()->getPrazoEntrega();
        $postingTime = $this->getPostingTime();
        $finalTime = $companyTime + $postingTime;
        $startTime = $companyTime + ceil($postingTime/2);
        return Mage::helper('tntbrasil')->__('%s - from %d to %d days', $name, $startTime, $finalTime);
    }
    
    /**
     * 
     * @return int
     */
    public function getPostingTime()
    {
        $days  = (int)$this->getConfigData('posting_days_increment');
        $days += (int)$this->_postingDays;
        return $days;
    }
    
    /**
     * @return Mage_Shipping_Model_Rate_Result_Method
     */
    public function getRateResultMethod()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->getCarrierCode());
        $rate->setCarrierTitle($this->getConfigData('title'));
        return $rate;
    }
    
    /**
     * @return Mage_Shipping_Model_Rate_Result_Error
     */
    public function getRateResultError()
    {
        $rate = Mage::getModel('shipping/rate_result_error');
        $rate->setCarrier($this->getCarrierCode());
        $rate->setErrorMessage($this->getConfigData('specificerrmsg'));
        return $rate;
    }
    
    public function getStoreData()
    {
        $data = array(
            'login'     => $this->getConfigData('api_login'),
            'office'    => $this->getConfigData('api_office'),
            'entity'    => $this->getConfigData('api_entity'),
            'vat'       => $this->getConfigData('api_vat'),
            'ie'        => $this->getConfigData('api_ie'),
            'taxcode'   => $this->getConfigData('api_taxcode'),
            'shipment'  => $this->getConfigData('api_shipment'),
            'postcode'  => Mage::getStoreConfig('shipping/origin/postcode', $this->getStore()),
        );
        return (object) $data;
    }
    
    /**
     * 
     * @return Varien_Data_Collection
     */
    public function getRateCollection()
    {
        Mage::log('Quack_TntBrasil_Model_Abstract::getRateCollection');
        $collection = new Varien_Data_Collection();
        
        $size = number_format($this->getPackageSize($this->_rawRequest), 4, '.', '');
        $weight = number_format($this->_rawRequest->getPackageWeight(), 2, '.', '');
        $weight = max($weight, $size * self::CUBIC_FACTOR);
        $amount = number_format($this->_rawRequest->getPackageValue(), 2, '.', '');
        $postcode = Mage::helper('tntbrasil')->formatZip($this->_rawRequest->getDestPostcode());
        
        $data = $this->getStoreData();        
        $allowed = explode(',', $this->getConfigData('allowed_methods'));
        
        foreach ($allowed as $method) {
            $quote = new TntMercurio_CotacaoWebService();
            $quote->setTpServico($method);
            $quote->setLogin($data->login)
                ->setTpFrete($data->shipment)
                ->setCepOrigem($data->postcode)
                ->setCdDivisaoCliente($data->office)
                ->setTpPessoaRemetente($data->entity)
                ->setNrIdentifClienteRem($data->vat)
                ->setNrInscricaoEstadualRemetente($data->ie)
                ->setTpSituacaoTributariaRemetente($data->taxcode);
            $quote->setPsReal($weight)
                ->setCepDestino($postcode)
                ->setVlMercadoria($amount);
            
            $quote->setNrIdentifClienteDest(self::TAXVAT_STANDARD)
                ->setTpPessoaDestinatario(Quack_TntBrasil_Model_Source_Entity::INDIVIDUAL)
                ->setTpSituacaoTributariaDestinatario(Quack_TntBrasil_Model_Source_CST::NC);
            
            $item = Mage::getModel('tntbrasil/rate');
            $item->setRequest($quote);
            if ($item->sendRequest($this->getConfigData('url'))) {
                $collection->addItem($item);
            }
        }
        
        return $collection;
    }
    
    public function validateAllowedZips($postcode)
    {
        $output = true;
        
        if ($allowedZips = $this->getConfigData('allowed_zips')) {
            $allowedZips = unserialize($allowedZips);
            
            if (is_array($allowedZips) && !empty($allowedZips)) {
                $output = false;
                $postcode = Mage::helper('tntbrasil')->formatZip($postcode);
                
                foreach ($allowedZips as $zip) {
                    $isValid = ((int)$zip['from'] <= (int)$postcode);
                    $isValid &= ((int)$zip['to'] >= (int)$postcode);
                    if ($isValid) {
                        $output = true;
                        break;
                    }
                }
            }
        }
        return $output;
    }
}