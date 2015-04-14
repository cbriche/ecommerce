<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!--intégration de la sidebar droite-->
    <?php $this->load->view('globals/sidebar');?>
    <div class="col-md-9">
      <div class="row carousel-holder">
        <div class="col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="item active">
                <img class="slide-image" src="assets/images/slide1.jpg" alt="">
              </div> <!--ferme div item active-->
              <div class="item">
                <img class="slide-image" src="assets/images/slide2.jpg" alt="">
              </div> <!--ferme div item 1-->
              <div class="item">
                <img class="slide-image" src="assets/images/slide3.jpg" alt="">
              </div> <!--ferme div item 2-->
            </div> <!--ferme carroussel inner -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div> <!--ferme carroussel générique -->
        </div> <!--ferme col md 12-->
      </div> <!-- ferme div carroussel-->
    <!-- </div> ferme col md 9 -->
    <div class="row">
      <?php foreach ($Top5produits as $key => $value) : ?>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
          <img src="<?php echo $value->displayImage();?>" alt="<?php echo $value->titre_produit;?>">
          <div class="caption">
            <h5 class="pull-right">€<?php echo $value->prix_produit;?></h5>
            <h4>
              <a href="<?php echo site_url("produit/detailproduit/".$value->id_produit."");?>">
                <?php echo $value->titre_produit;?>
              </a>
            </h4>
            <h4>
              <a href="<?php echo site_url("produit/bymarque/".$value->id_marqueDSproduit."");?>">
                <?php echo $value->nom_marque;?>
              </a>
            </h4>
            <p><?php echo character_limiter($value->descrip_produit,30);?> </p>
          </div>
          <div class="ratings">
            <p class="pull-right"> <?=$value->nbCom;?> Avis</p>
            <p>
              <?php
              $mamoyenne=round($value->moyCom);
              for ($i=0; $i<$mamoyenne; $i++)
              {
                if ($i<$mamoyenne)
                {
                  echo '<span class="glyphicon glyphicon-star"></span>';
                }
                else 
                {
                  echo  '<span class="glyphicon glyphicon-star-empty"></span>';
                }
              }
              ;?>
            </div><!-- ferme div class rating-->
            </div> <!--ferme class="caption"-->
          </div> <!--ferme div thumbnail -->
        <?php endforeach ?>    
  </div> <!--ferme div row-->
</div> <!--ferme div contenair-->
<!-- /.container -->
<!--inclusion du footer-->
<?php $this->load->view('globals/footer');?>