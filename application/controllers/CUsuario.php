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

        //Eventos de la postulacion
        $this->db->select("idevento,texto,cast(fecha as date) fecha, cast(fecha as time) hora");
        $this->db->from("postulacionEventos");
        $this->db->where("postulacionEventos.idpostulacion",$data["postulacion"]->idPostulacion);
        $data["eventos"]=$this->db->get()->result();



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
        redirect('/propuesta/'.$idPropuesta,'refresh');        

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

    //Todos los conocimientos con verificados
    public function getConocimientos()
    {
      $this->db->select("*");
      $this->db->from("conocimientos");
      $this->db->where("verificado",1);
      echo json_encode($this->db->get()->result());
    }

    //Todos los conocimientos sin verificados
    public function getConocimientosVerif()
    {
      $this->db->select("*");
      $this->db->from("conocimientos");
      echo json_encode($this->db->get()->result());
    }

    //Conocimientos del usuario
    public function getConocimientosUser()
    {
      $this->db->select("*");
      $this->db->from("usuarioConocimiento");
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

     $this->db->select('idUsuario, nombres, apellidos, email, foto');
     $this->db->from('usuario');
     $this->db->where('idUsuario',$id);

     $resultado=$this->db->get();

     if ($resultado->num_rows()==1) {
       $r=$resultado->row();

       $s_usuario=array(
         's_idusuario'=>$r->idUsuario,
         's_usuario'=>$r->apellidos.", ".$r->nombres,
         's_Correo'=>$r->email,
         's_Foto'=>$r->foto,
         's_tipo'=>1
       );

       $this->session->set_userdata($s_usuario);
     }

     $this->session->set_userdata($s_usuario);
     redirect('perfil','refresh');
    }

    //Agregar un conocimiento al usuario
    public function ingresarConocimientoUser(){
     $param['idUsuario']=$this->session->userdata('s_idusuario');
     $param['mcmbConocimientos']=$this->input->post('mcmbConocimientos');
     $res["idConocimiento"]= $this->MUsuario->ingresarConocimientoUser($param);
     echo json_encode($res);
   }

   //eliminar conocimientos
   public function eliminarConocimiento(){
     $idP=$this->input->post('hdnId');
     $this->MUsuario->eliminarConocimiento($idP);
  }

  //ingresarConocimientoNew
  public function ingresarConocimientoNew(){
    $param['conocimientos']=$this->input->post('newConocimiento');
    $param['verificado']=0;
    $res["nuevoId"]= $this->MUsuario->ingresarConocimientoNew($param);
    echo json_encode($res);
  }

  //funcion para modificar el pass del Usuario
  public function updatePass()
  {
   //variables
   $id=$this->session->userdata('s_idusuario');
   $pass=sha1($this->input->post("modificarContraseña"));

   //enviar en un array
   $campos=array( 'password'=>$pass
               );

   $data=$this->MUsuario->updatePass($campos,$id);
   $this->session->set_flashdata('mensaje',$data["mensaje"]);
   $this->session->set_flashdata('error',$data["error"]);
   redirect('perfil','refresh');
  }

  //Contando conocimientos
  public function countConocimiento()
  {
    $this->db->select("count(idConocimiento) numconocimiento");
    $this->db->from("usuarioConocimiento");
    $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
    echo json_encode($this->db->get()->result());
  }

  public function modificarCV()
  {
    //Para el CV
  //  $this->load->library('upload');
    if (!empty($_FILES['modCV']['name']))
    {
        // Configuración para el Archivo
        $config['upload_path'] = 'public/files/curriculum/';
        $config['allowed_types'] = 'doc|docx|pdf';

        // Cargamos la configuración del Archivo
        $this->upload->initialize($config);

        // Subimos archivo
        if ($this->upload->do_upload('modCV'))
        {
            $data = $this->upload->data();
            $cv = $data['file_name'];
            $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
            $this->db->update('usuario',array('curriculum'=>$cv));
            if($this->db->affected_rows()>0)
            {
              $this->session->set_flashdata('mensaje',"Curriculum Vitae actualizado!");
              $this->session->set_flashdata('error',false);
            }
        }
        else
        {
            //echo $this->upload->display_errors();
            $this->session->set_flashdata('mensaje',"Ocurrio un error, revise si la extension es correcta!");
        	  $this->session->set_flashdata('error',true);
        }
    }
    else
    {
      $this->session->set_flashdata('mensaje',"Debes subir los archivos necesarios!");
      $this->session->set_flashdata('error',true);
    }

		  
      	redirect('perfil','refresh');
		 
  }

  public function modificarDUI()
  {
    //Para el DUI
    $this->load->library('upload');
    if (!empty($_FILES['ModDui']['name']))
    {
        // Configuración para el Archivo
        $config['upload_path'] = 'public/files/dui/';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';

        // Cargamos la configuración del Archivo
        $this->upload->initialize($config);

        // Subimos archivo
        if ($this->upload->do_upload('ModDui'))
        {
            $data = $this->upload->data();
            $dui = $data['file_name'];
        }
        else
        {
            //echo $this->upload->display_errors();
            $this->session->set_flashdata('mensaje',"Ocurrio un error, revise si la extension es correcta!");
        	  $this->session->set_flashdata('error',true);
        }
    }
    else
    {
      $this->session->set_flashdata('mensaje',"Debes subir los archivos necesarios!");
      $this->session->set_flashdata('error',true);
    }

		  $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
		  $this->db->update('usuario',array('dui'=>$dui));
		  if($this->db->affected_rows()>0)
      {
        $this->session->set_flashdata('mensaje',"DUI actualizado!");
    	  $this->session->set_flashdata('error',false);
      	redirect('perfil','refresh');
		  }else{
      	redirect('perfil','refresh');
		  }
  }

  public function modificarNIT()
  {
    //Para el NIT
    $this->load->library('upload');
    if (!empty($_FILES['ModNit']['name']))
    {
        // Configuración para el Archivo
        $config['upload_path'] = 'public/files/nit/';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';

        // Cargamos la configuración del Archivo
        $this->upload->initialize($config);

        // Subimos archivo
        if ($this->upload->do_upload('ModNit'))
        {
            $data = $this->upload->data();
            $nit = $data['file_name'];
        }
        else
        {
            //echo $this->upload->display_errors();
            $this->session->set_flashdata('mensaje',"Ocurrio un error, revise si la extension es correcta!");
        	  $this->session->set_flashdata('error',true);
        }
    }
    else
    {
      $this->session->set_flashdata('mensaje',"Debes subir los archivos necesarios!");
      $this->session->set_flashdata('error',true);
    }

		  $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
		  $this->db->update('usuario',array('nit'=>$nit));
		  if($this->db->affected_rows()>0)
      {
        $this->session->set_flashdata('mensaje',"NIT actualizado!");
    	  $this->session->set_flashdata('error',false);
      	redirect('perfil','refresh');
		  }else{
      	redirect('perfil','refresh');
		  }
  }

  public function modificarSolvencia()
  {
    //Para Solvencia
    $this->load->library('upload');
    if (!empty($_FILES['ModSolv']['name']))
    {
        // Configuración para el Archivo
        $config['upload_path'] = 'public/files/solvencia/';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';

        // Cargamos la configuración del Archivo
        $this->upload->initialize($config);

        // Subimos archivo
        if ($this->upload->do_upload('ModSolv'))
        {
            $data = $this->upload->data();
            $solvencia = $data['file_name'];
        }
        else
        {
            //echo $this->upload->display_errors();
            $this->session->set_flashdata('mensaje',"Ocurrio un error, revise si la extension es correcta!");
        	  $this->session->set_flashdata('error',true);
        }
    }
    else
    {
      $this->session->set_flashdata('mensaje',"Debes subir los archivos necesarios!");
      $this->session->set_flashdata('error',true);
    }

		  $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
		  $this->db->update('usuario',array('solvencia'=>$solvencia));
		  if($this->db->affected_rows()>0)
      {
        $this->session->set_flashdata('mensaje',"Solvencia actualizada!");
    	  $this->session->set_flashdata('error',false);
      	redirect('perfil','refresh');
		  }else{
      	redirect('perfil','refresh');
		  }
  }

  public function modificarFoto()
  {
    //Para foto
    $this->load->library('upload');
    if (!empty($_FILES['modfoto']['name']))
    {
        // Configuración para el Archivo
        $config['upload_path'] = 'public/photos/';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';

        // Cargamos la configuración del Archivo
        $this->upload->initialize($config);

        // Subimos archivo
        if ($this->upload->do_upload('modfoto'))
        {
            $data = $this->upload->data();
            $foto = $data['file_name'];
        }
        else
        {
            echo $this->upload->display_errors();
            $this->session->set_flashdata('mensaje',"Ocurrio un error, revise si la extension es correcta!");
        	  $this->session->set_flashdata('error',true);
        }
    }
    else
    {
      $this->session->set_flashdata('mensaje',"Debes subir los archivos necesarios!");
      $this->session->set_flashdata('error',true);
    }

		  $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
		  $this->db->update('usuario',array('foto'=>$foto));
		  if($this->db->affected_rows()>0)
      {
        $this->db->select('idUsuario, nombres, apellidos, email, foto');
        $this->db->from('usuario');
        $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));

        $resultado=$this->db->get();

        if ($resultado->num_rows()==1) {
          $r=$resultado->row();

          $s_usuario=array(
            's_idusuario'=>$r->idUsuario,
            's_usuario'=>$r->apellidos.", ".$r->nombres,
            's_Correo'=>$r->email,
            's_Foto'=>$r->foto,
            's_tipo'=>1
          );

          $this->session->set_userdata($s_usuario);
        }

        $this->session->set_flashdata('mensaje',"Foto de perfil actualizada!");
    	  $this->session->set_flashdata('error',false);
      	redirect('perfil','refresh');
		  }else{
      	redirect('perfil','refresh');
		  }
  }

}
?>
