<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 11/04/16
 * Time: 08:51
 */

namespace Core;

use PDO;
use PDOException;
use \App\Config;

abstract class Model
{
    /**
     * get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null){
//            $host='localhost';
//            $dbname = 'mvc';
//            $username = 'root';
//            $password = 'root';
        }

        try{
//            $db = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
            $dsn = 'mysql:host=' .Config::DB_HOST. ';dbname=' .Config::DB_NAME .';charset=utf8';
            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            //Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            return $db;

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}