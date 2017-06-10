<?php
/**
 * Created by PhpStorm.
 * User: dean
 * Date: 09/06/17
 * Time: 21:02
 */

namespace App;


class Attribute
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}