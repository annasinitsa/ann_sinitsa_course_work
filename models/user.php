<?php

class User 
{
    private $columnList = ['id', 'username', 'pass', 'email', 'status', 'active'];
    protected $userData = [];
    private static $instance;
    private $table = "users";
    private $db;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new User();
        }

        return self::$instance;
    }

    public function getData($key = false)
    {

        if ( ! $key) {
            return $this->userData;
        }

        if (isset($this->userData[$key])) {
            return $this->userData[$key];
        }

        return false;

    }

    public function saveUser($userId){
        $this->db->query("UPDATE ".$this->table." SET username=".$this->getData('username').",
                                                            pass=".$this->getData('pass').",
                                                            email=".$this->getData('email').",
                                                            status=".$this->getData('status').",
                                                            active=".$this->getData('active')."
        WHERE id = ".$userId);

    }

    public function setData($key, $value)
    {
        $this->userData[$key] = $value;

        return $this;
    }

    public function retrieveUserData($userId)
    {
        $db      = MyDB::getInstance();

        if ($db->select("users", "*", "id='".(string)$userId."'") == true) {

            if ($db->numResults == 1) {
                $sel                  = $db->getResult();
                $userData['id']       = $sel['id'];
                $userData['username'] = $sel['username'];
                $userData['pass']     = $sel['pass'];
                $userData['email']    = $sel['email'];
                $userData['status']   = $sel['status'];
                $userData['active']   = $sel['active'];

                return $userData;
            } else {
                error_log("User details not found!");
            }
        }
        return false;
    }

    public function getTable()
    {
        return $this->table;
    }

    protected function __construct()
    {
        $this->db = MyDB::getInstance();

        $this->setData('id', 0);
        $this->setData('username', '');
        $this->setData('pass', '');
        $this->setData('email', '');
        $this->setData('status', 'user');
        $this->setData('active', 0);

    }

}