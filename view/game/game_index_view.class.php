<?php
/**
 * Author: Val Cinbat
 * Date: 4/5/2023
 * File: game_index_view.class.php
 * Description: The parent class that displays a search box.
 * The javascript variable media specifies the media type. This variable is needed for auto-suggestion.
 */
class GameIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "game";
        </script>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/game/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search games by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}
