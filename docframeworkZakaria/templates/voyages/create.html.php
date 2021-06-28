<?php if(!$voyage){?>

<div class="container">
    <form class="form" action="index.php?controller=voyage&task=create" method="POST">
        <div class="form-group"><textarea name="description" placeholder="Description de votre voyage" cols="30" rows="10"></textarea>
    </div>
        <input type="hidden" name="veloId" value="<?php echo $velo_id ?>">
        <div class="form-group"><textarea name="image" placeholder="URL de votre image"  cols="30" rows="10"></textarea>
    </div>
        <div class="form-group"><button type="submit" class="btn btn-success">Envoyer</button>
    </div>

    </form>

<?php } else { ?>

<form class="form" action="index.php?controller=voyage&task=edit" method="POST">
        <input type="hidden" name="voyageId" value="<?php echo $voyage->id?>">
        <input type="hidden" name="veloId" value="<?php echo $voyage->velo_id?>">
                <div class="form-group">
                <textarea name="description" cols="30" rows="10"><?php echo $voyage->description?>
                </textarea>
                </div>
                <div class="form-group"><textarea name="image" cols="30" rows="10"><?php echo $voyage->image?></textarea>
            </div>
                <div class="form-group"><button type="submit" class="btn btn-primary">Enregistrer les modifs</button>
            </div>

        </form>
<?php } ?>




