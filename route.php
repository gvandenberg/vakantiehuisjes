<?php

class Route
{
	private $route;
	private $segments;

	public function __construct($route)
	{
		$this->route = preg_replace('/(.*\/project-periode-9-gvandenberg\/)/', '', $route);
		$this->segments = explode('/', $this->route);

		if ($this->route == '') {
			header('Location: ' . APP_BASE_URL . '/home');
			exit;
		}
	}

	public function start()
	{
		$route = $this->findRoute();
		$params = $this->getParams();

		if ($route) {
			$controller = explode('@', $route)[0];
			$method = explode('@', $route)[1];

			require_once('Controllers/' . $controller . '.php');
			$controller = new $controller;

			call_user_func_array(array($controller, $method), $params);
		} else {
			require_once('views/404.php');
			exit;
		}
	}

	public function findRoute()
	{
		$routes = [
			'home' => 'HouseController@showHouses',
			'huisjes/overzicht' => 'HouseController@showHouses',
			'auto/overzicht/zoeken' => 'CarController@showCarsBySearch',
			'auto/overzicht/zoeken/merk' => 'CarController@showCarsBySearchMerk',
			'house/add' => 'HouseController@showFormHouse',
			'house/add/save' => 'HouseController@addToHouses',
			'house/edit/{param}' => 'HouseController@showHouseByIdEdit',
			'house/edit/save' => 'HouseController@updateHouseById',
			'house/delete/{param}' => 'HouseController@deleteHouseById',
			'login' => 'AuthenticationController@showLogin',
			'login/check' => 'AuthenticationController@checkLogin',
			'logout' => 'AuthenticationController@logOut',
			'register' => 'AuthenticationController@showRegister',
			'register/check' => 'AuthenticationController@checkRegister',
			'house/details/{param}' => 'HouseController@showHouseById',
			'house/overview' => 'HouseController@showHousesBySeller',
			'book/{param}' => 'BookController@showBookForm',
			'book/date/{param}' => 'BookController@showBookFormDate',
			'book/finish/{param}'=> 'BookController@finishBooking',
			'book/viewpdf/{param}' => 'BookController@showPDF',
			'bookings/overview' => 'BookController@showBookings',
			'results' => 'HouseController@showHousesByResult',
			'account' => 'AuthenticationController@showAccount',
			'account/save' => 'AuthenticationController@saveAccount',
			'booking/cancel/{param}' => 'BookController@cancelBooking',
			'review/{param}' => 'ReviewController@showReviewForm',
			'addReview/{param}' => 'ReviewController@addReview',
			'admin/reviews' => 'AdminController@showreviews',
			'admin/checkreview/{param}' => 'AdminController@checkReview',
			'admin/deletereview/{param}' => 'AdminController@deleteReview',
			'booking/downloadpdf/{param}' => 'BookController@generatePDF'
		];

		if (isset($_SESSION['user'])){
			if ($_SESSION['user']['role'] == 'admin'){
				$routes['admin/reviews'] == 'AdminController@showreviews';
			}
		}

		foreach ($routes as $route => $action) {
			$tmp_replace_param = preg_replace('/[0-9]+/', '{param}', $this->route);
			$tmp_replace_get = preg_replace('/\?.+/', '', $this->route);
			if ($route == $tmp_replace_param || $route == $tmp_replace_get) {
				return $action;
			}
		}
		return;
	}


	public function getParams()
	{
		$params = [];
		foreach ($this->segments as $key => $segment) {

			if (is_numeric($segment)) {
				$params[] = $segment;
			}
		}

		if (count($params) == 0 && strstr($this->route, '?')) {
			$params[] = preg_replace('/.*=/', '', $this->route);
		}

		return $params;
	}
}