<?php
	include_once("../core/config.php");
	if (isset($_POST['data'])) {
		$dataArr = $_POST['data'];
		foreach($dataArr as $id){
			mysqli_query($link, "DELETE FROM review WHERE id='$id'");
		}
	}
?>