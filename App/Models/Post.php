<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 11/04/16
 * Time: 07:50
 */

namespace App\Models;

use PDO;

use PDOException;

class Post extends \Core\Model
{
    /**
     * Get all the posts as associative array
     *
     * @return array
     */
    public  static function getAllPosts()
    {
//        $host=''; //DB host
//        $dbname = ''; //name of the DB
//        $username = ''; username for DB
//        $password = ''; password

        try{
//            $db = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);

            $db = static ::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts  ORDER BY created_at');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}