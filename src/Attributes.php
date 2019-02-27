<?php
/**
 * Attributes Class
 *
 * @author    Dean Haines
 * @copyright 2017, UK
 * @license   MIT See LICENSE.md
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
        $this->attrs = $attrs;
        $this->required = $required;

        $attrKeys = [];

        foreach ($attrs as $attr) {
            if(!$attr instanceof Attribute){
                throw new \Exception('Expecting Attributes.');
            }

            $attrKeys[] = $attr->getKey();
        }

        if (!empty($required)) {
            //now run a check to ensure that all required attr are present
            $this->requiredCheck($attrKeys);
        }


        return $this;
    }

    /**
     * @param array $attrKeys
     * @throws \Exception
     */
    protected function requiredCheck($attrKeys = [])
    {
        $error = [];

        foreach ($this->required as $req) {
            if (!in_array($req, $attrKeys)) {
                $error[] = "Missing required attribute: '{$req}'";
            }
        }

        if (!empty($error)) {
            $error = implode("\n", $error);

            throw new \Exception($error);
        }
    }

    /**
     * @param $name
     * @return array
     * @throws \Exception
     */
    public function getAttribute($name)
    {
        if($result = $this->hasAttribute($name)) {
            return $result;
        }else{
            throw new \Exception("No such Attribute: {$name} exists");
        }
    }

    /**
     * @param Attribute $attr
     * @return Attributes
     */
    public function setAttribute(Attribute $attr)
    {
        $this->attrs[$attr->getKey()] = $attr;

        return $this;
    }

    /**
     * @param $name
     * @return Attribute
     * @return false
     */
    protected function hasAttribute($name)
    {
        $result = array_filter($this->attrs, function($a) use($name){
            return $name == $a->getKey();
        });

        if(count($result) == 1){
            return $result[key($result)];
        }
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attrs;
    }
}