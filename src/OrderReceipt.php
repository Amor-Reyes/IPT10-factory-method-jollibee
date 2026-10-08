<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders;

final readonly class OrderReceipt
{
    /**
     * @param string[] $preparationSteps
     */
    public function __construct(
        public string $customerName,
        public string $itemName,
        public int $quantity,
        public int $unitPrice,
        public int $total,
        public array $preparationSteps,
        public string $packaging,
    ) {
    }

    public function format(): string
    {
        $lines = [];
        $lines[] = '================================';
        $lines[] = '       JOLLIBEE ORDER RECEIPT';
        $lines[] = '================================';
        $lines[] = 'Customer : ' . $this->customerName;
        $lines[] = 'Item     : ' . $this->itemName;
        $lines[] = 'Qty      : ' . $this->quantity;
        $lines[] = 'Unit Price: PHP ' . $this->unitPrice;
        $lines[] = 'Total    : PHP ' . $this->total;
        $lines[] = '--------------------------------';
        $lines[] = 'Preparation:';

        foreach ($this->preparationSteps as $i => $step) {
            $lines[] = '  ' . ($i + 1) . '. ' . $step;
        }

        $lines[] = '--------------------------------';
        $lines[] = 'Packaging: ' . $this->packaging;
        $lines[] = '================================';

        return implode("\n", $lines) . "\n";
    }
}
