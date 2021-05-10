<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller\Adminhtml\Customer;

/**
 * Class Edit
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Customer
 */
class Edit extends \Beeapps\AttributesManagement\Controller\Adminhtml\Customer\Attribute
{
    /**
     * @return \Magento\Framework\Controller\ResultInterface
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('attribute_id');
        $model = $this->_objectManager->create(
            \Magento\Customer\Model\Attribute::class
        );
        if ($id) {
            $model->load($id);

            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This attribute no longer exists.'));
                $resultRedirect = $this->createRedirectResult();
                return $resultRedirect->setPath('bam/*/');
            }

            // entity type check
            if ($model->getEntityTypeId() != $this->_entityTypeId) {
                $this->messageManager->addErrorMessage(__('This attribute cannot be edited.'));
                $resultRedirect = $this->createRedirectResult();
                return $resultRedirect->setPath('bam/*/');
            }
        }
        $data = $this->_session->getAttributeData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $attributeData = $this->getRequest()->getParam('attribute');
        if (!empty($attributeData) && $id === null) {
            $model->addData($attributeData);
        }

        $this->coreRegistry->register('entity_attribute', $model);

        $title = $id ? __('Edit Customer Attribute "%1"', $model->getAttributeCode()) : __('New Customer Attribute');
        $resultPage = $this->createPageResult();
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE);
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
