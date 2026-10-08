<?php

/**
 * KitchenStation - Abstract Creator (Factory Method Pattern)
 *
 * Defines the order workflow. Subclasses decide WHICH MenuItem gets created
 * by overriding the factory method createMenuItem().
 *
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

abstract class KitchenStation
{
    /**
     * THE FACTORY METHOD -- subclasses override this to return their product.
     */
    abstract protected function createMenuItem(): MenuItem;

    /**
     * Template workflow: create the item, collect info, pack, and return a receipt.
     *
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

    /**
     * Hook -- subclasses MAY override to customize packaging.
     */
    protected function packOrder(MenuItem $item, int $quantity): string
    {
        return 'Packed ' . $quantity . ' x ' . $item->getName() . ' in a paper bag';
    }
}
