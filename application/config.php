<?php
/**
 * Author: Val Cinbat
 * Date: 4/5/2023
 * File: config.php
 * Description: Sets the application settings.
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "https://localhost/FinalProject");


/*************************************************************************************
 *                       settings for games                                        *
 ************************************************************************************/

//define default path for media images
define("GAME_IMG", "");
