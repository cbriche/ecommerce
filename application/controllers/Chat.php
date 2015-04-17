<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller 
{

	public function index()
	{
	//on va chercher la  requetes dans produit model
		$this->load->model('Chat_model');
		//on affecte une variable au résultat de la requete
		$messages=$this->Chat_model->touslesmessages();

	//gestion du formulaire
		// On oblige le remplissage des champs pour la validation
		$this->form_validation->set_rules('auteur', 'votre nom', 'required');
		$this->form_validation->set_rules('contenu', 'contenu', 'required');
		
		//si on est bien la validation du formulaire
		if ($this->form_validation->run()==true) 
		{
			
			$mon_message = 
			array(
				'auteur_message' => $this->input->post('auteur'),
				'contenu_message' => $this->input->post('contenu'),
				'date_message'=>date('Y-m-d H:i:s')
				);
			$this->Chat_model->insertMessage($mon_message);

			$this->session->set_flashdata('info', 'Votre message à été ajouté');

			if($this->input->is_ajax_request())
			{
				die(json_encode([
					"csrf"=>$this->security->get_csrf_hash()
					]));
			}
			redirect ('chat');

		}
		
		if($this->input->is_ajax_request())
		{
			die(json_encode([
				'message'=>$this->load->view('ajax_message', 
					[
					'affiche_message'=>$messages],
					true)
				]));
		}

		$this->render('discussion',
			[
			'affiche_message'=>$messages
			]);
	}

	public function action($choixAction, $idmessage)
	{
		var_dump($idmessage);
		var_dump($choixAction);
		if ($choixAction==='supprimer') 
		{
		$this->Chat_model->delete1message($idmessage);
		redirect ('chat');
		}
	}
}