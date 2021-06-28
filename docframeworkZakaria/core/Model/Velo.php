<?php 

namespace Model;

class Velo extends Model{

    public $id;

    public $model;

    public $image;

    protected $table = "velos";



    /**
     * 
     * Permet de récupérer le nombre de voyage associé à un vélo
     * @return int $nbrVoyages
     */


    public function getVoyages(){

        $modelVoyage = new \Model\Voyage();
        $voyages = $modelVoyage->findAllByVelo($this->id);
        $nbrVoyages = $voyages->rowCount();
        return $nbrVoyages;
    }

}