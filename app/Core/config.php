<?php




// define('ROOT', "http//:localhost/mvc/public");

//alternative that makes it easy production


if ($_SERVER['SERVER_NAME'] === 'localhost') {

    /**@database config */
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');


    define('ROOT', "http://localhost/mvc/public");
} else {

    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('ROOT', "https://www.yourwebsite.com");
}

define('APP_NAME', "WEBSITE");
define('APP_DESC', "For practise");
//change to false in production
define('DEBUG', true);
