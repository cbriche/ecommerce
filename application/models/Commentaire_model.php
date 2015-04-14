<?php

class Commentaire_Model extends CI_Model
{

	/* nous faisons une requete sql pour l'insertion du commentaire
	nous devons passer en paramétre le produit concerné par le commentaire
	et la date d'envoi du formulaire*/
	public function insertCommentaire($mon_commentaire)
	{

		/* je récupére les informations de mes champs via le paramétre
		/* le tableau des données est situé dans le controller produit*/
		
		$this->db->insert('commentaire', $mon_commentaire);

	}

	public function displayImage() 
	{
		return base_url()."assets/images/".$this->logo_marque;
	}

	public function trouveCommentparIDProduit($id_produit)
	{
		
		$this->db->select('*');
		$this->db->from('commentaire');
		$this->db->where('id_produitDScomment',$id_produit);
		$requete= $this->db->get();
		return $requete->result();
		
	}
	public function CompteCommentparIDProduit($id_produit)
	{

		// $sql = "SELECT count(note_comment) FROM `commentaire` WHERE id_produitDScomment=$id_produit";
		
		//$this->db->count_all('commentaire');
		$this->db->from('commentaire');
		$this->db->where('id_produitDScomment',$id_produit);
		return $requete= $this->db->count_all_results();
		// return $requete->result();
		
	}
	public function MoyenneCommentparIDProduit($id_produit)
	{
	
		$this->db->select_avg('note_comment');
		// $this->db->from('commentaire');
		$this->db->where('id_produitDScomment',$id_produit);
		$requete= $this->db->get("commentaire");
		return $requete->unbuffered_row();
	}
}