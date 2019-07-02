<?php

class Raywt_CanceledOrderEmail_Helper_Data
    extends Mage_Core_Helper_Abstract
{
    public function getEnabled()
    {
        return Mage::getStoreConfig('canceled_orders/settings/enabled');
    }
    
    public function getEmailTemplate()
    {
        return Mage::getStoreConfig('canceled_orders/settings/email_template');
    }
}