<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//on monte les modèles de requetes que nous avons utilisés
		$this->load->model('Produit_model');
		$this->load->model('Commentaire_model');

		//recupération des requetes
		$Top5produits=$this->Produit_model->findLimit();
		//$slider=$this->Produit_model->slider();

			
		//on déclare les informations que l'on devra charger dans la vue
		//total des commentaires
		//$nbrecommentaires = $this->Commentaire_model->CompteCommentparIDProduit($id_produit);

		//moyenne des commmentaires
		// $moyennecommentaire=$this->Commentaire_model->
		// MoyenneCommentparIDProduit($id_produit);
		

		$this->load->view('accueil', [
			'Top5produits'=>$Top5produits,
		//	'Affiche_slider'=>$slider			
			]);
	}
}