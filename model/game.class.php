<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: game.class.php
 * Description: The Game class models a real-world game object
 */

class Game {

    //Private data members
    private $game_id, $title, $genre, $platform, $release_date, $description, $image;

    //The constructor
    public function __construct($title, $genre, $platform, $release_date, $description, $image) {
        $this->$title = $title;
        $this->$genre = $genre;
        $this->$platform = $platform;
        $this->$release_date = $release_date;
        $this->$description = $description;
        $this->$image = $image;
    }

    //Get game id
    public function getGame_id() {
        return $this->game_id;
    }

    //Get game title
    public function getTitle() {
        return $this->title;
    }

    //Get game genre
    public function getGenre() {
        return $this->genre;
    }

    //Get game platform
    public function getPlatform() {
        return $this->platform;
    }

    //Get game release date
    public function getRelease_date() {
        return $this->release_date;
    }

    //Get game description
    public function getDescription() {
        return $this->description;
    }

    //Get game image file name
    public function getImage() {
        return $this->image;
    }

    //Set game id
    public function setGame_id($game_id) {
        $this->game_id = $game_id;
    }
}