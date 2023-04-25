<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_register.class.php
 * Description: This class defines a method "display" that confirms the user registration.
 */

class Register extends IndexView
{

    public function display($result)
    {
        //display page header
        parent::displayHeader("Register Confirmation");

        $message = ($result) ? "Your account has been successfully created." : "Your last attempt for creating an account failed. Please try again.";
        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
            <span style="float: right"></span>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
