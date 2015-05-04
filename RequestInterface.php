<?php

/**
 * RequestInterface defines the method used by Aksman\Request classes.
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

interface RequestInterface 
{
    /*
     * Magic method __get allows the script to extract the loaded value. For
     * instance, with a GET value "name", you'd write:
     * 
     * Regular PHP: $_GET['name']
     * Aksman\Request: $get->name
     * 
     * This method should return NULL if the value is not set. This avoids
     * situations where failing to find a particular request value throw a 
     * PHP Notice and emits an error message on screen or invalidates our JSON.
     */
    public function __get($key);
    
    /*
     * Test to see if we have a particular request variable. This magic method
     * is invoked via code much like this:
     * 
     * isset($request->name)
     * 
     * Use this in cases where you really do need to test whether a particular
     * value is available. 
     */
    public function __isset($key);
    
    /*
     * Check any number of variables to see if any are missing.
     */
    public function hasKeys(array $keys);
}
