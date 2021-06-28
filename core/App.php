<?php

class App
{
    
    public static function process()
    {
        $controllerName = "home"; //Cette variable définit la page d'accueil par défaut.
        $task = "index";    // Celle-ci définit son comportement par défaut.


        // Ces conditions permettent de récupérer la page qu'on cherche à afficher, en fonction des arguments passés à GET.
            if(!empty($_GET['controller'])){

                $controllerName = $_GET['controller'];
            }
            if(!empty($_GET['task'])){

                $task = $_GET['task'];
            }


        // Puisque nos controllers commencent tous par une majuscule, on utilise ucfirst pour que les controllers appelés aient bien leur première lettre en majuscule dans l'URL.
        $controllerName = ucfirst($controllerName);
        
        // Enfin, avec ce qu'on récupère dans GET, on appelle le controller qu'on veut avoir, ainsi que la méthode qu'on souhaite.
        $controllerName = "\Controllers\\".$controllerName;
        $controller = new $controllerName();
        $controller->$task();

        
    }
}