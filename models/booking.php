<?php

// class Auto is een subclass van class DbAuto
class Booking extends DbHuisje {

	public function __construct()
	{
		parent::__construct(DB_SERVER, DB_DBNAME, DB_USERNAME, DB_PASSWORD);
		$this->connect();
	}
  
	// Add a new car into the database.
	public function createBooking($data)
	{	
        $data = [
			'house_id' => $_SESSION['house_id'],
			'user_id' => $_SESSION['user']['id'],
			'start_date' => str_replace(' ', '', $_POST['start_date']),
			'end_date' => str_replace(' ', '', $_POST['end_date']),
			'number_persons' => str_replace(' ', '', $_POST['number_persons'])
		];

		$stmt = $this->conn->prepare('
			INSERT INTO bookings (house_id, user_id, start_date, end_date, number_persons) 
			VALUES (:house_id, :user_id, :start_date, :end_date, :number_persons)
		');
		$stmt->execute($data);
    }

	public function sendMail($data, $houseData){
		$data = [
			'house_id' => $_SESSION['house_id'],
			'user_id' => $_SESSION['user']['id'],
			'start_date' => str_replace(' ', '', $_POST['start_date']),
			'end_date' => str_replace(' ', '', $_POST['end_date']),
			'number_persons' => str_replace(' ', '', $_POST['number_persons'])
		];
		

		require_once 'vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf();
		ob_start();
		include "views/layouts/reservationpdf.php"; 
		$html = ob_get_contents();
		ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$content = $mpdf->Output('', 'S');
	

		$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
			->setUsername('e0911a78341101')
			->setPassword('747ca791e70f53')
		;
			
		$mailer = new Swift_Mailer($transport);
		$attachment = new Swift_Attachment($content, 'reservering.pdf', 'application/pdf');

		$message = (new Swift_Message('Bevestiging reservering'))
			->setFrom(['reservering@vakantiehuisjes.nl' => 'Vakantiehuisjes'])
			->setTo([$_SESSION['user']['email']])
			->setBody('Bedankt voor uw reservering!<br>In de bijlage kunt u de reservering inzien')
			->attach($attachment)
		;

		$result = $mailer->send($message);
		return $mpdf;
	}

	public function getHouseIdByBookingId($id){
		$sql = "SELECT * FROM bookings WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function findBookingsByUserId($user_id)
	{
		$sql = "SELECT * FROM bookings WHERE user_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $user_id);
		$stmt->execute();

		return $stmt->fetchAll();
		
	}

	public function cancelBooking($id)
	{
		$sql = "DELETE FROM bookings WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();
	}

	public function getAllBookings(){
		$sql = "SELECT * FROM bookings";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function generatePDF($id){
		$sql = "SELECT * FROM bookings WHERE id=:id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();
		$frmData = $stmt->fetchAll();
		$data = $frmData[0];

		require_once 'vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf();
		ob_start();
		include "views/layouts/reservationpdf.php"; 
		$html = ob_get_contents();
		ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output('reservering.pdf', 'D');
	}
}