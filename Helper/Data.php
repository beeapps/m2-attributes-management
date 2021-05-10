<?php
/**
 * Customer attribute data helper
 */

namespace Beeapps\AttributesManagement\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Config\Model\ResourceModel\Config
     */
    protected $configResource;

    /**
     * @var \Magento\Framework\App\Config\ReinitableConfigInterface
     */
    protected $reinitableConfig;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Config\Model\ResourceModel\Config $configResource
     * @param \Magento\Framework\App\Config\ReinitableConfigInterface $reinitableConfig
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Config\Model\ResourceModel\Config $configResource,
        \Magento\Framework\App\Config\ReinitableConfigInterface $reinitableConfig
    ) {
        parent::__construct($context);
        $this->configResource = $configResource;
        $this->reinitableConfig = $reinitableConfig;
    }

    /**
     * @param $path
     * @param string $scope
     * @return mixed
     */
    public function getStoreConfig($path, $scope = \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT){
        return $this->scopeConfig->getValue($path, $scope);
    }

    /**
     * @param $path
     * @param $value
     * @param string $scope
     * @return $this
     */
    public function saveConfig($path, $value, $scope = \Magento\Framework\App\Config\ScopeConfigInterface::SCOPE_TYPE_DEFAULT){
        $this->configResource->saveConfig(
            $path,
            $value,
            $scope,
            0
        );
        return $this;
    }

    /**
     * Return information array of customer attribute input types
     *
     * @param string $inputType
     * @return array
     */
    public function getAttributeInputTypes($inputType = null)
    {
        $inputTypes = [
            'multiselect' => ['backend_model' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                               'source_model' => 'Magento\Eav\Model\Entity\Attribute\Source\Table'],
            'boolean' => ['source_model' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean'],
        ];

        if ($inputType === null) {
            return $inputTypes;
        } else {
            if (isset($inputTypes[$inputType])) {
                return $inputTypes[$inputType];
            }
        }
        return [];
    }
    
    /**
     * Return default attribute backend model by input type
     *
     * @param string $inputType
     * @return string|null
     */
    public function getAttributeBackendModelByInputType($inputType)
    {
        $inputTypes = $this->getAttributeInputTypes();
        
        if (!empty($inputTypes[$inputType]['backend_model'])) {
            return $inputTypes[$inputType]['backend_model'];
        }
        return null;
    }
    
    /**
     * Return default attribute source model by input type
     *
     * @param string $inputType
     * @return string|null
     */
    public function getAttributeSourceModelByInputType($inputType)
    {
        $inputTypes = $this->getAttributeInputTypes();
        if (!empty($inputTypes[$inputType]['source_model'])) {
            return $inputTypes[$inputType]['source_model'];
        }
        return null;
    }

    /**
     * @return $this
     */
    public function reinitConfig(){
        $this->reinitableConfig->reinit();
        return $this;
    }
}
