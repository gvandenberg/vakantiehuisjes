<?php

/* 
class DbAuto is de superklasse waarvan andere klassen zijn afgeleid 
*/
class DbHuisje {
  
    private $host;
    private $dbname;
    private $username;
    private $password;

    protected $conn;
    
    public $error;  

	public function __construct($host, $dbname, $username, $password)
	{
		$this->host = $host;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;
	}
            
    public function connect()
    {
        try {
            
            $this->conn = new PDO ('mysql:host='. $this->host .';dbname='. $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) { 

            echo "Connectie met database mislukt: " . $e->getMessage();
            exit;

        }
    }
}

?>