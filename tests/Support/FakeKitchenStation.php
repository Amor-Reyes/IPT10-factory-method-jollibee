<?php

/**
 * FakeKitchenStation - Test double that extends KitchenStation
 *
 * Returns an injected MenuItem and counts how many times
 * createMenuItem() was called.
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders\Tests\Support;

use Ipt10\JollibeeOrders\KitchenStation;
use Ipt10\JollibeeOrders\MenuItem;

final class FakeKitchenStation extends KitchenStation
{
    private int $createCallCount = 0;

    public function __construct(
        private readonly MenuItem $menuItem,
    ) {
    }

    protected function createMenuItem(): MenuItem
    {
        $this->createCallCount++;
        return $this->menuItem;
    }

    public function getCreateCallCount(): int
    {
        return $this->createCallCount;
    }
}
