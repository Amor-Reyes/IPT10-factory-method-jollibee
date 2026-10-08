<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class PeachMangoPie implements MenuItem
{
    public function __construct()
    {
    }

    public function getName(): string
    {
        return 'Peach Mango Pie';
    }

    public function getPrice(): int
    {
        return 39;
    }

    /** @return string[] */
    public function getPreparationSteps(): array
    {
        return [
            'Fill pastry shell with peach-mango filling',
            'Seal and crimp the edges of the pie',
            'Deep-fry until the crust is golden and flaky',
        ];
    }
}
