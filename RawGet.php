<?php

/**
 * Description of RawGet
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class RawGet extends AbstractRequest
{
    public function __construct()
    {
        $queryString = $_SERVER['QUERY_STRING'];
        parse_str($queryString, $data);
        $this->data = $data;
    }
}
