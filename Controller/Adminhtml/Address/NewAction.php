<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller\Adminhtml\Address;

/**
 * Class NewAction
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Address
 */
class NewAction extends \Beeapps\AttributesManagement\Controller\Adminhtml\Address\Attribute
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->createForwardResult()->forward('edit');
    }
}
