<?php

namespace App\Modules;

class Session {

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
    
        return (isset($_SESSION[$key])) ?? [];
    }

    public static function delete($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
}