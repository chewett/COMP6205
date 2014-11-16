<?php
require_once '../inc/functions.php';

class DateFunctionsTest extends PHPUnit_Framework_TestCase {

	public function testNormalForwardCase() {
		$output = determineStartOfNextMonth(1, 1);
		$this->assertEquals($output[0], 2);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(2, 1);
		$this->assertEquals($output[0], 3);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(3, 1);
		$this->assertEquals($output[0], 4);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(4, 1);
		$this->assertEquals($output[0], 5);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(5, 1);
		$this->assertEquals($output[0], 6);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(6, 1);
		$this->assertEquals($output[0], 7);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(7, 1);
		$this->assertEquals($output[0], 8);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(8, 1);
		$this->assertEquals($output[0], 9);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(9, 1);
		$this->assertEquals($output[0], 10);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(10, 1);
		$this->assertEquals($output[0], 11);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(11, 1);
		$this->assertEquals($output[0], 12);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfNextMonth(12, 1);
		$this->assertEquals($output[0], 1);
		$this->assertEquals($output[1], 2);
		$output = determineStartOfNextMonth(1, 2);
		$this->assertEquals($output[0], 2);
		$this->assertEquals($output[1], 2);
	}

	public function testNormalBackwardsCase() {
		$output = determineStartOfPreviousMonth(1, 1);
		$this->assertEquals($output[0], 12);
		$this->assertEquals($output[1], 0);
		$output = determineStartOfPreviousMonth(2, 1);
		$this->assertEquals($output[0], 1);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(3, 1);
		$this->assertEquals($output[0], 2);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(4, 1);
		$this->assertEquals($output[0], 3);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(5, 1);
		$this->assertEquals($output[0], 4);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(6, 1);
		$this->assertEquals($output[0], 5);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(7, 1);
		$this->assertEquals($output[0], 6);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(8, 1);
		$this->assertEquals($output[0], 7);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(9, 1);
		$this->assertEquals($output[0], 8);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(10, 1);
		$this->assertEquals($output[0], 9);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(11, 1);
		$this->assertEquals($output[0], 10);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(12, 1);
		$this->assertEquals($output[0], 11);
		$this->assertEquals($output[1], 1);
		$output = determineStartOfPreviousMonth(1, 2);
		$this->assertEquals($output[0], 12);
		$this->assertEquals($output[1], 1);
	}


}
 