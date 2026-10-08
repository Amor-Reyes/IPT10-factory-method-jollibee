<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class Chickenjoy implements MenuItem
{
    public function __construct(
        private readonly int $pieces = 1,
        private readonly bool $withGravy = true,
    ) {
    }

    public function getName(): string
    {
        $gravy = $this->withGravy ? ' with Gravy' : '';
        return $this->pieces . 'pc Chickenjoy' . $gravy;
    }

    public function getPrice(): int
    {
        return $this->pieces * 89;
    }

    /** @return string[] */
    public function getPreparationSteps(): array
    {
        $steps = [
            'Retrieve marinated chicken from the chiller',
            'Deep-fry chicken at 170C for 12 minutes until golden',
            'Drain excess oil on a wire rack',
        ];

        if ($this->withGravy) {
            $steps[] = 'Ladle warm gravy into a side cup';
        }

        return $steps;
    }
}
