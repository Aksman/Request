<?php

/**
 * Description of Server
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class Server implements RequestInterface
{
    private $data;

    public function __construct()
    {
        $this->data = $_SERVER;
    }

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