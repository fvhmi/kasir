<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

   function __construct()
   {
      $this->ci =&get_instance();
   }

   function admin($template, $data='')
   {

      $data['content'] = $this->ci->load->view($template, $data, TRUE);
      $data['sidebar']  = $this->ci->load->view('dashboard/sidebar', $data, TRUE);

      $this->ci->load->view('dashboard/index', $data);

   }

   // function olshop($template, $data='')
   // {
   //    $data['content'] = $this->ci->load->view($template, $data, TRUE);

   //    $this->ci->load->view('index', $data);

   // }
}
