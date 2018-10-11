<?php
class MUsuario extends CI_Model
{

    function __construct()
    {
      parent:: __construct();
    }

  public function UpdateUser($campos,$id)
  {
     $id=$this->session->userdata('s_idusuario');
     if(!isset($id))
     {
         return array(
             'error'=>true,
             'mensaje'=>'No se tiene acceso');
     }
     $this->db->reset_query();
     $this->db->where("idUsuario",$id);
     $this->db->update("usuario",$campos);
     //verificando si se actualizo
     if($this->db->affected_rows()==0)
      {
          return array(
              'error'=>true,
              'mensaje'=>'Error en el servidor no fue posible la actualización, intentelo mas tarde. '
          );
      }else if($this->db->affected_rows()>0)
      {
          return array(
              'error'=>false,
              'mensaje'=>'Datos personales actualizados con exito!'
          );
      }
  }
}
?>
