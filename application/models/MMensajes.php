<?php
class MMensajes extends CI_Model
{

    function __construct()
    {
      parent:: __construct();
    }

    //Obtener los mensajes sin ver de un usuario
    function obtenerMensajesUsuario()
    {
        $this->db->select("count(*) contador, mensajes.idPostulacion, propuesta.titulo,propuesta.idPropuesta");
        $this->db->from("mensajes");
        $this->db->join("postulaciones","postulaciones.idPostulacion = mensajes.idPostulacion");
        $this->db->join("propuesta","propuesta.idPropuesta=postulaciones.idPropuesta");
        $this->db->where("remitente",0);
        $this->db->where("visto",0);
        $this->db->where("postulaciones.idUsuario",$this->session->userdata("s_idusuario"));
        $this->db->group_by("idPostulacion");
        return $this->db->get()->result();
    }

    function obtenerMensajesEmpresa()
    {
        $this->db->select("count(*) contador, mensajes.idPostulacion, propuesta.titulo,propuesta.idPropuesta,usuario.nombres,postulaciones.idUsuario");
        $this->db->from("mensajes");
        $this->db->join("postulaciones","postulaciones.idPostulacion = mensajes.idPostulacion");
        $this->db->join("usuario","usuario.idUsuario=postulaciones.idUsuario");
        $this->db->join("propuesta","propuesta.idPropuesta=postulaciones.idPropuesta");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa=propuesta.idUsuarioEmpresa");
        $this->db->where("remitente",1);
        $this->db->where("visto",0);
        $this->db->where("usuarioEmpresa.idEmpresa",$this->session->userdata("s_idempresa"));
        $this->db->group_by("mensajes.idPostulacion,propuesta.idPropuesta");
        return $this->db->get()->result();
    }


    function obtenerusuariosSinVer()
    {
        $this->db->select("propuesta.idPropuesta,propuesta.titulo,propuesta.fecha,count(propuesta.idPropuesta) contador");
        $this->db->from("postulaciones");
        $this->db->join("propuesta","propuesta.idPropuesta = postulaciones.idPropuesta");
        $this->db->join("usuarioEmpresa","usuarioEmpresa.idUsuarioEmpresa = propuesta.idUsuarioEmpresa");
        $this->db->where("postulaciones.estado",0);
        $this->db->where("usuarioEmpresa.idEmpresa",$this->session->userdata("s_idempresa"));
        $this->db->group_by("propuesta.idPropuesta");
        return $this->db->get()->result();
    }


}


?>