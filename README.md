## Quality Assurance

![PHP 5.6](https://img.shields.io/badge/PHP-5.6-blue.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-blue.svg)
[![Build Status](https://travis-ci.org/vbpupil/queue.svg?branch=master)](https://travis-ci.org/vbpupil/queue)
[![Code Climate](https://codeclimate.com/github/vbpupil/queue/badges/gpa.svg)](https://codeclimate.com/github/vbpupil/queue)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)


# Attributes

A simple Attributes mechanism which makes setting attributes simple and more manageable.

## Sample Usage

```php
include 'vendor/autoload.php';

use vbpupil\Attributes;
use vbpupil\Attribute;

error_reporting(E_ALL);

$a = new Attribute(['foo'=>'bar']);
$attrs = new Attributes($a->getAttribute(), ['foo']);

dump($a);
dump($attrs);
```

The above example will return 1 item with the value of **5**.