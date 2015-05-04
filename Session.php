<?php

/**
 * Description of Session
 *
 * @author David Gable
 * @created Apr 21, 2015
 * @version 2.0.0
 */
namespace Aksman\Request;

class Session extends AbstractRequest
{
    public function __construct($startSession = true)
    {
        if ($startSession) {
            $this->start();
        }
        $this->data = &$_SESSION;
    }

    public function start()
    {
        session_start();
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        $_SESSION[$key] = $value;
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        $this->data = array();
        $_SESSION = array();

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }

        session_destroy();
    }

    public function abort()
    {
        session_abort();
    }

    public function reset()
    {
        session_reset();
    }

    public function commit()
    {
        session_commit();
    }

    public function status()
    {
        return session_status();
    }
}