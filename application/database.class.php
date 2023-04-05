<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: database.class.php
 * Description: The database class sets the database details
 */

class Database
{

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'game_inventory',
        'tblGames' => 'games',
        'tblFavorites' => 'favorites',
        'tblUsers' => 'users',
        'tblRoles' => 'roles'
    );

    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    public function __construct() {

        $this->objDBConnection = @new mysqli(
            $this->param['host'],
            $this->param['login'],
            $this->param['password'],
            $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            exit("Connecting to database failed: " . mysqli_connect_error());
        }
    }

    //static method to ensure there is just one Database instance
    static public function getInstance() {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table storing books
    public function getGamesTable() {
        return $this->param['tblGames'];
    }

    //returns the name of the table storing books
    public function getFavoritesTable() {
        return $this->param['tblFavorites'];
    }

    //returns the name of the table storing books
    public function getUsersTable() {
        return $this->param['tblUsers'];
    }

    //returns the name of the table storing books
    public function getRoles() {
        return $this->param['tblRoles'];
    }
}