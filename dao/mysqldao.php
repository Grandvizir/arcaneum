<?php

require "jourbdddao.php";


class MySqlDaoFactory
{
    private static $PROPERTY_CONNEXION = "mysql:host=localhost;dbname=arcaneum;charset=utf8";
    private static $PROPERTY_PASSWORD = "plop";
    private static $PROPERTY_USERNAME = "grandvizir";

    public function getConnexion()
    {
        try
        {
            $bdd = new PDO(self::$PROPERTY_CONNEXION,
                self::$PROPERTY_USERNAME,
                self::$PROPERTY_PASSWORD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }


        return $bdd;
    }

    public function jourBddDao(){
        return new JourBddDAO( $this );
    }
}

?>