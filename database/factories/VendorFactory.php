<?php

namespace Database\Factories;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Region\Entities\Region;
use Modules\Township\Entities\Township;
use Modules\Vendor\Entities\Vendor;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        $township = Township::factory()->create();

        // Generate fake NRC township code
        $nrcTownshipCode = $this->faker->numberBetween(1, 330);

        // Generate fake NRC gender code
        $nrcGenderCode = $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9']);

        // Generate fake NRC birth year
        $nrcBirthYear = $this->faker->numberBetween(1920, date('Y'));

        // Generate fake NRC serial number
        $nrcSerialNumber = $this->faker->regexify('\d{6}');

        // Combine all the parts to form a complete NRC number
        $fakeNrc = sprintf('%s/%s(%s)%s', $nrcTownshipCode, $nrcGenderCode, $nrcBirthYear, $nrcSerialNumber);

        $myanmarPhoneNumber = '95' . $this->faker->numberBetween(9, 9) . $this->faker->numberBetween(2, 9) . $this->faker->regexify('\d{7}');

        // Generate fake address in Myanmar
        $address = $this->faker->buildingNumber . ' ' . $this->faker->streetName . ', ' . $this->faker->stateAbbr . ', ' . $this->faker->city . ', Myanmar';

        // Generate fake latitude value for a location
        $latitude = $this->faker->randomFloat(6, -90, 90);

        // Generate fake longitude value for a location
        $longitude = $this->faker->randomFloat(6, -90, 90);

        return [
            'user_id' => $user->id,
            'name'    => $this->faker->name(),
            'mobile'  => $myanmarPhoneNumber,
            'nrc'     => $fakeNrc,
            'address' => $address,
            'region_id' => $township->region_id,
            'township_id' => $township->id,
            'logo'    => $this->faker->word,
            'latitude'  => $latitude,
            'longitude' => $longitude,
            'opening_time' => $this->faker->time('H:i:s'),
            'closing_time' => $this->faker->time('H:i:s'),
            'bank_info' => $this->faker->text,
            'shop_photo' => $this->faker->text,
            'vendor_ref' => $this->faker->unique()->randomNumber(6) . '-' . $this->faker->randomLetter . $this->faker->randomLetter,
            'delivery' => $this->faker->boolean
        ];
    }
}
