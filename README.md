# beeapps/m2-attributes-management

## Thanks to
- Daniel Truong - https://github.com/danielmagestore/magento2-customer-attributes
- Clarion - https://marketplace.magento.com/clarion-customer-attribute.html

## Free Magento 2 Customer and Addresses Attributes Management
It's a merge from both projects above and it's still in development for full merged features.
- This is a free module to manage customer and address attribute for Magento 2. 
- Some simple attribute types are supported such as: Text, Text Area, Date, Yes/No, Multiple Select, Dropdown.

Last Tested on: Magento 2.4.2, PHP 7.1

## Installation
- First add this git repository as a new composer repository in your composer.json
```
bin/composer config repositories.beeapps-atrbmngmt git https://github.com/beeapps/m2-attributes-management.git
```

- Run the upgrade command line:
```bash
bin/composer require beeapps/attributesmanagement:"dev-master"
bin/magento module:enable Beeapps_AttributesManagement
bin/magento setup:upgrade
bin/magento setup:di:compile
```