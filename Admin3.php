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
		
	<?php include("Menu.php");
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		$tempo2 = $_GET['img'];
		$req = $bdd->prepare('SELECT ID, COUNT(DISTINCT ID) AS test FROM imagebdd WHERE ID = ?');
		$req->execute(array($tempo2));
		$tempo = $req->fetch();
		
		if ($tempo['test']=='1')
		{			
		$reponse = $bdd->prepare('SELECT * FROM imagebdd WHERE ID = ?');
		$reponse->execute(array($_GET['img']));
		$donnees = $reponse->fetch();
		
		?> <div id="bloc_page">';
				<form method="post" action="traitement2.php">
					<label for="image"> Lien : </label> <textarea name="image" id="image"><?php echo $donnees['Img'] ?></textarea>
					<label for="suppr">Supprimer l'image ? </label> <input type="checkbox" name="suppr" id="suppr" />
					<input type="submit" value="Validez" />
				</form>
			</div>
	</body> <?php
		} else {
			/* FAIRE L'INSERTION */
		}
