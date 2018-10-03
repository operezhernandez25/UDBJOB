<?php

class MUsuarioE extends CI_Model
{

    function __construct()
    {
      parent:: __construct();
    }

    public function getUsuariosE($idempresa){
        $this->db->select("idUsuarioEmpresa, nombre, apellido, correoElectronico, tipoUsuario");
        $this->db->from("usuarioEmpresa");
        $this->db->where("idEmpresa",$idempresa);
        $respuesta=$this->db->get()->result();
        return $respuesta;
    }
  }
?>
