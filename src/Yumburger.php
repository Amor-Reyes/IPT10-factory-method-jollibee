<?php

/**
 * Yumburger - Concrete Product (Factory Method Pattern)
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class Yumburger implements MenuItem
{
    public function __construct(
        private readonly bool $withCheese = false,
    ) {
    }

    public function getName(): string
    {
        $cheese = $this->withCheese ? 'Cheesy ' : '';
        return $cheese . 'Yumburger';
    }

    public function getPrice(): int
    {
        return $this->withCheese ? 50 : 38;
    }

    /** @return string[] */
    public function getPreparationSteps(): array
    {
        $steps = [
            'Grill the seasoned beef patty on the flat-top',
            'Toast the burger bun lightly on the grill',
            'Assemble patty, mayo, and ketchup in the bun',
        ];

        if ($this->withCheese) {
            $steps[] = 'Place a slice of melted cheese on the patty';
        }

        return $steps;
    }
}
