<?php

function loadClass($class)
{
    if($class == 'Router')
    {
        require_once('myRouter/' . $class. '.php');
    }
    elseif(preg_match('/^Controller/', $class))
    {
        require_once('controller/' . $class. '.php');
    }
    elseif(preg_match('/^View$/',$class))
    {
        require_once('view/View.php');
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
{
    $_SESSION['authentified'] = false;
}
//var_dump($_SESSION['authentified']) ;




$router = new Router();
$router->routerRequete();
