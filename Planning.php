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
		
		<?php include("Menu.php");?>
		
		<div id="bloc_page">
			<div class="cadre_journée">
			
<?php 
		try
		{
<<<<<<< HEAD
			$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
=======
			$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'grandvizir', 'plop', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
>>>>>>> origin/master
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		$i = 0;
		if ($_GET['semaine'] > 312 OR $_GET['semaine'] < 0)
		{
			exit('Le paramètre \'semaine\' est incorrect, arrêt du script PHP.');
		}
		
		$reponse = $bdd->prepare('SELECT * FROM jourbdd WHERE ID > ? AND ID < ?+7');
		$reponse->execute(array($_GET['semaine'], $_GET['semaine']));
		
	while ($i < 6)
	{
		$donnees = $reponse->fetch();
		echo '<section class="jour1">';
		echo '<a href="PlanningZoom.php?jour=' . $donnees['ID'] . '&parameter=user" class="date1">' . $donnees['Date'] . '</a>';
		echo '<p class="titre1">' . $donnees['Titre'] . '</p>';
		echo '<img class="img1" src="' . $donnees['Img'] . '" alt="Photo de l\'évènement"/>';
		echo '<p class="c-descript">' . $donnees['Cdescript'] . '</p>';
		echo '</section>';
		$i++;
	}

		$reponse->closeCursor();
?>

			</div>
		</div>
		
	</body>