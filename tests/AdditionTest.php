<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once 'src/AdditionService.php';

class AdditionTest extends TestCase {
    
    function testAdditionOf2PositiveNumbers(): void {
        $adder = new AdditionService();
        $this->assertEquals(8,$adder->AddTwoNumbers(2,6));
    }

    function testAdditionOf2NegativeNumbers(): void {
        $adder = new AdditionService();
        $this->assertEquals(-9,$adder->AddTwoNumbers(-8,-1));
    }

    function testAdditionOf2Numbers(): void {
        $adder = new AdditionService();
        $this->assertEquals(-4,$adder->AddTwoNumbers(-7,3));
    }

    function testAdditionOfFloat(): void {
        $adder = new AdditionService();
        $this->assertEquals(-4.5,$adder->AddTwoNumbers(-7.2,2.7));
    }

    function testExceptionOfNonNumericType(): void {
        $adder = new AdditionService();
        $this->expectException(InvalidArgumentException::class);
        $adder->addTwoNumbers('a', "_");
    }
}