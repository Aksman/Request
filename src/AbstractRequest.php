<?php

/**
 * Description of AbstractRequest
 *
 * @author David Gable
 * @created Apr 20, 2015
 */
namespace Aksman\Request;

abstract class AbstractRequest implements RequestInterface
{
    protected $data;

    abstract public function __construct();

    public function __get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        } else {
            return null;
        }
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function hasKeys(array $keys)
    {
        foreach($keys as $key) {
            if (!isset($this->data[$key])) {
                return false;
            }
        }
        return true;
    }
}