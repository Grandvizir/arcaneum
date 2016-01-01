<?php

require "models/jourbdd.php";



class JourBddDAO {

    private $factory;
    private static $QUERY_ALL_WINNER = "SELECT * FROM jourbdd WHERE Finit='true' ORDER BY jourbdd.ID DESC LIMIT :limit";
    private static $QUERY_DAY = "SELECT * FROM jourbdd WHERE ID=:ID";
    private static $QUERY_WEEK = "SELECT * FROM jourbdd WHERE ID > :ID AND ID < :ID+7";
    private static $UPDATE ="UPDATE jourbdd SET Date=:tempoDate, Img=:tempoImg, Titre=:tempoTitre, Cdescript=:tempoCdescript, descript=:tempodescript,
        horaire=:tempohoraire, Facebook=:tempoFacebook, Inscription=:tempoInscription, Vainqueur=:tempoVainqueur, Finit=:tempoFinit WHERE ID=:tempojour";

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

    public function All_jour ( $ID ) {
        $con = $this->factory->getConnexion();
        $reponse = $con->prepare( self::$QUERY_DAY );
        $reponse->execute(array('ID' => $ID));
        $array = $reponse->fetch();
        return $array;
    }

    public function All_week ( $ID ) {
        $con = $this->factory->getConnexion();
        $reponse = $con->prepare( self::$QUERY_WEEK );
        $reponse->execute(array('ID' => $ID));
        return $reponse;
    }

    public function Update ( $date, $image, $titre, $cdescript, $descript, $horaire, $facebook, $inscription, $vainqueurs, $finit, $ID ) {
        $con = $this->factory->getConnexion();
        $reponse = $con->prepare( self::$UPDATE );
        $reponse->execute(array(':tempoDate' => $date,
                                ':tempoImg' => $image,
                                ':tempoTitre' => $titre,
                                ':tempoCdescript' => $cdescript,
                                ':tempodescript' => $descript,
                                ':tempohoraire' => $horaire,
                                ':tempoFacebook' => $facebook,
                                ':tempoInscription' => $inscription,
                                ':tempoVainqueur' => $vainqueurs,
                                ':tempoFinit' => $finit,
                                ':tempojour' => $ID
                                ));
    }
}

?>