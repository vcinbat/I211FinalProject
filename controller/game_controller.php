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
        //create an instance of the MovieModel class
        $this->game_model = GameModel::getGameModel();
    }

    //Index action that displays all games
    public function index()
    {
        //retrieve all movies and store them in an array
        $games = $this->game_model->list_game();

        if (!$games) {
            //display an error
            $message = "There was a problem displaying games.";
            $this->error($message);
            return;
        }

        // display all movies
        $view = new GameIndex();
        $view->display($games);
    }

    //show details of a movie
    public function detail($game_id)
    {
        //retrieve the specific movie
        $movie = $this->game_model->view_game($game_id);

        if (!$game) {
            //display an error
            $message = "There was a problem displaying the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        //display movie details
        $view = new GameDetail();
        $view->display($game);

    }
    //display a movie in a form for editing
    public function edit($game_id) {
        //retrieve the specific movie
        $game = $this->game_model->view_game($game_id);

        if (!$game) {
            //display an error
            $message = "There was a problem displaying the movie id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        $view = new GameEdit();
        $view->display($game);
    }

    //update a movie in the database
    public function update($game_id) {
        //update the movie
        $update = $this->movie_model->update_movie($game_id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the game id='" . $game_id . "'.";
            $this->error($message);
            return;
        }
        //display the updated game details
        $confirm = "The movie was successfully updated.";
        $game = $this->game_model->view_game($game_id);

        $view = new GameDetail();
        $view->display($game, $confirm);
    }

    //search movies
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $movies = $this->game_model->search_game($query_terms);

        if ($movies === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched movies
        $search = new GameSearch();
        $search->display($query_terms, $games);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $games = $this->game_model->search_game($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($games) {
            foreach ($games as $game) {
                $titles[] = $game->getTitle();
            }
        }
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
