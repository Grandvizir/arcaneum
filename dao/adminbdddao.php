<?php

require "models/adminbdd.php";

class AdminBddDAO {

    private $factory;
    private static $VERIF_ID = "SELECT COUNT(Mail), COUNT(Pseudo) AS test FROM adminbdd WHERE Mail=:name OR Pseudo=:name";
    private static $VERIF_PASS = "SELECT Password AS test FROM adminbdd WHERE Mail=:name OR Pseudo=:name";

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
            return 2;
        }
    }

    public function Verif_mdp ( $name ) {
        $con = $this->factory->getConnexion();

        $response = $con->prepare( self::$VERIF_PASS );
        $response->execute(array('name' => $name));
        $test = $response->fetch();

        return $test['test'];
    }
}

?>