<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 07/04/16
 * Time: 11:26
 */
//echo 'Requested URL = "' .$_SERVER['QUERY_STRING'] .'"';
/**
 * Routing
 */
require '../Core/Router.php';

$router = new Router();

//echo get_class($router);

//Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');



//display routing table
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';

//match requested route
$url = $_SERVER['QUERY_STRING'];
if ($router->match($url)){
    echo'<pre>';
    var_dump($router->getParams());
    echo'</pre>';

}else{
    echo'Nothing found for '.$url;
}