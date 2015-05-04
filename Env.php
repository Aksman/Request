<?php

namespace Aksman\Request;

/**
 * Description of Env
 *
 * @author David Gable
 * @created Apr 27, 2015
 */
class Env
{
    public function __construct()
    {
        $this->data = &$_ENV;
    }
}