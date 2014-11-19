<?php
 
class User {
    private $id = null;
    private $name = null;
    private $lastLogin = null;
    private $token = null;
    private $duration = null;
 
    public function getId() {
        return $this->id;
    }
 
    public function getName() {
        return $this->name;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }
 
    public function getToken() {
        return $this->token;
    }
 
    public function getDuration() {
        return $this->duration;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
 
    public function setName($name) {
        $this->name = $name;
    }

    public function setLastLogin($lastlogin) {
        $this->lastLogin = $lastlogin;
    }
 
    public function setToken($token) {
        $this->token = $token;
    }
 
    public function setDuration($duration) {
        $this->duration = $duration;
    }
}
