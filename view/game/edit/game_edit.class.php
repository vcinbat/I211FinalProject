<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: game_edit.class.php
 * Description: The display method in the class displays game details in a form.
 */
class GameEdit extends GameIndexView {

    public function display($game) {
        //display page header
        parent::displayHeader("Edit Game");

        //retrieve game details by calling get methods
        $game_id = $game->getGame_id();
        $title = $game->getTitle();
        $genre = $game->getGenre();
        $platform = $game->getPlatform();
        $release_date =  new \DateTime($game->getRelease_date());
        $description = $game->getDescription();
        $image = $game->getImage();
        ?>

        <div id="main-header">Edit Game Details</div>

        <!-- display game details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/game/update/" . $game_id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $game_id ?>">
            <p><strong>Title</strong><br>
                <input name="title" type="text" size="100" value="<?= $title ?>" required autofocus>
            </p>
            <p><strong>Genre</strong>:<br>
                <input name="genre" type="text" size="100" value="<?= $genre ?>" required autofocus>
            </p>
            <p><strong>Platform</strong>:<br>
                <input name="platform" type="text" size="100" value="<?= $platform ?>" required autofocus>
            </p>
            <p><strong>Release Date</strong>:<br>
                <input name="release_date" type="date" value="<?= $release_date->format('Y-m-d') ?>" required>
            </p>
            <p><strong>Description</strong>:<br>
            <textarea name="description" rows="5" cols="50" required><?= $description ?></textarea>
            </p>
            <p><strong>Image</strong>: (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>">
            </p>
            <input type="submit" name="action" value="Update">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/game/detail/" . $game_id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}