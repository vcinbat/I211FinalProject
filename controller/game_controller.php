<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: game_controller.php
 * Description: The game controller
 */

class GameController
{
    private $game_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the GameModel class
        $this->game_model = GameModel::getGameModel();
    }

    //Index action that displays all games
    public function index()
    {
        //retrieve all games and store them in an array
        $games = $this->game_model->list_game();

        if (!$games) {
            //display an error
            $message = "There was a problem displaying games.";
            $this->error($message);
            return;
        }

        // display all games
        $view = new GameIndex();
        $view->display($games);
    }

    //show details of a game
    public function detail($game_id)
    {
        //retrieve the specific game
        $game = $this->game_model->view_game($game_id);

        if (!$game) {
            //display an error
            $message = "There was a problem displaying the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        //display game details
        $view = new GameDetail();
        $view->display($game);

    }
    //display a game in a form for editing
    public function edit($game_id) {
        //retrieve the specific game
        $game = $this->game_model->view_game($game_id);

        if (!$game) {
            //display an error
            $message = "There was a problem displaying the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        $view = new GameEdit();
        $view->display($game);
    }

    //update a game in the database
    public function update($game_id) {
        //update the game
        $update = $this->game_model->update_game($game_id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        //display the updated game details
        $confirm = "The game was successfully updated.";
        $game = $this->game_model->view_game($game_id);

        $view = new GameDetail();
        $view->display($game, $confirm);
    }

    public function search() {
        // retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        // if search term is empty, list all games
        if ($query_terms == "") {
            $this->index();
            return;
        }

        // split query terms into individual keywords
        $keywords = preg_split('/\s+/', $query_terms);

        // search the database for each keyword
        $matches = array();
        foreach ($keywords as $keyword) {
            $games = $this->game_model->search_game($keyword);
            if ($games === false) {
                // handle error
                $message = "An error has occurred.";
                $this->error($message);
                return;
            }
            $matches[] = $games;
        }

        // find the intersection of the results
        $result = array();
        foreach ($matches[0] as $game) {
            $in_all = true;
            for ($i = 1; $i < count($matches); $i++) {
                if (!in_array($game, $matches[$i])) {
                    $in_all = false;
                    break;
                }
            }
            if ($in_all) {
                $result[] = $game;
            }
        }

        // display matched games
        $search = new GameSearch();
        $search->display($query_terms, $result);
    }


    public function suggest($terms) {
        // split query terms into individual keywords
        $query_terms = preg_split('/\s+/', urldecode(trim($terms)));

        // retrieve suggestions for each keyword
        $titles = array();
        foreach ($query_terms as $query_term) {
            $games = $this->game_model->search_game($query_term);
            if ($games) {
                foreach ($games as $game) {
                    $titles[] = $game->getTitle();
                }
            }
        }

        // remove duplicates and return suggestions as a JSON-encoded array
        $titles = array_unique($titles);
        echo json_encode($titles);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new GameError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case-sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }
}
