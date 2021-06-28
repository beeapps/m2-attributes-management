<?php
/**
 * Customer attribute controller
 * Copyright © Mvn, Inc. All rights reserved.
 * See COPYING.txt for license details. */

namespace Beeapps\AttributesManagement\Controller\Adminhtml\Customer;

use Magento\Framework\Controller\Result;
use Magento\Framework\View\Result\PageFactory;
use Beeapps\AttributesManagement\Controller\AbstractAction;
/**
 * Class Attribute
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Customer
 */
abstract class Attribute extends \Beeapps\AttributesManagement\Controller\AbstractAction /*Magento\Backend\App\Action*/
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Beeapps_AttributesManagement::customer_attributes';
    /**
     * @var \Magento\Framework\Cache\FrontendInterface
     */
    protected $attributeLabelCache;
       /**
        * @var string
        */
    protected $_entityTypeId;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Beeapps\AttributesManagement\Helper\Data $helper
     * @param \Magento\Framework\Cache\FrontendInterface $attributeLabelCache
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Beeapps\AttributesManagement\Helper\Data $helper,
        \Magento\Framework\Cache\FrontendInterface $attributeLabelCache,
        \Magento\Framework\Registry $coreRegistry,
        PageFactory $resultPageFactory = null
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->attributeLabelCache = $attributeLabelCache;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $helper);
    }

    /**
     * Dispatch request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $this->_entityTypeId = $this->_objectManager->create(
            'Magento\Eav\Model\Entity'
        )->setType(
            \Magento\Customer\Model\Customer::ENTITY
            /*\Magento\Customer\Api\CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER*/
        )->getTypeId();
        return parent::dispatch($request);
    }

    /**
     * Generate code from label
     *
     * @param string $label
     * @return string
     */
    protected function generateCode($label)
    {
        $code = substr(
            preg_replace(
                '/[^a-z_0-9]/',
                '_',
                $this->_objectManager->create('Magento\Catalog\Model\Product\Url')->formatUrlKey($label)
            ),
            0,
            30
        );
        $validatorAttrCode = new \Zend_Validate_Regex(['pattern' => '/^[a-z][a-z_0-9]{0,29}[a-z0-9]$/']);
        if (!$validatorAttrCode->isValid($code)) {
            $code = 'attr_' . ($code ?: substr(md5(time()), 0, 8));
        }
        return $code;
    }
}
