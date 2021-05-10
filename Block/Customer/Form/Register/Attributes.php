<?php
/**
 * Copyright © 2019 Mvn. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Beeapps\AttributesManagement\Block\Customer\Form\Register;

/**
 * Class Attributes
 * @package Beeapps\AttributesManagement\Block\Customer\Form\Register
 */
class Attributes extends  \Beeapps\AttributesManagement\Block\Customer\Form\Attributes
{

    /**
     * @var string
     */
    protected $code = "customer_account_create";

    /**
     * Path to template file in theme.
     *
     * @var string
     */
    protected $_template = "Beeapps_AttributesManagement::customer/form/register/attributes.phtml";
}
