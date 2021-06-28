<?php

namespace Controllers;


class Home //extends Controller si besoin d'un model
{
    //  protected $modelName; si besoin d'un model,= \namespaceDeLaClasse\nomDeLaClasse::class;


    /**
     * affiche l'accueil du framework
     * 
     * 
     */
    public function index()
    {
        $titreDeLaPage = "Accueil Framework";

        $message = "Bienvenue dans la documentation";

        $messageChangeable = "Changez-moi grâce au formulaire";

        if(!empty($_POST['messageChangeable'])){
            $messageChangeable = $_POST['messageChangeable'];
        }

        // render un template

        \Rendering::render('home/home', compact('titreDeLaPage', 'messageChangeable', 'message'));
        // Render construit le chemin du template home (dossier/fichier), puis stocke les variables (et leurs valeurs) "titreDeLaPage", "messageChangeable" et "message" dans un tableau associatif. 

    }

   



}