<?php
include('../classes/functions.php');
	$con = new functions();
	session_start(); 

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_rss_link'){
	
	$sql = "SELECT * FROM rss_master WHERE id =".$_REQUEST['id'];
	$result= $con->data_select($sql);
	echo json_encode($result);
	exit;

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_rss'){
	$sql = "SELECT id,rss_title FROM rss_master";
	$result= $con->data_select($sql);
	echo json_encode($result);
	exit;

}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_all_feeds'){
	
	$sql = "DELETE FROM rss_feeds WHERE rss_title_id = ".$_REQUEST['id'];
	$result_delete = $con->data_delete($sql);
	$sql = "DELETE FROM rss_master WHERE id = ".$_REQUEST['id'];
	$result_delete = $con->data_delete($sql);
	if($result_delete == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}

}
///update
if(isset($_POST['action']) && $_POST['action'] == 'update_rss'){
	/*print_r($_POST);
	exit;*/
	$rss = new DOMDocument();
	$rss->load($_POST['rss_link_update']);
	$feed = array();
	

	
	foreach ($rss->getElementsByTagName('item') as $node) {
		$description = $node->getElementsByTagName('description');
		$linkthumb="";
		try {
			$test = $description->item(0)->nodeValue;
			$description = preg_filter('/<a.(.*?)>(.*?)<\/a>/', "",$test);//get Desc
			$linkthumb= preg_match('/src\s*=\s*"([^"]+)"/',$test,$match);//get image src
			if(!empty($match)){
				$linkthumb=$match[1];
			}
			
		} catch (Exception $e) {
			
		}
		
		
		 $nodes = $node->getElementsByTagName('content');
		 // echo "AA->";
		 // print_r($nodes);

		 if(!is_object($nodes) || $nodes === null || $nodes->length==0){
		 	
			 	$linkthumbNode = $node->getElementsByTagName('image');
			 	// echo "A->";
			 	// print_r($linkthumbNode);
			 	
			 	if(isset($linkthumbNode) && $linkthumbNode->length >0){
			 			$linkthumb=$linkthumbNode->item(0)->nodeValue;
			 			

			 			// print_r($linkthumb);
			 			if(empty($linkthumb)||$linkthumb == " "){
				 			
				 			
				 			$linkthumb = $linkthumbNode->item(0)->getAttribute('src');
				 			// echo "C->";
				 			// print_r($linkthumb);
				 		}
				 		
				 	}else{
				 		/*$linkthumb = $linkthumb->item(0)->getAttribute('src');*/
				 		/*$linkthumb = "NO IMAGE";*/
				 }

		 }else{
		 	// echo "D->";
		 	 $linkthumb = $nodes->item(0)->getAttribute('url');
		 }
		
    	 $title = $node->getElementsByTagName('title')->item(0)->nodeValue;
    	 $desc = $description ;
    	 $link = $node->getElementsByTagName('link')->item(0)->nodeValue;
    	 $img = $linkthumb;
    	 $date = $node->getElementsByTagName('pubDate');
    	 if(isset($date) && $date->length >0){
    	 	$date = $date->item(0)->nodeValue;
    	 }else{
			$date = "no date provided";

    	 }
    	 	

		$item = array ( 
			'title' => $title,
			'desc' =>  $desc,
			'link' => $link,
			'img' => $img,
			'date' => $date,
			);
		array_push($feed, $item);
	}


	
	$limit = 1;

	
	for($x=0;$x<$limit;$x++) {
		echo '<p>"'.$limit.'"</p>';
		$title = str_replace(array(' & ', ' &amp; ',"'",' &quot;'),"", $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = str_replace("'",' &quot; ', $feed[$x]['desc']);
		$image = $feed[$x]['img'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		$status = 0 ;
		$sql = "INSERT INTO rss_feeds
		(rss_title_id,rss_title,rss_url,feed_title,feed_img,feed_description,pub_date,status,feed_link) 

		VALUES ('".$_POST['rss_feeds']."','".$_POST['rss_link_name']."','".$_POST['rss_link_update']."','".$title."','".$image."','".$description."','".$date."','".$status."','".$link."')";

		$result_insert= $con->data_insert($sql);


		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
		echo '<img src="'.$image.'" width="100px"></img>';
		
	}
	
}



if(isset($_POST['action']) && $_POST['action'] == 'add_rss'){
	$rss = new DOMDocument();
	$rss->load($_POST['rss_link']);
	$feed = array();
	$sql_insert = "INSERT into rss_master(rss_title,link,status)
	 VALUES ('".$_POST['rss_link_title']."','".$_POST['rss_link']."',1)";
	$result_insert_id= $con->data_insert_return_id($sql_insert);

	
	foreach ($rss->getElementsByTagName('item') as $node) {
		$description = $node->getElementsByTagName('description');
		$linkthumb="";
		try {
			$test = $description->item(0)->nodeValue;
			$description = preg_filter('/<a.(.*?)>(.*?)<\/a>/', "",$test);//get Desc
			$linkthumb= preg_match('/src\s*=\s*"([^"]+)"/',$test,$match);//get image src
			if(!empty($match)){
				$linkthumb=$match[1];
			}else{
				$description = $node->getElementsByTagName('description')->item(0)->nodeValue;
			}
			
		} catch (Exception $e) {
			
		}
		
		
		 $nodes = $node->getElementsByTagName('content');
		 // echo "AA->";
		 // print_r($nodes);

		 if(!is_object($nodes) || $nodes === null || $nodes->length==0){
		 	
			 	$linkthumbNode = $node->getElementsByTagName('image');
			 	// echo "A->";
			 	// print_r($linkthumbNode);
			 	
			 	if(isset($linkthumbNode) && $linkthumbNode->length >0){
			 			$linkthumb=$linkthumbNode->item(0)->nodeValue;
			 			

			 			// print_r($linkthumb);
			 			if(empty($linkthumb)||$linkthumb == " "){
				 			
				 			
				 			$linkthumb = $linkthumbNode->item(0)->getAttribute('src');
				 			// echo "C->";
				 			// print_r($linkthumb);
				 		}
				 		
				 	}else{
				 		/*$linkthumb = $linkthumb->item(0)->getAttribute('src');*/
				 		/*$linkthumb = "NO IMAGE";*/
				 }

		 }else{
		 	// echo "D->";
		 	 $linkthumb = $nodes->item(0)->getAttribute('url');
		 }
		
    	 $title = $node->getElementsByTagName('title')->item(0)->nodeValue;
    	 $desc = $description ;
    	 $link = $node->getElementsByTagName('link')->item(0)->nodeValue;
    	 $img = $linkthumb;
    	 $date = $node->getElementsByTagName('pubDate');
    	 if(isset($date) && $date->length >0){
    	 	$date = $date->item(0)->nodeValue;
    	 }else{
			$date = "no date provided";

    	 }
    	 	

		$item = array ( 
			'title' => $title,
			'desc' =>  $desc,
			'link' => $link,
			'img' => $img,
			'date' => $date,
			);
		array_push($feed, $item);
	}


	
	$limit = 1;

	
	for($x=0;$x<$limit;$x++) {
		echo '<p>"'.$limit.'"</p>';
		$title = str_replace(array(' & ', ' &amp; ',"'",' &quot;'),"", $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = str_replace("'",' &quot; ', $feed[$x]['desc']);
		$image = $feed[$x]['img'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		$status = 0 ;
		$convert_date = convertPubDate($date);
		$sql = "INSERT INTO rss_feeds
		(rss_title_id,rss_title,rss_url,feed_title,feed_img,feed_description,pub_date,status,feed_link,,order_date) 

		VALUES ('".$result_insert_id."','".$_POST['rss_link_title']."','".$_POST['rss_link']."','".$title."','".$image."','".$description."','".$date."','".$status."','".$link."','".$convert_date."')";

		$result_insert= $con->data_insert($sql);


		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<p>'.$description.'</p>';
		echo '<img src="'.$image.'" width="100px"></img>';
		
	}
	
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_rss_feed'){

	$get_all_rss = "SELECT * FROM rss_feeds WHERE rss_title_id = '".$_REQUEST['id']."' ORDER BY id DESC";

	$result = $con->data_select($get_all_rss);

	
		/*echo json_encode($result);*/
		
		if($result !='no'){

			$sr = 1;
			$tr = '';
			//$status='';
			foreach ($result as $key => $value) {
				
					if($result[$key]['status'] == 1)
					{
						$status = '<button id="status_change" id_p = "'.$result[$key]['rss_title_id'].'" type="button" data-id="'.$result[$key]['id'].'" data-status="1" class="btn btn-info btn-xs " onClick="status_change(this);">Active</button>';
					}
					else
					{
						$status = '<button id="status_change" id_p = "'.$result[$key]['rss_title_id'].'" type="button" data-id="'.$result[$key]['id'].'" data-status="0" class="btn btn-warning btn-xs " onClick="status_change(this);">In-Active</button>';
					}

				  $tr .= "<tr>";
                        $tr .= "<td>".$sr."</td>";

                        $tr .= "<td>".$result[$key]['rss_title']."</td>";
                        $tr .= "<td><a href='".$result[$key]['feed_link']."'>".mb_strimwidth($result[$key]['feed_link'],0,20,'...')."</a></td>";
                        $tr .= "<td>".$result[$key]['feed_title']."</td>";
                        $tr .= "<td><img src=".$result[$key]['feed_img']." width=100px></img></td>";
                        $tr .= "<td>".$result[$key]['feed_description']."</td>";
                        $tr .= "<td>".$result[$key]['pub_date']."</td>";
                        $tr .= "<td style=''><div class='btn-group'>".$status."</div></td>";
				//$html .= '<td>'.$result_get_all_slider[$key]['status'].'</td>';
				$tr .= '<td style="width:16%;"><div class="btn-group"><button id_p = "'.$result[$key]['rss_title_id'].'" type="button" data-id="'.$result[$key]['id'].'" class="btn btn-success btn-xs "><a target="_BLANK" href="'.$result[$key]['feed_link'].'">View</a></button>
				<button id_p = "'.$result[$key]['rss_title_id'].'" type="button" data-id="'.$result[$key]['id'].'" class="btn btn-danger btn-xs " onClick="delete_feed(this);">Delete</button>
				</div></div></td>';
				$tr .= '</tr>';
				$sr++;
			}
			echo $tr;
			
			exit;
		}
	
}
	
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'status_change'){

	

		if($_REQUEST['status'] == 1)
		{
			$sql_status = "UPDATE rss_feeds SET status = 0 WHERE id = ".$_REQUEST['id'];
		}
		else
		{
			$sql_status = "UPDATE rss_feeds SET status = 1 WHERE id = ".$_REQUEST['id'];
		}
		$result = $con->data_update($sql_status);
		if($result == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
	}

//Delete Blogs
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete_rss'){

		$sql_delete = "DELETE FROM rss_feeds WHERE id = ".$_REQUEST['id'];
		$result_delete = $con->data_delete($sql_delete);
		if($result_delete == 1){
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
	}

	function convertPubDate($pubDate){
		$date=$pubDate;
		$split = explode(" ",$date);
		$y = $split[3];
		$d = $split[2];
		$m = $split[1];
		$d = str_replace(',','',$d);
		$months = array(
		    'January',
		    'February',
		    'March',
		    'April',
		    'May',
		    'June',
		    'July ',
		    'August',
		    'September',
		    'October',
		    'November',
		    'December',
		);
		foreach($months as $key =>$value){
		  if($months[$key] == $split[1]){
		     
		     $m=$key;
		      $m++;
		    }
		  
		 
		}
		$date=$y."/".$m."/".$d;

		$date=date_create($date);
		$order_date= date_format($date,"Y-m-d");
		return $order_date;


	}

?>