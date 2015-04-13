<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!--intégration de la sidebar droite-->
    <?php $this->load->view('globals/sidebar');?>

    <div class="container">

      <div class="row">

        <div class="col-md-9">

          <div class="thumbnail">
            <img class="img-responsive" src="<?php echo $articlebyId->displayImage();?>" alt="<?php echo $articlebyId->titre_produit;?>">
            <div class="caption-full">
              <h4 class="pull-right"><?php echo $articlebyId->prix_produit;?></h4>
              <h4><a href="#"><?php echo $articlebyId->titre_produit;?></a>
              </h4>
              <p><?php echo $articlebyId->descrip_produit;?></p>
            </div>
            <div class="ratings">
              <p class="pull-right">3 reviews</p>
              <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                4.0 stars
              </p>
            </div>
          </div>
          <?= form_open("produit/detailproduit/".$articlebyId->id_produit); ?>
          <?php echo form_fieldset('Laisser un commentaire');?>
          <div class="controls">
            <?php echo form_label('Auteur', 'auteur');?>
            <?php $data=[
            "id"=>'auteur',
            "name"=>"auteur",
            "placeholder"=>"Votre nom",
            "class"=>"form-control",
            "value"=>set_value("auteur")];
            echo form_input($data);?>
            <?php echo form_error('auteur', '<div class="alert alert-danger">', '</div>'); ?>
          </div>

          <div class="controls">
            <?php echo form_label('Commentaire (max 250 caractères)', 'commentaire');?>
            <?php $data=[
            "id"=>'commentaire',
            "name"=>"commentaire",
            "placeholder"=>"Votre commentaire",
            "class"=>"form-control",
            "value"=>set_value("commentaire")];
            echo form_textarea($data);?>
            <?php echo form_error('commentaire',  '<div class="alert alert-danger">', '</div>'); ?>
          </div>
          
          <div class="controls">
            <?php echo form_label('note', 'note');?>
            <?php $data=[
            "id"=>'note',
            "name"=>"note",
            "placeholder"=>"Votre note",
            "class"=>"form-control",
            "value"=>set_value("note")];
            echo form_input($data);?>
            <?php echo form_error('note', '<div class="alert alert-danger">', '</div>'); ?>
          </div>

          <div class="text-right">
            <?= form_submit('mysubmit', 'Valider', "class='btn btn-success'");?>
          </div>
          <?= form_fieldset_close(); ?>
          <?= form_close(); ?>




          <div class="well">

           <div class="text-right">

             <a class="btn btn-success">Voir les avis</a>
           </div>
           <hr>
           <div class="row">
            <div class="col-md-12">
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              Anonymous
              <span class="pull-right">10 days ago</span>
              <p>This product was great in terms of quality. I would definitely buy another!</p>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              Anonymous
              <span class="pull-right">12 days ago</span>
              <p>I've alredy ordered another one!</p>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star-empty"></span>
              Anonymous
              <span class="pull-right">15 days ago</span>
              <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->
  <!--inclusion du footer-->
  <?php $this->load->view('globals/footer');?>