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
				exit('Compte non identifier ou session expirée. Veuillez vous reconnecter en passant par "Admin.php".');
			}

	include("Menu_admin.php");
	echo '<div id="bloc_page" class="cadre">';

	if ($test_name != 1 AND $test_mdp != md5($_SESSION['password']))
		{
			exit('Session incorrect. Veuillez vous reconnecter en passant par "Admin.php".');
		} else {
		$dao = new MySqlDaoFactory();
		$imagedao = $dao->imageBddDao();

		$tempo = $imagedao->VerifID($_GET['img']);
		
		if ($tempo['test']=='1')
		{	
			$reponse = $imagedao->Image($_GET['img']);

		?> <div id="bloc_page">
				<form method="post" action="traitement2.php?img=<?php echo $_GET['img'] ?>">
					<label for="image"> Lien : </label> <textarea name="image" id="image" style="width:80%; min-height:200px;"><?php echo $reponse['Img'] ?></textarea>
					<label for="suppr">Supprimer l'image ? </label> <input type="checkbox" name="suppr" id="suppr" />
					<input type="submit" value="Valider" />
				</form>
			</div>
		</div>
	</body> 
</html><?php
		} else {
			?> <div id="bloc_page">
				<form method="post" action="traitement2.php">
					<label for="ajout_image"> Lien : </label> <textarea name="ajout_image" id="ajout_image" style="width:80%; min-height:200px;">Lien relatif ou absolu de l'image
ex : Photos/Nom.jpg
http://liendel'image.com
</textarea>
					<input type="submit" value="Valider" />
				</form>
			</div>
			</div> 
		</body>
	</html><?php
		}
	}
?>
