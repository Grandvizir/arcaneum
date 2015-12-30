<?php
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
		
		if (isset($_POST['finit']))
		{
			$finit = 'true';
		} else
		{
			$finit = 'false';
		}
		
		$reponse = $bdd->prepare('UPDATE jourbdd SET Date=:tempoDate, Img=:tempoImg, Titre=:tempoTitre, Cdescript=:tempoCdescript, descript=:tempodescript,
		horaire=:tempohoraire, Facebook=:tempoFacebook, Inscription=:tempoInscription, Vainqueur=:tempoVainqueur, Finit=:tempoFinit WHERE ID=:tempojour');
		$reponse->execute(array(':tempoDate' => $_POST['date'],
								':tempoImg' => $_POST['image'],
								':tempoTitre' => $_POST['title'],
								':tempoCdescript' => $_POST['C-descript'],
								':tempodescript' => $_POST['descript'],
								':tempohoraire' => $_POST['horaire'],
								':tempoFacebook' => $_POST['facebook'],
								':tempoInscription' => $_POST['inscription'],
								':tempoVainqueur' => $_POST['vainqueurs'],
								':tempoFinit' => $finit,
								':tempojour' => $_GET['jour']
								));
								
		
		$reponse->closeCursor();
		
		header('Location: PlanningZoom.php?jour=' . $_GET['jour'] . '&parameter=users');
?>