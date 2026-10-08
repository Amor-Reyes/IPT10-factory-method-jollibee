<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class ChickenjoyStation extends KitchenStation
{
    public function __construct(
        private readonly int $pieces = 1,
        private readonly bool $withGravy = true,
    ) {
    }

    protected function createMenuItem(): MenuItem
    {
        return new Chickenjoy(
            pieces: $this->pieces,
            withGravy: $this->withGravy,
        );
    }
}
