
<?php

require "dao/mysqldao.php";



$dao = new MySqlDaoFactory();

$jourdao = $dao->jourBddDao();
echo "plop";
$winners = $jourdao->lastWinner( 3 );
echo "plip";



foreach ($winners as $joubdd){
    echo $joubdd->getDate().'<br/>';
	echo $joubdd->getVainqueur().'<br/>';
}


?>

