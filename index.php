<?php

require('controller/ControllerfrontEnd.php');
require('controller/ControllerbackEnd.php');



//
function loadClass($class)
{

    if(preg_match('/^Controller/', $class))
    {
        require_once('controller/' . $class. '.php');
    }
    else
    {
        require_once('model/' . $class. '.php');
    }
}


//autoload
spl_autoload_register('loadClass');


session_start();

//Initialisation de la Variable d'authentification
if(!isset($_SESSION['authentified']))
$_SESSION['authentified'] = false;
//var_dump($_SESSION['authentified']) ;




$router = new ControllerRouter();
$router->routerRequete();
