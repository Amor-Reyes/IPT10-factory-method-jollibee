<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Ipt10\JollibeeOrders\BurgerStation;
use Ipt10\JollibeeOrders\ChickenjoyStation;
use Ipt10\JollibeeOrders\KitchenStation;
use Ipt10\JollibeeOrders\PieStation;
use Ipt10\JollibeeOrders\SpaghettiStation;

/** @var KitchenStation[] $stations */
$stations = [
    'Chickenjoy Station'  => new ChickenjoyStation(pieces: 2),
    'Spaghetti Station'   => new SpaghettiStation(),
    'Burger Station'      => new BurgerStation(withCheese: true),
    'Pie Station'         => new PieStation(),
];

echo "============================================================\n";
echo "   JOLLIBEE FACTORY METHOD DEMO\n";
echo "============================================================\n\n";

foreach ($stations as $label => $station) {
    echo '--- ' . $label . ' ---' . "\n\n";

    $receipt = $station->serveOrder('Ana', 2);
    echo $receipt->format();
    echo "\n";
}

/*
 * GoF Factory Method -- Role Mapping
 * -----------------------------------
 * Product           => MenuItem          (interface)
 * ConcreteProduct   => Chickenjoy        (final class)
 * ConcreteProduct   => JollySpaghetti    (final class)
 * ConcreteProduct   => Yumburger         (final class)
 * ConcreteProduct   => PeachMangoPie     (final class)
 * Creator           => KitchenStation    (abstract class)
 * ConcreteCreator   => ChickenjoyStation (final class)
 * ConcreteCreator   => SpaghettiStation  (final class)
 * ConcreteCreator   => BurgerStation     (final class)
 * ConcreteCreator   => PieStation        (final class)
 */
