<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CEmpresa extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   
    $this->load->model("MMensajes");

    if (!$this->session->userdata('s_idusuario')) {
      redirect('login');
    }

   }




    function nuevaPropuesta()
    {
        $this->db->select("*");
        $this->db->from("conocimientos");
        $this->db->where("verificado",1);
        $data["conocimientos"]=$this->db->get()->result();

        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view('empresa/vnuevapropuesta',$data);
        $this->load->view('home/footer');
    }

    function verMisPropuestas()
    {
        $this->db->select("idPropuesta,titulo,fecha,propuesta.estado,jornada,salario,propuesta.estado");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
        $this->db->from("propuesta");
        $this->db->where("usuarioEmpresa.idEmpresa",$this->session->userdata("s_idempresa"));
        
        $data["propuestas"]=$this->db->get()->result();
        
        //Obteniendo los mensajes de cada propuesta



        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
       $this->load->view('empresa/vvermisPropuestas',$data);
       $this->load->view('home/footer');
    }

    function verPropuesta($id)
    {
        //Verificando si es correcto el id
        $this->db->select("count(*) cont");
        $this->db->from("propuesta");
        $this->db->where("idPropuesta",$id);


        if($this->db->get()->result()[0]->cont==0)
        {
            redirect('/CEmpresa/verMisPropuestas','refresh');
        }

        //conocimientos
        $this->db->select("conocimientos.conocimientos,conocimientos.idConocimiento,idPropuesta");
        $this->db->from("propuestaConocimiento");
        $this->db->join("conocimientos",'conocimientos.idConocimiento=propuestaConocimiento.idConocimiento');
        $this->db->where("idPropuesta",$id);
        $data["conocimientos"]=$this->db->get()->result();

        //propuesta
        $this->db->select("p.idPropuesta,p.titulo,p.descripcion,p.fecha,p.jornada,p.salario,p.estado");
        $this->db->from("propuesta p");
        $this->db->where("p.idPropuesta",$id);
        $data["datosPropuesta"]=$this->db->get()->result()[0];

        //Usuarios Postulados
        $this->db->select("postulaciones.idPostulacion,postulaciones.idUsuario,postulaciones.fecha, postulaciones.estado,concat(usuario.nombres,' ',usuario.apellidos) nombreUsuario");
        $this->db->from("postulaciones");
        $this->db->join("usuario","usuario.idUsuario=postulaciones.idUsuario");
        $this->db->where("postulaciones.idPropuesta",$id);
        $data["postulaciones"]=$this->db->get()->result();
        
        //Agregando a cada usuario los mensajes pendientes
        foreach($data["postulaciones"] as $pos)
        {
            $this->db->select("count(*) contador");
            $this->db->from("mensajes");
            $this->db->where("idPostulacion",$pos->idPostulacion);
            $this->db->where("visto",0);
            $this->db->where("remitente",1);
            $pos->contador=$this->db->get()->result()[0]->contador;
        }

        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view("empresa/verPropuesta",$data);
        $this->load->view('home/footer');
    }

    function guardarPropuesta()
    {
       $this->input->post("titulo");
       $conocimientos =$this->input->post("conocimientos");

       $this->input->post("descripcion");
        $idUsuario=$this->session->userdata('s_idusuario');
        $datos = array(
            'titulo'=>$this->input->post("titulo"),
            'descripcion'=>$this->input->post("descripcion"),
            'fecha'=>date('Y-m-d h:i:s'),
            'jornada'=>$this->input->post("jornada"),
            'salario'=>$this->input->post("salario"),
            'idUsuarioEmpresa'=>$idUsuario
        );
        $this->db->insert("propuesta",$datos);
        $id=$this->db->insert_id();

        foreach($conocimientos as $cono)
        {
            $dataConocimiento = array(
                'idPropuesta'=>$id,
                'idConocimiento'=>$cono,
                'idNivel'=>1
            );
            $this->db->insert("propuestaConocimiento",$dataConocimiento);
        }


        redirect('/CEmpresa/nuevaPropuesta','refresh');

    }

    function agregarConocimiento()
    {
        $this->db->insert("conocimientos",array('conocimientos'=>$this->input->post("conocimiento"),'verificado'=>1));

        echo json_encode(array('error'=>false,'id'=>$this->db->insert_id()));
    }

    function perfilPostulante($id,$idPropuesta)
    {
        /*

        update postulaciones set estado=1 where idUsuario = 18 and idPropuesta=39;
        insert into postulacionEventos values(39,'Perfil Visto');*/
        //Verficamos si el perfil del usuario nunca habia sido visto
        $this->db->select("estado,idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$id);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["estadoPostulacion"]=$this->db->get()->result()[0];
       // echo json_encode($data["estadoPostulacion"]);
        if($data["estadoPostulacion"]->estado==0)
        {
            $this->db->where("idUsuario",$id);
            $this->db->where("idPropuesta",$idPropuesta);
            $this->db->update("postulaciones",array('estado'=>1));
            $data["estadoPostulacion"]->estado=1;
          //  echo json_encode($data["estadoPostulacion"]);
            $datos=array('idpostulacion'=>$data["estadoPostulacion"]->idPostulacion,'texto'=>'Perfil Visto','fecha'=>date('Y-m-d h:i:s'));
            $this->db->insert("postulacionEventos",$datos);
        }


        $data["idPropuesta"]=$idPropuesta;
        //Verificando si es correcto el id
        $this->db->select("count(*) cont");
        $this->db->from("usuario");
        $this->db->where("idUsuario",$id);
        if($this->db->get()->result()[0]->cont==0)redirect('/CEmpresa/verMisPropuestas','refresh');

        //Obteniendo datos del usuario
        $this->db->select("idUsuario,upper(concat(nombres,' ',apellidos)) nombre, curriculum,fechaNacimiento,genero,estadoCivil,email,pais,departamento,ciudad,direccion,foto,skype");
        $this->db->from("usuario");
        $this->db->where("idUsuario",$id);
        $data["datosUsuario"]=$this->db->get()->result()[0];

        //Obteniendo conocimientos del usuario
        $this->db->select("usuarioConocimiento.idConocimiento,conocimientos");
        $this->db->from("usuarioConocimiento");
        $this->db->join("conocimientos","usuarioConocimiento.idConocimiento= conocimientos.idConocimiento");
        $this->db->where("idUsuario",$id);
        $data["conocimientosUsuario"]=$this->db->get()->result();

        //Obteniendo mensajes
        $this->db->select("postulaciones.idPostulacion,remitente,mensaje,mensajes.fecha,idmensaje ,concat(usuario.nombres,' ',usuario.apellidos) nombre");
        $this->db->from("mensajes");
        $this->db->join("postulaciones","postulaciones.idPostulacion=mensajes.idPostulacion");
        $this->db->join("usuario","usuario.idUsuario=postulaciones.idUsuario");
        $this->db->where("postulaciones.idPostulacion",$data["estadoPostulacion"]->idPostulacion);
        $data["mensajes"]=$this->db->get()->result();
        if($data["estadoPostulacion"]->estado>1)
        {
            //modificando a visto el estado de todos los mensajes
            $this->db->where("idPostulacion",$data["estadoPostulacion"]->idPostulacion);
            $this->db->where("remitente",1);
            $this->db->update("mensajes",array("visto"=>1));
        }

        //Poniendo en visto todos los mensajes
      //  $this->db->

        echo '<script> var idPostulacion="'.$data["estadoPostulacion"]->idPostulacion.'"</script>';
        
        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view("empresa/verPerfilPostulante",$data);
        $this->load->view('home/footer');
    }


    function descargarCurriculum($idUsuario)
    {
       
        $this->db->select("curriculum");
        $this->db->from("usuario");
        $this->db->where("idUsuario",$idUsuario);
        $curriculum = $this->db->get()->result()[0];

        force_download('public/files/curriculum/'.$curriculum->curriculum, NULL);
        //redirect('/','refresh');
    }


    function contactarPostulante($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>2));

        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'Contactar mediante chat','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);
        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }

    function pruebaFinalizadas($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>3));

        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'VideoLlamada realizada','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);
        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }

    function skypeFinalizado($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>4));
        
        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'VideoLlamada realizada','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);
        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }

    function valoracionydeFin($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>5));
        
        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'Valoracion realizada','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);
        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }

    function aceptado($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>5));
        
        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'Trabajo realizado','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);

        //Cambiando el estado a la propuesta
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("propuesta",array('estado'=>1));

        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }

    function rechazado($idUsuario,$idPropuesta)
    {
        //obtenes el id de la postulacion
        $this->db->select("idPostulacion");
        $this->db->from("postulaciones");
        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $data["idPostulacion"]=$this->db->get()->result()[0];

        $this->db->where("idUsuario",$idUsuario);
        $this->db->where("idPropuesta",$idPropuesta);
        $this->db->update("postulaciones",array('estado'=>6));
        
        $data=array('idpostulacion'=>$data["idPostulacion"]->idPostulacion,'texto'=>'Trabajo realizado','fecha'=>date('Y-m-d h:i:s'));
        $this->db->insert("postulacionEventos",$data);

        redirect('/CEmpresa/perfilPostulante/'.$idUsuario.'/'.$idPropuesta,'refresh');
    }


    function guardarMensaje()
    {
        $this->input->post("idPostulacion");
        $this->input->post("mensaje");
        $data=array('idPostulacion'=>$this->input->post("idPostulacion"),
                    'remitente'=>0,
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

    function verConocimientos()
    {
      $this->db->select("*");
      $this->db->from("conocimientos");
      $this->db->where("verificado",0);
      $data["conocimientos"] = $this->db->get()->result();
      $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer(); 
      $this->load->view('home/header');
      $this->load->view('home/asidenav',$dataNav);
      $this->load->view("empresa/verConocimientos", $data);
      $this->load->view('home/footer');
    }

    function aprobarConocimiento()
    {
      $id = $this->uri->segment(3);
  		$data = array('verificado' => 1);
      $this->db->where("idConocimiento",$id);
      $this->db->update("conocimientos",$data);


      redirect('conocimientos','refresh');
	}

  function buscarMensajesSinVisto()
  {
      $idPostulacion=$this->input->post("idPostulacion");
      $this->db->select("remitente,mensaje,fecha,idmensaje");
      $this->db->from("mensajes");
      $this->db->where("idPostulacion",$idPostulacion);
      $this->db->where("visto",0);
      $this->db->where("remitente",1);
      $mensajes=$this->db->get()->result();
      foreach($mensajes as $men)
      {
         $this->db->where("idmensaje",$men->idmensaje);
         $this->db->update("mensajes",array("visto"=>1));
      }
      $respuesta=array("error"=>false,'mensajes'=>$mensajes);
      echo json_encode($respuesta);
  }


  function descargarDUI($idUsuario)
  {
      
      $this->db->select("dui");
      $this->db->from("usuario");
      $this->db->where("idUsuario",$idUsuario);
      $dui = $this->db->get()->result()[0];

      force_download('public/files/dui/'.$dui->dui, NULL);
      // redirect('/','refresh');
  }

  function descargarNIT($idUsuario)
  {
      
      $this->db->select("nit");
      $this->db->from("usuario");
      $this->db->where("idUsuario",$idUsuario);
      $nit = $this->db->get()->result()[0];

      force_download('public/files/nit/'.$nit->nit, NULL);
      redirect('perfil','refresh');
  }

  function descargarSolvencia($idUsuario)
  {
     
      $this->db->select("solvencia");
      $this->db->from("usuario");
      $this->db->where("idUsuario",$idUsuario);
      $solvencia = $this->db->get()->result()[0];

      force_download('public/files/solvencia/'.$solvencia->solvencia, NULL);
      redirect('perfil','refresh');
  }

  function usuarioSitio()
  {
    $data["dsa"]=0;
    $this->db->select("idUsuario,concat(nombres,' ',apellidos) nombre,fechaNacimiento,email,pais,departamento,estado");
    $this->db->from("usuario");
    $data["usuarios"]=$this->db->get()->result();
    $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
    $this->load->view('home/header');
    $this->load->view('home/asidenav',$dataNav);

    $this->load->view("empresa/versuariosSitio", $data);
    $this->load->view('home/footer');
  }

  function verPerfilUsuario($id)
  {
    //Obteniendo datos del usuario
    $this->db->select("idUsuario,upper(concat(nombres,' ',apellidos)) nombre, curriculum,fechaNacimiento,genero,estadoCivil,email,pais,departamento,ciudad,direccion,foto,skype,estado");
    $this->db->from("usuario");
    $this->db->where("idUsuario",$id);
    $data["datosUsuario"]=$this->db->get()->result()[0];
    $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
    $this->load->view('home/header');
    $this->load->view('home/asidenav',$dataNav);
    $this->load->view("empresa/verPerfilUsuario-Admin", $data);
    $this->load->view('home/footer');
  }

  function deshabiltarUsuario($id)
  {
        $this->db->where("idUsuario",$id);
        $this->db->update("usuario",array('estado'=>0));
        $this->session->set_flashdata('mensaje',"Actualización correcta!");
        $this->session->set_flashdata('error',true);
        redirect('verPerfilUsuario/'.$id,'refresh');
  }
  function habilitarUsuario($id)
  {
        $this->db->where("idUsuario",$id);
        $this->db->update("usuario",array('estado'=>1));
        $this->session->set_flashdata('mensaje',"Actualización correcta!");
        $this->session->set_flashdata('error',true);
        redirect('verPerfilUsuario/'.$id,'refresh');
  }

}

?>
