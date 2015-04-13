<?php

class Marque_Model extends CI_Model
{
	public function toutesmesmarques()
	{
		$this->db->select('*');
		$this->db->from('marque');
		$requete= $this->db->get();
		return $requete->result("Marque_model");
	}

	public function displayImage() 
	 {
	 	return base_url()."assets/images/".$this->logo_marque;
	 }

	// public function trouve1produitparID($id_produit)
	// {
	// 	$requete=$this->db->get_where('produit', ['id_produit'=>$id_produit]);
	// 	// var_dump($requete->unbuffered_row("Produit_model"));
	// 	//unberffered permet de récup les valeurs de la requete sans passer par un tableau
	// 	return $requete->unbuffered_row("Produit_model");
	// }


}