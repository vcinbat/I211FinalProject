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

        <div id="mainHeader">Game Details</div>
        <hr>
    <!-- game details displayed in a table -->
    <table id="details">
        <tr>
            <td style="width: 150px;">
                <img src="<?= $image ?>" alt="<?= $title ?>" />
            </td>
            <td style="width: 130px;">
                <p><strong>Title:</strong></p>
                <p><strong>Genre:</strong></p>
                <p><strong>Platform:</strong></p>
                <p><strong>Release Date:</strong></p>
                <p><strong>Description:</strong></p>
                <!-- edit game details button -->
                <div id="buttonGroup">
                    <input type="button" id="editButton" value="Edit"
                           onclick="window.location.href = '<?=BASE_URL ?>/game/edit/<?= $id ?>'">&nbsp;
                </div>
            </td>
            <td>
                <p><?= $title ?></p>
                <p><?= $genre ?></p>
                <p><?= $platform ?></p>
                <p><?= $release_date->format('m-d-y') ?></p>
                <p class="gameDescription"><?= $description ?></p>
                <div id="confirmMsg"><?= $confirm ?></div>
            </td>
        </tr>
    </table>
    <a href="<?= BASE_URL ?>/game/index">Go to game library</a>

    <?php
        //display page footer
        parent::displayFooter();
    }
}
