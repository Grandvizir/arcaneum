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
			<?php if (!isset($_POST['password']) OR $_POST['password'] != "Arcaneum")
			{
				 
				
				?><div id="bloc_page">'
					<form method="post" action="Admin2.php">
						<label for="password"> Password : </label> <input type="password" name="password" id="password" />
						<input type="submit" value="validez" />
					</form>
				</div>
				<?php
			}
			else
			{
				echo "plop";
				try
				{
					echo "plop";
					$bdd = new PDO('mysql:host=localhost;dbname=arcaneum;charset=utf8', 'grandvizir', 'plop', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
				
				$reponse2 = $bdd->query('SELECT MAX(ID) AS id_max FROM imagebdd');
				$max = $reponse2->fetch();
				$max['id_max'] = $max['id_max']+1;
				$reponse = $bdd->query('SELECT * FROM imagebdd');
				echo '<div class="Photos">';
				while($donnees = $reponse->fetch())
				{
					echo '<a href="Admin3.php?img=' . $donnees['ID'] . '" >
						<img src="' . $donnees['Img'] . '" alt="Photo" title="Modifier" class="miniature"/></a>';
				}
					echo '<a href="Admin3.php?img=' . $max['id_max'] . '" >  Insérer une nouvelle image ? </a>';
				echo '</div>';
			
				/*	AJOUTER L4INSERTION		*/
				
			}
		?>
		</div>
	</body>