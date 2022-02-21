<?php

class review extends DbHuisje {

    public function __construct()
	{
		parent::__construct(DB_SERVER, DB_DBNAME, DB_USERNAME, DB_PASSWORD);
		$this->connect();
	}

    

    public function	createReview($data)
	{
		$stmt = $this->conn->prepare('
			INSERT INTO reviews (stars, title, description, house_id, user_id, date) 
			VALUES (:stars, :title, :description, :house_id, :user_id, :date)
		');
		$stmt->execute($data);
	}

	public function getReviewsByHouseId($id)
	{
		$sql = 'SELECT * FROM reviews WHERE house_id = :id AND approved = "yes"';
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}
}