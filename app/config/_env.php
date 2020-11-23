<?php
//project root
define('PROOT', realpath(__DIR__.'/../../'));

//direcotry separator
define('DS', DIRECTORY_SEPARATOR);

//project base path
define( 'BASE_PATH', dirname(__FILE__).DS.'..'.DS.'..'.DS);

//app name
define('APP_NAME', 'CRM');
define('APP_ENV', 'local');




//load composer autoloader
require(PROOT.'/vendor/autoload.php');


?>