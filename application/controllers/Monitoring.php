<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
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

	public function index()
	{
		$this->cek_login();
		
		$this->template->admin('monitoring/index');
	}

	public function get_data_monitoring() {
        $this->load->model('M_monitoring');
        $result = $this->M_monitoring->get_data_monitoring();
        return $result;
    }
}
