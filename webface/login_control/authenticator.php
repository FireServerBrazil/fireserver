<?php
	require_once 'session.php'; 
abstract class Authenticator {
 
    private static $instance = null;
 
    private function __construct() {}
 
    /**
     * 
     * @return Authenticator
     */
    public static function instantiate() {
 
        if (self::$instance == NULL) {
            self::$instance = new AuthenticatorInMemory();
        }
 
        return self::$instance;
 
    }
 
    public abstract function login($nickname, $passwd);
    public abstract function isLoggedIn();
    public abstract function getUser();
    public abstract function dispel();
 
}
 
class AuthenticatorInMemory extends Authenticator {
 
    public function isLoggedIn() {
	$sess = Session::instantiate();
        return $sess->exists('user');	 
    }
 
    public function login($nickname, $passwd) {
	$sess = Session::instantiate();
        if ($nickname == 'fireserver@fireserver.com' && $passwd == 'fireserver') {
            $user = new User();
            $user->setId(1);
            $user->setName('FireServer Administrator'); 
	    $sess->set('user', $user);
            return true;
        }else {
            return false;
        } 
    }
 
    public function getUser() {
 	$sess = Session::instantiate();
        if ($this->isLoggedIn()) {
	    $user = $sess->get('user');
            return $user;
        }else {
            return false;
        }
 
    }
 
    public function dispel() {
	//ob_end_clean();
        header('location: /login.php');
    }
 
}
