<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!--intégration de la sidebar droite-->
    <?php $this->load->view('globals/sidebar');?>


    <div class="col-md-9">

      <div class="jumbotron">
        <h1>Toutes nos marques</h1>
        <p>Découvrez nos marques partenaires</p>
      </div>
      <div class="row">
        <?php foreach ($touteslesmarques as $key => $value) : ?>
        <div class="listemarque col-xs-6 col-lg-3">
             <h4><?php echo $value->nom_marque;?></h4>
                      <div class="retaille">
            <img src="<?php echo $value->displayImage();?>" alt="<?php echo $value->nom_marque;?>">
          </div> <!--ferme div thumbail -->
            <p><?php echo character_limiter($value->descrip_marque,50);?> </p>
            <p><a class="btn btn-default" href="<?php echo site_url("produit/bymarque/".$value->id_marque."");?>" role="button">Voir les produits de la marque</a></p>
          </div> <!--col-xs-6 col-lg-4"-->
        <?php endforeach ?>
      </div> <!--ferme div row-->
    </div> <!--ferme col-md-9"-->
  </div> <!--ferme div row-->
</div> <!-- /.container -->

<!--inclusion du footer-->
<?php $this->load->view('globals/footer');?>