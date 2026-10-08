<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class SpaghettiStation extends KitchenStation
{
    public function __construct(
        private readonly bool $withHotdog = true,
    ) {
    }

    protected function createMenuItem(): MenuItem
    {
        return new JollySpaghetti(
            withHotdog: $this->withHotdog,
        );
    }
}
