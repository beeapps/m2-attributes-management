<?php
/**
 * Attribute add/edit form options tab
 *
 */

namespace Beeapps\AttributesManagement\Block\Adminhtml\Attribute\Edit\Options;

use Magento\Store\Model\ResourceModel\Store\Collection;

class Options extends \Magento\Eav\Block\Adminhtml\Attribute\Edit\Options\Options
{
    /**
     * @var string
     */
    protected $_template = 'Beeapps_AttributesManagement::customer/attribute/options.phtml';
}
