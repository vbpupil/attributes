<?php

include 'vendor/autoload.php';

use vbpupil\Attributes;
use vbpupil\Attribute;

error_reporting(E_ALL);

$a = new Attribute(['foo'=>'bar']);
$attrs = new Attributes($a->getAttribute(), ['foo']);

dump($a);
dump($attrs);

