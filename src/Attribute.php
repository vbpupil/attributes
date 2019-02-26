<?php
/**
 * Attribute
 *
 * @author    Dean Haines
 * @copyright 2017, UK
 * @license   MIT See LICENSE.md
 */

namespace vbpupil;


/**
 * Class Attribute
 * @package vbpupil
 */
class Attribute
{
    /**
     * @var mixed
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
        return $this->value[key($this->value)];
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return key($this->value);
    }

    /**
     * @return array
     */
    public function getAttribute()
    {
        return $this->value;

    }
}