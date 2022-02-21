<?php

// class Auto is een subclass van class DbAuto
class House extends DbHuisje {



	public function __construct()
	{
		parent::__construct(DB_SERVER, DB_DBNAME, DB_USERNAME, DB_PASSWORD);
		$this->connect();
	}
  
	// Add a new car into the database.
	public function createHouse()
	{	
		// alle spaties verwijderen
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
		
		$stmt = $this->conn->prepare('
			INSERT INTO houses (type, capacity, price, country, city, title, description, image, seller_id) 
			VALUES (:type, :capacity, :price, :country, :city, :title, :description, :image, :seller_id)
		');
		$stmt->execute($data);
	}

	public function setImageHouse($id)
	{	
		$data = [
			'path' => $_SESSION['imgName'],
			'type' => 'image',
			'house_id' => $data['house_id']
			
		];
		
		$stmt = $this->conn->prepare('
			INSERT INTO files (path, type, house_id) 
			VALUES (:path, :type, :house_id)
		');
		$stmt->execute($data);
	}

	public function checkAvailability($datacheck){
		$sql = "SELECT * FROM bookings 
		WHERE 
		(:date_start < start_date AND :end_date < start_date) OR  
		(:date_start > end_date AND :end_date > end_date)
		AND house_id = :id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('date_start', $datacheck['date_start']);
		$stmt->bindParam('end_date', $datacheck['end_date']);
		$stmt->bindParam('id', $datacheck['id']);
		$stmt->execute();
		$stmt->fetchAll();
		return $stmt->rowCount();

	}
	
	public function getHousesByResult($data){
		$sql = 'SELECT * FROM houses WHERE country = :country ORDER BY title, type';
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('country', $data['country']);
		$stmt->execute();

		return $stmt->fetchAll();
	}
	
	public function updateHouse($data)
	{	
		$stmt = $this->conn->prepare('
			UPDATE houses SET
				type = :type,
				capacity = :capacity, 
				price = :price, 
				country = :country, 
				city = :city, 
				title = :title, 
				description = :description
			WHERE id = :id
		');
		
		$stmt->execute($data);
	}

	public function deleteHouseById($id)
	{
		$sql = "DELETE FROM houses WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();
	}

	public function getAllHouses() 
	{
		$sql = 'SELECT * FROM houses ORDER BY title, type';
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
    }

	
	
	public function getImagesByHouseId($id)
	{
		$sql = "SELECT * FROM files WHERE house_id = :id AND type = 'image'";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function getHouseById($id)
	{
		$sql = "SELECT * FROM houses WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();

		return $stmt->fetch();
	}

	public function getHousesBySeller($id)
	{
		$sql = "SELECT * FROM houses WHERE seller_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function getUserIdByHouseId($id){
		$sql = "SELECT seller_id FROM houses WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();

		return $stmt->fetch();
	}
}