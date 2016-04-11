<?php

/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 08/04/16
 * Time: 09:09
 */
namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
//        echo "Hi Wlodek, I'm in index() action in the Post controller";
//        echo'<br/><p>Query string: <pre>'.htmlspecialchars(print_r($_GET, true)).'</pre></p>';
        $posts= Post::getAllPosts();
        View::renderTemplate('Posts/index.html', ['posts'=>$posts]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo "Hi Wlodek, I'm addNew() action in the Post controller";
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction()
    {
        echo'Hi Wlodek, I\'m in edit() action in the Post controller';
        echo'<br/><p>Route parameters: <pre>'.htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
    }

}