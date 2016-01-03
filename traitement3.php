<?php
		session_start();
		require "dao/mysqldao.php";
		$dao = new MySqlDaoFactory();
		$admindao = $dao->adminBddDao();
		$reponse = $admindao->Query_account( $_SESSION['user'] );
		$test_mdp = $reponse['Password'];

		if (isset($_POST['SuperAdmin']))
		{
			$SuperAdmin = 'true';
		} else
		{
			$SuperAdmin = 'false';
		}

		if ($_POST['password'] != $_POST['password2'])
		{
			header('Location:Admin4.php?mdp=0');
		} else if($_POST['password'] == $_POST['password2'])
		{
		$password = md5($_POST['password']);
			if ($_GET['param'] == 'insert')
			{
				$admindao->Insert($_POST['user'], $_POST['mail'], $password, $SuperAdmin);
			} else if ($_GET['param'] == 'modif')
			{
				$admindao->Update($_POST['user'], $_POST['mail'], $password, $SuperAdmin, $_GET['ID']);
			} else if ($_GET['param'] == 'suppr')
			{
				if (md5($_POST['password']) == $test_mdp)
				{
					$admindao->Delete($_GET['ID']);
				} else
				{
					header('Location:Admin4.php?mdp=0');
					exit();
				}
			} else
			{
				exit('<p class="text">Paramétre "param" incorrect. Opération impossible, arrêt du script PHP.</p>');
			}
		header('Location: Admin4.php?mdp=2');
	}
?>