<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\isNan;

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

    function testAdditionToInfValue(): void {
        $adder = new AdditionService();
        $this->assertEquals(INF,$adder->addTwoNumbers(INF,3));
        $this->assertEquals(-INF,$adder->addTwoNumbers(-INF,4));
        $this->assertTrue(is_nan($adder->addTwoNumbers(INF,-INF)));
    }

    function testAdditionOfNAN(): void {
        $adder = new AdditionService();
        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,3)));
        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,INF)));
        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,NAN)));
    }
}