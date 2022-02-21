<?php

require_once ('models/admin.php');
require_once ('models/user.php');

class AdminController 
{
	private $admin;

	public function __construct()
	{
		$this->admin = new Admin();
	}

    public function showReviews()
    {
        $frmData = $this->admin->showReviews();
        require_once('views/layouts/header.php');
        require_once ('views/admin/reviews.php');
        require_once('views/layouts/footer.php');
    }

    public function checkReview($id){
        $this->admin->checkReview($id);
        header('Location: '. APP_BASE_URL .'/admin/reviews');
    }

    public function deleteReview($id){
        $this->admin->deleteReview($id);
        header('Location: '. APP_BASE_URL .'/admin/reviews');
    }

    public function lol(){
        require_once ('views/lol.php');
    }
}