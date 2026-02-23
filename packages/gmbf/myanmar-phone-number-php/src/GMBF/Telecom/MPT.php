<?php 

namespace GMBF\Telecom;

class MPT implements TelecomInterface
{
    /**
     * Check for Provided Phone Number is belongs to MPT Network
     *
     * @param $number Phone Number
     * @return bool
     */
	public function check($number)
	{
		return preg_match(
			'/^(09|\+?959)((20|21|22|23|24|50|51|52|53|54|55|56|83|85|86|87)\d{5}|(41|43|47|49|73|91)\d{6}|(25|26|40|42|44|45|48|88|89)\d{7})$/', 
			$number
		) ? true : false;
	}
}