<?php
    
    use Hallify\Core\App;


    /**
     * @author Bryan Heredia <bryanheredia@hallify.com
     * @package Hallify
     * @version 1.0
     **/


    // constant that contains Hallify's root path
    define("ROOT_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);

    // constant that contains Hallify's "app" folder path
    define("APP_FOLDER_PATH", ROOT_PATH . "app" . DIRECTORY_SEPARATOR);

    // load Hallify's configuration
    require_once APP_FOLDER_PATH . "config/config.php";

    // load the autoload script
    require_once ROOT_PATH . "vendor/autoload.php";


    // initiate Hallify
    $app = new \Hallify\Core\App();

