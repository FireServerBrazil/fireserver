<?php
 
class Session {
 
    private static $instance = array();
 
    /**
     * 
     * @return Session
     */
    public static function instantiate() {
 
        if (self::$instance =! null) {
            self::$instance = new Session();
        }
 
        return self::$instance;
    }
 
    public function set($key, $value) {
        session_start();
        $_SESSION[$key] = $value;
        session_write_close();
    }
 
    public function get($key) {
        session_start();
        $value = $_SESSION[$key];
        session_write_close();
        return $value;
    }
 
    public function exists($key) {
        session_start();
        if (isset($_SESSION[$key]) && (!empty($_SESSION[$key]))) {
            session_write_close();
            return true;
        }
        else {
            session_write_close();
            return false;
        }
    }
}
