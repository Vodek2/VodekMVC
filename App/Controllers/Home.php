<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 08/04/16
 * Time: 09:51
 */

namespace App\Controllers;
use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        //echo "(before) ";
//        return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        //echo " (after)";
    }


    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
//        echo "Hi Wlodek, I'm index) action in the Home controller";
//        View::render('Home/index.php');
        /*
       View::render('Home/index.php', [
           'name'    => 'Dave',
           'colours' => ['red', 'green', 'blue']
       ]);
       */
        View::renderTemplate('Home/index.html', [
            'name'    => 'Vodek',
            'colours' => ['red', 'green', 'blue', 'yellow', 'black']
        ]);
    }

}