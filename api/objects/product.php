<?php 
	class Product{
		// database connection and table names

		private $conn;
		private $table_name = "products";

		// object properties
		public $id;
		public $name;
		public $description;
		public $price;
		public $category_id;
		public $category_name;
		public $created;

		// constructor with $dbb as database connection
		public function __construct($db){
			$this->conn = $db;
		}

		public function read(){
			//select all query
			$query = "Select c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created 
					  from ".$this->table_name." p left join categories c on p.category_id=c.id order by p.created desc";

			//prepare query statement
			$stmt = $this->conn->prepare($query);

			// execute query
			$stmt->execute();

			return $stmt;
		}
	}
	


?>