<?php

require "jourbdddao.php";
require "imagebdddao.php";


class MySqlDaoFactory
{
    private static $PROPERTY_CONNEXION = "mysql:host=localhost;dbname=arcaneum;charset=utf8";
    private static $PROPERTY_PASSWORD = "";
    private static $PROPERTY_USERNAME = "root";

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

    public function imageBddDao ( ) {
        return new ImageBddDao( $this );
    }
}

?>