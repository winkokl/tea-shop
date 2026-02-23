To check valid myanmar mobile numbers, get mobile operator's name, sanitize mobile numbers and get mobile network types.

### Installation

```
TODO
```

### Usage
```php
<?php
	require __DIR__ . "/vendor/autoload.php";

    use GMBF\MyanmarPhoneNumber;

    $phone_number = new MyanmarPhoneNumber();

    $phone_number->is_telecom('Telenor', "09794303891");
    $phone_number->is_telecom('mpt', "09794303891");
    $phone_number->is_telecom('ooredoo', "09794303891");

    $phone_number->is_valid('09794303891');
    $phone_number->telecom_name('09794303891');
    $phone_number->add_prefix("0979403891");
?>
```