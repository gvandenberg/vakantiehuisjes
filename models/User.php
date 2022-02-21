<?php   
 
class User extends DbHuisje {  

	public function __construct()
	{
		parent::__construct(DB_SERVER, DB_DBNAME, DB_USERNAME, DB_PASSWORD);
		$this->connect();
	}

	public function getUserByAccount($data)
	{  
		$sql = "SELECT * FROM users 
			WHERE email = :email AND password = :password"; 
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('email', $data['email']);
		$stmt->bindParam('password', $data['password']);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function checkIfUserExists($data) { 
		$sql = "SELECT * FROM users WHERE email = :email";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('email', $data['email']);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function createUserInfo($data)
	{	
		$data = [
			'email' => str_replace(' ', '', $_POST['email']),
			'name' => str_replace(' ', '', $_POST['name']),
			'birthday' => str_replace(' ', '', $_POST['birthday']),
			'phone' => str_replace(' ', '', $_POST['phone']),
			'city' => str_replace(' ', '', $_POST['city']),
			'street' => str_replace(' ', '', $_POST['street']),
			'postalcode' => str_replace(' ', '', $_POST['postalcode']),
			'country' => str_replace(' ', '', $_POST['country']),
			'user_id' => $_SESSION['user']['id']
		];
		
		$stmt = $this->conn->prepare('
			INSERT INTO user_info (email, name, birthday, phone, city, street, postalcode, country, user_id) 
			VALUES (:email, :name, :birthday, :phone, :city, :street, :postalcode, :country, :user_id)
		');
		$stmt->execute($data);
	}

	public function createUser($data) {

		$data = array(  
			'first_name' => str_replace(' ', '', $_POST['first_name']),
			'last_name' => str_replace(' ', '', $_POST['last_name']),
			'email' => stripslashes($_POST['email']),
			'password' => str_replace(' ', '', $_POST['password'])
			
		);

		$stmt = $this->conn->prepare('
			INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)	
		');
		$stmt->execute($data);
	}

	public function getAccountById()
	{
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM users WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $user_id);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function updateAccount($data)
	{
		$stmt = $this->conn->prepare('
			UPDATE users SET
				first_name = :first_name,
				last_name = :last_name,
				phone_number = :phone_number,
				address = :address,
				postalcode = :postalcode,
				city = :city,
				country = :country,
				birthday = :birthday
			WHERE id = :id
		');
		
		$stmt->execute($data);
	}

	public function addFalseLoginTry($ip){
		$date = new DateTime();
		$datetime2 = $date->getTimestamp();
		$data = array(
			'ip' => $ip,
			'time' => $datetime2
		);
		$stmt = $this->conn->prepare('
			INSERT INTO falselogins (ip, time) VALUES (:ip, :time)	
		');
		$stmt->execute($data);
	}

	public function getLoginTries($ip){
		$sql = "SELECT count(*) FROM falselogins WHERE ip = :ip";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('ip', $ip);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function getFistLoginTry($ip) {
		$sql = "SELECT * FROM falselogins WHERE ip = :ip LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('ip', $ip);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function removeLoginTries($ip){
		$sql = "DELETE FROM falselogins WHERE ip = :ip";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('ip', $ip);
		$stmt->execute();
	}

}  

 ?>