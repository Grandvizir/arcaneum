<section class="Photos">
	<div class="lightbox">
<?php 
	if ($_GET['parameter'] == 'Admin')
	{
		include('Admin2.php');
	} else {

		require 'dao/mysqldao.php';

		$dao = new MySqlDaoFactory();
		$imagedao = $dao->imageBddDao();
		$all = $imagedao->AllImages();

		foreach ($all as $link)
		{
			echo '<img src="' . $link->getImage() . '" alt="Photo" title="Voir taille originale" class="miniature"/>';
		}
	}
?>
	</div>
</section>