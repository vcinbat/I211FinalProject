<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_model.class.php
 * Description: The UserModel class manages user data in the database.
 */

class UserModel
{
    private $db;
    private $dbConnection;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    public function add_user()
    {
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $role_id = 2; // default role is regular user
        // check if a role was submitted
        if (isset($_POST['role']) && is_numeric($_POST['role'])) {
            $role_id = intval($_POST['role']);
        }
        $sql = "INSERT INTO " . $this->db->getUserTable() . " (role_id, username, password, email) VALUES('$role_id', '$username', '$hashed_password', '$email')";
        if ($this->dbConnection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function verify_user()
    {
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $sql = "SELECT password, role_title FROM " . $this->db->getUserTable() . " JOIN " . $this->db->getRoleTable() . " ON " . $this->db->getUserTable() . ".role_id = " . $this->db->getRoleTable() . ".role_id WHERE username='$username'";
        $query = $this->dbConnection->query($sql);
        if ($query and $query->num_rows > 0) {
            $result_row = $query->fetch_assoc();
            $hash = $result_row['password'];
            if (password_verify($password, $hash)) {
                setcookie("user", $username);
                setcookie("role", $result_row['role_title']);
                return true;
            }
        }
        return false;
    }

    public function logout()
    {
        setcookie("user", '', -10);
        setcookie("role", '', -10);
        return true;
    }

    public function get_roles()
    {
        $sql = "SELECT * FROM " . $this->db->getRoleTable();
        $query = $this->dbConnection->query($sql);
        $roles = array();
        if ($query and $query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $roles[] = $row;
            }
        }
        return $roles;
    }
}
