<?php

/**
 * MenuItem - Product Interface (Factory Method Pattern)
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

interface MenuItem
{
    public function getName(): string;

    public function getPrice(): int;

    /** @return string[] */
    public function getPreparationSteps(): array;
}
