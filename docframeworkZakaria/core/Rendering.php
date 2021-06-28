<?php


// Rendering gère l'affichage des templates

class Rendering

{


        /**
         * 
         * genere le rendu de données interpolées dans un template
         * 
         * @param string $template
         * @param array $donnees
         * 
         */
        public static function render(string $template, array $donnees):void
        {

            // Récupère les éléments du tableau associatif données, et crée une variable + sa valeur pour chaque élément mis dans le compact à l'appel de render
            extract($donnees);
        

            // Démarre la mémoire tampon
            ob_start();

            // construit le chemin du template qui nous intéresse.

            require_once "templates/".$template.".html.php";
        
            // Stocke les infos de la mémoire tampon, puis réinitialise.
            $contenuDeLaPage = ob_get_clean();
            
            // Colle le template qui nous intéresse au template général.
            require_once "templates/layout.html.php";

        }


}