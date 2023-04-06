<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: index.php
 * Description: The bootstrap file. Loads the dispatcher
 */
//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();