<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_verify.class.php
 * Description: This class defines a method "display" that displays a login confirmation message.
 */

class Verify extends IndexView
{

    public function display($result)
    {
        //display page header
        parent::displayHeader("Login Confirmation");
        $message = $result ? "You have successfully logged in." : "Your last attempt to login failed. Please try again.";
        ?>
        <div class="top-row"></div>
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if ($result) { //if the user has logged in, display the logout button
                    echo 'Want to log out? <a href="' . BASE_URL . '/user/logout">Logout</a>';
                } else { //if the user has not logged in, display the login button
                    echo 'Already have an account? <a href="' . BASE_URL . '/user/login">Login</a>';
                }
                ?>
            </span>

        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

}
