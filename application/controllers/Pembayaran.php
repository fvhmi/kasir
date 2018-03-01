<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('template'));
		$this->load->model('M_admin', 'admin');
	}

	function cek_login()
	{
		if (!$this->session->userdata('login'))
		{
			redirect('auth');
		}
	}

	function cek_kasir()
	{
		$level = $this->session->userdata('level');
		if ($level != 2)
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$this->cek_login();
		$this->cek_kasir();

		$data['pembayaran']	= $this->admin->get_all('pembayaran')->result();
		
		$this->template->admin('pembayaran/index', $data);
	}
}
