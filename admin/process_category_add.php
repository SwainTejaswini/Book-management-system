<?php

	session_start();

	if(!empty($_POST))
	{
		$_SESSION['error']=array();
		extract($_POST);

		if(empty($cat))
		{
			$_SESSION['error']['cat']="Please Enter Category Name";
		}

		if(!empty($_SESSION['error']['cat']))
		{
			header("location:category_add.php");
		}
		else
		{
			include("../includes/connection.php");

			$q="insert into category(cat_nm) values('$cat')";

			mysql_query($q,$link);

			header("location:category_add.php");
		}
	}
	else
	{
		header("location:category.php");
	}

?>