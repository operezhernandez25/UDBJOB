<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cInicio extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model("MMensajes");
    if (!$this->session->userdata('s_idusuario')) {
      redirect('login');
    }
   }

   public function index()
   {
    if($this->session->userdata("s_tipo")==1)
    {
    
      $this->db->select("propuestaConocimiento.idConocimiento,propuestaConocimiento.idPropuesta");
      $this->db->from("propuestaConocimiento");
      $this->db->join("propuesta","propuesta.idPropuesta=propuestaConocimiento.idPropuesta");
      $this->db->where("propuesta.estado",0);
      $data["conocimientosPropuestas"]=$this->db->get()->result();

      $this->db->select("idConocimiento");
      $this->db->from("usuarioConocimiento");
      $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
      $data["conocimientosUsuario"]=$this->db->get()->result();

      //Filtrando las propuestas que se tenga conocimiento
      $coincidencias=null;
      foreach($data["conocimientosUsuario"] as $conoUsu)
      {
        foreach( $data["conocimientosPropuestas"] as $conoPro)
        {
          if($conoUsu->idConocimiento==$conoPro->idConocimiento)
          {
            if(!is_null($coincidencias))
            {
              $contador=0;
              foreach($coincidencias as $con)
            {
              if($con->idPropuesta==$conoPro->idPropuesta)
              {
                $con->cont++;
                $contador++;
              }
            }
            if($contador==0)
            {
              $coincidencias[]= (object) array('idPropuesta' => $conoPro->idPropuesta,'cont'=>1);

            }
            }else
            {
             $coincidencias[]= (object) array('idPropuesta' => $conoPro->idPropuesta,'cont'=>1);

            }
          }
        }
      }


      //Filtrando las propuestas mediante el 70% de parecido
      $this->db->select("count(*) contador,propuestaConocimiento.idPropuesta");
      $this->db->from("propuestaConocimiento");
      $this->db->group_by("propuestaConocimiento.idPropuesta");
      $data["totalConPro"]=$this->db->get()->result();

      $coincidenciasFiltradas[]=0;
      if(!is_null($coincidencias))
      {
        foreach($coincidencias as $con)
        {
          foreach($data["totalConPro"] as $conPRO)
          {
            if($con->idPropuesta==$conPRO->idPropuesta)
            {
              if(($con->cont/$conPRO->contador)>0.7)
              {
                $coincidenciasFiltradas[]=$con->idPropuesta;
              }
            }
          }
        }
      }

      $this->db->select("propuesta.idPropuesta,propuesta.titulo,propuesta.descripcion,cast( propuesta.fecha as date) fecha,propuesta.jornada,propuesta.salario,empresa.nombre,empresa.pais,empresa.sector");
      $this->db->from("propuesta");
      $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
      $this->db->join("empresa","empresa.idEmpresa = usuarioEmpresa.idEmpresa");
      $this->db->where_in("propuesta.idPropuesta",$coincidenciasFiltradas);
      $data["propuestas"]=$this->db->get()->result();
      //Agregando campo
      foreach($data["propuestas"] as $pro)
      {
        $pro->realizado=0;
      }

      //Buscamos las postulaciones de el usuario
      $this->db->select("idPropuesta");
      $this->db->from("postulaciones");
      $this->db->where("idUsuario",$this->session->userdata('s_idusuario'));
      $postulaciones=$this->db->get()->result();
      foreach($data["propuestas"] as $pro)
      {
        foreach($postulaciones as $pos)
        {
          if($pos->idPropuesta==$pro->idPropuesta)
          {
            $pro->realizado=1;

          }
        }
      }

      $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesUsuario();
      
   
      $this->load->view('home/header');
      $this->load->view('home/asidenav',$dataNav);
      
      $this->load->view('vInicio',$data);
      $this->load->view('home/footer');
    }else
    {
      $data["validador"]=0;
        //Cantidad de cotizaciones de la empresa
        $this->db->select("count(idPropuesta) conta");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
        $this->db->from("propuesta");
        if($this->session->userdata("s_administrador")==0)
        $this->db->where("usuarioEmpresa.idEmpresa",$this->session->userdata("s_idempresa"));
        $data["propuestas"]=$this->db->get()->result()[0];

        $query="select avg(conta) promedio from
        (
        select count(postulaciones.idPostulacion) conta from postulaciones
        inner join propuesta on propuesta.idPropuesta=postulaciones.idPropuesta
        inner join usuarioEmpresa on usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa
       ";
       if($this->session->userdata("s_administrador")==0){
       $query.=" where usuarioEmpresa.idEmpresa=".$this->session->userdata("s_idempresa");}
        $query.=" group by propuesta.idPropuesta ) f";
       $data["promedio"]= $this->db->query($query)->result();
        
       
        $dataNav["mensajesPendientes"]=$this->MMensajes->obtenerMensajesEmpresa();
        $dataNav["usuarioSinVer"]=$this->MMensajes->obtenerusuariosSinVer();
      
        $this->load->view('home/header');
        $this->load->view('home/asidenav',$dataNav);
        $this->load->view('vinicioE',$data);
        $this->load->view('home/footer');
    }
  }


    public function paginaInicio()
    {
      if (!$this->session->userdata('s_idusuario')) {
        redirect('inicio');
      }else
      {
        $this->load->view("home/paginaInicio");
      }
      
    }

}
?>
