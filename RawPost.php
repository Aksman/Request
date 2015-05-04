<?php

/**
 * Import raw POST data as a traditional query string.
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class RawPost extends AbstractRequest
{    
    public function __construct()
    {
        $rawdata = file_get_contents('php://input');
        parse_str($rawdata, $data);
        $this->data = $data;
    }
}
