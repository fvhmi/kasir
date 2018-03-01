<?php

/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function kode_pesanan()
	{
		$q 	= $this->db->query("SELECT MAX(RIGHT(id,3)) AS id_max FROM pesanan");

		$id = "";

		if($q->num_rows()>0){
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->id_max)+1;
				$id = sprintf("%03s", $tmp);
			}
		}else{
			$id = "001";
		}

		return "ERP".date('dmy')."-".$id;
	}

	function insert_pesanan_menu() {
			$pesanan = $this->input->post('nama_menu');
			for ($i=0; $i < count($pesanan) ; $i++) { 
				
				$data = [
					'kode_pesanan'	=> $this->input->post('id'),
					'kode_menu'		=> $pesanan[$i]
				];

				$this->db->insert('pesanan_menu', $data);
			}
	}

	function pesanan_menu($id)
    {
        $this->db->select('pesanan.id, pesanan.no_meja, pesanan.status, menu.nama_menu, menu.harga, user.nama, user.id as user_id');
        $this->db->from('pesanan');
        $this->db->join('pesanan_menu', 'pesanan.id = pesanan_menu.kode_pesanan');
        $this->db->join('menu', 'menu.id = pesanan_menu.kode_menu');
        $this->db->join('user', 'user.id = pesanan.id_pelayan');
        $this->db->where('pesanan_menu.kode_pesanan', $id);

        $query = $this->db->get()->result();

        return $query;
    }

    function pesanan()
    {
        $this->db->select('pesanan.id, pesanan.no_meja, pesanan.status, user.nama');
        $this->db->from('pesanan');
        $this->db->join('user', 'user.id = pesanan.id_pelayan');

        $query = $this->db->get()->result();

        return $query;
    }

    function mypesanan()
    {
        $this->db->select('pesanan.id, pesanan.no_meja, pesanan.status, user.nama');
        $this->db->from('pesanan');
        $this->db->join('user', 'user.id = pesanan.id_pelayan');
        $this->db->where('user.id', $this->session->userdata('id'));

        $query = $this->db->get()->result();

        return $query;
    }

    function bayar($id)
    {
    	$this->db->select('(SELECT SUM(menu.harga)) AS amount_paid');
        $this->db->from('pesanan');
        $this->db->join('pesanan_menu', 'pesanan.id = pesanan_menu.kode_pesanan');
        $this->db->join('menu', 'menu.id = pesanan_menu.kode_menu');
        $this->db->join('user', 'user.id = pesanan.id_pelayan');
        $this->db->where('pesanan_menu.kode_pesanan', $id);

        $query = $this->db->get()->result();

        return $query;    	
    }

    function insert($table = '', $data = '')
    {
      $this->db->insert($table, $data);
    }

	function insert_last($table = '', $data = '')
    {
      $this->db->insert($table, $data);

		return $this->db->insert_id();
    }

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function select_all($select, $table)
	{
		$this->db->select($select);
		$this->db->from($table);

		return $this->db->get();
	}

	function select_where($select, $table, $where)
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function count($table='')
	{
		return $this->db->count_all($table);
	}

	function count_where($table='', $where = '')
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->count_all_results();
	}

	function last($table, $limit, $order)
	{
		$this->db->from($table);
		$this->db->limit($limit);
		$this->db->order_by($order, 'DESC');

		return $this->db->get();
	}
}
