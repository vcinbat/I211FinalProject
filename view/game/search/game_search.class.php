<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: game_search.class.php
 * Description: This script defines the SearchMovie class. The class contains a method named display, which
 *     accepts an array of Movie objects and displays them in a grid.
 */

class GameSearch extends GameIndexView {
    /*
     * the displays accepts an array of game objects and displays
     * them in a grid.
     */

    public function display($terms, $games) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($games)) ? "( 0 - 0 )" : "( 1 - " . count($games) . " )");
            ?>
        </span>
        <hr>

        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($games === 0) {
                echo "No game was found.<br><br><br><br><br>";
            } else {
                //display games in a grid; six games per row
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
        <a href="<?= BASE_URL ?>/game/index">Go to game list</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}