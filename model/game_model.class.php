<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: game_model.class.php
 * Description: The game model
 */

class GameModel {

    //Private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblGames;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getGameModel method must be called.
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblGames = $this->db->getGamesTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //Static method to ensure there is just one GameModel instance
    public static function getGameModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new GameModel();
        }
        return self::$_instance;
    }

    /*
     * The list_movie method retrieves all movies from the database and
     * returns an array of game objects if successful or false if failed.
     * Movies should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_game()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblGames;

        //Execute the query
        $query = $this->dbConnection->query($sql);

        //If the query failed, return false.
        if (!$query)
            return false;

        //If the query succeeded, but no game was found.
        if ($query->num_rows == 0)
            return 0;

        //Handle the result
        //Create an array to store all returned games
        $games = array();

        //Loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $game = new Game(stripslashes($obj->title), stripslashes($obj->genre), stripslashes($obj->platform),
                stripslashes($obj->release_date), stripslashes($obj->description), stripslashes($obj->image));

            //Set the id for the game
            $game->setGame_id($obj->game_id);

            //Add the game into the array
            $games[] = $game;
        }
        return $games;
    }

    /*
    * The viewGame method retrieves the details of the movie specified by its id
    * and returns a game object. Return false if failed.
    */

    public function view_game($game_id) {
        //The select sql statement
        $sql = "SELECT * FROM " . $this->tblGames . " WHERE game_id='$game_id'";

        //Execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //Create a movie object
            $game = new Game(stripslashes($obj->title), stripslashes($obj->genre), stripslashes($obj->platform),
                stripslashes($obj->release_date), stripslashes($obj->description), stripslashes($obj->image));

            //Set the id for the movie
            $game->setGame_id($obj->game_id);

            return $game;
        }
        return false;
    }

   /*The update_movie method updates an existing movie in the database. Details of the movie are posted in a form.
    *Return true if succeeded; false otherwise.
    */

    public function update_movie($game_id) {
        //If the script did not receive post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
            !filter_has_var(INPUT_POST, 'genre') ||
            !filter_has_var(INPUT_POST, 'platform') ||
            !filter_has_var(INPUT_POST, 'release_date') ||
            !filter_has_var(INPUT_POST, 'description') ||
            !filter_has_var(INPUT_POST, 'image')) {

            return false;
        }

        //Retrieve data for the new game; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $genre = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING)));
        $platform = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'platform', FILTER_SANITIZE_STRING)));
        $release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));

        //Query string for update
        $sql = "UPDATE " . $this->tblGames .
            " SET title='$title', genre='$genre', platform='$platform', release_date='$release_date', "
            . "description='$description', image='$image' WHERE game_id='$game_id'";

        //Execute the query
        return $this->dbConnection->query($sql);
    }

    //Search the database for games that match words in titles. Return an array of games if succeeded; false otherwise.
    public function search_game($terms) {
        $terms = explode(" ", $terms); //Explode multiple terms into an array
        //Select statement for AND search
        $sql = "SELECT * FROM " . $this->tblGames;

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //Execute the query
        $query = $this->dbConnection->query($sql);

        //The search failed, return false.
        if (!$query)
            return false;

        //Search succeeded, but no game was found.
        if ($query->num_rows == 0)
            return 0;

        //Search succeeded, and found at least 1 game found.
        //Create an array to store all the returned games
        $games = array();

        //Loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $game = new Game($obj->title, $obj->genre, $obj->platform, $obj->release_date,
                $obj->description, $obj->image);

            //Set the id for the game
            $game->setGame_id($obj->game_id);

            //Add the movie into the array
            $games[] = $game;
        }
        return $games;
    }
}
