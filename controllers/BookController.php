<?php

require_once ('Models/booking.php');
require_once ('models/User.php');
require_once ('models/house.php');


class BookController
{
	private $booking;
	private $user;
	private $house;

	public function __construct()
	{
		$this->booking = new Booking();
		$this->user = new User();
		$this->house = new House();
	}

	public function showBookForm($id)
	{
		$frmData = $this->user->getAccountById();
		require_once ('views/booking-form.php');
	}

	public function showBookFormDate($id)
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
		require_once ('views/booking-form-date.php');
	}

	public function finishBooking($id)
	{	
		$_SESSION['house_id'] = $id;
		$data = [
			'house_id' => $_SESSION['house_id'],
			'user_id' => $_SESSION['user']['id'],
			'start_date' => str_replace(' ', '', $_POST['start_date']),
			'end_date' => str_replace(' ', '', $_POST['end_date']),
			'number_persons' => str_replace(' ', '', $_POST['number_persons'])
		];

		$this->booking->createBooking($data);
		$houseData = $this->house->getHouseById($data['house_id']);
		$this->booking->sendMail($data, $houseData);
		require_once ('views/booking-finish.php');
	}

	public function cancelBooking($id)
	{
		$this->booking->cancelBooking($id);
		header('Location: '. APP_BASE_URL .'/bookings/overview');
	}

	public function showBookings()
	{
		$user_id = $_SESSION['user']['id'];
		$frmData = $this->booking->findBookingsByUserId($user_id);
		require_once ('views/booking-overview.php');
	}

	public function generatePDF($id){
		$this->booking->generatePDF($id);
		header('Location: '. APP_BASE_URL .'/bookings/overview');
	}

	

}