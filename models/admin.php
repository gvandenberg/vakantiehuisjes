<?php

class admin extends DbHuisje {



	public function __construct()
	{
		parent::__construct(DB_SERVER, DB_DBNAME, DB_USERNAME, DB_PASSWORD);
		$this->connect();
	}

    public function showReviews()
    {
        $sql = 'SELECT * FROM reviews WHERE approved = "no" ORDER BY id';
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
    }

    public function checkReview($id)
    {
        $stmt = $this->conn->prepare('
			UPDATE reviews SET
				approved = "yes"
			WHERE id = :id
		');

        $stmt->bindParam('id', $id);
		$stmt->execute();
    }

    public function deleteReview($id)
    {
        $sql = "DELETE FROM reviews WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam('id', $id);
		$stmt->execute();
    }

    
}