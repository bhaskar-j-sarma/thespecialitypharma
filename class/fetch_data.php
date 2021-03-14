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
 			$result=mysqli_query($this->dbh,"SELECT * FROM blogs WHERE approvel = 1");
 			return $result;
		 }
		 public function all_products()
 		{
 			$result=mysqli_query($this->dbh,"SELECT * FROM products WHERE status = 1");
 			return $result;
 		}


 		public function all_product_image_list(){
 			$result=mysqli_query($this->dbh,"SELECT * FROM products, image WHERE products.id = image.product_id");
 			return $result;
 		}

 		public function selected_categories_products($url){
 			$result=mysqli_query($this->dbh,"SELECT products.product_name, products.tbumb_image, products.price, products.brand_name, products.approvel, products.url FROM products, blogs WHERE blogs.title = products.category_name AND blogs.url = '$url'");
 			return $result;
		 }
		 public function select_category($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM blogs WHERE url = '$url'");
			return $result;
		}

 		public function selected_products($url){
 			$result=mysqli_query($this->dbh,"SELECT * FROM products WHERE category_name = '$url'");
 			return $result;
		 }
		 public function selected_product($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM products WHERE url = '$url' LIMIT 1");
			return $result;
		}

 		public function selected_products_images($url){
 			$result=mysqli_query($this->dbh,"SELECT image.image FROM products, image WHERE products.id = image.product_id AND products.url = '$url'");
 			return $result;
 		}

 		public function top_review(){
 			$result=mysqli_query($this->dbh,"SELECT * FROM review ORDER BY id DESC LIMIT 4");
 			return $result;
 		}

 		public function review_list(){
 			$result=mysqli_query($this->dbh,"SELECT * FROM review ORDER BY id DESC");
 			return $result;
 		}

 		
	}
?>