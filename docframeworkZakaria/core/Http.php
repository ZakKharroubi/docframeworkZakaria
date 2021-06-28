<?php

// La classe Http permet de rediriger l'utilisateur vers l'url qu'on passe en paramètre à sa méthode redirect.



class Http
{

/**
 * 
 * redirige vers l'url passé en parametre
 * @param string $url
 */

public static function redirect(string $url) : void 

{

    header('Location: '.$url);
    
}

}