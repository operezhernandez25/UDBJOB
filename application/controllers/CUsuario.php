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
       //INFORMACION DE LA PROPUESTA
    $this->db->select("propuesta.idPropuesta,UPPER(propuesta.titulo) titulo,empresa.direccion,UPPER(propuesta.descripcion) descripcion,cast( propuesta.fecha as date) fecha,propuesta.jornada,propuesta.salario,empresa.nombre,empresa.pais,empresa.sector");
    $this->db->from("propuesta");
    $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
    $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
    $this->db->where("propuesta.idPropuesta",$id);
    $data["propuesta"]=$this->db->get()->result()[0];

    //CONOCIMIENTOS
    $this->db->select("conocimientos.idConocimiento, conocimientos.conocimientos");
    $this->db->from("conocimientos");
    $this->db->join("propuestaConocimiento","propuestaConocimiento.idConocimiento=conocimientos.idConocimiento");
    $this->db->where("propuestaConocimiento.idPropuesta",$id);
    $data["conocimientos"]=$this->db->get()->result();
    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/verpropuesta',$data);
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

   public function verPerfilUsuario()
   {
    //INFO USUARIO
    $this->db->select("usuario.nombres, usuario.apellidos, usuario.fechaNacimiento, usuario.genero, usuario.estadoCivil, usuario.email, usuario.pais, usuario.direccion, usuario.departamento, usuario.ciudad, usuario.foto, telefonos.numero, usuario.skype");
    $this->db->from("usuario");
    $this->db->join("telefonos","telefonos.idTelefono=usuario.idTelefono");
    $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
    $data["usuario"]=$this->db->get()->result();

    //CONOCIMIENTOS
    $this->db->select("conocimientos.conocimientos");
    $this->db->from("usuarioConocimiento");
    $this->db->join("conocimientos","conocimientos.idConocimiento=usuarioConocimiento.idConocimiento");
    $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
    $data["conocimientos"]=$this->db->get()->result();

    $this->load->view('home/header');
    $this->load->view('home/asidenav');
    $this->load->view('usuario/vPerfil',$data);
    $this->load->view('home/footer');
   }
}


?>
