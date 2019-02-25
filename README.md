## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
[![Build Status](https://travis-ci.org/vbpupil/attributes.svg?branch=master)](https://travis-ci.org/vbpupil/attributes)
[![Code Climate](https://codeclimate.com/github/vbpupil/attributes/badges/gpa.svg)](https://codeclimate.com/github/vbpupil/attributes)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)


# Attributes

A simple Attributes mechanism that makes keeping track of settings a lot more manageable.


## Sample Usage

```php
include 'vendor/autoload.php';

use vbpupil\Attributes;
use vbpupil\Attribute;


//create individual attribute
$attr = new Attribute(['foo'=>'bar']);
$attr->getKey();
$attr->getValue();


//create a new bunch of attributes
try {
    $attrs = new Attributes(
        [
            new Attribute(['product_code'=>'126FGE']),
            new Attribute(['sell_price'=>3.80]),
            new Attribute(['buy_price'=>1.90])
        ],
        [
            'product_code'
        ]
    );
} catch (\Exception $e) {

}

$attrs->getAttribute('product_code');
$attrs->getAttribute('product_code')->getValue();
```