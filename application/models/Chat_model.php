<?php

class Chat_Model extends CI_Model
{
	public function touslesmessages()
	{
		//requete pour lister les messages
		$this->db->select('*');
		$this->db->from('message');
		$requete= $this->db->get();
		return $requete->result("Chat_model");
	}

	public function delete1message($idmessage) 
	{
		//requete pour lister les messages
		$this->db->where('id_message',$idmessage);
		$this->db->delete('message');
		//return $requete->result("Chat_model");
	}

	public function insertMessage($mon_message)
	{

		/* je récupére les informations de mes champs via le paramétre $mon_message
		/* le tableau des données est situé dans le controller chat*/
		
		$this->db->insert('message', $mon_message);

	}
}