<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_index.class.php
 * Description: This class defines a method "display" that displays a user registration form.
 */

class UserIndex extends IndexView {

    public function display() {
        parent::header();
        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="index.php?action=register">
                <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
                <div><input type="submit" class="button" value="register"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/index">Login</a></span>
            <span style="float: right"></span>
        </div>
        <?php
        parent::footer();
    }
}
