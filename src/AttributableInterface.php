<?php
/**
 * Created by PhpStorm.
 * User: dean
 * Date: 09/06/17
 * Time: 21:01
 */

namespace App;


interface AttributableInterface
{
    public function getAttribute($name);

    public function setAttribute($name, Attribute $value);
}