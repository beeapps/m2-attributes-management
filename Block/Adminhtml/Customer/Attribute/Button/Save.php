<?php
/**
 * Copyright © Mvn, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Block\Adminhtml\Customer\Attribute\Button;

/**
 * Class Save
 * @package Beeapps\AttributesManagement\Block\Adminhtml\Customer\Attribute\Button
 */
class Save extends Generic
{
    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Attribute'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ]
        ];
    }
}
