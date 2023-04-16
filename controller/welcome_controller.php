<?php
/**
 * Author: Val Cinbat
 * Date: 4/15/2023
 * File: welcome_controller.php
 * Description: This scripts define the class for the welcome controller; this is the default controller.
 */

class WelcomeController {
    //put your code here
    public function index() {
        $view = new WelcomeIndex();
        $view->display();
    }
}