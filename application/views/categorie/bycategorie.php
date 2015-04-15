<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!--intégration de la sidebar droite-->
    <?php $this->load->view('globals/sidebar');?>

    <div class="col-md-9">
      <div class="jumbotron">
        <h1>Tous les produits de la categorie: <?php echo $affiche_datacatego->nom_categorie;?></h1>
        <p class="text_marque"><?php echo $affiche_datacatego->descrip_catego;?></p>
         </div> <!--ferme row-->
      <div class="row">
        <?php 
        if (empty($affiche_produitbycatego)) echo "pas de produit pour cette catégorie";
        foreach ($affiche_produitbycatego as $key => $value) : ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
            <img src="<?php echo $value->displayImage();?>" alt="<?php echo $value->titre_produit;?>">
          </div><!--ferme div thumbnail-->
          <div class="caption">
            <h4 class="pull-right">€<?php echo $value->prix_produit;?></h4>
            <h4><a href="<?php echo site_url("produit/detailproduit/".$value->id_produit."");?>"><?php echo $value->titre_produit;?></a></h4>
            <?php echo $value->nom_categorie;?>       
            <a href="<?php echo site_url("marque/listemarque/".$value->id_marqueDSproduit."");?>"><?php echo $value->nom_marque;?></a>
          </h4>
          <p><?php echo character_limiter($value->descrip_produit,50);?> </p>
        </div><!--ferme caption-->
         </div> <!--col-sm-4 col-lg-->
        <?php endforeach ?>

      </div> <!--ferme row-->
    </div> <!-- /.container -->
    <!--inclusion du footer-->
    <?php $this->load->view('globals/footer');?>