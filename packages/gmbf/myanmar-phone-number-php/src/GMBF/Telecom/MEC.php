<?php 

namespace GMBF\Telecom;

class MEC implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to MEC Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match(
			'/^(09|\+?959)((30|31|32|33|36)\d{6}|(34|35)\d{7})$/', 
			$number
		) ? true : false;
	}
}