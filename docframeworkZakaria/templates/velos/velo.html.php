<div class="container text-center">

<h1>Vous êtes sur le modèle : <?php echo $velo->model?></h1>

<a href="index.php?controller=velo&task=index" class="btn btn-success">Revenir à la liste des vélos</a>


<div class="card text-center" style="width: 18rem;">
    <h2><?php echo $velo->model?></h2>
  <img src="<?php echo $velo->image?>" class="card-img-top" >
  <a href="index.php?controller=velo&task=suppr&id=<?php echo $velo->id?>" class="btn btn-danger">Supprimer ce vélo </a>
  <p> 
 <?php // echo $velo->getVoyages();?>  
  
  
  voyages
  </p>
</div>

<!-- Form ajout voyage -->
<form action="index.php?controller=voyage&task=create" method="POST">
<button type="submit" class="btn btn-primary" name="veloId" value="<?php echo $velo->id?>">Ajouter un voyage</button>
</form>

</div>



<?php if(!$voyages) {?>

<h3>Nous n'avons pas encore de voyages pour ce vélo !</h3>

<?php }?>


<h3>Voyages faits avec ce vélo : </h3>

<?php foreach($voyages as $voyage) {?>

<hr>

<img src="<?php echo $voyage->image?>">
<h4><?php echo $voyage->description?></h4>

<!-- Form edit voyage -->
<form action="index.php?controller=voyage&task=create" method="POST">
    <input type="hidden" name="veloId" value="<?php echo $voyage->velo_id?>">
    <button type="submit" class="btn btn-warning" name="voyageId" value= "<?php echo $voyage->id?>">Modifier le voyage</button>
</form>

<!-- Form suppression voyage -->
<form action="index.php?controller=voyage&task=suppr" method="POST">
<button type="submit" class="btn btn-danger" name="voyageIdASupprimer" value="<?php echo $voyage->id?>">Supprimer ce voyage </button>
</form>

<?php }?>