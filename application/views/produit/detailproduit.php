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
              <h4 class="pull-right">€<?php echo $articlebyId->prix_produit;?></h4>
              <h4><a href="#"><?php echo $articlebyId->titre_produit;?></a>
              </h4>
              <p><?php echo $articlebyId->descrip_produit;?></p>
            </div>
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
        <?php form_open("produit/detailproduit/".$articlebyId->id_produit);

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
          <?= form_submit('mysubmit', 'Valider', "class='btn btn-success'");?>
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