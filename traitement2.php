<?php
		require "dao/mysqldao.php";

		$dao = new MySqlDaoFactory();
		$imagedao = $dao->imageBddDao();
		
		if (isset($_POST['ajout_image']))
		{
			$imagedao->Insert($_POST['ajout_image']);
		} else if (isset($_POST['suppr']))
		{
			$imagedao->Delete($_GET['img']);
		} else
		{
			$imagedao->Update($_GET['img'], $_POST['image']);
		}

		header('Location: Admin2.php');
?>