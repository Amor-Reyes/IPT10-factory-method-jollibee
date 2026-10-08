<?php

/**
 * PieStation - Concrete Creator (Factory Method Pattern)
 *
 * Overrides packOrder() to demonstrate the hook mechanism.
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class PieStation extends KitchenStation
{
    public function __construct()
    {
    }

    protected function createMenuItem(): MenuItem
    {
        return new PeachMangoPie();
    }

    protected function packOrder(MenuItem $item, int $quantity): string
    {
        return 'Packed ' . $quantity . ' x ' . $item->getName() . ' in a paper sleeve';
    }
}
