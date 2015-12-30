<?php

require "models/jourbdd.php";



class JourBddDAO {

    private $factory;
    private static $QUERY_ALL_WINNER = "SELECT * FROM jourbdd WHERE Finit='true' ORDER BY jourbdd.ID DESC LIMIT :limit";

    public function __construct($daoFactory)
    {
        $this->factory = $daoFactory;
    }

    public function lastWinner( $limit ){
        $con = $this->factory->getConnexion();
        $response = $con->prepare( self::$QUERY_ALL_WINNER );
        $response->bindValue(':limit', (int) trim($limit), PDO::PARAM_INT);
        $response->execute() or die(print_r($response->errorInfo()));

        $array = array();
        while( $donnees = $response->fetch() )
        {
            $jourbdd = new JourBDD(
                $donnees['ID'],
                $donnees['Date'],
                $donnees['Img'],
                $donnees['Titre'],
                $donnees['Cdescript'],
                $donnees['descript'],
                $donnees['horaire'],
                $donnees['Facebook'],
                $donnees['Inscription'],
                $donnees['Vainqueur'],
                $donnees['Finit']
            );
            array_push($array, $jourbdd);
        }
        return $array;
    }
}

?>