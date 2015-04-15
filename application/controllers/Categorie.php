<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

	public function bycategorie($idcategorie)
	{

		//on va chercher les requetes dans produit model
		$this->load->model('Produit_model');
		//on affecte une variable au résultat des requetes
		$datacatego=$this->Produit_model->datacatego($idcategorie);
		$produitbycatego=$this->Produit_model->produitparcategorie($idcategorie);
		var_dump($produitbycatego);


		//on appelle la page (view) et on lui envoie les datas dynamiques
		$this->load->view('categorie/bycategorie',
			[
			'affiche_datacatego'=>$datacatego,
			'affiche_produitbycatego'=>$produitbycatego
			]);
	}
}


