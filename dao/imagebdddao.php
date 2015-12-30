<?php

require "models/imagebdd.php";

class ImageBddDAO {

    private $factory;
    private static $QUERY_ALL_IMAGE = "SELECT * FROM imagebdd";
    private static $QUERY_MAX = "SELECT MAX(ID) AS id_max FROM imagebdd";

    public function __construct($daoFactory)
    {
        $this->factory = $daoFactory;
    }

    public function AllImages(){


        $con = $this->factory->getConnexion();

        $response = $con->query( self::$QUERY_ALL_IMAGE );
        $array = array();
        while( $donnees = $response->fetch() )
        {
            $imagebdd = new ImageBDD(
                $donnees['ID'],
                $donnees['Img']
            );
            array_push($array, $imagebdd);
        }
        return $array;
    }

    public function MaxID ( ) {
        $con2 = $this->factory->getConnexion();

        $reponse = $con2->query ( self::$QUERY_MAX );
        $donnees = $reponse->fetch();
        return $donnees['id_max'];
    }
}

?>