<!--intégration du head, et navigation haute-->
<?php $this->load->view('globals/header');?>
<!-- Page Content -->
<div class="container">
    <div class="row">
       <div class="col-sm-12 col-md-10 col-md-offset-1">
  <table class="table table-hover">
      <thead>
          <tr>
              <th>Produit</th>
              <th>Quantité</th>
              <th class="text-center">Prix</th>
              <th class="text-center">Total</th>
              <th> </th>
          </tr>
      </thead>
      <tbody>
        <?php $PrixTotalHT=0; $MontantTVA=0; $TotalTTC=0;?>
        <?php foreach ($affiche_monpanier as $key => $value)  :?>
          <tr>
              <td class="col-sm-8 col-md-6">
           
                 <div class="thumbnailitem">
              <div class="media">
                  <div class="thumbnailitem">
            <img class="media-object" style="width: 72px; height: 72px"src="<?php echo $value->displayImage();?>" alt="<?php echo $value->titre_produit;?>">
                
     <div class="media-body">
      <h6 class="media-heading"><a href="<?php echo site_url("produit/detailproduit/".$value->id_produit."");?>"><?php echo $value->titre_produit;?></a></h6>
                                <h6 class="media-heading"> by <a href="<?php echo site_url("produit/bymarque/".$value->id_marqueDSproduit."");?>"><?php echo $value->nom_marque;?></a></h6>   
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <a href="<?=site_url();?>/panier/action/down/<?php echo $value->id_produit ?>"><span class="glyphicon glyphicon-minus"></span></a>
                        <span><?php echo $recupCookie[$value->id_produit]; ?></span>
                        <a href="<?=site_url();?>/panier/action/up/<?php echo $value->id_produit ?>"><span class="glyphicon glyphicon-plus"></span></a>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€ <?php echo $value->prix_produit;?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€ <?php echo $prixTotalligneProduit=$recupCookie[$value->id_produit] * $value->prix_produit;?> </strong></td>
                        <td class="col-sm-1 col-md-1">
                          <a href="<?=site_url();?>/panier/action/supprimer/<?php echo $value->id_produit ?>"><button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </button></a>
                        </td>
                    
                    </tr>
                    <?php $PrixTotalHT+=$prixTotalligneProduit;?>
                    <?php endforeach ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Sous Total HT</h5></td>
                        <td class="text-right"><h5><strong><?php echo formatprix($PrixTotalHT);?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Montant TVA base 20%</h5></td>
                        <td class="text-right"><h5><strong><?php  $MontantTVA=$PrixTotalHT * 0.2; echo formatprix($MontantTVA);?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total TTC</h3></td>
                        <td class="text-right"><h3><strong><?php $totalTTC=$PrixTotalHT+$MontantTVA;
                        echo formatprix($totalTTC);?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="<?=site_url();?>#"><button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuer votre shopping
                        </button></a></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Passez votre commande <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
 
    <!--inclusion du footer-->
    <?php $this->load->view('globals/footer');?>