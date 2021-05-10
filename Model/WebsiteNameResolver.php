<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Beeapps\AttributesManagement\Model;

use Magento\Store\Model\ScopeInterface;
use Magento\Store\Api\WebsiteRepositoryInterface;
use Beeapps\AttributesManagement\Model\WebsiteNameResolverInterface;

/**
 * {@inheritdoc}
 *
 * In default implementation works only with website
 */
class WebsiteNameResolver implements WebsiteNameResolverInterface
{
    /**
     * @var WebsiteRepositoryInterface
     */
    private $websiteRepository;

    /**
     * @param WebsiteRepositoryInterface $websiteRepository
     */
    public function __construct(
        WebsiteRepositoryInterface $websiteRepository
    ) {
        $this->websiteRepository = $websiteRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(string $type, string $code): string
    {
        return ScopeInterface::SCOPE_WEBSITE === $type ? $this->websiteRepository->get($code)->getName() : $code;
    }
}
