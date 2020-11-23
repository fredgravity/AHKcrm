<?php

use \App\classes\Database;
use Philo\Blade\Blade;
use App\classes\Session;
use App\models\User;
use App\classes\Redirect;

function view($path_to_file, $data=[]){
	$viewFolder = PROOT."/resources/views"; 
	$cacheFolder = PROOT."/bootstrap/cache";
	
	$blade = new Blade($viewFolder, $cacheFolder);
	echo $blade->view()->make($path_to_file, $data)->render();

}


function isAuthenticated(){
	
	return Session::exist('SESSION_USER_USERNAME')? true: false;
}


function user(){

	if (isAuthenticated()) {
		return User::findOrFail(Session::get('SESSION_USER_ID'));
	}

	return false;
}


function middleWare(){
	if(!isAuthenticated()){
		Redirect::to('/login_form');
	}
}

function createUserTable($tablename, $db){

	$sql = "CREATE TABLE IF NOT EXISTS {$tablename} (
			id int(11) primary key auto_increment,
            username varchar(255) null,
			fullname varchar(255) null,
			phone int(10) null,
			address varchar(255) null,
			city varchar(255) null,
			state varchar(255) null,
			image_path varchar(255) null,
			member_id varchar(100) null,
			role varchar(120) null,
			designation varchar(120) null,
			created_at timestamp null,
			updated_at timestamp null,
			deleted_at timestamp null

			)";

	$db->createTable($sql, $tablename);
}

function dropTable($tablename,$db){
	$sql = "
		DROP TABLE {$tablename}
	";

	$db->createTable($sql, $tablename);
}

function createUser($tablename, $db){
	$sql = "INSERT INTO {$tablename} (fullname, email, phone, address, city, state, image_path, member_id, role, designation)
		VALUES ('fred amoah','fred@me.com', '0245991097', 'kings ave', 'tema', 'accra', '', 'emp_001', 'admin', 'super user')";

	$db->createData($sql, $tablename);
}


function updateUser($tablename, $db){
	$sql = "
		UPDATE {$tablename} SET fullname = 'ernest sekyi', state = 'greater accra' WHERE id = 1
	";	

	$db->createData($sql, $tablename);
}

function deleteUser($tablename, $db){
	$sql = "
		DELETE FROM {$tablename} WHERE id=1
	";

	$db->createData($sql, $tablename);
}

function selectUser($tablename, $db){
	$sql = "SELECT * FROM {$tablename}";

	$db->selectData($sql, $tablename);
}

function alterTable($tablename, $db, $column, $add=true){
    if ($add){
        $sql = "ALTER TABLE {$tablename} ADD {$column} varchar(255) null ";
    }else{
        $sql = "ALTER TABLE {$tablename} DROP {$column}";
    }
    
    $db->createData($sql, $tablename);
}

















?>