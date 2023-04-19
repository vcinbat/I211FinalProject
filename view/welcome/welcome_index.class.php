<?php
/**
 * Author: Val Cinbat
 * Date: 4/15/2023
 * File: welcome_index.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Video Game World");
        ?>
        <div id="mainHeader">Welcome to our Game Inventory!</div>
        <p>This application is designed to demonstrate the popular software design pattern named MVC.</p>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left">
                    <ul>
                        <li>List all games</li>
                        <li>Display details of specific games</li>
                        <li>Update or delete existing games</li>
                        <li>Add new games</li>
                    </ul>
                </td>
                <td style="text-align: left">
                    <ul>
                        <li>Search for games</li>
                        <li>Autosuggestion</li>
                        <li>Favorite games</li>
                    </ul></td>
            </tr>
        </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p>Click the image below to explore our game inventory. Click the logo in the banner to come back to this page.</p>

            <a href="<?= BASE_URL ?>/game/index">
                <img src="<?= BASE_URL ?>/www/img/misc/games1.jpg" title="Game Inventory" width="600" height="500"/>
            </a>

        </div>
        <br>
        <p style="text-align: center; color: red; font-weight: bold">Disclaimer</p>
        <p style="font-style: italic">This application is created as a course project for I211.</p>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
