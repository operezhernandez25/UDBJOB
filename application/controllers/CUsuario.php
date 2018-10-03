<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CUsuario extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   }

   public function verPropuesta($id)
   {
    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/verpropuesta');
    $this->load->view('home/footer');
   }

   public function verPostulaciones()
   {
    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/verpostulaciones');
    $this->load->view('home/footer');
   }

   public function verPostulacion($id)
   {
    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/verpostulacion');
    $this->load->view('home/footer');
   }


}


?>