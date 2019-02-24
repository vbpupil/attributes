<?php
/**
 * Attributes Class
 *
 * @author    Dean Haines
 * @copyright 2017, UK
 * @license   Proprietary See LICENSE.md
 */

namespace vbpupil;


/**
 * Class Attributes
 * @package vbpupil
 */
class Attributes implements AttributableInterface
{
    /**
     * @var array
     */
    protected $attrs;

    /**
     * @var array
     */
    protected $required = [];

    /**
     * Attributes constructor.
     *
     * @param array $attrs
     * @throws \Exception
     */
    public function __construct($attrs = [], $required = [])
    {
        $this->required = $required;

        //attributes precheck - key cannot be null nor numerical
        foreach ($attrs as $k => $v) {
            if (is_null($k) || is_numeric($k)) {
                unset($attrs[$k]);
            }
        }

        //now run a check to ensure that all required attr are present
        if ($this->requiredCheck($attrs)) {
            $this->attrs = $attrs;
            return $this;
        }
    }

    /**
     * @param array $attrs
     * @return bool
     * @throws \Exception
     */
    protected function requiredCheck($attrs = [])
    {
        $error = [];

        foreach ($this->required as $req) {
            if (!array_key_exists($req, $attrs)) {
                $error[] = "Missing required attribute: '{$req}'";
            }
        }

        if(!empty($error)){
            $error = implode("\n", $error);

            throw new \Exception($error);
        }

        return true;
    }

    /**
     * @return array
     */
    public function getAttribute($name)
    {
        return $this->attrs;
    }

    /**
     * @param $name
     * @param Attribute $attr
     * @return Attributes
     */
    public function setAttribute($name, Attribute $attr)
    {
        $this->attrs[$name] = $attr;
        return $this;
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasAttribute($name)
    {
        return (bool)array_key_exists($name, $this->attrs);
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attrs;
    }
}