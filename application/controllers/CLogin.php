<?php
  class CLogin extends CI_Controller
  {

    function __construct()
    {
      parent:: __construct();

      $this->load->model('MLogin');
    }

    public function index(){
      if ($this->session->userdata('s_usuario')) {
        redirect('/inicio/','refresh');
      }

      $mensaje=$this->session->flashdata("mensaje");
        if(isset($mensaje)){
            $data["mensaje"]=$mensaje;
        }
        $error=$this->session->flashdata("error");
        if(isset($error)){
            $data["error"]=$error;
        }

        if(isset($mensaje)){
          $this->load->view('Login',$data);
        }else {
          $this->load->view('Login');
        }
    }

    public function ingresar(){
      $email=$this->input->post('txtemail');
      $pass=sha1($this->input->post('txtPass'));

      $res=$this->MLogin->ingresar($email,$pass);

      if ($res==1) {
        redirect('/inicio/', 'refresh');
      }
      else{
        $this->session->set_flashdata('mensaje',$res["mensaje"]);
        $this->session->set_flashdata('error',$res["error"]);
        redirect('/login/','refresh');
      }
    }

    public function loginEmpresarial(){
      if ($this->session->userdata('s_usuario')) {
        redirect('/loginEmpresarial/','refresh');
      }

      $mensaje=$this->session->flashdata("mensaje");
        if(isset($mensaje)){
            $data["mensaje"]=$mensaje;
        }
        $error=$this->session->flashdata("error");
        if(isset($error)){
            $data["error"]=$error;
        }

        if(isset($mensaje)){
          $this->load->view('vLoginE',$data);
        }else {
          $this->load->view('vLoginE');
        }
    }

    public function ingresarEmpresa(){
      $email=$this->input->post('txtemail');
      $pass=sha1($this->input->post('txtPass'));

      $res=$this->MLogin->ingresarEmpresa($email,$pass);

      if ($res==1) {
        redirect('/inicio/', 'refresh');
      }
      else{
        $this->session->set_flashdata('mensaje',$res["mensaje"]);
        $this->session->set_flashdata('error',$res["error"]);
        redirect('/loginEmpresarial/','refresh');
      }
    }

    public function cerrarSesion(){
      $this->session->sess_destroy();
      redirect('/login/', 'refresh');
    }
  }
?>
