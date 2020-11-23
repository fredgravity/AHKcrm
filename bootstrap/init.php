<?php

if (!isset($_SESSION)) {
	session_start();
}

require_once __DIR__.'/../app/config/_env.php';

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 
//instantiate database class
$db = new \App\classes\Database();
//pnd($db);

//$tablename = 'users';
//$column = 'password';

//createUserTable($tablename,$db);
//dropTable($tablename, $db);
//alterTable($tablename, $db, $column);
//createUser($tablename, $db);
//updateUser($tablename, $db);
//deleteUser($tablename, $db);
//$users = selectUser($tablename, $db);


//use Illuminate\Database\Capsule\Manager as Capsule;
//$users = Capsule::table('users')->get();
//pnd($users);

//view('home', ['data'=>'b']);

/*echo '<pre>';
print_r("pr ".PROOT);
echo '</pre>';
echo '<pre>';
print_r("bp ".BASE_PATH);
echo '</pre>';*/

$router = new \App\routing\RouteDispatcher($_SERVER['REQUEST_URI']);

//include routes here
require_once(PROOT.'/app/routing/routes.php');

$router->map($routeArray);
$router->getRoute();


//pnd($_SERVER['REQUEST_URI']);























?>