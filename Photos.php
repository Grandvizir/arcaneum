<section class="Photos">
	<div class="lightbox">
<?php 
	if ($_GET['parameter'] == 'Admin')
	{
		header('Location: Admin2.php');
	} else {
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'grandvizir', 'plop', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
			
		$reponse = $bdd->query('SELECT * FROM imagebdd');
		
		while($donnees = $reponse->fetch())
		{
			echo '<img src="' . $donnees['Img'] . '" alt="Photo" title="Voir taille originale" class="miniature"/>';
		}
	}
?>
	</div>
</section>
