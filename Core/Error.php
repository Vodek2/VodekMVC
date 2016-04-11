<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 11/04/16
 * Time: 09:28
 */

namespace Core;
/**
 * Class Error
 * @package Error and exeption handler
 */

class Error
{
    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     *
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line Number in the file
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line)
    {//converts error into exception
        if (error_reporting() !==0){
            //to keep the @ operator working
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }
    
    /**
     * Exception handler.
     * 
     * @param Exception $exception The exception
     * 
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if($code!= 404){
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERRORS) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace: '" . $exception->getTraceAsString() . "'</p>";
            echo "<p>Thrown in: '" . $exception->getFile() . "' on line' " . $exception->getLine() . "</p>";
        }else {
            $log = dirname(__DIR__) . '/logs/' .date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" .get_class($exception) ."'";
            $message .= "with message: '" .$exception->getMessage() ."'";
            $message .= "\nStack trace: '" .$exception->getTraceAsString() ."'";
            $message .= "\nThrown in: '" .$exception->getFile() ."' on line " .$exception->getLine();

            error_log($message);
//            echo "<h1>An error occurred!</h1>";
//            if ($code ==404){
//                echo "<h1>Page not found</h1>";
//            }else{
//                echo"<h1>An error occurred</h1>";
//            }
            View::renderTemplate("$code.html");
        }
    }

}