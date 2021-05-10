<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller\Adminhtml\Customer;

/**
 * Class NewAction
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Customer
 */
class NewAction extends \Beeapps\AttributesManagement\Controller\Adminhtml\Customer\Attribute
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->createForwardResult()->forward('edit');
    }
}
