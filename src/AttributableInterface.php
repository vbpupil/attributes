<?php
/**
 * Created by PhpStorm.
 * User: Dean Haines
 * Date: 09/06/17
 * Time: 21:01
 */

namespace vbpupil;


interface AttributableInterface
{
    public function getAttribute($name);

    public function setAttribute($name, Attribute $value);
}