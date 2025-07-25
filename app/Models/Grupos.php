<?php

namespace App\Models;

Class Grupos extends DB {

	private object $conn;
    private array $dados;

	public function __construct() {

		$this->conn = $this->conectar();
	}

	public function index() {
	    $sql = "SELECT * FROM grupos ORDER BY nome ASC";
	    $query = $this->conn->query($sql);

	    if ($query && $query->num_rows > 0) {
	        while ($row = $query->fetch_assoc()) {
	            $grupos[] = $row;
	        }
	        return $grupos;
	    }

	    return 0;
	}
}