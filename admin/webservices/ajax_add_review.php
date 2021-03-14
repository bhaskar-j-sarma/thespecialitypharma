<?php
	
	include('../classes/functions.php');
	$con = new functions();
	session_start();
	
	function seo_url($vp_string){
	$vp_string = trim($vp_string);
	$vp_string = html_entity_decode($vp_string);
	$vp_string = strip_tags($vp_string);
	$vp_string = strtolower($vp_string);
	$vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
	$vp_string = preg_replace('~ ~', '-', $vp_string);
	$vp_string = preg_replace('~-+~', '-', $vp_string);
	$vp_string .= "/";
	return $vp_string;
}

	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_blogs'){

		//$added_by = $_SESSION['user_id'];
		$added_by = '1';

		$check_duplicate = "SELECT person_name FROM review WHERE person_name = '".$_REQUEST['person_name']."' ";
		$check_result = $con->data_select($check_duplicate);

		if($check_result == 'no'){
			$person_name = $_REQUEST['person_name'];
			$blogs_main_image = "default_blogs.jpg";
			$tempUploadedValue = 0;
			$result_insert_blogs = 0;
			if (isset($_FILES['blogs_main_image'])){
				//echo "zia"; exit;
				//echo "zia/".$_FILES['blogs_main_image']['name']; exit;
				if ( 0 < $_FILES['blogs_main_image']['error'] ) 
				{
			        echo $_FILES['blogs_main_image']['error']; exit;
			        //echo "zia"; exit;
			    }
			    else 
			    {
			    	
			    	$myFile = $_FILES['blogs_main_image']['name'];
			    	$allowed_extensions = array('jpg','png','gif','PNG','JPEG','jpeg','JPG','GIF');
			    	$file = explode(".", $_FILES['blogs_main_image']['name']);
				    $extension = array_pop($file);
				    $blogs_main_image="BlogImage".time()."".date('Ymd').".".$extension;
				    //$url = str_replace(' ', '%20', $baseurl.$value['file']);
				    if (in_array($extension, $allowed_extensions)) 
					{ 
						$source=$_FILES['blogs_main_image']['tmp_name'];
						$target = "../blogs_images/".$blogs_main_image;
						$tempUploadedValue=move_uploaded_file($source, $target);		       
					}
					else {
						echo "Only 'jpg','png','gif','jpeg' file format is allowed";
					}
			    }
			}
			$description = $_REQUEST['description'];		

	    	$sql_insert_blogs = "INSERT INTO review(person_name, description, image) VALUES ('".$person_name."','".addslashes($description)."','".$blogs_main_image."')";
			if($tempUploadedValue){
				$result_insert_blogs = $con->data_insert($sql_insert_blogs);
			}			
			if($result_insert_blogs == 1){
				echo 1;
				exit;
			}else{
				echo 0;
				exit;
			}
		}
		else{
			echo 2;
			exit;
		}

		
	}
?>