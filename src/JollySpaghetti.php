<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final class JollySpaghetti implements MenuItem
{
    public function __construct(
        private readonly bool $withHotdog = true,
    ) {
    }

    public function getName(): string
    {
        $hotdog = $this->withHotdog ? ' with Hotdog' : '';
        return 'Jolly Spaghetti' . $hotdog;
    }

    public function getPrice(): int
    {
        return 55;
    }

    /** @return string[] */
    public function getPreparationSteps(): array
    {
        $steps = [
            'Boil spaghetti noodles until al dente',
            'Heat the signature sweet-style sauce',
            'Plate noodles and pour sauce on top',
        ];

        if ($this->withHotdog) {
            $steps[] = 'Slice and arrange hotdog pieces on top';
        }

        return $steps;
    }
}
