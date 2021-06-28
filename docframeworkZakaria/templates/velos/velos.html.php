
<?php foreach ($velos as $velo){?>

<div class="container">

<div class="card" style="width: 18rem;">
    <h2><?php echo $velo->model?></h2>
  <img src="<?php echo $velo->image?>" class="card-img-top" >
  <p> <?php // echo $velo->getVoyages() ?> voyages</p>
  <a href="index.php?controller=velo&task=show&id=<?php echo $velo->id?>" class="btn btn-primary">Voir ce vélo</a>
    <a href="index.php?controller=velo&task=suppr&id=<?php echo $velo->id?>" class="btn btn-danger">Supprimer ce vélo </a>

</div>

</div>




<?php } ?>