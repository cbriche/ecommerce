<?php foreach ($affiche_message as $key => $value) :?>
<li class="media">
<div class="media-body">
<a class="pull-left" href="#">
<img class="media-object img-circle " src="<?php echo base_url();?>/assets/images/user.png" />
</a>
<div class="text-message">
<?php echo $value->contenu_message;?>
<br />
</div>
<small class="text-muted"><?php echo $value->auteur_message;?> | <?php echo $value->date_message;?></small>
<div class="poubelle">
<a href="<?=site_url();?>/chat/action/supprimer/<?php echo $value->id_message ?>"><span class="glyphicon glyphicon-trash"></span></a>
</div>
<hr />
</div>
</li>
<?php endforeach;?>