# IPT10 - Factory Method Design Pattern (Jollibee Ordering System)

## Student Information

- **Name:** Ana Marietta Amor B. Reyes
- **Section:** BSIT 3-A
- **Subject:** IPT10 - Design Patterns in PHP

---

## What is the Factory Method Pattern?

The Factory Method is a creational design pattern that defines an interface or abstract method for creating an object, but allows subclasses to decide which class to instantiate. Instead of instantiating products directly using the `new` operator in the core business logic, the creator delegates object creation to specialized subclass methods. This promotes loose coupling by eliminating direct dependencies between the client code and concrete product classes. As a result, new product types can be introduced without breaking or modifying existing client and workflow code.

---

## The Jollibee Analogy

In a fast-food restaurant like Jollibee, the cashier at the counter handles customer orders following a standardized workflow: take the order quantity, wait for the food to be prepared, package it, and issue a receipt. The cashier does not need to know the specific cooking steps or ingredients required for each food item. Instead, dedicated kitchen stations (Chickenjoy Station, Spaghetti Station, Burger Station, Pie Station) handle the creation of their respective items. Each station knows how to produce its specific food item while adhering to the common kitchen ordering workflow.

---

## Gang of Four (GoF) Role Mapping

| GoF Role | Class / Interface | Description |
|---|---|---|
| **Product** | [`src/MenuItem.php`](src/MenuItem.php) | Interface defining common operations (`getName()`, `getPrice()`, `getPreparationSteps()`) |
| **ConcreteProduct** | [`src/Chickenjoy.php`](src/Chickenjoy.php) | Concrete implementation representing Fried Chicken with gravy options |
| **ConcreteProduct** | [`src/JollySpaghetti.php`](src/JollySpaghetti.php) | Concrete implementation representing Sweet-style Spaghetti |
| **ConcreteProduct** | [`src/Yumburger.php`](src/Yumburger.php) | Concrete implementation representing Beef patty burger with cheese options |
| **ConcreteProduct** | [`src/PeachMangoPie.php`](src/PeachMangoPie.php) | Concrete implementation representing Peach Mango Pie (added to prove extensibility) |
| **Creator** | [`src/KitchenStation.php`](src/KitchenStation.php) | Abstract base class defining `serveOrder()` workflow and abstract `createMenuItem()` |
| **ConcreteCreator** | [`src/ChickenjoyStation.php`](src/ChickenjoyStation.php) | Subclass creating `Chickenjoy` instances |
| **ConcreteCreator** | [`src/SpaghettiStation.php`](src/SpaghettiStation.php) | Subclass creating `JollySpaghetti` instances |
| **ConcreteCreator** | [`src/BurgerStation.php`](src/BurgerStation.php) | Subclass creating `Yumburger` instances |
| **ConcreteCreator** | [`src/PieStation.php`](src/PieStation.php) | Subclass creating `PeachMangoPie` instances (also overrides `packOrder()`) |
| **Value Object** | [`src/OrderReceipt.php`](src/OrderReceipt.php) | Immutable value object formatted for receipt printing |

---

## Factory Method vs Simple Factory

- **Simple Factory:** Uses a single concrete class with a static method or conditional statements (`switch` / `match`) to instantiate and return different products based on an input parameter. It violates the Open/Closed Principle because adding a new product requires modifying the factory class itself.
- **Factory Method:** Relies on inheritance and polymorphism. The base Creator defines an abstract factory method, and each concrete product has its own subclass Creator. Adding a new product requires creating a new subclass without modifying any existing Creator or client code, fully adhering to the Open/Closed Principle.

---

## Advantages and Disadvantages

### Advantages
- **Single Responsibility Principle (SRP):** Product creation code is isolated in specific creator subclasses, separating creation concerns from business logic.
- **Open/Closed Principle (OCP):** New products and creators can be added without modifying existing code (e.g., adding `PeachMangoPie` and `PieStation` required zero edits to `KitchenStation`).
- **Loose Coupling:** The order workflow in `KitchenStation` and the client code depend only on the `MenuItem` interface and abstract `KitchenStation`, never on concrete product classes.

