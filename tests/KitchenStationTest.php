<?php

/**
 * Name:    Ana Marietta Amor B. Reyes
 * Section: BSIT 3-A
 * Subject: IPT10 - Design Patterns in PHP
 */

declare(strict_types=1);

namespace Ipt10\JollibeeOrders\Tests;

use Ipt10\JollibeeOrders\BurgerStation;
use Ipt10\JollibeeOrders\ChickenjoyStation;
use Ipt10\JollibeeOrders\KitchenStation;
use Ipt10\JollibeeOrders\PieStation;
use Ipt10\JollibeeOrders\SpaghettiStation;
use Ipt10\JollibeeOrders\Tests\Support\FakeKitchenStation;
use Ipt10\JollibeeOrders\Tests\Support\FakeMenuItem;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class KitchenStationTest extends TestCase
{
    public function testServeOrderUsesProductFromFactoryMethod(): void
    {
        $fake    = new FakeMenuItem('Test Burger', 75);
        $station = new FakeKitchenStation($fake);

        $receipt = $station->serveOrder('Maria', 3);

        $this->assertSame('Test Burger', $receipt->itemName);
        $this->assertSame(75, $receipt->unitPrice);
    }

    public function testTotalEqualsPriceTimesQuantity(): void
    {
        $fake    = new FakeMenuItem('Test Item', 120);
        $station = new FakeKitchenStation($fake);

        $receipt = $station->serveOrder('Pedro', 5);

        $this->assertSame(600, $receipt->total);
        $this->assertSame(120 * 5, $receipt->total);
    }

    public function testCreateMenuItemCalledExactlyOnce(): void
    {
        $fake    = new FakeMenuItem();
        $station = new FakeKitchenStation($fake);

        $station->serveOrder('Ana', 4);

        $this->assertSame(1, $station->getCreateCallCount());
    }

    public function testQuantityBelowOneThrowsException(): void
    {
        $fake    = new FakeMenuItem();
        $station = new FakeKitchenStation($fake);

        $this->expectException(\InvalidArgumentException::class);
        $station->serveOrder('Ana', 0);
    }

    /**
     * @return array<string, array{KitchenStation, string}>
     */
    public static function realStationProvider(): array
    {
        return [
            'ChickenjoyStation' => [new ChickenjoyStation(), '1pc Chickenjoy with Gravy'],
            'SpaghettiStation'  => [new SpaghettiStation(), 'Jolly Spaghetti with Hotdog'],
            'BurgerStation'     => [new BurgerStation(), 'Yumburger'],
            'PieStation'        => [new PieStation(), 'Peach Mango Pie'],
        ];
    }

    #[DataProvider('realStationProvider')]
    public function testAllRealStationsReturnExpectedItemName(
        KitchenStation $station,
        string $expectedName,
    ): void {
        $receipt = $station->serveOrder('Test Customer', 1);

        $this->assertSame($expectedName, $receipt->itemName);
    }

    public function testPieStationUsesOverriddenPackOrder(): void
    {
        $pieStation = new PieStation();
        $receipt    = $pieStation->serveOrder('Ana', 1);

        $this->assertStringContainsString('paper sleeve', $receipt->packaging);
        $this->assertStringNotContainsString('paper bag', $receipt->packaging);
    }

    public function testPieStationExtendsKitchenStation(): void
    {
        $pieStation = new PieStation();

        $this->assertInstanceOf(KitchenStation::class, $pieStation);
    }

    public function testKitchenStationSourceContainsNoConcreteProductNew(): void
    {
        $source = (string) file_get_contents(
            __DIR__ . '/../src/KitchenStation.php'
        );

        $this->assertStringNotContainsString('new Chickenjoy', $source);
        $this->assertStringNotContainsString('new JollySpaghetti', $source);
        $this->assertStringNotContainsString('new Yumburger', $source);
        $this->assertStringNotContainsString('new PeachMangoPie', $source);
    }
}
