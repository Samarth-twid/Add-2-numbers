<?php

use function PHPUnit\Framework\isNan;

class AdditionService {
    public function AddTwoNumbers( $num1,$num2) {
      if (!is_numeric($num1)||!is_numeric($num2)) {
        throw new InvalidArgumentException("The inputs should be a number");
      }
      return $num1+$num2;
    }
  }
?>