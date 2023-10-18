<?php

	session_start();
	
	include("../includes/connection.php");

	$query="delete from book where book_id =".$_GET['id'];

	$result=mysql_query($query,$link);

	$run=mysql_fetch_assoc($result);

	header("location:category_view.php");

?>