<?php
/**
 * Oggetto Web shipping extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Oggetto Shipping module to newer versions in the future.
 * If you wish to customize the Oggetto Shipping module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Oggetto
 * @package    Oggetto_Shipping
 * @copyright  Copyright (C) 2014 Oggetto Web ltd (http://oggettoweb.com/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Ems carrier model
 *
 * @category   Oggetto
 * @package    Oggetto_Shipping
 * @subpackage Model
 * @author     Eduard Paliy <epaliy@oggettoweb.com>
 */
class Oggetto_Shipping_Model_Carrier_Ems extends Mage_Shipping_Model_Carrier_Abstract
{
    protected $_code = 'emsshipping';

    /**
     * Collect and get rates
     *
     * @param   Mage_Shipping_Model_Rate_Request $request
     * @return  Mage_Shipping_Model_Rate_Result|bool
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $weight = $request->getPackageWeight();
        $orig = Mage::getStoreConfig('shipping/origin/region_id');
        $dest = $request->getDestRegionId();

        /** @var Mage_Directory_Model_Region $region */
        $region = Mage::getModel('directory/region');
        if (is_null($dest) || is_null($orig)) {
            return false;
        }

        $orig = $region->load($orig)->getDefaultName();
        $dest = $region->load($dest)->getDefaultName();

        /** @var Mage_Shipping_Model_Rate_Result $result */
        $result = Mage::getModel('shipping/rate_result');

        /** @var Mage_Shipping_Model_Rate_Result_Method $rate */
        $rate = Mage::getModel('shipping/rate_result_method');


        $rate->setCarrier($this->_code);

        $rate->setCarrierTitle($this->getConfigData('title'));

        $rate->setMethod('standard');

        $priceAndTime = $this->_getPriceAndTimeCalculated($orig, $dest, $weight);

        $price = $priceAndTime['price'];
        $minTerm = $priceAndTime['term']['min'];
        $maxTerm = $priceAndTime['term']['max'];


        /** @var Mage_Directory_Model_Currency $currency */
        $currency = Mage::getModel('directory/currency')->setData([
            'currency_code' => Mage::app()->getStore()->getCurrentCurrency()
        ]);

        $rateFromBaseToRub = $currency->getRate('RUB');

        $price = round($price / $rateFromBaseToRub, 2);

        $rate->setMethodTitle(Mage::helper('emsshipping')->__("Delivery")
            . " {$minTerm} - {$maxTerm} "
            . Mage::helper('emsshipping')->__("day(s)"));

        $rate->setPrice($price);
        $rate->setCost($price);

        $result->append($rate);

        return $result;
    }

    /**
     * Get delivery price, min amd max time (days)
     *
     * @param string $orig Original
     * @param string $dest Destination
     * @param int $weight Weight
     * @return mixed Price and time (days) for delivery
     */
    private function _getPriceAndTimeCalculated($orig, $dest, $weight)
    {
        /** @var Oggetto_Shipping_Model_Api $emsApi */
        $emsApi = Mage::getModel('emsshipping/api');

        $regions = $emsApi->getRegions();

        $orig = $this->_fixRepublic(mb_strtolower($orig, 'UTF-8'));
        $dest = $this->_fixRepublic(mb_strtolower($dest, 'UTF-8'));

        foreach ($regions as $region) {
            if (mb_strtolower($region['name'], 'UTF-8') == $orig) {
                $orig = $region['value'];
            }
            if (mb_strtolower($region['name'], 'UTF-8') == $dest) {
                $dest = $region['value'];
            }
        }

        return $emsApi->calculatePriceAndTime($orig, $dest, $weight);
    }

    /**
     * Get fixed API EMS republic
     *
     * @param string $region Region
     * @return string
     */
    private function _fixRepublic($region)
    {
        $republic = 'республика';
        if (mb_strpos($region, $republic, null, 'UTF-8') !== false) {
            $trimLength = strlen($republic) + 1;
            $region = mb_strcut($region, $trimLength, strlen($region) - $trimLength, 'UTF-8') . ' ' . $republic;
        }
        return $region;
    }

    /**
     * Get allowed methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
}