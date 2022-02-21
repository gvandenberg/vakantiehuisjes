<?php

require_once ('models/User.php');

class AuthenticationController 
{
	private $user;

	public function __construct()
	{
		$this->user = new User();
	}

	public function validate($data) 
	{  
		$validation = true;  
	   	foreach ($data as $key => $value) {  
			if (empty($value)) {  
				$validation = false;  
				$this->error .= $key . " invullen is verplicht<br />";  
			}  
	   }  

		return $validation;  
	}
	
	public function showLogin()
	{	
		$count = $this->user->getLoginTries($_SERVER['REMOTE_ADDR']);
		$datedb = $this->user->getFistLoginTry($_SERVER['REMOTE_ADDR']);
		$date = new DateTime();
		$stamp = $date->getTimestamp();
		
		if ($count[0] >= 3) {
			if (($datedb['time'] + 300) > $stamp){
				$datetime1 = $datedb['time'];
				$date = new DateTime();
				$datetime2 = $date->getTimestamp();
				$seconds_diff = $datetime2 - $datetime1;                            
				$time = ($seconds_diff/60);
				$time1 = 300 - $seconds_diff;
				$min = floor($time1/60);
				$sec = $time1 - $min*60;
				require_once ('views/falselogin.php');
			} else{
				$this->user->removeLoginTries($_SERVER['REMOTE_ADDR']);
				require_once ('views/login.php');
			}
		} else {
			require_once ('views/login.php');
		}
		
	}



	public function checkLogin()
	{
		$data = array(  
			'email' => stripslashes($_POST['email']),  
			'password' => stripslashes($_POST['password'])  
		);

		if ($this->validate($data)) 
		{
			$row = $this->user->getUserByAccount($data);

			if ($row) {
				$this->user->removeLoginTries($_SERVER['REMOTE_ADDR']);
				$_SESSION['user'] = $row;
				header('Location: '. APP_BASE_URL .'/home'); 
			
			} else {
				$this->user->addFalseLoginTry($_SERVER['REMOTE_ADDR']);
				$message = 'Onjuiste gebruikersnaam en/of wachtwoord!'. $_SERVER['REMOTE_ADDR'];  
				header('Location: '. APP_BASE_URL .'/login');
			
			}
		} else {
			$message = $this->error; 
			header('Location: '. APP_BASE_URL .'/login');
		}
	}


	public function showRegister() {
		require_once ('views/register.php');
	}

	public function checkRegister() {
		$data = array(  
			'first_name' => str_replace(' ', '', $_POST['first_name']),
			'last_name' => str_replace(' ', '', $_POST['last_name']),
			'email' => stripslashes($_POST['email']),
			'password' => str_replace(' ', '', $_POST['password']),
			'password_repeat' => str_replace(' ', '', $_POST['password_repeat'])
		);

		if ($this->validate($data)) {
			if ($_POST['password'] == $_POST['password_repeat']){ 
				$row = $this->user->checkIfUserExists($data);

				if ($row == 0) {
					$this->user->createUser($data);
					header('Location: '. APP_BASE_URL .'/login');
				}
				else{
					$message = "E-mail is al in gebruik!";
					require_once ('views/register.php');
				}
			}
			else{
				$message = "Wachtwoorden komen niet overeen";
				require_once ('views/register.php');
			}
		}
		else{
			$message="Niet alle verplichte velden zijn ingevuld!";
			require_once ('views/register.php');
		}
	}

	public function showAccount()
	{
		$frmData = $this->user->getAccountById();
		require_once ('views/account.php');
	}

	public function saveAccount()
	{	
		$data = [
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'phone_number' => $_POST['phone_number'],
			'address' => $_POST['address'],
			'postalcode' => $_POST['postalcode'],
			'city' => $_POST['city'],
			'country' => $_POST['country'],
			'birthday' => $_POST['birthday'],
			'id' => $_SESSION['user']['id']
		];

		$this->user->updateAccount($data);
		$_SESSION['user'] = $data;
		header('Location: '. APP_BASE_URL .'/account');
	}

	public function logOut()
	{
		session_destroy();
		header('Location: '. APP_BASE_URL .'/home'); exit;
	}
	
}