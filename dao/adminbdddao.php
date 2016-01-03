<?php

require "models/adminbdd.php";

class AdminBddDAO {

    private $factory;
    private static $VERIF_ID = "SELECT COUNT(Mail), COUNT(Pseudo) AS test FROM adminbdd WHERE Mail=:name OR Pseudo=:name OR ID=:name";
    private static $QUERY_NAME = "SELECT ID, Mail, Pseudo FROM adminbdd ORDER BY ID ";
    private static $QUERY_ACCOUNT = "SELECT * FROM adminbdd WHERE Mail=:name OR Pseudo=:name";
    private static $QUERY_ACCOUNT_BY_ID = "SELECT * FROM adminbdd WHERE ID=:ID";
    private static $INSERT = "INSERT INTO adminbdd (Pseudo, Mail, Password, SuperAdmin) VALUES (:Pseudo, :Mail, :Password, :SuperAdmin)";
    private static $UPDATE = "UPDATE adminbdd SET Pseudo=:Pseudo, Mail=:Mail, Password=:Password, SuperAdmin=:SuperAdmin WHERE ID=:ID";
    private static $DELETE = "DELETE FROM adminbdd WHERE ID=:ID";

    public function __construct($daoFactory)
    {
        $this->factory = $daoFactory;
    }

    public function Verif_ID( $name ) {
        $con = $this->factory->getConnexion();

        $response = $con->prepare( self::$VERIF_ID );
        $response->execute(array('name' => $name));
        $test = $response->fetch();

        if ($test['test'] == 1)
        {
            return 1;
        } else if ($test == 0)
        {
            return 0;
        } else {
            return 2; // Erreur autre
        }
    }

    public function Verif_mdp ( $name ) {
        $con = $this->factory->getConnexion();

        $response = $con->prepare( self::$QUERY_ACCOUNT );
        $response->execute(array('name' => $name));
        $test = $response->fetch();

        return $test['Password'];
    }

    public function Verif_admin ( $name ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$QUERY_ACCOUNT );
        $reponse->execute(array('name' => $name ));
        $test = $reponse->fetch();

        return $test['SuperAdmin'];
    }

    public function Query_name () {
        $con = $this->factory->getConnexion();

        $reponse = $con->query( self::$QUERY_NAME );
        return $reponse;
    }

    public function Query_ID ( $name ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$QUERY_ACCOUNT );
        $reponse->execute(array('name' => $name));
        $array = $reponse->fetch();
        return $array['ID'];
    }

    public function Query_account ( $name ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$QUERY_ACCOUNT );
        $reponse->execute(array('name' => $name));
        $array = $reponse->fetch();
        return $array;
    }

    public function Query_account_by_ID ( $ID ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$QUERY_ACCOUNT_BY_ID );
        $reponse->execute(array('ID' => $ID));
        $array = $reponse->fetch();

        return $array;
    }

    public function Insert ($Pseudo, $Mail, $Password, $SuperAdmin) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$INSERT );
        $reponse->execute(array('Pseudo' => $Pseudo,
                                'Mail' => $Mail,
                                'Password' => $Password,
                                'SuperAdmin' => $SuperAdmin));
    }

    public function Update ($Pseudo, $Mail, $Password, $SuperAdmin, $ID) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare( self::$UPDATE );
        $reponse->execute(array('Pseudo' => $Pseudo,
                                'Mail' => $Mail,
                                'Password' => $Password,
                                'SuperAdmin' => $SuperAdmin,
                                'ID' => $ID));
    }

    public function Delete ( $ID ) {
        $con = $this->factory->getConnexion();

        $reponse = $con->prepare(self::$DELETE);
        $reponse->execute(array('ID' => $ID));
    }
}
?>