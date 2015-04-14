<?php
$toutesmescatego=$this->Categorie_model->touteslescategories();
?>

<!--Gestion de la sidebar gauche-->
<div class="col-md-3">
	<p class="lead">Catégories</p>
	<div class="list-group">
		<?php foreach ($toutesmescatego as $key => $value) : ?>
		<a href="<?php echo site_url("categorie/bycategorie/".$value->id_categorie."");?>" class="list-group-item"><?php echo $value->nom_categorie;?></a>
		<?php endforeach;?>

	</div>
</div>