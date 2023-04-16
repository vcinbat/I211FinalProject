<?php
/**
 * Author: Zach Thompson
 * Date: 4/4/2023
 * File: game_index.class.php
 * Description: defines the display method, which displays games in the designated format (6 games in a row)
 */

//displays an array of games in a grid format
class GameIndex extends GameIndexView {
    public function display($games){
    //display page header
    parent::displayHeader("List All Games");
    ?>
    <div id="mainHeader"> Game Inventory</div>

    <div class="gridContainer">
        <?php
        if ($games == 0) {
            echo "No game was found. <br><br><br><br>";
        } else {
        //displays games in a grid; six games per row
        foreach ($games as $game) {
            $game_id = $game->getGame_id();
            $title = $game->getTitle();
            $genre = $game->getGenre();
            $platform = $game->getPlatform();
            $release_date =  new \DateTime($game->getRelease_date());
            $image = $game->getImage();
            if (strpos ($image, "http://") === false AND strpos($image, "https://") === false) {
                $image = BASE_URL . "/" . GAME_IMG . $image;
            }

            echo "<div class='item'><p><a href='", BASE_URL, "/game/detail/$game_id'><img src='" . $image . "'></a>
            <span> $title<br>
                Genre: $genre<br>
                Platform: $platform<br>
                Release Date: " . $release_date->format('m-d-y') . "</span></p></div>";
            }
        }
        ?>
    </div>
    <?php
    //display page footer
    parent::displayFooter();
    }
}