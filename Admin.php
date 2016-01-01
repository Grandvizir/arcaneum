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
		
		if (!isset($_POST['password']) OR $_POST['password'] != "Arcaneum")
		{
			 
			?><div id="bloc_page">';
				<?php echo '<form method="post" action="Admin.php?jour=' .$_GET['jour'] . '">'; ?>
					<label for="password"> Password : </label> <input type="password" name="password" id="password" />
					<input type="submit" value="validez" />
				</form>
			</div>
			<?php
		}
		else
		{ 
	
			require "dao/mysqldao.php";
			$dao = new MySqlDaoFactory();
			$jourdao = $dao->jourBddDao();
			
			if ($_GET['jour'] > 318 OR $_GET['jour'] < 1)
			{
				exit('Le paramètre \'jour\' est incorrect, arrêt du script PHP.');
			}
	
		$donnees = $jourdao->All_jour( $_GET['jour'] ); ?>
		
		<div id="bloc_page">
			<div class="fond">
				<form method="post" action="traitement.php?jour=<?php echo $_GET['jour'] ?>">
					<label for="date">Date : </label> <input type="text" name="date" value="<?php echo $donnees['Date'] ?>"/>
					<label for="title">Titre : </label> <input type="text" name="title" id="title" value="<?php echo $donnees['Titre'] ?>"/>
					<label for="image">Image : </label> <input type="text" name="image" id="image" value="<?php echo $donnees['Img'] ?>"/>
					<label for="C-descript">Déscription courte : </label> <textarea name="C-descript" id="C-descript" > <?php echo $donnees['Cdescript'] ?> </textarea>
					<label for="descript">Déscription détaillé : </label> <textarea name="descript" id="descript" > <?php echo $donnees['descript'] ?> </textarea>
					<label for="horaire">Horaires : </label> <input type="text" name="horaire" id="horaire" value="<?php echo $donnees['horaire'] ?>"/>
					<label for="facebook">Lien Facebook : </label> <input type="text" name="facebook" id="facebook" value="<?php echo $donnees['Facebook'] ?>"/>
					<label for="inscription">Lien module d'inscription : </label> <input type="text" name="inscription" id="inscription" value="<?php echo $donnees['Inscription'] ?>"/>
					<label for="finit">Finit ? : </label> <input type="checkbox" name="finit" id="finit" <?php if ($donnees['Finit'] == 'true'){echo 'checked';} ?>/>
					<label for="vainqueurs">Vainqueurs : </label> <textarea name="vainqueurs" id="vainqueurs"><?php echo $donnees['Vainqueur'] ?></textarea>
					<label for="valider">Validez : </label> <input type="submit" name="valider" id="valider" value="Envoyez !"/>
				</form>
			</div>
		</div>
		<?php } ?>
		
	</body>