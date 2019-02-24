<?php
/**
 * AttributesTest.php Class
 *
 * @author    Dean Haines
 * @copyright 2019, UK
 * @license   Proprietary See LICENSE.md
 */

namespace tests\Unit;


use PHPUnit\Framework\TestCase;
use vbpupil\Attribute;
use vbpupil\Attributes;

class AttributesTest extends TestCase
{

    public function testRequired()
    {
        try {
            $this->sut = new Attributes(
                [
                    'product_code'=>'126FGE',
                    'sell_price'=>3.80,
                    'buy_price'=>1.90
                    ],
                [
                    'product_code',
                    'sell_price',
                    'rrp',
                    'sell_by_date'
                ]
            );
        } catch (\Exception $e) {
            $this->assertEquals("Missing required attribute: 'rrp'
Missing required attribute: 'sell_by_date'",$e->getMessage());
        }
    }

    public function testSetAttribute()
    {
        try {
            $this->sut = new Attributes();
            $this->sut->setAttribute('names', new Attribute(['mick','garry']));

            $att = $this->sut->getAttribute('names');

            $this->assertTrue(is_array($att));
            $this->assertTrue($att['names'] instanceof Attribute);



                var_dump($att['names']);
                var_dump($att['names']->getValue());

//            $this->assertEquals($this->sut->getAttribute('names')['names'][0], 'mick');
//            $this->assertEquals($this->sut->getAttribute('names')['names'][1], 'garry');
        } catch (\Exception $e) {
           var_dump($e->getMessage());
        }
    }
}
