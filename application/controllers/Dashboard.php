<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Dashboard extends CI_Controller{
    function __construct(){
      parent::__construct();
    }

    function index(){
      if($this->ion_auth->is_admin()){

        $this->load->model('BarangModel');
        $this->data['barang'] = $this->BarangModel->getBarang();

      	$this->load->view('superadmin\dashboard_view', $this->data);
      }else if($this->ion_auth->in_group('members')){
      	$this->load->view('admin/dashboard_view');
      }else{
      	return show_error('You must log in to view this page.');
      }
    }

  }
?>