### Disadvantages
- **Class Proliferation:** Every new product requires both a new ConcreteProduct class and a new ConcreteCreator class, leading to a larger codebase.
- **Inheritance Reliance:** Subclassing is required to customize object creation, which can add complexity if a deep class hierarchy already exists.

---

## Installation and Execution (Windows)

### 1. Install Dependencies
```cmd
composer install
```

### 2. Run the Demo
```cmd
php examples/demo.php
```

### 3. Run Unit Tests (PHPUnit 11)
```cmd
composer test
```
Or directly:
```cmd
vendor\bin\phpunit
```

### 4. Run Code Style Check (PSR-12 via PHPCS)
```cmd
composer cs
```
Or directly:
```cmd
vendor\bin\phpcs
```

---

## Verification

Check PHP syntax across all project files:
```cmd
php -l src/MenuItem.php
php -l src/Chickenjoy.php
php -l src/JollySpaghetti.php
php -l src/Yumburger.php
php -l src/PeachMangoPie.php
php -l src/OrderReceipt.php
php -l src/KitchenStation.php
php -l src/ChickenjoyStation.php
php -l src/SpaghettiStation.php
php -l src/BurgerStation.php
php -l src/PieStation.php
php -l examples/demo.php
php -l tests/KitchenStationTest.php
php -l tests/Support/FakeMenuItem.php
php -l tests/Support/FakeKitchenStation.php
```

Or check all files in one command:
```powershell
Get-ChildItem -Path src, examples, tests -Filter *.php -Recurse | ForEach-Object { php -l $_.FullName }
```

---

## Sample Demo Output

```
============================================================
   JOLLIBEE FACTORY METHOD DEMO
============================================================

--- Chickenjoy Station ---

================================
       JOLLIBEE ORDER RECEIPT
================================
Customer : Ana
Item     : 2pc Chickenjoy with Gravy
Qty      : 2
Unit Price: PHP 178
Total    : PHP 356
--------------------------------
Preparation:
  1. Retrieve marinated chicken from the chiller
  2. Deep-fry chicken at 170C for 12 minutes until golden
  3. Drain excess oil on a wire rack
  4. Ladle warm gravy into a side cup
--------------------------------
Packaging: Packed 2 x 2pc Chickenjoy with Gravy in a paper bag
================================

--- Spaghetti Station ---

================================
       JOLLIBEE ORDER RECEIPT
================================
Customer : Ana
Item     : Jolly Spaghetti with Hotdog
Qty      : 2
Unit Price: PHP 55
Total    : PHP 110
--------------------------------
Preparation:
  1. Boil spaghetti noodles until al dente
  2. Heat the signature sweet-style sauce
  3. Plate noodles and pour sauce on top
  4. Slice and arrange hotdog pieces on top
--------------------------------
Packaging: Packed 2 x Jolly Spaghetti with Hotdog in a paper bag
================================

--- Burger Station ---

================================
       JOLLIBEE ORDER RECEIPT
================================
Customer : Ana
Item     : Cheesy Yumburger
Qty      : 2
Unit Price: PHP 50
Total    : PHP 100
--------------------------------
Preparation:
  1. Grill the seasoned beef patty on the flat-top
  2. Toast the burger bun lightly on the grill
  3. Assemble patty, mayo, and ketchup in the bun
  4. Place a slice of melted cheese on the patty
--------------------------------
Packaging: Packed 2 x Cheesy Yumburger in a paper bag
================================

--- Pie Station ---

================================
       JOLLIBEE ORDER RECEIPT
================================
Customer : Ana
Item     : Peach Mango Pie
Qty      : 2
Unit Price: PHP 39
Total    : PHP 78
--------------------------------
Preparation:
  1. Fill pastry shell with peach-mango filling
  2. Seal and crimp the edges of the pie
  3. Deep-fry until the crust is golden and flaky
--------------------------------
Packaging: Packed 2 x Peach Mango Pie in a paper sleeve
================================
```
