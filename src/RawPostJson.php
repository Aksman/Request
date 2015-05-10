<?php

/**
 * Import POSTed raw JSON data.
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class RawPostJson extends AbstractRequest
{
    public function __construct()
    {
        $rawdata = file_get_contents('php://input');
        $assoc = json_decode($rawdata, true);
        if ($assoc == null) {
            throw new RawPostJsonException('Post is null or not valid JSON');
        } else {
            $this->data = $assoc;
        }
    }
}

class RawPostJsonException extends \Exception {}
