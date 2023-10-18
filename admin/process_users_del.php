<?php

	session_start();
	
	include("../includes/connection.php");

	$query="delete from register where r_id =".$_GET['id'];

	$result=mysql_query($query,$link);

	$run=mysql_fetch_assoc($result);

	header("location:users_view.php");

?>