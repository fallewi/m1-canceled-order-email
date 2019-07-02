<?php

class Raywt_CanceledOrderEmail_Model_Observer extends Mage_Core_Model_Email_Template
{
    public function sendEmail(Varien_Event_Observer $observer)
    {
        if(Mage::helper('raywt_canceledorderemail')->getEnabled() == 'yes') {
            try {
                $order = $observer->getOrder();
                if ($order->getId()) {
                    try {
                        $template = Mage::helper('raywt_canceledorderemail')->getEmailTemplate();

                        $sender = array(
                            'name' => Mage::getStoreConfig('trans_email/ident_support/name', Mage::app()->getStore()->getId()),
                            'email' => Mage::getStoreConfig('trans_email/ident_support/email', Mage::app()->getStore()->getId())
                        );

                        $customerName = $order->getShippingAddress()->getFirstname() . " " . $order->getShippingAddress()->getLastname();
                        $customerEmail = $order->getPayment()->getOrder()->getCustomerEmail();

                        $vars = array('order' => $order);

                        $storeId = Mage::app()->getStore()->getId();

                        Mage::getModel('core/email_template')
                            ->sendTransactional($template, $sender, $customerEmail, $customerName, $vars, $storeId);

                    } catch (Exception $e) {
                        Mage::log($e->getMessage());
                    }
                }
            } catch (Exception $e) {
                Mage::log('failed to get order to cancel');
            }
        }
    }
}
