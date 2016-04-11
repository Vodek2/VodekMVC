<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 07/04/16
 * Time: 11:26
 */
//phpinfo();
//$host = "localhost";
//$db_name = "mvc";
//$user = "root";
//$password = "root";
//
///**
// * Create a connection
// */
//$conn = new mysqli($host, $user, $password, $db_name);
//
///**
// * Check the connection
// */
//if ($conn->connect_error) {
//    echo "Connection failed: " . $conn->connect_error;
//} else {
//    echo "Connected successfully, connection data are ok.";
//}
//echo 'Requested URL = "' .$_SERVER['QUERY_STRING'] .'"';

 //Require the controller class

//require '../App/Controllers/Posts.php';

//echo __DIR__;

/**
 * Twig
 */
require_once dirname(__DIR__).'/vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
//require '../Core/Router.php';

$router = new Core\Router();

//echo get_class($router);

//Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
//$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);



////display routing table
//echo '<pre>';
//var_dump($router->getRoutes());
//echo '</pre>';
//
////match requested route
//$url = $_SERVER['QUERY_STRING'];
//if ($router->match($url)){
//    echo'<pre>';
//    var_dump($router->getParams());
//    echo'</pre>';
//
//}else{
//    echo'Nothing found for '.$url;
//}
$router->dispatch($_SERVER['QUERY_STRING']);