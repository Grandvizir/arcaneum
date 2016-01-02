<?php
		require "dao/mysqldao.php";
		$dao = new MySqlDaoFactory();
		$jourdao = $dao->jourBddDao();
			
		if ($_GET['jour'] > 318 OR $_GET['jour'] < 1)
			{
				exit('Le paramètre \'jour\' est incorrect, arrêt du script PHP.');
			}
		
		if (isset($_POST['finit']))
		{
			$finit = 'true';
		} else
		{
			$finit = 'false';
		}

		$jourdao->Update( $_POST['date'], $_POST['image'], $_POST['title'], $_POST['C-descript'], $_POST['descript'], $_POST['horaire'],
						 $_POST['facebook'], $_POST['inscription'], $_POST['vainqueurs'], $finit, $_GET['jour'] );							
		
		header('Location: Tournois_admin.php');
?>