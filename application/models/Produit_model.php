<?php

class Produit_model extends CI_Model
{
	public function findLimit($nb=5)
	{
		$this->db->select('*, COUNT(note_comment) AS nbCom, AVG(note_comment) AS moyCom');
		$this->db->from('produit');
		$this->db->join('marque', 'marque.id_marque=produit.id_marqueDSproduit', 'left');
		$this->db->join('commentaire', 'produit.id_produit=commentaire.id_produitDScomment', 'left');
		$this->db->group_by('id_produit');
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

	public function datacatego($idcategorie)
	{
		$this->db->select('*');
		$this->db->from('categorie');
		$this->db->where('id_categorie',$idcategorie);
		$requete= $this->db->get();
		return $requete->unbuffered_row("Produit_model");
	}

	public function produitparcategorie($idcategorie)
	{

		//requete pour lister les catégories
		$this->db->select('produit.*, categorie.descrip_catego, categorie.nom_categorie, marque.nom_marque');
		$this->db->from('produit');
		$this->db->join('categorie', 'categorie.id_categorie=produit_has_categorie.categorie_id_categorie');
		$this->db->join('marque', 'marque.id_marque=produit.id_marqueDSproduit');
		$this->db->where('produit_has_categorie.categorie_id_categorie',$idcategorie);
		$requete= $this->db->get();
		return $requete->result("Produit_model");
	}

	public function produitpanier($recupCookie) 
	{
		



		//requete pour lister les produit du panier
		$this->db->select('produit.*, marque.nom_marque');
		$this->db->from('produit');
		$this->db->join('marque', 'marque.id_marque=produit.id_marqueDSproduit');
		$this->db->where_in('produit.id_produit',($recupCookie));
		$requete= $this->db->get();
		return $requete->result("Produit_model");
	}


	// public function slider()
	// {
	// 	$this->db->select('image_produit, AVG(note_comment) AS moyCom');
	// 	$this->db->from('produit');
	// 	$this->db->join('commentaire', 'produit.id_produit=commentaire.id_produitDScomment', 'left');
	// 	$this->db->group_by('id_produit');
	// 	$this->db->order_by('moyCom, DESC');
	// 	$this->db->limit(5);
	// 	$requete= $this->db->get();
	// 	return $requete->result("Produit_model");
	// }

	
	
}