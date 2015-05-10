<?php

/**
 * Description of Cookie
 *
 * @author David Gable
 * @created Apr 20, 2015
 * @version 2.1.0
 */
namespace Aksman\Request;

use \Exception;
use \DateTime;

class Cookie extends AbstractRequest
{
    protected $expireOffset = 0;
    protected $path = '/';

    public function __construct()
    {
        $this->data = &$_COOKIE;
    }

    /*
     * A convenient method for setting cookies. Note that this method makes the
     * value available immediately via the __get() method, unlike relying on
     * setcookie() and $_COOKIE, where the value isn't available until the next
     * page load. Setting is as simple as doing this:
     *
     * $cookie->key = $value;
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        setcookie($key, $value, $this->expireOffset, $this->path);
    }

    /**
     * A convenient method for unsetting cookies. Note that this method also
     * removes the value from the internal data array, meaning retrieving the
     * value via the __get() method will return NULL. This is unlike simply
     * using setcookie() function to remove the value, where the value still
     * exists until the next page load.
     * @param type $key
     */
    public function __unset($key)
    {
        unset($this->data[$key]);
        setcookie($key, '', time() - 3600, $this->path);
    }
    
    /*
     * Set the expire value for the cookie. This will be at some future time or
     * interval from the current time, defined by the string $offset. For
     * instance, if you want to set the cookie to expire in one month, do this:
     *
     * $cookie->setExpireOffset('+1 month');
     */
    public function setExpire($offset='')
    {
        if (!$offset) {
            // Cookie set to expire at session end
            $this->expire = 0;
        } else {
            try {
                $dt = new DateTime($offset);
                $this->expire = $dt->format('U');
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                $code = $ex->getCode();
                throw new CookieException($message, $code);
            }
        }
        return $this;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
}

class CookieException extends Exception {}