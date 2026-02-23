<?php 

namespace GMBF\Telecom;

class Ooredoo implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to Ooredoo Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match('/^(09|\+?959)9(8|7|6|5|4)\d{7}$/', $number) ? true : false;
	}
}