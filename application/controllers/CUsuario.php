<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CUsuario extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model('MUsuario');
    $this->load->model("MMensajes");
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

       //verificar si ya se realizo la postulacion
    $this->db->select("count(*) cont");
    $this->db->from("postulaciones");
    $this->db->where("idUsuario",$this->session->userdata("s_idusuario"));
    $this->db->where("idPropuesta",$id);
    $data["comprobador"]=$this->db->get()->result()[0];


    $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesUsuario();
    $this->load->view('home/header');
    $this->load->view('home/asidenav',$dataNav);
    $this->load->view('usuario/verpropuesta',$data);
    $this->load->view('home/footer');


   }

   public function verPostulaciones()
   {
        $this->db->select("postulaciones.idPropuesta,postulaciones.estado,postulaciones.fecha,postulaciones.idPostulacion,propuesta.titulo, propuesta.salario,propuesta.jornada");
        $this->db->from("postulaciones");
        $this->db->join("propuesta","postulaciones.idPropuesta = propuesta.idPropuesta");
        $this->db->where("postulaciones.idUsuario",$this->session->userdata("s_idusuario"));
        $data["postulaciones"]=$this->db->get()->result();
        $data["contador"]=count($data["postulaciones"]);

        //Buscando mensajes sin leer en las postulaciones
        foreach($data["postulaciones"] as $pos)
        {
            $this->db->select("count(*) cont");
            $this->db->from("mensajes");
            $this->db->where("idPostulacion",$pos->idPostulacion);
            $this->db->where("visto",0);
            $this->db->where("remitente",0);
            $pos->cont=$this->db->get()->result()[0]->cont;
        }


        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesUsuario();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view('usuario/verpostulaciones',$data);
        $this->load->view('home/footer');
   }

   public function verPostulacion($id)
   {

        $this->db->select("postulaciones.idPostulacion,postulaciones.idPropuesta,empresa.pais,empresa.direccion,propuesta.descripcion,empresa.nombre empresa,postulaciones.estado,postulaciones.fecha,postulaciones.idPostulacion,propuesta.titulo, propuesta.salario,propuesta.jornada");
        $this->db->from("postulaciones");
        $this->db->join("propuesta","postulaciones.idPropuesta = propuesta.idPropuesta");
        $this->db->join("usuarioEmpresa","propuesta.idUsuarioEmpresa=usuarioEmpresa.idUsuarioEmpresa");
        $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
        $this->db->where("postulaciones.idUsuario",$this->session->userdata("s_idusuario"));
        $this->db->where("postulaciones.idPropuesta",$id);
        $data["postulacion"]=$this->db->get()->result()[0];



        //Conocimientos de la propuesta
        //CONOCIMIENTOS
        $this->db->select("conocimientos.idConocimiento, conocimientos.conocimientos");
        $this->db->from("conocimientos");
        $this->db->join("propuestaConocimiento","propuestaConocimiento.idConocimiento=conocimientos.idConocimiento");
        $this->db->where("propuestaConocimiento.idPropuesta",$id);
        $data["conocimientos"]=$this->db->get()->result();

        echo '<script> var idPostulacion="'.$data["postulacion"]->idPostulacion.'"</script>';
        //Obteniendo mensajes
        $this->db->select("postulaciones.idPostulacion,remitente,mensaje,mensajes.fecha,idmensaje,empresa.nombre");
        $this->db->from("mensajes");
        $this->db->join("postulaciones","postulaciones.idPostulacion=mensajes.idPostulacion");
        $this->db->join("propuesta","propuesta.idPropuesta=postulaciones.idPropuesta");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
        $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
        $this->db->where("postulaciones.idPostulacion",$data["postulacion"]->idPostulacion);

        $data["mensajes"]=$this->db->get()->result();
        //modificando a visto el estado de todos los mensajes
        $this->db->where("idPostulacion",$data["postulacion"]->idPostulacion);
        $this->db->where("remitente",0);
        $this->db->update("mensajes",array("visto"=>1));
        
        
        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesUsuario();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view('usuario/verpostulacion',$data);
        $this->load->view('home/footer');
   }

   public function postularUsuario($idPropuesta)
   {
        $idUsuario= $this->session->userdata("s_idusuario");
        $datos=array(
            'idUsuario'=>$idUsuario,
            'idPropuesta'=>$idPropuesta,
            'estado'=>0,
            'fecha'=>date('Y-m-d h:i:s')
        );
        $this->db->insert("postulaciones",$datos);
   }


   function guardarMensaje()
   {
       $this->input->post("idPostulacion");
       $this->input->post("mensaje");
       $data=array('idPostulacion'=>$this->input->post("idPostulacion"),
                   'remitente'=>1,
                   'mensaje'=>$this->input->post("mensaje"),
                   'fecha'=>date('Y-m-d h:i:s'),
                   'visto'=>0);
       $this->db->insert("mensajes",$data);
       $num= $this->db->affected_rows();
       if($num>0)
       {
           echo json_encode(array('error'=>false));
       }
   }

   public function verPerfilUsuario()
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

    $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesUsuario();
    $this->load->view('home/header');
    $this->load->view('home/asidenav',$dataNav);
    $this->load->view('usuario/vPerfil',$data);
    $this->load->view('home/footer');
   }

   function buscarMensajesSinVisto()
    {
        $idPostulacion=$this->input->post("idPostulacion");
        $this->db->select("remitente,mensaje,fecha,idmensaje");
        $this->db->from("mensajes");
        $this->db->where("idPostulacion",$idPostulacion);
        $this->db->where("visto",0);
        $this->db->where("remitente",0);
        $mensajes=$this->db->get()->result();
        foreach($mensajes as $men)
        {
           $this->db->where("idmensaje",$men->idmensaje);
           $this->db->update("mensajes",array("visto"=>1));
        }
        $respuesta=array("error"=>false,'mensajes'=>$mensajes);
        echo json_encode($respuesta);
    }

    //informacion del usuario a la vista Perfil
    public function infoUsuario()
    {
      //INFO USUARIO
      $this->db->select("usuario.nombres, usuario.apellidos, usuario.fechaNacimiento, usuario.genero, usuario.estadoCivil, usuario.email, usuario.pais, usuario.direccion, usuario.departamento, usuario.ciudad, usuario.foto, telefonos.numero, usuario.skype");
      $this->db->from("usuario");
      $this->db->join("telefonos","telefonos.idTelefono=usuario.idTelefono");
      $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
      echo json_encode($this->db->get()->result());
    }

    //funcion para modificar el perfil del Usuario
    public function UpdateUser()
    {
     //variables
     $id=$this->session->userdata('s_idusuario');
     $nombres=$this->input->post("nombreModificar");
     $apellidos=$this->input->post("apellidoModificar");
     $fechanac=$this->input->post("fechanacModificar");
     $genero=$this->input->post("cmbGenero");
     $estadoc=$this->input->post("cmbEstado");
     $correo=$this->input->post("emailModificar");
     $pais=$this->input->post("cmbNacionalidad");
     $departamento=$this->input->post("departamentoModificar");
     $ciudad=$this->input->post("ciudadModificar");
     $direccion=$this->input->post("direccionModificar");
     $skype=$this->input->post("skypeModificar");

     //enviar en un array
     $campos=array( 'nombres'=>$nombres,
                   'apellidos'=>$apellidos,
                   'fechaNacimiento'=>$fechanac,
                   'genero'=>$genero,
                   'estadoCivil'=>$estadoc,
                   'email'=>$correo,
                   'pais'=>$pais,
                   'departamento'=>$departamento,
                   'ciudad'=>$ciudad,
                   'direccion'=>$direccion,
                   'skype'=>$skype
                 );

     $data=$this->MUsuario->UpdateUser($campos,$id);
     $this->session->set_flashdata('mensaje',$data["mensaje"]);
     $this->session->set_flashdata('error',$data["error"]);
     redirect('perfil','refresh');
    }

}
?>
