<?php require_once ('models/review.php');
require_once ('models/booking.php');

class ReviewController
{
    private $review;
    private $booking;

	public function __construct()
	{
		$this->review = new Review();
        $this->booking = new Booking();
	}

    // public function getReviewsByHouseId($id)
    // {
    //     $frmData = $this->review->getReviewsByHouseId($id);
    // }

    public function showReviewForm($id){
        require_once ('views/reviewform.php');
    }

    public function addReview($id){
        $house_id = $this->booking->getHouseIdByBookingId($id);
        $data = [
			'stars' => $_POST['stars'],
			'title' => $_POST['title'],
			'description' => $_POST['description'],
            'house_id'=> $house_id[0]['house_id'],
            'user_id' => $_SESSION['user']['id'],
            'date' => date("Y/m/d")
		];

        $this->review->createReview($data);

        header('Location: '. APP_BASE_URL .'/bookings/overview');
    }

}