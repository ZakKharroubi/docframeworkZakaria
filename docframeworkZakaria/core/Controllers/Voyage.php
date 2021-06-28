<?php

namespace Controllers;

class Voyage extends Controller {

    protected $modelName = \Model\Voyage::class;


    /**
     * 
     * Permet d'ajouter un voyage lié à un vélo
     * 
     * 
     */
    public function create(){

        $formulaireAAfficher = true;

        if(!empty($_POST['description']) && !empty($_POST['image']) && !empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){
            $formulaireAAfficher = false;
        }

        if($formulaireAAfficher){

            $velo_id = null;
            $voyage_id = null;
            $modeEdition = false;
            $voyage = null;

            if(!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){
                $velo_id = $_POST['veloId'];
            }

            if(!empty($_POST['voyageId']) && ctype_digit($_POST['voyageId'])){

                $voyage_id = $_POST['voyageId'];
                $modeEdition = true;

            }

            if($modeEdition){
                $voyage = $this->model->find($voyage_id, $this->modelName);
                $descriptionVoyage = $voyage->description;
                $titreDeLaPage = "Editer $descriptionVoyage";
                \Rendering::render('voyages/create', compact('voyage', 'titreDeLaPage'));
            } else {

                $titreDeLaPage = "Nouveau voyage";
                \Rendering::render('voyages/create', compact('velo_id', 'voyage', 'titreDeLaPage'));
            }

        } else {
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
            $velo_id = $_POST['veloId'];

            $this->model->insert($description, $image, $velo_id);
            \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");

        }





    }

    /**
     * 
     * Permet de mettre à jour un voyage
     * 
     */

    public function edit() {

        $description = null;
        $image = null;
        $velo_id = null;
        $voyage_id = null;

        if(!empty($_POST['description']) && !empty($_POST['image']) && !empty($_POST['voyageId']) && ctype_digit($_POST['voyageId']) && !empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){
            $voyage_id = $_POST['voyageId'];
            $description = $_POST['description'];
            $velo_id = $_POST['veloId'];
            $image = $_POST['image'];

            if(!$description || !$image || !$voyage_id || !$velo_id){
                die("Formulaire mal rempli ");
            }
        

            $this->model->update($description, $image, $voyage_id);

            \Http::redirect("index.php?controller=velo&task=show&id=".$velo_id);
                } 
    }


    /**
     * 
     * Permet de supprimer un voyage
     * 
     */


    public function suppr(): void {

        $voyage_id = null;

        if(!empty($_POST['voyageIdASupprimer']) && ctype_digit($_POST['voyageIdASupprimer'])){

            $voyage_id = $_POST['voyageIdASupprimer'];
        }

        $voyage = $this->model->find($voyage_id, $this->modelName);

        if(!$voyage){

            die("Ce voyage n'existe pas, donnez-moi un id de voyage correct");
        }

        $this->model->delete($voyage_id);


        \Http::redirect("index.php?controller=velo&task=show&id=".$voyage->velo_id);


    }


}