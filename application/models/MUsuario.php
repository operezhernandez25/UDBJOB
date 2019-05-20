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

    //agregando conocimientos al usuario
    public function ingresarConocimientoUser($param){
      $this->db->reset_query();
      $campos=array(
        'idUsuario'=> $param['idUsuario'],
        'idConocimiento'=> $param['mcmbConocimientos'],
        'idNivel'=> 1
      );
      $this->db->insert('usuarioconocimiento',$campos);
      return $campos['idConocimiento'];
    }

    //eliminar conocimientos
    public function eliminarConocimiento($idP){
      $this->db->where('idUsuario',$this->session->userdata('s_idusuario'));
      $this->db->where('idConocimiento',$idP);
      $this->db->delete('usuarioconocimiento');
    }

    //ingresarConocimientoNew
    public function ingresarConocimientoNew($param){
      $this->db->reset_query();
      $campos=array(
        'conocimientos'=> $param['conocimientos'],
        'verificado'=> $param['verificado']
      );
      $this->db->insert('conocimientos',$campos);

      //guardar en tabala conocimientoUsuario
      $lastid=$this->db->insert_id();
      $campos=array(
        'idUsuario'=> $this->session->userdata('s_idusuario'),
        'idConocimiento'=> $lastid,
        'idNivel'=> 1
      );
      $this->db->insert('usuarioconocimiento',$campos);

      return $lastid;
    }

    public function updatePass($campos,$id)
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
                'mensaje'=>'Contraseña actualizada con exito!'
            );
        }
    }
}
?>
