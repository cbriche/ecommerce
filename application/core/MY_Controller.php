<?php

class MY_Controller extends CI_Controller
{

	public function render($page,$data=[])
	{

		$this->load->view('globals/header');
		$this->load->view($page,$data);
		$this->load->view('globals/footer');
	}
}

?>