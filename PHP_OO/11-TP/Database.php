<?php

class Database
{

    private static $pdoInstance;

    private function __construct()
    {
    }

    public static function getPdo()
    {

        if (self::$pdoInstance === null) {

            try {
                self::$pdoInstance = new PDO('mysql:host=esilxl0nthgloe1y.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=pngrvw381ed6xm3f', 'o540c7o9je747qia', 'qidovnjlnee9lwdz');
            } catch (PDOException $e) {

                echo "Erreur de connexion à la base de données" . $e->getMessage();
            }
        }

        return self::$pdoInstance;
    }
}
