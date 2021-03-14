 <?php 
error_reporting(1);
ini_set('display_errors', 'On');
include_once('../classes/class.datatable.php');
$datatable_obj = new datatable();

include('../classes/functions.php');
$con = new functions();

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

function shorten_string($string, $wordsreturned){
	$retval = $string;

	$array = explode(" ", $string);
	if (count($array)<=$wordsreturned){
		$retval = $string;
	}else{
		array_splice($array, $wordsreturned);
		$retval = implode(" ", $array)." ...";
	}
	return $retval;
}


	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_all_blogs'){

		$get_all_blogs = "SELECT * FROM products ORDER BY id DESC";

		$result_get_all_blogs = $con->data_select($get_all_blogs);

		if($result_get_all_blogs !='no'){

			$sr = 1;
			$tr = '';
			//$status='';
			foreach ($result_get_all_blogs as $key => $value) {
				
					if($result_get_all_blogs[$key]['approvel'] == 1)
					{
						$approvel = '<button type="button" data-id="'.$result_get_all_blogs[$key]['id'].'" data-status="1" class="btn btn-info btn-xs blogs_status">Active</button>';
					}
					else
					{
						$approvel = '<button type="button" data-id="'.$result_get_all_blogs[$key]['id'].'" data-status="0" class="btn btn-warning btn-xs blogs_status">In-Active</button>';
					}

				  $tr .= "<tr>";
				  		//$tr .="<td><input class='checkbox' type='checkbox' name='id[]' id=".$result_get_all_blogs[$key]['id']."></td>";
                        $tr .= "<td>".$result_get_all_blogs[$key]['id']."</td>";
                        $tr .= "<td>".$result_get_all_blogs[$key]['product_name']."</td>";
                        $tr .= "<td>".$result_get_all_blogs[$key]['category_name']."</td>";
                        $tr .= "<td>".$result_get_all_blogs[$key]['created_at']."</td>";
                        //$tr .= "<td>".$result_get_all_blogs[$key]['updated']."</td>";
                        $tr .= "<td style=''><div class='btn-group'>".$approvel."</div></td>";
				//$html .= '<td>'.$result_get_all_slider[$key]['status'].'</td>';
				$tr .= '<td style="width:16%;"><div class="btn-group"><button type="button" data-id="'.$result_get_all_blogs[$key]['id'].'" class="btn btn-success btn-xs view_manage_blogs">View</button>
				<button type="button" data-id="'.$result_get_all_blogs[$key]['id'].'" class="btn btn-danger btn-xs delete_blogs">Delete</button>
				</div></div></td>';
				$tr .= '</tr>';
				$sr++;
			}
			echo $tr;
			
			exit;
		}
	}

	//Update Blogs......
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit_manage_blogs'){

		//$added_by = $_SESSION['user_id'];

		$product_name = $_REQUEST['product_name'];
		$blogs_main_image = $_REQUEST['hidden_img_name'];

			if (file_exists($_FILES['manage_blogs_main_image']['tmp_name'])){
					//echo "ziaa"; exit;
			    	$myFile = $_FILES['manage_blogs_main_image']['name'];
			    	$allowed_extensions = array('jpg','png','gif','PNG','JPEG','jpeg','JPG','GIF');
			    	$file = explode(".", $_FILES['manage_blogs_main_image']['name']);
				    $extension = array_pop($file);
				    $blogs_main_image="BlogImage".time()."".date('Ymd').".".$extension;
				    if (in_array($extension, $allowed_extensions)) 
					{ 
						$source=$_FILES['manage_blogs_main_image']['tmp_name'];
						$target = "../blogs_images/".$blogs_main_image;
						$tempUploadedValue=move_uploaded_file($source, $target);		       
					}
					else {
						echo "Only 'jpg','png','gif','jpeg' file format is allowed";
					}
			    
			}
		
		//$description = mysql_real_escape_string($_REQUEST['description']);
		
		$product_name = str_replace("'","\'", $_REQUEST['product_name']);
		$category_name = $_REQUEST['category_name'];
		$brand_name = $_REQUEST['brand_name'];
		$price = $_REQUEST['price'];
		$packaging_type = $_REQUEST['packaging_type'];
		$application = $_REQUEST['application'];
		$packaging_size = $_REQUEST['packaging_size'];
		$dosage_form = $_REQUEST['dosage_form'];
		$fom = $_REQUEST['fom'];
		$description = $_REQUEST['description'];
		$url = seo_url($product_name);
			
		$sql_update_blogs = "UPDATE products SET product_name='".$product_name."', category_name='".$category_name."', brand_name='".$brand_name."', price='".$price."',description='".addslashes($description)."', tbumb_image = '".$blogs_main_image."', url = '".$url."', packaging_type='".$packaging_type."', application='".$application."', packaging_size='".$packaging_size."', dosage_form='".$dosage_form."', form_of_medicine='".$fom."' WHERE id=".$_REQUEST['id'];
		/*echo $_REQUEST['hidden_img_name']."   ".$sql_update_infrastructure;
		 exit;*/
		$result_update_blogs = $con->data_update($sql_update_blogs);

		if($result_update_blogs == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
	}
	
	//Delete Blogs
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_blogs'){

		$sql_delete = "DELETE FROM products WHERE id = ".$_REQUEST['id'];
		$result_delete = $con->data_delete($sql_delete);
		if($result_delete == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
	}

	//Change Status.
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'blogs_status'){

		if($_REQUEST['status'] == 1)
		{
			$sql_status = "UPDATE products SET approvel = 0 WHERE id = ".$_REQUEST['id'];
		}
		else
		{
			$sql_status = "UPDATE products SET approvel = 1 WHERE id = ".$_REQUEST['id'];
		}
		
		$result_status = $con->data_update($sql_status);
		if($result_status == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
	}

?>
