<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
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
		
		$data['pesanan']	= $this->admin->pesanan();

		$data['kode'] 		= $this->admin->kode_pesanan();

		$data['menu'] 		= $this->admin->get_where('menu', array('status' => 'Ready'))->result();

		$this->template->admin('pesanan/index', $data);
	}

	public function detail($id)
	{
		$this->cek_login();

		$id = $this->uri->segment(3);
		
		$data['pesanan']	= $this->admin->pesanan_menu($id);

		$data['kode'] 		= $this->admin->kode_pesanan();

		$this->template->admin('pesanan/detail', $data);
	}

	public function deactive($id)
	{
		$this->cek_login();

		$this->cek_kasir();

		$id = $this->uri->segment(3);

		$data = [
			'status' => 'tidak aktif',
		];

		$this->admin->update('pesanan', $data, array('id' => $id));

        $this->session->set_flashdata('success', "Pesanan Berhasil di non aktifkan");

        redirect('pesanan');
	}

	public function save()
	{
		$pesanan = [
			'id' 		=> $this->input->post('id'),
			'no_meja' 	=> $this->input->post('no_meja'),
			'status'	=> 'aktif',
			'id_pelayan'=> $this->session->userdata('id'),
		];

		$this->load->library('form_validation');

        // $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('no_meja', 'No Meja', 'required|numeric');

        if ($this->form_validation->run() == TRUE)
        {
			$this->admin->insert('pesanan', $pesanan);

			$this->admin->insert_pesanan_menu();

			$this->session->set_flashdata('success', "Data Pesanan Berhasil ditambahkan");

            redirect('pesanan');

        }else{

        	$data['pesanan']	= $this->admin->pesanan();

			$data['kode'] 		= $this->admin->kode_pesanan();

			$data['menu'] 		= $this->admin->get_all('menu')->result();
		
			$this->template->admin('pesanan/index', $data);
        }
	}

	public function bayar($id)
	{
		$this->cek_login();

		$this->cek_kasir();

		$id 			= $this->uri->segment(3);

		$data['bayar'] 	= $this->admin->bayar($id);
		
		$data['detail'] = $this->admin->pesanan_menu($id);

		$this->template->admin('pesanan/bayar', $data);
	}

	public function bayarken($id)
	{
		$this->cek_login();

		$this->cek_kasir();

		$id 	= $this->input->post('id');

		$data 	= [
			'total_harga'	=> $this->input->post('total_bayar'),
			'uang_bayar'	=> $this->input->post('uang_bayar'),
			'uang_kembali'	=> $this->input->post('uang_kembali'),
			'id_pesanan'	=> $this->input->post('id'),
			'id_kasir'		=> $this->session->userdata('id')
		];

		$this->load->library('form_validation');

		$this->form_validation->set_rules('id', 'Kode Pesanan', 'required|is_unique[pembayaran.id_pesanan]');
		$this->form_validation->set_rules('uang_bayar', 'Uang Bayar', 'required|numeric|is_natural');
		$this->form_validation->set_rules('uang_kembali', 'Uang Kembali', 'required|numeric|is_natural');

        if ($this->form_validation->run() == TRUE)
        {
			$this->admin->insert('pembayaran', $data);

			$this->session->set_flashdata('success', "Data Pesanan Berhasil dibayar");

            redirect('pembayaran');

        }else{

			$data['bayar'] 	= $this->admin->bayar($id);
			
			$data['detail'] = $this->admin->pesanan_menu($id);

			$this->template->admin('pesanan/bayar', $data);
        }
	}

	public function my()
	{
		$this->cek_login();
		
		$data['pesanan']	= $this->admin->mypesanan();

		$data['menu'] 		= $this->admin->get_all('menu')->result();

		$this->template->admin('pesanan/my', $data);
	}

	public function cetak()
	{
		$this->cek_login();

		$user = $this->session->userdata('id');


		$id 			= $this->uri->segment(3);

		$data['bayar'] 	= $this->admin->bayar($id);
		
		$data['detail'] = $this->admin->pesanan_menu($id);

		$me = $this->admin->pesanan_menu($id);

		foreach ($me as $my) {
			$u = $my->user_id;
		}

		if ($user!=$u) {
			redirect('pesanan/my');
		}

		$this->load->view('pesanan/cetak', $data);
	}
}
