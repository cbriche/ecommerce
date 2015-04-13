<?php

class Produit_model extends CI_Model
{
	public function findLimit($nb=5)
	{
		$this->db->select('*');
		$this->db->from('produit');
		$this->db->join('marque', 'marque.id_marque=produit.id_marqueDSproduit');
		$this->db->limit($nb);
		$requete= $this->db->get();
		return $requete->result("Produit_model");

	}

	public function displayImage() 
	{
		return base_url()."assets/images/".$this->image_produit;
	}

	public function trouve1produitparID($id_produit)
	{
		$requete=$this->db->get_where('produit', ['id_produit'=>$id_produit]);
		// var_dump($requete->unbuffered_row("Produit_model"));
		//unberffered permet de récup les valeurs de la requete sans passer par un tableau
		return $requete->unbuffered_row("Produit_model");
	}

	public function produitparmarque($idmarque)
	{
		
		$this->db->select('produit.*, marque.nom_marque');
		$this->db->from('produit');
		$this->db->join('marque', 'marque.id_marque=produit.id_marqueDSproduit');
		$this->db->where('id_marque',$idmarque);
		$requete= $this->db->get();
		return $requete->result("Produit_model");
	}
	public function datamarque($idmarque)
	{
		$this->db->select('*');
		$this->db->from('marque');
		$this->db->where('id_marque',$idmarque);
		$requete= $this->db->get();
		return $requete->unbuffered_row("Produit_model");
	}

	
	
}