<?php 
		require 'dao/mysqldao.php';

		$dao = new MySqlDaoFactory();
		$imagedao = $dao->imageBddDao();
		$all = $imagedao->AllImages();

		include("Menu.php");

		?> <div id="bloc_page">
		<section class="Photos">
		<div class="lightbox"> <?php

		foreach ($all as $link)
		{
			echo '<img src="' . $link->getImage() . '" alt="Photo" title="Voir taille originale" class="miniature"/>';
		}
?>
		</div>
	</section>
</div>