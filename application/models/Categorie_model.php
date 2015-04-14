<?php

class Categorie_Model extends CI_Model
{
	public function touteslescategories()
	{

		//requete pour lister les catégories
		$this->db->select('*');
		$this->db->from('categorie');
		$requete= $this->db->get();
		return $requete->result("Categorie_model");
	}

	


}
