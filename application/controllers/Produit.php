<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {
	
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

		// on load le commentaire comment qui va traiter la requete d'insert
		$this->load->model('Commentaire_model');
		if ($this->form_validation->run()==true) 
		{

			$mon_commentaire = 
			array(
				'auteur_comment' => $this->input->post('auteur'),
				'contenu_comment' => $this->input->post('commentaire'),
				'note_comment' => $this->input->post('note'),
				'id_produitDScomment'=>$articlebyId->id_produit,
				'Date_comment'=>date('Y-m-d H:i:s')
				);
			$this->Commentaire_model->insertCommentaire($mon_commentaire);

			$this->session->set_flashdata('success_comment', 'Votre commentaire à été ajouté');
			redirect("produit/detailproduit/".$id_produit);
		}
		
		//j'envoie ma requete dans une variable
		$commentaires = $this->Commentaire_model->trouveCommentparIDProduit($id_produit);

		$nbrecommentaires = $this->Commentaire_model->
		CompteCommentparIDProduit($id_produit);

		$moyennecommentaire=$this->Commentaire_model->
		MoyenneCommentparIDProduit($id_produit);

		/* on loade la page detail produit avec les infos*/

		// var_dump($commentaires);
		// var_dump($nbrecommentaires);
		var_dump ($moyennecommentaire);
		$this->load->view('produit/detailproduit', 
			[
			'articlebyId'=>$articlebyId, 
			'touslescommentaires' => $commentaires, 
			'affiche_nbrecommentaire'=>$nbrecommentaires, 
			'affiche_moyennecommentaire'=>$moyennecommentaire
			]);
	}

	public function bymarque($idmarque) 
	{
		//var_dump($idmarque);
		$this->load->model('Produit_model');
		$datamarque=$this->Produit_model->datamarque($idmarque);
		$produitbymarque=$this->Produit_model->produitparmarque($idmarque);
		$this->load->view('produit/bymarque', 
			[
			'datamarque'=>$datamarque,
			'produitbymarque'=>$produitbymarque
			]);
	}
	
}

?>