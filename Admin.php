<?php
session_start();
	if(isset($_POST['password']))
	{
		$_SESSION['password'] = $_POST['password'];
	}
	if(isset($_POST['user']))
	{
		$_SESSION['user'] = $_POST['user'];
	}
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
		
		<?php include("Menu_admin.php");

		echo '<div id="bloc_page" class="cadre">';

		if (!isset($_SESSION['password']) OR (!isset($_SESSION['user'])))
		{
			?><div id="bloc_page">
				<form method="post" action="Admin.php">
					<label for="user">Username : </label> <input type="text" name="user" id="user" /> <br />
					<label for="password"> Password : </label> <input type="password" name="password" id="password" />
					<input type="submit" value="validez" />
				</form>
			</div>
			<?php
		} else if ( $test_name != 1 )
		{
			echo "Nom d'utilisateur incorrect.";
			?><div id="bloc_page">
				<form method="post" action="Admin.php">
					<label for="user">Username : </label> <input type="text" name="user" id="user" />
					<label for="password"> Password : </label> <input type="password" name="password" id="password" />
					<input type="submit" value="validez" />
				</form>
			</div>
			<?php
		} else if ( $test_mdp != md5($_SESSION['password']) )
		{
			echo "Mot de passe incorrect.";
			?><div id="bloc_page">
				<form method="post" action="Admin.php">
					<label for="user">Username : </label> <input type="text" name="user" id="user" />
					<label for="password"> Password : </label> <input type="password" name="password" id="password" />
					<input type="submit" value="validez" />
				</form>
			</div>
			<?php
		}
		else
		{?>
			<p class="text">Identification réussit. Accèdez aux panneaux d'administrations via le menu.</p>
			<a class="text" href="Deco.php" alt="Se déconnecter">Se déconnecter ?</a> <?php
		} ?>	
		</div>	
	</body>
</html>