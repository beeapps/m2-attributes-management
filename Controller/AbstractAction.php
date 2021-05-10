<?php

/**
 * Copyright © 2019 MVN. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Beeapps\AttributesManagement\Controller;

/**
 * Class AbstractAction
 * @package Beeapps\AttributesManagement\Controller
 */
abstract class AbstractAction extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\ResultFactory
     */
    protected $resultFactory;

    /**
     * @var \Beeapps\AttributesManagement\Helper\Data
     */
    protected $helper;

    /**
     * AbstractAction constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Beeapps\AttributesManagement\Helper\Data $helper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Beeapps\AttributesManagement\Helper\Data $helper
    ){
        parent::__construct($context);
        $this->helper = $helper;
        $this->resultFactory = $context->getResultFactory();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createJsonResult($data){
        $resultJson = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON);
        return $resultJson->setData($data);
    }

    /**
     * @return mixed
     */
    public function createPageResult(){
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $resultPage;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function createRedirectResult(){
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        return $resultRedirect;
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function createForwardResult(){
        $resultForward = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_FORWARD);
        return $resultForward;
    }
}
