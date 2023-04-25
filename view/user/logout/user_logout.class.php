<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_logout.class.php
 * Description: This class defines a method "display" that displays a logout message.
 */

class Logout extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("User Logout");
        ?>
        <div class="top-row"></div>
        <div class="middle-row">
            <p>You have successfully logged out.</p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
