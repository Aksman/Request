<?php

namespace Aksman\Request\Test;

/**
 * Description of TestPost
 *
 * @author David Gable
 * @created Apr 27, 2015
 */
class TestPost extends \PHPUnit_Framework_TestCase
{
    public function testPostValues()
    {
        $post = new \Aksman\Request\Post;
        $this->assertEquals('Sydney', $post->fname);
        $this->assertEquals('Gable', $post->lname);
        $this->assertEquals(12, $post->age);
        $this->assertEquals('tacos', $post->favorite_food);
    }

    public function testMissingValueAsNull()
    {
        $post = new \Aksman\Request\Post;
        $this->assertEquals('Sydney', $post->fname);
        $this->assertEquals(null, $post->missing);
    }

    public function testIsset() {
        $post = new \Aksman\Request\Post;
        $this->assertEquals(true, isset($post->fname));
        $this->assertEquals(true, isset($post->lname));
        $this->assertEquals(true, isset($post->age));
        $this->assertEquals(true, isset($post->favorite_food));
        $this->assertEquals(false, isset($post->missing));
    }

    public function testHasKeys()
    {
        $post = new \Aksman\Request\Post;
        $this->assertEquals(true, $post->hasKeys([
            'fname', 'lname', 'age', 'favorite_food',
        ]));
        $this->assertEquals(false, $post->hasKeys([
            'fname', 'lname', 'age', 'favorite_food', 'missingValue',
        ]));
    }

    public function testAlternativeManipulation()
    {
        $post = new \Aksman\Request\Post;
        $this->assertEquals('Sydney', $post->fname);
        $_POST['fname'] = 'Elizabeth';
        $this->assertEquals('Elizabeth', $post->fname);
    }
}