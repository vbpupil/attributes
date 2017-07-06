<?php
/**
 * Created by PhpStorm.
 * User: Dean Haines
 * Date: 09/06/17
 * Time: 21:03
 */

namespace vbpupil;


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
     * @param array $attrs
     */
    public function __construct(array $attrs = [], array $required = [])
    {
        $this->required = $required;

        foreach ($attrs as $k => $v){
            if(is_null($k) || is_numeric($k)){
                unset($attrs[$k]);
            }
        }

        if($this->requiredCheck($attrs)) {
            $this->attrs = $attrs;
            return $this;
        }
    }

    /**
     * @param array $attrs
     * @return bool
     * @throws \Exception
     */
    public function requiredCheck(array $attrs=[])
    {
        foreach ($this->required as $req){
            if(!array_key_exists($req, $attrs)){
                throw new \Exception("Missing requires attribute '{$req}'");
            }
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
     * @param array $attrs
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
    public function hasAttr($name)
    {
        return array_key_exists($name, $this->attrs);
    }

    /**
     * @return array
     */
    public function getAttrs()
    {
        return $this->attrs;
    }
}