<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CUsuarioE extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model('MUsuarioE');
    $this->load->model('MMensajes');
    if (!$this->session->userdata('s_idusuario')) {
      redirect('login');
    }
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
      $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
      $this->load->view('home/header');
      $this->load->view('home/asidenav',$dataNav);
      $this->load->view('empresa/vUsuariosE',$data);
      $this->load->view('home/footer');
   }

   //funcion para insertar un nuevo user empresa
   public function setUserE()
   {
    // definiendo la carpeta donde se guardara la imagen
    $img = $this->input->post("imgSend");
    $nombreArchivo=$this->input->post("nombreArchivo");

    //variables
    $nombres=$this->input->post("nombreIngresar");
    $apellidos=$this->input->post("apellidoIngresar");
    $empresa=$this->session->userdata('s_idempresa');
    $pass=$this->input->post("passIngresar");
    $correo=$this->input->post("correoIngresar");
    $tipouser=$this->input->post("selectuser");

    //enviar en un array
    $datos=array( 'nombre'=>$nombres,
                  'apellido'=>$apellidos,
                  'idEmpresa'=>$empresa,
                  'password'=>sha1($pass),
                  'correoElectronico'=>$correo,
                  'tipoUsuario'=>$tipouser,
                  'img'=>'uploads/usere/'.$nombreArchivo.'.jpg'
                );

    $data=$this->MUsuarioE->setUserE($datos,$img);
    $this->session->set_flashdata('mensaje',$data["mensaje"]);
    $this->session->set_flashdata('error',$data["error"]);
    redirect('usuarioEmpresa','refresh');
   }

   public function updateNombre()
   {
       $nombre= $this->input->post("nombre");
       $id= $this->input->post("id");
      $respuesta=$this->MUsuarioE->updateNombre($id,$nombre);
       echo json_encode($respuesta);
   }

   public function updateApellido()
   {
       $apellido= $this->input->post("apellido");
       $id= $this->input->post("id");
      $respuesta=$this->MUsuarioE->updateApellido($id,$apellido);
       echo json_encode($respuesta);
   }

   public function updateCorreo()
   {
      $correo= $this->input->post("correo");
      $id= $this->input->post("id");
      $respuesta=$this->MUsuarioE->updateCorreo($id,$correo);
      echo json_encode($respuesta);
   }

   public function updateTipo()
   {
      $tipo= $this->input->post("idTipo");
      $id= $this->input->post("id");
      $respuesta=$this->MUsuarioE->updateTipo($id,$tipo);
      echo json_encode($respuesta);
   }

   public function updateImagen()
   {
    $imagen= $this->input->post("imgSend");
    $nombreArchivo=$this->input->post("nombreMod");
    $id= $this->input->post("id");
    $respuesta=$this->MUsuarioE->updateImagen($id,$imagen,$nombreArchivo);
    echo json_encode($respuesta);
   }

   //funcion para borrar
  public function deleteUsere()
  {
     $id=$this->input->post("id");
     $data=$this->MUsuarioE->deleteUsere($id);
     $this->session->set_flashdata('mensaje',$data["mensaje"]);
     $this->session->set_flashdata('error',$data["error"]);
      redirect('usuarioEmpresa','refresh');
  }
 }
 ?>
