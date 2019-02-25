<?php
/**
 * @author  dean
 * @date    06/07/17
 * @version 1.0
 */

namespace tests\Unit;

use PHPUnit\Framework\TestCase;
use vbpupil\Attribute;

/**
 * Class attributeTest
 * @package tests\Unit
 */
class attributeTest extends TestCase
{
    /**
     * @var
     */
    protected $sut;

    /**
     *
     */
    public function setUp()
    {
        $this->sut = new Attribute(['foo' => 'bar']);
    }

    /**
     *
     */
    public function testGetAttribute()
    {
        $this->assertArrayHasKey('foo', $this->sut->getAttribute());
        $this->assertEquals('bar', $this->sut->getAttribute()['foo']);
    }

    /**
     *
     */
    public function testGetKey()
    {
        $this->assertEquals('foo', $this->sut->getKey());
    }

    /**
     *
     */
    public function testGetValue()
    {
        $this->assertEquals('bar', $this->sut->getValue());
    }

    /**
     *
     */
    public function testAttribute()
    {
        $this->assertInstanceOf('vbpupil\Attribute', $this->sut);
    }
}
