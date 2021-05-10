<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Beeapps\AttributesManagement\Block\Attributes;

/**
 * Class Multiselect
 * @package Beeapps\AttributesManagement\Block\Attributes
 */
class Multiselect extends AbstractElement
{

    /**
     * Path to template file in theme.
     *
     * @var string
     */
    protected $_template = "Beeapps_AttributesManagement::attributes/multiselect.phtml";

    /**
     * @return array
     */
    public function getAttributeValue(){
        return explode(",", parent::getAttributeValue());
    }
}
