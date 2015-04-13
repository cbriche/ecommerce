<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

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
	public function detailproduit($id_produit)
	{
		$this->load->model('Produit_model');
		/*excution de la requete (cf produit_model)*/
		$articlebyId=$this->Produit_model->trouve1produitparID($id_produit);
		/*gestion du formulaire*/
		/* on charge la librairie de validation formulaire codeigniter*/
		$this->load->library('form_validation');
		/* on gère les messages d'erreur sur les champ*/
		/*$this->form_validation->set_message("required", "Attention! Champs requis");*/
		
		$this->form_validation->set_rules('auteur', 'votre nom', 'required');
		$this->form_validation->set_rules('commentaire', 'votre commentaire', 'required|max_length[250]', array('max_length'=>'Votre commentaire ne peut excéder 250 caractères'));
		$this->form_validation->set_rules('note', 'Note', 'required|less_than[6]', 
			array('less_than'=>"Vous ne pouvez pas mettre une note supérieur à 5"));

		//on verifie si la validation est ok

		if ($this->form_validation->run()==true) 
		{
			// on load le commentaire comment qui va traiter la requete d'insert
			$this->load->model('Commentaire_model');

			$mon_commentaire = 
			array(
				'auteur_comment' => $this->input->post('auteur'),
				'contenu_comment' => $this->input->post('commentaire'),
				'note_comment' => $this->input->post('note'),
				'id_produitDScomment'=>$articlebyId->id_produit,
				'Date_comment'=>date('Y-m-d H:i:s')
				);
			var_dump($mon_commentaire);
			$this->Commentaire_model->insertCommentaire($mon_commentaire);
			$id_produit=$articlebyId->id_produit;
			$this->Commentaire_model->trouveCommentparIDProduit($id_produit);
		}
		



		
		/* on loade la page detail produit avec les infos*/
		$this->load->view('produit/detailproduit', ['articlebyId'=>$articlebyId]);
	}

	public function bymarque($idmarque) 
	{
		//var_dump($idmarque);
		$this->load->model('Produit_model');
		$datamarque=$this->Produit_model->datamarque($idmarque);
		$produitbymarque=$this->Produit_model->produitparmarque($idmarque);
		$this->load->view('produit/bymarque', ['datamarque'=>$datamarque, 'produitbymarque'=>$produitbymarque]);
	}

	public function trouveCommentparIDProduit($id_produit)
	$this->load->model('Commentaire_model');
	$commentaireparIDproduit=





}

?>