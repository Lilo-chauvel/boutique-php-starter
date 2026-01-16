<?php
// /**
//  * Autoloader
//  */
// class Autoloader
// {
//     static function register(){
//         spl_autoload_register(array(__CLASS__, 'autoload'));
//     }

//     static function autoload($class)
//     {
//         require_once("/var/www/boutique/public/class/" . $class . ".php");
//     }
// }

/**
 * Class Autoloader
 */
class Autoloader
{

    /**
     * Enregistre notre autoloader
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class)
    {
        require "/var/www/boutique/public/class/" . $class . ".php";
    }

}