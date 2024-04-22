<?php
    // Define DB Params
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "advertisements_system");


    // Define URL
    // Define Main ULRS
    define("PROTOCOL", "http://");
    define("ROOT_DOMAIN", "localhost/SystemOgloszeniowyWeb/");
    define("ROOT_URL", PROTOCOL . ROOT_DOMAIN);
    define("ROOT_Style", ROOT_URL ."styles/");
    define("ROOT_Script", ROOT_URL ."scripts/");

    //Define Images URLS
    define("ROOT_IMG", ROOT_URL ."images/assets/");
    define("ROOT_IMG_ADVERTISEMENT", ROOT_URL ."images/advertisement/");
    define("ROOT_IMG_USER", ROOT_URL ."images/user/");
    define("ROOT_IMG_COMPANY", ROOT_URL ."images/company/");

    

    foreach (glob("app/*.php") as $filename) {
        include $filename;
    }
    foreach (glob("controllers/*.php") as $filename) {
        include $filename;
    }
    foreach (glob("models/*.php") as $filename) {
        include $filename;
    }
?>