<?php

class Raywt_CanceledOrderEmail_Model_System_Config_Source_Settings_Enabled
{

    public function toOptionArray()
    {
        return array(
            array('value' => 'no', 'label' => 'No'),
            array('value' => 'yes', 'label' => 'Yes')
        );
    }
}
