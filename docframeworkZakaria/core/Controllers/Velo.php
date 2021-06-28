<?php

namespace Controllers;


class Velo extends Controller {


    protected $modelName = \Model\Velo::class;


    /***
     * 
     * Affiche tous les vélos
     * 
     */
    public function index(){

        $velos = $this->model->findAll($this->modelName);

        $titreDeLaPage = "Les vélos";

        \Rendering::render('velos/velos', compact('velos', 'titreDeLaPage'));
    }


    /**
     * 
     * Affiche un vélo
     * 
     */


    public function show(){

        $veloId= null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $veloId = $_GET['id'];
        }

        if(!$veloId){
            die("Ce vélo n'existe pas, il me faut un ID correct");
        }

        $velo = $this->model->find($veloId, $this->modelName);

        $titreDeLaPage = $velo->model;

        $modelVoyage = new \Model\Voyage();

        $voyages = $modelVoyage->findAllByVelo($veloId, \Model\Voyage::class);

        \Rendering::render('velos/velo', compact('velo','voyages', 'titreDeLaPage'));

    }

    /**
     * 
     * Permet de supprimer un vélo
     * 
     */


    public function suppr(){

        $velo_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $velo_id = $_GET['id'];

        }

        if(!$velo_id){
            die("j'ai besoin de l'ID d'un vélo !!");
        }

        $this->model->delete($velo_id);

        \Http::redirect("index.php?controller=velo&task=index");
    }
}

