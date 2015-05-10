<?php

namespace Aksman\Request\Test;

/**
 * Description of TestGet
 *
 * @author David Gable
 * @created Apr 27, 2015
 */

class TestGet extends \PHPUnit_Framework_TestCase
{
    public function testGetValue()
    {
        $get = new \Aksman\Request\Get;
        $this->assertEquals('Dave', $get->fname);
        $this->assertEquals('Gable', $get->lname);
        $this->assertEquals(29, $get->age);
        $this->assertEquals('buffalo wings', $get->favorite_food);
    }

    /**
     * @depends testGetValue
     */
    public function testMissingAsNull()
    {
        $get = new \Aksman\Request\Get;
        $this->assertNull($get->missing);
    }

    /**
     * @depends testMissingAsNull
     */
    public function testIsset()
    {
        $get = new \Aksman\Request\Get;
        $this->assertTrue(isset($get->fname));
        $this->assertTrue(isset($get->lname));
        $this->assertTrue(isset($get->age));
        $this->assertTrue(isset($get->favorite_food));
        $this->assertFalse(isset($get->missing));
    }

    /**
     * @depends testIsset
     *
     */
    public function testHasKeys()
    {
        $get = new \Aksman\Request\Get;
        $this->assertTrue($get->hasKeys([
            'fname', 'lname', 'age', 'favorite_food', 
        ]));
        $this->assertFalse($get->hasKeys([
            'fname', 'lname', 'age', 'favorite_food', 'missing',
        ]));
    }
}