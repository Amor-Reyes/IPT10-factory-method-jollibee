<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

abstract class KitchenStation
{
    abstract protected function createMenuItem(): MenuItem;

    /**
     * @throws \InvalidArgumentException if quantity is less than 1
     */
    public function serveOrder(string $customerName, int $quantity): OrderReceipt
    {
        if ($quantity < 1) {
            throw new \InvalidArgumentException(
                'Quantity must be at least 1, got ' . $quantity
            );
        }

        $item = $this->createMenuItem();

        $preparationSteps = $item->getPreparationSteps();
        $packaging        = $this->packOrder($item, $quantity);
        $unitPrice        = $item->getPrice();
        $total            = $unitPrice * $quantity;

        return new OrderReceipt(
            customerName: $customerName,
            itemName: $item->getName(),
            quantity: $quantity,
            unitPrice: $unitPrice,
            total: $total,
            preparationSteps: $preparationSteps,
            packaging: $packaging,
        );
    }

    protected function packOrder(MenuItem $item, int $quantity): string
    {
        return 'Packed ' . $quantity . ' x ' . $item->getName() . ' in a paper bag';
    }
}
