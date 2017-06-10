<?php
/**
 * Created by PhpStorm.
 * User: dean
 * Date: 09/06/17
 * Time: 21:03
 */

namespace App;


class Attributes
{
    protected $attrs;

    public function __construct(array $attrs = [])
    {
        foreach ($attrs as $k => $v){
            if(is_null($k) || is_numeric($k)){
                unset($attrs[$k]);
            }
        }

        $this->attrs = $attrs;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttr($name)
    {
        return $this->attrs;
    }

    /**
     * @param array $attrs
     * @return Attributes
     */
    public function setAttr($name, Attribute $attr)
    {
        $this->attrs[$name] = $attr;
        return $this;
    }

    public function hasAttr($name)
    {
        return array_key_exists($name, $this->attrs);
    }

    public function getAttrs()
    {
        return $this->attrs;
    }
}