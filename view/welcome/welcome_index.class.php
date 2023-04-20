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
        <div id="mainHeader"></div>
        <p>This application is designed to demonstrate the popular software design pattern named MVC.</p>
        <br>
        <table style="border: none; width: 700px; margin: 5px auto">
            <tr>
                <td colspan="2" style="text-align: center"><strong>Major features include:</strong></td>
            </tr>
            <tr>
                <td style="text-align: left; width:500px">
                    <ul>
                        <li>List all games</li>
                        <li>Display details of specific games</li>
                        <li>Update or delete existing games</li>
                        <li>Add new games</li>
                    </ul>
                </td>
                <td style="text-align: left; width: 500px">
                    <ul>
                        <li>Searchbar that also supports the boolean AND search with multiple keywords</li>
                        <li>Autosuggestion that also supports the boolean AND search with multiple keywords</li>
                        <li>Favorite games</li>
                    </ul></td>
            </tr>
        </table>

        <br>

        <div id="thumbnails" style="text-align: center; border: none">
            <p>Click the image below to explore our game inventory. Click the logo in the banner to come back to the homepage.</p>

            <a href="<?= BASE_URL ?>/game/index">
                <img src="<?= BASE_URL ?>/www/img/misc/games1.jpg" title="Game Inventory" width="600" height="500"/>
            </a>

        </div>
        <br>
        <p style="text-align: center; color: red; font-weight: bold">Disclaimer</p>
        <p style="font-style: italic">This application is created as a course project for I211. Created by Val Cinbat, Katie Stinson, and Zach Thompson</p>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
