<?php 

namespace GMBF\Telecom;

class Mytel implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to Mytel Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match(
			'/^(09|\+?959)((69|68|67|66)\d{7})$/',
			$number
		) ? true : false;
	}
}