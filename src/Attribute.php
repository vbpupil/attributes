<?php
/**
 * Created by PhpStorm.
 * User: Dean Haines
 * Date: 09/06/17
 * Time: 21:02
 */

namespace vbpupil;


class Attribute
{
    /**
     * @var
     */
    protected $value;


    /**
     * Attribute constructor.
     * @param $value
     */
    public function __construct($value = [])
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

    /**
     * @return mixed
     */
    public function getKey()
    {
        return key($this->value);
    }

    public function getAttribute()
    {
        return $this->value;

    }
}