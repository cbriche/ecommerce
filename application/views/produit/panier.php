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
                        <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $recupCookie[$value->id_produit];?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€ <?php echo $value->prix_produit;?></strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>€ <?php echo $recupCookie[$value->id_produit] * $value->prix_produit;?> </strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                        </button></td>
                    
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Sous Total HT</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimation Livraison</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total HT</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuer votre shopping
                        </button></td>
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