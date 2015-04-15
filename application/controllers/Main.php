<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		//delete_cookie('caddie');
		//set_cookie("test", "ceci est un test", time()+172800);
		//var_dump(get_cookie("test"));
	


		//on monte les modèles de requetes que nous avons utilisés
		$this->load->model('Produit_model');
		$this->load->model('Commentaire_model');

		//recupération des requetes
		$Top5produits=$this->Produit_model->findLimit();
				

		$this->load->view('accueil', [
			'Top5produits'=>$Top5produits,
		]);
	}
}