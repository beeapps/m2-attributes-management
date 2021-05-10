<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller\Adminhtml\Customer;

/**
 * Class Index
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Customer
 */
class Index extends \Beeapps\AttributesManagement\Controller\Adminhtml\AbstractAction
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->createPageResult();
        $resultPage->setActiveMenu('Beeapps_AttributesManagement::customer_attributes2');
        $resultPage->getConfig()->getTitle()->prepend(__('Customer Attributes'));
        $resultPage->addBreadcrumb(__('Customer Attributes'), __('Customer Attributes'));
        return $resultPage;
    }


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Beeapps_AttributesManagement::customer_attributes');
    }
}