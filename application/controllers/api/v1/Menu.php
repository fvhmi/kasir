<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Menu extends REST_Controller
{
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
	}

	function index_get()
	{
		$id = $this->get('id');
		if ($id=='') {

			$menu = $this->db->get('menu')->result();

			$response = [
	            'msg' => 'Daftar Menu',
	            'menu' => $menu,
	        ];

		}else{

			$this->db->where('id', $id);

			$menu = $this->db->get('menu')->result();

			$response = [
	            'msg' => 'Detail Menu',
	            'menu' => $menu,
	            'all menu' => [ 
	            	'href' => '/api/v1/menu',
	            	'method' => 'GET'
	            ],
	        ];
		}

		$this->response($response, 200);
	}

	function login_post()
	{
		$this->load->model('M_admin', 'admin');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

		$email = $this->post('email');
		$pass = $this->post('password');

        if ($this->form_validation->run() == TRUE)
        {
        	$cek = $this->admin->get_where('user', array('email' => $email));

        	if ($cek->num_rows() > 0) {
			
				$data = $cek->row();

				if (password_verify($pass, $data->password))
				{
					$datauser = array (
						'id'     	=> $data->id,
						'nama'  	=> $data->nama,
						'email'     => $data->email,
						'level'     => $data->level,
						'login'     => TRUE
					);

					$this->session->set_userdata($datauser);

					$response = [
			            'msg' 		=> 'Success Login',
			            'myProfile' => $datauser,
			        ];

			        $this->response($response, 201);

				} else {
					$this->response([
		        		'status' => 'fail',
		        		'msg' => 'Password Salah'
		        	], 502);
				}

			} else {
				$this->response([
	        		'status' => 'fail',
	        		'msg' => 'Email Tidak Terdaftar'
	        	], 502);
			}
        }else{

        	$this->response([
        		'status' => 'fail',
        		'msg' => $this->form_validation->error_array()
        	], 502);
        }

	}

	function logout_get()
	{
		$this->session->sess_destroy();				

			$response = [
	            'msg' => 'Success Logout',
	            'all menu' => [ 
	            	'href' => '/api/v1/menu',
	            	'method' => 'GET'
	            ],
	            'login' => [
	            	'href' => '/api/v1/menu/login',
	            	'method' => 'POST',
	            	'params' => [
	            		'email' => 'your registered mail',
	            		'password' => 'your password',
	            	],
	            ],
	        ];
		

		$this->response($response, 200);
	}
}