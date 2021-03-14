<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gautam15_pharma');
define('DB_PASSWORD', 'pharma');
define('DB_NAME', 'gautam15_pharma');
class fetch_data
	{
 		function __construct()
 		{
			$mysqli = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
			$this->dbh=$mysqli;
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 			}
 		}
 		public function all_categories()
 		{
 			$result=mysqli_query($this->dbh,"SELECT * FROM blogs");
 			return $result;
 		}
 		public function all_product_image_list(){
 			$result=mysqli_query($this->dbh,"SELECT * FROM products, image WHERE products.id = image.product_id");
 			return $result;
 		}
 		public function all_review_list(){
 			$result=mysqli_query($this->dbh,"SELECT * FROM review");
 			return $result;
		 }
		 public function all_orders_list(){
			$result=mysqli_query($this->dbh,"SELECT * FROM orders ORDER BY id DESC");
			return $result;
		}
	}
?>