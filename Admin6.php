<?php
session_start();
	if(isset($_POST['password']))
	{
		$_SESSION['password'] = $_POST['password'];
	}
	if(isset($_POST['user']))
	{
		$_SESSION['user'] = $_POST['user'];
	}
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
	<?php include("Menu_admin.php");
	if (!isset($_SESSION['password']) OR !isset($_SESSION['user']))
	{
		exit('<p class="text">Compte non identifier ou session expirée. Veuillez vous reconnecter en passant par "Admin.php".</p>');
	}
		if ($test_name != 1 AND $test_mdp != md5($_SESSION['password']))
		{
			exit('<p class="text">Session incorrect. Veuillez vous reconnecter en passant par "Admin.php".</p>');
		} else { 
			$dao = new MySqlDaoFactory();
			$admindao = $dao->adminBddDao();
			$test_admin = $admindao->Verif_Admin( $_SESSION['user'] );
			$test_ID = $admindao->Verif_ID( $_GET['ID'] );

			if ($test_ID == 1)
			{
				$account = $admindao->Query_account_by_ID( $_GET['ID'] );
				$mail_pseudo = $admindao->Query_account( $account['Pseudo'] );
				$ID_name = $admindao->Query_ID( $account['Pseudo'] );

				echo '<div id="bloc_page">';
					echo '<div class="cadre">';
				if ($test_admin == "true")
				{ 
					if ($_GET['choix'] == 'modif')
					{ ?>
						<p class="text">Modification du compte <?php echo $mail_pseudo['Pseudo'] . '  /  ' . $mail_pseudo['Mail']; ?> :</p>
						<form method="post" action="traitement3.php?param=modif&ID=<?php echo $ID_name; ?>">
							<label for="user">Pseudo : </label> <input type="text" name="user" id="user" value="<?php echo $mail_pseudo['Pseudo']; ?>" /> <br />
							<label for="mail">Adresse mail :</label> <input type="email" name="mail" id="mail" value="<?php echo $mail_pseudo['Mail']; ?>" /> <br/>
							<label for="password">Mot de passe (obligatoire) :</label> <input type="password" name="password" id="password" /> <br />
							<label for="password2">Vérifier le mot de passe :</label> <input type="password" name="password2" id="password2" /> <br />
							<label for="SuperAdmin">Super-Administrateur ?</label> <input type="checkbox" name="SuperAdmin" id="SuperAdmin" /> <br />
							<input type="submit" value="Validez" /> 
						</form> <?php
					} else if ($_GET['choix'] == 'suppr')
					{
						?> <p class="text_important">/!\ Vous êtes sur le point de supprimer un compte administrateur ! /!\ </p>
						<p class="text"> Cette opération est définitive, il n'éxiste <span class="text" style="text-decoration:underline;">aucun moyen</span> de récupérer ce compte ! <br /> Entrez votre mot de passe pour confirmer cette opération. </p>
						<p class="text">Compte concerné : <?php echo $mail_pseudo['Pseudo'] . '  /  ' . $mail_pseudo['Mail']; ?></p>
						<form method="post" action="traitement3.php?param=suppr&ID=<?php echo $ID_name; ?>">
							<label for="password">Mot de passe : </label> <input type="password" name="password" id="password" /> <br/>
							<label for="password2">Vérifier le mot de passe :</label> <input type="password" name="password2" id="password2" /> <br />
							<input type="submit" value="Validez" />
						</form> <?php
					} else
					{
						exit ('<p class="text">Paramétre "choix" incorrect.</p>');
					}
				} else
				{ 
					echo '<p class="text">Vous n\'avez pas accès à cette zone, veuillez contacter un Super-Administrateur.</p>';
				}
			} else
			{
				exit('<p class="text">Le paramètre "ID" est incorrect.</p>');
			}
		} ?>
			</div>
		</div>
	</body>
</html>