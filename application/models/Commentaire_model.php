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
}