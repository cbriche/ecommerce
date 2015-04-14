<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!--intégration de la sidebar droite-->
    <?php $this->load->view('globals/sidebar');?>

    <div class="col-md-9">
      <div class="jumbotron">
        <h1>Tous les produits de la categorie: <?php echo $datamarque->nom_marque;?></h1>
        <p class="text_marque"><?php echo $datamarque->descrip_marque;?></p>
         </div> <!--ferme row-->
      <div class="row">
        <?php 
        if (empty($produitbymarque)) echo "pas de produit pour cette marque";
        foreach ($produitbymarque as $key => $value) : ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
          <div class="thumbnail">
            <img src="<?php echo $value->displayImage();?>" alt="<?php echo $value->titre_produit;?>">
          </div><!--ferme div thumbnail-->
          <div class="caption">
            <h4 class="pull-right">€<?php echo $value->prix_produit;?></h4>
            <h4><a href="<?php echo site_url("produit/detailproduit/".$value->id_produit."");?>"><?php echo $value->titre_produit;?></a></h4>
            <?php echo $value->nom_marque;?>
          </h4>
          <p><?php echo character_limiter($value->descrip_produit,50);?> </p>
        </div><!--ferme caption-->
         </div> <!--col-sm-4 col-lg-->
        <?php endforeach ?>

      </div> <!--ferme row-->
    </div> <!-- /.container -->
    <!--inclusion du footer-->
    <?php $this->load->view('globals/footer');?>