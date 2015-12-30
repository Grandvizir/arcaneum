
<?php

require "dao/mysqldao.php";



$dao = new MySqlDaoFactory();
$jourdao = $dao->jourBddDao();
$winners = $jourdao->lastWinner( 3 );

foreach ($winners as $joubdd){
    echo $joubdd->getDate().'<br/>';
	echo $joubdd->getVainqueur().'<br/>';
}


?>

