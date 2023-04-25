<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: index_view.class.php
 * Description: The parent class for all view classes. The two functions display page header and footer.
 */

class IndexView
{
    //this method displays the page header
    static public function displayHeader($result)
    {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo ""?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <!-- <link rel='shortcut icon' href='/www/img/favicon.ico' type='image/x-icon' /> -->
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app_style.css'/>
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <div id="top"></div>
        <div id='wrapper'>
        <div id="banner">
            <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Video Game World">
                <div id="left">
                    Welcome to Video Game World!
                </div>
                <a href="<?= BASE_URL ?>/index.php">
                    <img id="logo" src="<?= BASE_URL ?>/www/img/misc/logo.png"/>
                </a>
                <div id="right">
                    <?php
                    if ($result) {
                        echo '<a href="' . BASE_URL . '/user/logout" class="button">Logout</a>';
                    } else {
                        echo '<a href="' . BASE_URL . '/user/login" class="button">Login</a>';
                        echo '<a href="' . BASE_URL . '/user/index" class="button">New User</a>';
                    }
                    ?>
                </div>
        </div>
        <div id="left1">An interactive application designed with MVC pattern</div>
        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter()
    {
        ?>
        <br><br><br>
        <div id="push"></div>
        </div>
        <div id="footer"><br>&copy 2023 Video Game World. All Rights Reserved.</div>
        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
