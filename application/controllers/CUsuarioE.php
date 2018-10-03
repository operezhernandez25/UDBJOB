<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CUsuarioE extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model('MUsuarioE');
   }

   public function index()
   {
    if (!$this->session->userdata('s_usuario')) {
        redirect('/login/','refresh');
      }
      $mensaje=$this->session->flashdata("mensaje");
      if(isset($mensaje)){
          $data["mensaje"]=$mensaje;
      }
      $error=$this->session->flashdata("error");
      if(isset($error)){
          $data["error"]=$error;
      }
      $data["usuariose"]=$this->MUsuarioE->getUsuariosE($this->session->userdata('s_idempresa'));
      $this->load->view('home/header');
      $this->load->view('home/asidenav');
      $this->load->view('empresa/vUsuariosE',$data);
      $this->load->view('home/footer');
   }
 }
 ?>
