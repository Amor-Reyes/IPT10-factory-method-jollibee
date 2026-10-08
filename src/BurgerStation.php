<?php

/**
 * BurgerStation - Concrete Creator (Factory Method Pattern)
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class BurgerStation extends KitchenStation
{
    public function __construct(
        private readonly bool $withCheese = false,
    ) {
    }

    protected function createMenuItem(): MenuItem
    {
        return new Yumburger(
            withCheese: $this->withCheese,
        );
    }
}
