<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller\Adminhtml\Address;

use Beeapps\AttributesManagement\Controller\AbstractAction;
/**
 * Class Index
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Address
 */
class Index extends \Beeapps\AttributesManagement\Controller\AbstractAction
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->createPageResult();
        $resultPage->setActiveMenu('Beeapps_AttributesManagement::address_attributes');
        $resultPage->getConfig()->getTitle()->prepend(__('Customer Address Attributes'));
        $resultPage->addBreadcrumb(__('Customer Address Attributes'), __('Customer Address Attributes'));
        return $resultPage;
    }


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Beeapps_AttributesManagement::address_attributes');
    }
}