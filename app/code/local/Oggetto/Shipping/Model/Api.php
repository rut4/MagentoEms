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
 * Ems API model
 *
 * @category   Oggetto
 * @package    Oggetto_Shipping
 * @subpackage Model
 * @author     Eduard Paliy <epaliy@oggettoweb.com>
 */
class Oggetto_Shipping_Model_Api
{
    private $_apiUrl;
    private $_httpClient;

    public function __construct()
    {
        $this->_apiUrl = 'http://emspost.ru/api/rest/';
    }

    /**
     * Get clean http client
     *
     * @return Zend_Http_Client
     */
    private function _getClient()
    {
        if (is_null($this->_httpClient)) {
            $this->_httpClient = new Varien_Http_Client($this->_apiUrl);
        }

        return $this->_httpClient->resetParameters(true);
    }

    /**
     * Make request to API with parameters and get result
     *
     * @param array $params Request parameters
     * @return mixed Request results
     */
    private function _makeRequest($params)
    {
        try {
            $client = $this->_getClient();

            $client->setParameterGet($params);

            $response = $client->request(Varien_Http_Client::GET);

            if ($response->getStatus() == 200) {
                $response = Mage::helper('core')->jsonDecode($response->getBody());
                if ($response['rsp']['stat'] == 'ok') {
                    return $response['rsp'];
                }
            }
        } catch (Exception $e) {
            Mage::logException($e);
        }
    }

    /**
     * Get EMS regions
     *
     * @return mixed Region list
     */
    public function getRegions() {
        $response = $this->_makeRequest([
                'method' => 'ems.get.locations',
                'type' => 'regions',
                'plain' => 'true'
            ]);
        return $response['locations'];
    }

    /**
     * Calculate and get price and time
     *
     * @param string $orig Original
     * @param string $dest Destination
     * @param int $weight Weight
     * @return mixed Price and time in days
     */
    public function calculatePriceAndTime($orig, $dest, $weight) {
        return $this->_makeRequest([
            'method' => 'ems.calculate',
            'from' => $orig,
            'to' => $dest,
            'weight' => $weight
        ]);
    }
}

