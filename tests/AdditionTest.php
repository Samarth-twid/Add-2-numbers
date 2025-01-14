<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/AdditionService.php';

class AdditionTest extends TestCase {
    
    function testAdditionOf2PositiveNumbers() {
        $adder = new AdditionService();
        $this->assertEquals(8,$adder->AddTwoNumbers(2,6));
    }

    function testAdditionOf2NegativeNumbers() {
        $adder = new AdditionService();
        $this->assertEquals(-9,$adder->AddTwoNumbers(-8,-1));
    }

    function testAdditionOf2Numbers() {
        $adder = new AdditionService();
        $this->assertEquals(-4,$adder->AddTwoNumbers(-7,3));
    }

    function testAdditionOfFloat() {
        $adder = new AdditionService();
        $this->assertEquals(-4.5,$adder->AddTwoNumbers(-7.2,2.7));
    }

    function testExceptionOfNonNumericType() {
        $adder = new AdditionService();
        $this->expectException(InvalidArgumentException::class);
        $adder->addTwoNumbers('a', "_");
    }

    function testAdditionToInfValue() {
        $adder = new AdditionService();

        $this->assertEquals(INF,$adder->addTwoNumbers(INF,3),"Addition of any number to INF will result in INF");

        $this->assertEquals(-INF,$adder->addTwoNumbers(-INF,4),"Addition of any number to -INF will result in -INF");

        $this->assertTrue(is_nan($adder->addTwoNumbers(INF,-INF)),"Addition of INF and -INF will result in NAN");
    }

    function testAdditionOfNAN() {
        $adder = new AdditionService();

        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,3)),"Addition of NAN to any numeric type will result in NAN");

        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,INF)));

        $this->assertTrue(is_nan($adder->addTwoNumbers(NAN,NAN)));
    }

    function testAdditionOverflowAndUnderflow() {
        $adder = new AdditionService();
        
        $this->assertIsFloat($adder->addTwoNumbers(PHP_INT_MAX, PHP_INT_MAX), "Overflow from integer should result in float.");

        $this->assertTrue(is_infinite($adder->addTwoNumbers(PHP_FLOAT_MAX, PHP_FLOAT_MAX)), "Overflow should result in INF for floats.");

    
        $this->assertIsFloat($adder->addTwoNumbers(-PHP_INT_MAX, -PHP_INT_MAX), "Underflow from integer should result in float.");

        $this->assertTrue(is_infinite($adder->addTwoNumbers(-PHP_FLOAT_MAX, -PHP_FLOAT_MAX)), "Underflow should result in -INF for floats.");
    

        $this->assertSame(0.0, $adder->addTwoNumbers(PHP_FLOAT_MIN, -PHP_FLOAT_MIN), "Addition of very small floats should result in zero.");
    
    }
}