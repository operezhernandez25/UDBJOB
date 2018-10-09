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
 


      $this->load->view('home/header');
      $this->load->view('home/asidenav');
      $this->load->view('vInicio',$data);
      $this->load->view('home/footer');
    }
    public function inicioUsuario()
    {
      
    }

}
?>
