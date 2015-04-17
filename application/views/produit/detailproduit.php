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
          <div class="thumbnailitem">
            <img class="img-responsiveitem" src="<?php echo $articlebyId->displayImage();?>" alt="<?php echo $articlebyId->titre_produit;?>">
            <div class="caption-full">
              <h4 class="pull-right"><?php echo formatprix($articlebyId->prix_produit);?></h4>
              <h4><a href="#"><?php echo $articlebyId->titre_produit;?></a>
              </h4>
              <p><?php echo $articlebyId->descrip_produit;?></p>
            </div>
            <div class="ajoutpanier">
              <?php echo form_open("panier/ajout");?>

              <div class="text-right">   
          <?php echo form_label('Quantite', 'Quantite');?>
          <?php $Qte=[
          "id"=>'qte',
          "name"=>"qte",
          "type"=>"number",
          "class"=>"text-right"];
          echo form_input($Qte);?>

           <?php $idProd=[
          "id"=>'idprod',
          "name"=>"idprod",
          "type"=>"hidden",
          "class"=>"text-right",
          "value"=> $articlebyId->id_produit];
          echo form_input($idProd);?>


          <?php echo form_error('qte', '<div class="alert alert-danger">', '</div>'); ?>
          <?= form_submit('panier/ajout', 'Ajouter au Panier', "class='btn btn-success', name='panier'");?>   
        </div>

              <?= form_close(); ?>
            </div> <!--ferme div ajout panier-->
          

            <div class="ratings">
              <p class="pull-right">
                <?=$affiche_nbrecommentaire;?> Avis</p>
              <p>
                <?php
                if (empty($affiche_nbrecommentaire))
                {
                  echo "Pas encore d'Avis";
                }
                else
                {
                  $mamoyenne=round($affiche_moyennecommentaire->note_comment);
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
                 }
              ;?>
            </p>
          </div>
        </div>
        <?php echo form_open("produit/detailproduit/".$articlebyId->id_produit);

        if (empty($affiche_nbrecommentaire)) 
        {
          echo form_fieldset('Soyez le premier à donner votre avis'); 
        }
        else 
        {
          echo form_fieldset('Laisser un commentaire');
        }
        ;?>
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
          <?= form_submit('mysubmit', 'Valider', "class='btn btn-success', name='avis'");?>
        </div>
        <?= form_fieldset_close(); ?>
        <?= $this->session->flashdata('success_comment');?>
        <?= form_close(); ?>




        <div class="well">

         <div class="text-right">

           <a class="btn btn-success">Voir les avis</a>
         </div>
         <hr>
         <div class="row">
          <div class="col-md-12">
            <?php foreach ($touslescommentaires as $value) :?>
            <p>Auteur <?= $value->auteur_comment;?></p>
            <p>Auteur <?= $value->contenu_comment;?></p>
            <?php 

            for ($i=0; $i<5; $i++)
            {
              if ($i<$value->note_comment) 
              {
                echo '<span class="glyphicon glyphicon-star"></span>';
              }
              else 
              {
                echo  '<span class="glyphicon glyphicon-star-empty"></span>';

              }
            };?>


            <span class="pull-right"><?= $value->Date_comment;?></span>
            <!--<p><?=$value->note_comment;?></p>-->
            <hr>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container -->
<!--inclusion du footer-->
<?php $this->load->view('globals/footer');?>