<?php
/**
 * Copyright © Mvn, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Beeapps\AttributesManagement\Controller\Adminhtml\Address;

/**
 * Class Attribute
 * @package Beeapps\AttributesManagement\Controller\Adminhtml\Customer
 */
abstract class Attribute extends \Beeapps\AttributesManagement\Controller\Adminhtml\AbstractAction
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Beeapps_AttributesManagement::address_attributes';

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
     * Attribute constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Beeapps\AttributesManagement\Helper\Data $helper
     * @param \Magento\Framework\Cache\FrontendInterface $attributeLabelCache
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Beeapps\AttributesManagement\Helper\Data $helper,
        \Magento\Framework\Cache\FrontendInterface $attributeLabelCache,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->attributeLabelCache = $attributeLabelCache;
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
            \Magento\Eav\Model\Entity::class
        )->setType(
            \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS
        )->getTypeId();
        return parent::dispatch($request);
    }
}
