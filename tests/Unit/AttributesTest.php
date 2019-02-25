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

    public function testRequiredValues()
    {
        try {
            $this->sut = new Attributes(
                [
                    new Attribute(['product_code'=>'126FGE']),
                    new Attribute(['sell_price'=>3.80]),
                    new Attribute(['buy_price'=>1.90])
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

    public function testConstructorException()
    {
        try {
            $this->sut = new Attributes(
                [
                    'i am a string'
                    ]
            );
        } catch (\Exception $e) {
            $this->assertEquals("Expecting Attributes.",$e->getMessage());
        }
    }

    public function testSetAttributeByConstructor()
    {
        try {
            //set attributes
            $this->sut = new Attributes(
                [
                    new Attribute(['names'=>'mick']),
                    new Attribute(['name'=>'john'])
                ]
            );

            //get attribute objects back individually
            $att = $this->sut->getAttribute('names');
            $att2 = $this->sut->getAttribute('name');

            //check that what we have is an attribute object
            $this->assertTrue($att instanceof Attribute);

            //test that we are able to retrieve the values correctly
            $this->assertEquals($att->getValue(), 'mick');
            $this->assertEquals($att2->getValue(), 'john');
        } catch (\Exception $e) {
echo $e->getMessage();
        }
    }

    public function testAttemptingGetOfUnknownKey()
    {
        try {
            //set attributes
            $this->sut = new Attributes(
                [
                    new Attribute(['name'=>'mick'])
                ]
            );

            //get attribute objects back individually
            $this->sut->getAttribute('zzz');

        } catch (\Exception $e) {
            $this->assertEquals('No such Attribute: zzz exists', $e->getMessage());

            echo $e->getMessage();
        }
    }

    public function testSetAttributeAndGetAttributesIndividually()
    {
        try {
            $this->sut = new Attributes();

            //set attributes
            $this->sut
                ->setAttribute(new Attribute(['names'=>'mick']))
                ->setAttribute( new Attribute(['name'=>'john']));

            //get attribute objects back individually
            $att = $this->sut->getAttribute('names');
            $att2 = $this->sut->getAttribute('name');

            //check that what we have is an attribute object
            $this->assertTrue($att instanceof Attribute);

            //test that we are able to retrieve the values correctly
            $this->assertEquals($att->getValue(), 'mick');
            $this->assertEquals($att2->getValue(), 'john');
        } catch (\Exception $e) {

        }
    }

//    public function testHasAttribute()
//    {
//        try {
//            $this->sut = new Attributes();
//
//            //set attributes
//            $this->sut
//                ->setAttribute(new Attribute(['names'=>'paul']))
//                ->setAttribute( new Attribute(['name'=>'ringo']));
//
//            $this->assertTrue($this->sut->hasAttribute('names'));
//            $this->assertFalse($this->sut->hasAttribute('namesd'));
//        } catch (\Exception $e) {
//
//        }
//    }

    public function testGetAllAttributes()
    {
        try {
            $this->sut = new Attributes();

            //set attributes
            $this->sut
                ->setAttribute(new Attribute(['names'=>'paul']))
                ->setAttribute( new Attribute(['name'=>'ringo']));


            $this->assertTrue(is_array($this->sut->getAttributes()));
            $this->assertCount(2, count($this->sut->getAttributes()));

        } catch (\Exception $e) {

        }
    }

    public function testUnsetOfEmptyValues()
    {
        $this->sut = new Attributes();

    }
}
