<?php
/**
 * Author: Zach Thompson
 * Date: 4/4/2023
 * File: game_detail.class.php
 * Description: display game details
 */
class GameDetails extends GameIndexView {

    public function display($game, $confirm = "") {
        //display page header
        parent::displayHeader("Game Details");

        //retrieve game details by getting get methods
        $id = $game->getId();
        $title = $game->getTitle();
        $genre = $game->getGenre();
        $platform = $game->getPlatform();
        $release_date =  new \DateTime($game->getRelease_date());
        $description = $game->getDescription();
        $image = $game->getImage();
        if (strpos ($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . "/" . GAME_IMG . $image;
        }
        ?>

        <div id="main-header">Game Details</div>
        <hr>
    }
}
