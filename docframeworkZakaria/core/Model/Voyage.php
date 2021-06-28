<?php 

namespace Model;

class Voyage extends Model {

    protected $table = "voyages";

    public $id;

    public $description;

    public $image;

    public $velo_id;

    /**
     * 
     * Permet de trouver tous les voyages liés à un vélo 
     * @param integer $veloId
     * @return array|bool 
     */

    public function findAllByVelo(int $veloId){

        $requete = $this->pdo->prepare("SELECT * FROM voyages WHERE velo_id = :veloId");
        $requete->execute(["veloId" => $veloId]);
        $items = $requete->fetchAll(PDO::FETCH_CLASS, $className);
        return $items;
    }

    /**
     * 
     * 
     * Permet d'ajouter un voyage lié à un vélo
     * @param string $description
     * @param string $image
     * @param int $veloId
     */

    public function insert(string $description, string $image, int $veloId) {

        $sql = $this->pdo->prepare("INSERT INTO voyages (description, image, velo_id) VALUES (:description, :image, :veloId)");

        $sql->execute([
            'description' => $description,
            'image' => $image, 
            'veloId' => $veloId
        ]);

    }

    /**
     * 
     * Permet de mettre à jour un voyage
     * @param string $description
     * @param string $image
     * @param integer $id
     * @return void
     */

    public function update(string $description, string $image, int $id){


        $sql = $this->pdo->prepare("UPDATE voyages SET description = :description, image = :image WHERE id = :id");

        $sql->execute([
            "description" => $description,
            "image" => $image,
            "id" => $id
        ]);

    }

    


}