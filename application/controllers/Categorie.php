<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

	public function bycategorie($Idcategorie)
	{
		//charge helper uniquement pour l'accueil.php
		//$this->load->helper('url');
		// $this->load->view('categorie/allcaterogie');

		$this->load->model('Produit_model');
		$produitbycatego=$this->Produit_model->produitparcategorie($Idcategorie);

		var_dump($produitbycatego);
		$this->load->view('categorie/bycategorie',
			[
			'affiche_produitbycatego'=>$produitbycatego
			]);

	}
}


