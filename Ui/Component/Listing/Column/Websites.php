<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Beeapps\AttributesManagement\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Beeapps\AttributesManagement\Model\WebsiteNameResolverInterface;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Add grid column for sales channels. Prepare data
 */
class Websites extends Column
{
    /**
     * @var WebsiteNameResolverInterface
     */
    private $websiteNameResolver;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param WebsiteNameResolverInterface $websiteNameResolver
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        WebsiteNameResolverInterface $websiteNameResolver,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->websiteNameResolver = $websiteNameResolver;
    }

    /**
     * Prepare data source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['totalRecords'])
            && $dataSource['data']['totalRecords'] > 0
        ) {
            foreach ($dataSource['data']['items'] as &$row) {
                $row['websites'] = isset($row['websites'])
                    ? $this->prepareWebsiteData($row['websites']) : [];
            }
        }
        unset($row);

        return $dataSource;
    }

    /**
     * Prepare sales value
     *
     * @param array $websiteData
     * @return array
     */
    private function prepareWebsiteData(array $websiteData): array
    {
        $preparedWebsiteData = [];
        foreach ($websiteData as $type => $website) {
            foreach ($website as $code) {
                $preparedWebsiteData[$type][] = [
                    'name' => $this->websiteNameResolver->resolve($type, $code),
                    'code' => $code,
                ];
            }
        }
        return $preparedWebsiteData;
    }
}
