<?php
/**
 * AttributableInterface
 *
 * @author    Dean Haines
 * @copyright 2017, UK
 * @license   MIT See LICENSE.md
 */

namespace vbpupil;


interface AttributableInterface
{
    public function getAttribute($name);

    public function setAttribute(Attribute $value);
}