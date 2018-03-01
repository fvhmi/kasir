<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
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

		$data['menus'] = $this->admin->get_all('menu')->result();
		
		$this->template->admin('menu/index', $data);
	}

	public function save()
	{
        $data= array(
            'nama_menu' => $this->input->post('nama_menu'),
            'harga'		=> $this->input->post('harga'),
            'status' 	=> $this->input->post('status')
        );

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == TRUE)
        {
			$this->admin->insert('menu', $data);

			$this->session->set_flashdata('success', "Data Menu Berhasil ditambahkan");

            redirect('menu');

        }else{

        	$data['menus'] = $this->admin->get_all('menu')->result();
		
			$this->template->admin('menu/index', $data);
        }
    }

    public function edit($id)
    {
    	$id     = $this->uri->segment(3);

        $data['menus'] = $this->admin->get_all('menu')->result();

        $data['edit']   = $this->admin->get_where('menu', array('id' => $id))->row();

        $this->template->admin('menu/edit', $data);
    }

    public function update($id)
    {
        $id    = $this->uri->segment(3);

    	$data  = [
            // 'id'        => $id,
            'nama_menu' => $this->input->post('nama_menu'),
            'harga'     => $this->input->post('harga'),
            'status'    => $this->input->post('status')
        ];

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->admin->update('menu', $data, array('id' => $id));

            $this->session->set_flashdata('success', "Data Menu Berhasil diubah");

            redirect('menu');
            // var_dump($data);

        }else{

            $data['menus'] = $this->admin->get_all('menu')->result();

            $data['edit']   = $this->admin->get_where('menu', array('id' => $id))->row();

            $this->template->admin('menu/edit', $data);
        }

    }

    public function delete($id)
    {
        $id     = $this->uri->segment(3);

        $this->admin->delete('menu', array('id' => $id));

        $this->session->set_flashdata('success', "Data Menu Berhasil dihapus");

        redirect('menu');
    }
}
