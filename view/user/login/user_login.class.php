<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_login.class.php
 * Description: This class defines a method "display" that displays a login form.
 */

class Login extends IndexView
{

    public function display()
    {
        //display page header
        parent::displayHeader("User Login");
        ?>
        <div class="top-row"></div>
        <div class="middle-row">
            <p>Please enter your username and password.</p>
            <form method="post" action="<?= BASE_URL ?>/user/verify">
                <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required placeholder="Password"></div>
                <div><input type="submit" class="button" value="login"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Don't have an account?<a href="<?= BASE_URL ?>/user/index">Register</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}
