<?php

class Createdb
{
	public $servername;
	public $username;
	public $password;
	public $dbname;
	public $tablename;
	public $con;





	public function __construct(
		$dbname="Newdb",
		$tablename ="Orders",
		$servername="localhost",
		$username="root",
		$password=""




	)
	{
		$this->dbname=$dbname;
		$this->tablename=$tablename;
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;


		//create connection

		$this->con=mysqli_connect($servername,$username,$password);

		//check connection
		if(!$this->con)
		{
			die("Connection failed : ".mysqli_connect_error());
		}

		//query
		$sql="CREATE DATABASE IF NOT EXISTS $dbname";

		//execute query
		if(mysqli_query($this->con,$sql))
		{
			$this->con=mysqli_connect($servername,$username,$password,$dbname);


			//sql create new table
			$sql="CREATE TABLE IF NOT EXISTS $tablename(Username VARCHAR(25) NOT NULL PRIMARY KEY,
			Product Name VARCHAR(25) NOT NULL,Product Price FLOAT,
			Product Image VARCHAR(100) );";



			if(!mysqli_query($this->con,$sql))
			{
				echo "Error creating table: ".mysqli_error($this->con);
			}
		
		}else
			{
				return false;
			}


	}


	public function getData()
	{
		$sql="SELECT *FROM $this->tablename";



		$result=mysqli_query($this->con,$sql);

		if(mysqli_num_rows($result)>0)
		{
			return $result;
		}
	}
}






?>	