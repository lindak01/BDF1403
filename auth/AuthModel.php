<?php

class AuthModel {
    
    public $db;
    
    public function __construct($dsn, $user, $password) {
        $this->db = new \PDO($dsn, $user, $password);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    
    public function getUserByNamePass($name, $password) {
        $stmt = $this->db->prepare("
            SELECT userID AS id, userName AS name user_firstname AS firstname
            FROM users
            WHERE (userName= :name)
            AND (psswrd= :password); 
        ");
        if ($stmt->execute(array(':name' => $name, ':password' => md5($password)))) {
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if (count($rows) === 1) {
                return $rows[0];
            }
        }
        return FALSE;
    }
}