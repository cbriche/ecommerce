<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

	public function ajout()
	{
		//on regarde si les infos nécessaires sont présentes
		if(empty($this->input->post('qte')) || empty($this->input->post('idprod'))) 
		{
			//on redirige vers l'accueil
			redirect('panier');
		}
		// déclaration des variables pour le stockage panier
		$idproduit=$this->input->post('idprod');
		$qte=$this->input->post('qte');
		$panier=unserialize(get_cookie('caddie'));
		if (empty($panier)) 
		{
			$panier=[];
		}

		if (isset($panier[$idproduit])) 
		{
			$panier[$idproduit]=intval($panier[$idproduit])+intval($qte)
			;
			//var_dump(unserialize(get_cookie('caddie')));
		}
		else
		{
		//stockage dans var panier des infos produit et qté	
			$panier[$idproduit]=intval($qte);
		//création d'un cookie pour stocker le contenu du panier
		}
		set_cookie("caddie", serialize($panier), time()+172800);
		redirect('panier');
		//
	}

	public function index() 
	{
		//Je récupére le cookies en tableau
		$recupCookie=unserialize(get_cookie('caddie'));
		var_dump($recupCookie);
	//je monte le model	
		$this->load->model('Produit_model');
	//je monte la requete
		$monpanier=$this->Produit_model->produitpanier(array_keys($recupCookie));
		var_dump($monpanier);
	//je monte la vue avec le résultat de la requete
		$this->load->view('produit/panier', 
			[
			'affiche_monpanier'=>$monpanier,
			'recupCookie'=>$recupCookie
			]);
	}
}

