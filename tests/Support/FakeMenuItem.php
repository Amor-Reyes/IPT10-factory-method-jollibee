<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders\Tests\Support;

use Ipt10\JollibeeOrders\MenuItem;

final class FakeMenuItem implements MenuItem
{
    public function __construct(
        private readonly string $name = 'Fake Item',
        private readonly int $price = 100,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    /** @return string[] */
    public function getPreparationSteps(): array
    {
        return ['Step A', 'Step B'];
    }
}
