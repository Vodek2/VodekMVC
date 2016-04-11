<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 08/04/16
 * Time: 13:57
 */

namespace Core;


class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";//relative to Core directory

        if (is_readable($file)){
            require $file;
        }else{
//            echo"$file not found";
            throw new \Exception("$file not found");
        }

    }

    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        echo $twig->render($template, $args);
    }

}