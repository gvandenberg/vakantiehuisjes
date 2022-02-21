<?php

require_once ('Models/House.php');
require_once ('Models/review.php');
require_once ('Models/booking.php');

class HouseController
{
	private $house;
	private $review;
	private $booking;

	public function __construct()
	{
		$this->house = new House();
		$this->review = new Review();
		$this->booking = new Booking();
	}

	public function showHouses()
	{
		$data = $this->house->getAllHouses();
		require_once ('views/home.php');
	}

	
		
	public function showFormHouse()
	{
		require_once ('views/house-add.php');
	}


	public function addToHouses()
	{
		if ($this->validate($_POST)) {
			$_SESSION['imgName'] = time() . '_' . $_FILES['houseimg']['name'];
			$target = 'C:\xampp\htdocs\project-periode-9-gvandenberg/resources/img/' . $_SESSION['imgName'];
			move_uploaded_file($_FILES['houseimg']['tmp_name'], $target);


		
			$data = [
				'type' => str_replace(' ', '', $_POST['type']),
				'capacity' => str_replace(' ', '', $_POST['capacity']),
				'price' => str_replace(' ', '', $_POST['price']),
				'country' => str_replace(' ', '', $_POST['country']),
				'city' => str_replace(' ', '', $_POST['city']),
				'title' => str_replace(' ', '', $_POST['title']),
				'description' => str_replace(' ', '', $_POST['description']),
				'image' => $_SESSION['imgName'],
				'seller_id' => $_SESSION['user']['id']
				
			];
			
			$this->house->createHouse($data);
			
			
			


			header('Location: '. APP_BASE_URL .'/home'); exit;
	
		} else { 
	
			$frmData = $_POST;
			$message = $this->error; 
			require_once ('views/house-add.php');
		
		}  
	}

	public function showHouseById($id)
	{
		$frmData = $this->house->getHouseById($id);
		$data = $this->house->getImagesByHouseId($id);
		$reviews = $this->review->getReviewsByHouseId($id);
		

		require_once ('views/house-detail.php');
	}

	public function showHouseByIdEdit($id)
	{	
		$userid = $this->house->getUserIdByHouseId($id);
		if ($userid['seller_id'] == $_SESSION['user']['id']){
			$frmData = $this->house->getHouseById($id);
			require_once ('views/house-edit.php');
		}
		else {
			require_once ('views/403.php');
		}
		
	}

	public function showHousesBySeller(){
		$id = $_SESSION['user']['id'];
		$bookings = $this->booking->getAllBookings();
		$data = $this->house->getHousesBySeller($id);
		require_once ('views/house-overview.php');
	}

	public function showHousesByResult(){
		$data = [
			'country' => str_replace(' ', '', $_POST['country']),
			'start_date' => $_POST['start_date'],
			'end_date' => $_POST['end_date'],
			'number_persons' => $_POST['number_persons']
		];
		


		$frmData = $this->house->getHousesByResult($data);
		
		// $frmDataView = [];
		// foreach ($frmData as $results){
		// 	$datacheck = [
		// 		'date_start' => $_POST['start_date'],
		// 		'end_date' => $_POST['end_date'],
		// 		'id' => $frmData['id']
		// 	];
		// 	$availability = $this->house->checkAvailability($datacheck);
		// 	if ($availability == 0){
		// 	 	array_push($frmDataView, $results);
		// 	}
		// }
		require_once ('views/result.php');
	}


	public function updateHouseById()
	{	
		
		if ($this->validate($_POST)) {


			$data = [
				'type' => str_replace(' ', '', $_POST['type']),
				'capacity' => str_replace(' ', '', $_POST['capacity']),
				'price' => str_replace(' ', '', $_POST['price']),
				'country' => str_replace(' ', '', $_POST['country']),
				'city' => str_replace(' ', '', $_POST['city']),
				'title' => str_replace(' ', '', $_POST['title']),
				'description' => str_replace(' ', '', $_POST['description']),
				'id' => $_POST['id']
			];

			$this->house->updateHouse($data);
			header('Location: '. APP_BASE_URL .'/home'); exit;
	
		} else {
	
			$frmData = $_POST;
			$message = $this->error; 
			require_once ('views/house-edit.php');
		
		}  
	}

	public function deleteHouseById($id)
	{
		$userid = $this->house->getUserIdByHouseId($id);
		if ($userid['seller_id'] == $_SESSION['user']['id']){
			$this->house->deleteHouseById($id);
			header('Location: '. APP_BASE_URL .'/house/overview');
		}
		else {
			require_once ('views/403.php');
		}
		
	}

	

	public function addReview($id)
	{
		require_once ('views/review.php');
		$data = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'house_id' => $id,
			'user_id' => $_SESSION['user']['id']
		];

		$this->house->addReview($data);
	}
	

	public function validate($data)
	{	
		$check = true;
		$requiredFields = ['type','capacity','price','country', 'city', 'title', 'description'];

		foreach ($requiredFields as $value) {
			if ($data[$value] == '') {
				$check = false;
				$this->error = "Niet alle verplichte velden zijn ingevuld!";  
			}
		}
		return $check;
	}

}