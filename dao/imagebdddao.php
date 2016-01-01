<?php

require "models/imagebdd.php";

class ImageBddDAO {

    private $factory;
    private static $QUERY_ALL_IMAGE = "SELECT * FROM imagebdd ORDER BY ID DESC";
    private static $QUERY_MAX = "SELECT MAX(ID) AS id_max FROM imagebdd";
    private static $QUERY_IMAGE = "SELECT * FROM imagebdd WHERE ID = :ID";
    private static $QUERY_VERIF = "SELECT COUNT(ID) AS test FROM imagebdd WHERE ID = :ID";
    private static $INSERT = "INSERT INTO imagebdd(Img) VALUES(:image)";
    private static $DELETE = "DELETE FROM imagebdd WHERE ID = :ID";
    private static $UPDATE = "UPDATE imagebdd SET Img = :image WHERE ID = :ID";
    private static $QUERY_LAST_IMAGE = "SELECT Img FROM imagebdd ORDER BY ID DESC LIMIT 4";

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
        $con = $this->factory->getConnexion();

        $reponse = $con->query ( self::$QUERY_MAX );
        $donnees = $reponse->fetch();
        return $donnees['id_max'];
    }

    public function Image ( $ID ) {
            $con = $this->factory->getConnexion();

            $reponse = $con->prepare( self::$QUERY_IMAGE );
            $reponse->execute(array('ID' => $ID));
            $array = $reponse->fetch();
            return $array;
    }

    public function VerifID ( $ID ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$QUERY_VERIF );
        $reponse->execute(array('ID' => $ID));
        $array = $reponse->fetch();
        return $array;
    }

    public function Insert ( $Img ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$INSERT );
        $reponse->execute(array('image' => $Img));
        // return un 1 pour dire que ca marche (par exemple si ==0 alors "opération impossible...") ?
    }

    public function Delete ( $ID ){
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$DELETE );
        $reponse->execute(array('ID' => $ID));
        // Pareil que Insert ?
    }

    public function Update ( $ID, $Image ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$UPDATE );
        $reponse->execute(array('ID' => $ID,
                                'image' => $Image));
        //Pareil que Delete/Insert ?
    }

    public function LastImages () {
        $con = $this->factory->getConnexion();

        $reponse = $con->query( self::$QUERY_LAST_IMAGE );
        return $reponse;
    }
}

?>