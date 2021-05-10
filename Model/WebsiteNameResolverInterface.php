<?php
/**
 * Copyright © Beeaaps, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Beeapps\AttributesManagement\Model;

/**
 * Resolve sales channel name by type and code
 */
interface WebsiteNameResolverInterface
{
    /**
     * Resolve websites name by type and code
     *
     * @param string $type
     * @param string $code
     * @return string
     */
    public function resolve(string $type, string $code): string;
}
