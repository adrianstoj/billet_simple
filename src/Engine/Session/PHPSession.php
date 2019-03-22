<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 21/03/19
 * Time: 17:04
 */

namespace BilletSimple\Engine\Session;


class PHPSession
{
    private function ensureStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get(string $key, $default = null)
    {
        $this->ensureStarted();
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    public function set($key, $value)
    {
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    public function delete($key)
    {
        $this->ensureStarted();
        unset($_SESSION[$key]);
    }
}