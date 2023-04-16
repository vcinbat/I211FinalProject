<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user.class.php
 * Description: Models the user object
 */

class User {
    private $user_id;
    private $role_id;
    private $username;
    private $password;
    private $email;
    private $role_title;

    public function __construct($user_id, $role_id, $username, $password, $email, $role_title) {
        $this->user_id = $user_id;
        $this->role_id = $role_id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role_title = $role_title;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRoleTitle() {
        return $this->role_title;
    }
}
?>