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
		
		<link rel = "stylesheet" href = "includes/picturebox.css">
		<script src = "includes/jquery.js"></script>
		<script src = "includes/picturebox.js"></script>

	</head>
	
		<?php include("Menu.php"); ?>
			
		<div id="bloc_page">
		
			<section class="Presentation">
				<p>Je balance tout plein de trucs ici pour remplir le bloc, faudra me dire précisement ce que tu veux que j'y mette ;p<br/>
				L'Arcaneum est un bar gaming qui propose un accès à des pc et des consoles. Venez jouer ou prendre un verre en toute convivialité !<br/>
				Les visites sont bienvenues, Peut accueillir des groupes, À emporter, Restauration, Service en salle et Terrasse.<br/>
				Visa, American Express, Mastercard et Espèces<p>
			</section>
			
			<aside class="FilActu">
				<?php include("Felicitations.php"); ?>
			</aside>

			<section class="Photos_presentation">
				<?php 
				$dao = new MySqlDaoFactory();
				$imagedao = $dao->imageBddDao();

				$array = $imagedao->LastImages();
				echo '<div class="Photos">';
				echo '<div class="lightbox">';
				foreach ($array as $donnees)
				{
					echo '<img src="' . $donnees .'" alt="Photo" title="Voir taille originale" class="miniature"/>';
				}
				echo '</div>';
				echo '</div>';
				?>
			</section>
		</div>
	</body>
	
</html>



<!-- 
		A retour de traitement2.php, ne pas avoir à retapper le mdp => session/cookies
		3-4 dernières photos sur la prés // Bug LastImages
			Changer manuellement les images de la pres
		Finir les paragraphes présentation/contact
		Finir les graphismes
		Finir la page PlanningZoom (problème de graphisme, Pierre ?)
		Refaire un .CSS propre
		Enlever Bootstrap ?
		Adapter aux telephones
		CHANGER LE MOT DE PASSE
-->