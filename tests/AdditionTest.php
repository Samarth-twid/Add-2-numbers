<?php declare(strict_types=1);

use App\AdditionService;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    function testAdditionOf2Numbers(): void
    {
        require_once 'src/AdditionService.php';
        $adder = new AdditionService();
        $this->assertEquals(8,$adder->AddTwoNumbers(2,6));
    }
}