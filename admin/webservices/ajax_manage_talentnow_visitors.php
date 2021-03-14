<?php 
error_reporting(1);
ini_set('display_errors', 'On');
include_once('../classes/class.datatable.php');
$datatable_obj = new datatable();

include('../classes/functions.php');
$con = new functions();


	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get_all_talentnow_visitors'){

		$get_all_talentnow_visitors = "SELECT count(ip) as count,ip,created FROM `talentnow_visitor_count` group by ip";

		$result_get_all_talentnow_visitors = $con->data_select($get_all_talentnow_visitors);

		if($result_get_all_talentnow_visitors !='no'){

			$sr = 1;
			$html = '';
			$status='';
			foreach ($result_get_all_talentnow_visitors as $key => $value) {

				$get_last_visitor = "SELECT max(created) as updated FROM `talentnow_visitor_count` where ip = '".$result_get_all_talentnow_visitors[$key]['ip']."'";

				$result_get_last_visitor = $con->data_select($get_last_visitor);
			
				$html .= '<tr>';
				$html .= '<td>'.$sr.'</td>';
				$html .= '<td>'.$result_get_all_talentnow_visitors[$key]['count'].'</td>';
				$html .= '<td>'.$result_get_all_talentnow_visitors[$key]['ip'].'</td>';
				$html .= '<td>'.$result_get_all_talentnow_visitors[$key]['created'].'</td>';
				$html .= '<td>'.$result_get_last_visitor[0]['updated'].'</td>';
				$html .= '</tr>';
				$sr++;
			}
			echo $html;
			
			exit;
		}
	}

?>
