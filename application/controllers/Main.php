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
		//charge helper uniquement pour l'accueil.php
		//	$this->load->helper('url'); // charger en autoloader
		// $this->load->helper('text'); // charger en autoloader
		$this->load->model('Produit_model');
		$Top5produits=$this->Produit_model->findLimit();
		$this->load->view('accueil', ['Top5produits'=>$Top5produits]);
	}
}
