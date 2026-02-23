<?php
namespace Modules\Slider\Enum;

class SliderType
{
    const ID_HOME_BANNER = 'home_banner';
    const ID_HOME_SLIDER = 'home_slider';

    const NAME_HOME_BANNER = "Home Banner";
    const NAME_HOME_SLIDER = "Home Slider";

    const AVAILABLES = [
        self::ID_HOME_BANNER => self::NAME_HOME_BANNER,
        self::ID_HOME_SLIDER => self::NAME_HOME_SLIDER
    ];
}
