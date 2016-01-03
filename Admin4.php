<?php session_start(); 
	if (isset($_SESSION['user']))
	{
		require "dao/mysqldao.php";
		$dao = new MySqlDaoFactory();
		$admindao = $dao->adminBddDao();
		$test_name = $admindao->Verif_ID( $_SESSION['user'] );
	}
	if (isset($_SESSION['password']))
	{
		$test_mdp = $admindao->Verif_mdp( $_SESSION['user'] );
	}
	if (!isset($_GET['mdp']))
	{
		$_GET['mdp'] = 1;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Arcaneum Bar - Présentations</title>
		<link rel="stylesheet" href="Bootstrap/css/bootstrap.css"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Style1.css"/>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<?php if (!isset($_SESSION['password']) OR !isset($_SESSION['user']))
	{
		exit('<p class="text">Compte non identifier ou session expirée. Veuillez vous reconnecter en passant par "Admin.php".</p>');
	}
		include("Menu_admin.php");
		
		if ($test_name != 1 AND $test_mdp != md5($_SESSION['password']))
		{
			exit('Session incorrect. Veuillez vous reconnecter en passant par "Admin.php".');
		} else { 
			$dao = new MySqlDaoFactory();
			$admindao = $dao->adminBddDao();
			$test_admin = $admindao->Verif_Admin( $_SESSION['user'] );

			echo '<div id="bloc_page">';
				echo '<div class="cadre">';
			if ($test_admin == "true")
			{ 
				if ($_GET['mdp'] == 0)
				{
					echo '<p class="text">Mot de passe incorrect. Veuillez à copier deux fois le bon mot de passe sans fautes.</p>';
				} else if ($_GET['mdp'] == 2)
				{
					echo '<p class="text">Opération terminée.</p>';
				}?>
				<a href="Admin5.php?choix=crea">Créer un compte administrateur</a> <br />
				<a href="Admin5.php?choix=modif">Modifier un compte</a> <br />
				<a href="Admin5.php?choix=suppr">Supprimer un compte</a> <?php
			} else
			{ 
				if ($_GET['mdp'] == 0)
				{
					echo '<p class="text">Mot de passe incorrect. Veuillez à copier deux fois le bon mot de passe sans fautes.</p>';
				} else if ($_GET['mdp'] == 2)
				{
					echo '<p class="text">Opération terminée.</p>';
				}?>
				<a href="Admin5.php?choix=modif-self">Modifier son compte</a> <br />
				<a href="Admin5.php?choix=suppr-self">Supprimer son compte</a> <?php
			}
		} ?>
			</div>
		</div>
	</body>
</html>