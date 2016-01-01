<?php session_start(); 
	if(isset($_POST['password']))
	{
		$_SESSION['password'] = $_POST['password'];
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
			<?php
			if (!isset($_SESSION['password']) OR $_SESSION['password'] != "Arcaneum")
			{
				include("Menu.php"); ?>
					<div id="bloc_page" class="cadre">
						<form method="post" action="Admin2.php">
							<label for="password"> Password : </label> <input type="password" name="password" id="password" />
							<input type="submit" value="validez" />
						</form>
					</div>
				<?php
			} else
			{
				require "dao/mysqldao.php";

				$dao = new MySqlDaoFactory();
				$imagedao = $dao->imageBddDao();
				$max = $imagedao->MaxID();

				$max = $max+1;

				include('menu.php');

				$reponse = $imagedao->AllImages();
				?>	<div id="bloc_page">
						<div class="Photos"><?php
				foreach ($reponse as $donnees)
				{
					echo '<a href="Admin3.php?img=' . $donnees->getID() . '" >
						<img src="' . $donnees->getImage() . '" alt="Photo" title="Modifier" class="miniature"/></a>';
				} ?>
					<a href="Admin3.php?img=' . $max . '" >  Insérer une nouvelle image ? </a>
						</div>
					</div> <?php			
			}
		?>
	</body>
</html>