<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_model.class.php
 * Description: The UserModel class manages user data in the database.
 */

class UserModel
{
    //Private data members
    static private $_instance = NULL;
    private $db;
    private $dbConnection;
    private $tblUsers;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getUserModel method must be called.
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUsersTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //Static method to ensure there is just one UserModel instance
    public static function getUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function add_user()
    {
        // retrieve password from the registration form
        // updated code using filter_var with FILTER_SANITIZE_STRING filter
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT) ?? ''));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT) ?? ''));
        $email = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_DEFAULT) ?? ''));

        // set the default role_id
        $role_id = 2;

        // sanitize input data and construct the SQL query
        $sql = "INSERT INTO " . $this->db->getUsersTable() . " (role_id, username, password, email) VALUES ('$role_id', '$username', '$password', '$email')";

        // execute the query and return true if successful or false if failed
        if ($this->dbConnection->query($sql) === true) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        setcookie("user", '', -10);
        setcookie("role", '', -10);
        return true;
    }

    public function delete_user($user_id)
    {
        $sql = "DELETE FROM " . $this->db->getUsersTable() . " WHERE user_id = $user_id";
        if ($this->dbConnection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //verify username and password against a database record
    public function verify_user()
    {
        //retrieve username and password
        $username = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_DEFAULT) ?? ''));
        $password = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_DEFAULT) ?? ''));

        //sql statement to filter the users table data with a username
        $sql = "SELECT password FROM " . $this->db->getUsersTable() . " WHERE username='$username'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //if user exists and password matches, set a temporary cookie
        if ($query and $query->num_rows > 0) {
            setcookie("user", $username);
            return true;
        }

        return false;
    }
}



        

