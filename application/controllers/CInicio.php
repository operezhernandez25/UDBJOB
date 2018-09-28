<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cInicio extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   }

   public function index()
   {
      $this->load->view('home/header');
      $this->load->view('home/asidenav');
      $this->load->view('vInicio');
      $this->load->view('home/footer');
    }
}
?>
