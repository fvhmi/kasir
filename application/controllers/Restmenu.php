<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Restmenu extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('template'));
	}

	function cek_login()
	{
		if (!$this->session->userdata('login'))
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$this->cek_login();
		
		$this->template->admin('api/index');
	}
}
