<?php

namespace App\classes;

use \PDO;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database{

	private $username='crm', $password='password', $servername='localhost', $dbname='crm', $connection;

	public function __construct(){
		// $this->connectUsingPDO();
		$this->illuminateDB();
	}


	public function illuminateDB(){
		$capsule = new Capsule;
		
		$capsule->addConnection([
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'crm',
			'username'  => 'crm',
			'password'  => 'password',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		]);

		
		

		// Make this Capsule instance available globally via static methods... (optional)
		$capsule->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$capsule->bootEloquent();

	}


	//	USING MYSQL PDO TO CONNECT TO DATABASE
	public function connectUsingPDO(){
		try{
			$conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}",$this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->connection = $conn; 
		}catch(PDOException $e){
			pnd('Connection failed '.$e->getMessage());
		}

		//pnd('connection worked');
	}


	public function selectData($sql, $tablename){
		try{
			
			$getData = $this->connection->prepare($sql);
			$getData->execute();
			$results = $getData->fetchAll();
		
			foreach($results as $result){
				pr($result['id']);
				pr($result['fullname']);
				pr($result['city']);
			}

		}catch(PODException $e){
			echo ('Could not get records');
		}
	}

	public function createData($sql, $tablename){

		try{
			$result = $this->connection->exec($sql);
			echo ('new record created');
		}catch(PDOException $e){
			echo ($e->message);
		}
		
		$this->connection = null;
	}

	public function createTable($sql, $tablename){

		if($this->connection->query($sql)){
			echo ('new table created');
		}else{
			echo ($this->connection->error);
		}
		$this->connection=null;
		
	}

	



}




?>