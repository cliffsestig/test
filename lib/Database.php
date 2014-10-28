<?php

class Database{
	
	// Properties:

	// Naam van database
	// Wachtwoord van database
	// Username van database
	// Host
	// Driver
	// stmt //Die houdt de query vast
	// conn

	private $dbname;
	private $password;
	private $username ;
	private $host;
	private $driver;
	private $error;

	private $stmt;
	private $conn;

	public function __construct($dbname, $password, $username, $host){
		$this->dbname = $dbname;
		$this->password = $password;
		$this->username = $username;
		$this->host = $host;

		try {
			$this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOExcetiopn $e) {
			$this->error = $e->getMessage();
		}

	}
	public function query($query){
		$this->stmt = $this->conn->prepare($query);

	}
	public function bind($param, $value){
		$this->stmt->bindParam($param, $value);
	}

	public function getAll(){
		$this->stmt->execute();
		return $this->stmt->fetchall(PDO::FETCH_OBJ);
	}



	//Methods:

	// Connectie kunnen maken
	// Query uitvoeren
	// Error afhandeling
	// Query uitvoeren
	// parameters binden
	// Alles fetchen
	// Eén item fetchen

}