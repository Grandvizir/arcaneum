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
<?php 
	if ($_GET['parameter'] == 'Admin')
	{
		header('Location: Admin.php?jour=' . $_GET['jour']);
		exit();
	} else {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'grandvizir', 'plop', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		if ($_GET['jour'] > 318 OR $_GET['jour'] < 1)
		{
			exit('Le paramètre \'jour\' est incorrect, arrêt du script PHP.');
		}
		
		$reponse = $bdd->prepare('SELECT * FROM jourbdd WHERE ID = ?');
		$reponse->execute(array($_GET['jour']));
		$donnees = $reponse->fetch();
		
		if ($donnees['Finit'] == 'false')
		{
			echo '<section class="jour2">';
			echo '<div class="entete">';
			echo '<img class="img2" src="' . $donnees['Img'] . '" alt="Photo de l\'évènement"/>';
			echo '<p class="date2">' . $donnees['Date'] . '</p>';
			echo '<p class="titre2">' . $donnees['Titre'] . '</p>';
			echo '</div>';
			echo '<div class="page">';
			echo '<p class="descript">' . $donnees['descript'] . '</p>';
			echo '<p class="horaire2">' . $donnees['horaire'] . '</p>';
			echo '<a href="' . $donnees['Facebook'] . '" class="facebook">Facebook</a>';
			echo '<a href="' . $donnees['Inscription'] . '" class="inscription">Inscription</a>';
			echo '</div>';
			echo '</section>';
		} else if ($donnees['Finit'] == 'true') {
			echo '<section class="jour2">';
			echo '<div class="entete">';
			echo '<img class="img2" src="' . $donnees['Img'] . '" alt="Photo de l\'évènement"/>';
			echo '<p class="date2">' . $donnees['Date'] . '</p>';
			echo '<p class="titre2">' . $donnees['Titre'] . '</p>';
			echo '</div>';
			echo '<p class="descript">' . $donnees['descript'] . '</p>';
			echo '<p class="vainqueurs">' . $donnees['Vainqueur'] . '</p>';
			echo '</section>';
		} else
		{
			exit('Erreur sur le paramètre "Vainqueur" de la base de données. Must return a varchar (false or true).');
		}

		$reponse->closeCursor();
	}
?>
		</div>
		
	</body>