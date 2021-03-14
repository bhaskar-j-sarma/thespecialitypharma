<?php
session_start();
include('../classes/functions.php');
$con = new functions();
$current_date_time = $con->get_datetime();
//-----------------------------------------

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'doLogin'){

	$username = $_REQUEST['username'];
	$password = $con->test_input($_REQUEST['password']);

	$sql_login = "SELECT username,password, role FROM user WHERE username = '".$username."' AND password = '".$password."' AND status = 1 ";
	$result_login = $con->data_select($sql_login);

	if($result_login !='no'){
		if($username == $result_login[0]['username'] && $password == $result_login[0]['password']){
			$_SESSION['username'] = $result_login[0]['username'];
			$_SESSION['role'] = $result_login[0]['role'];
			echo 1;
			exit;
		}else{
			echo 0;
			exit;
		}
		
	}else{
		echo 0;
		exit;
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'doLogOut'){

	unset($_SESSION['username']);
	unset($_SESSION['role']);
    session_destroy();

    header('Location: ../index.php');
    exit;

}

?>