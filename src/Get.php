<?php

/**
 * Import and access GET variables.
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class Get extends AbstractRequest
{
    public function __construct()
    {
        $this->data = &$_GET;
    }
}
