<?php

class MUsuarioE extends CI_Model
{

    function __construct()
    {
      parent:: __construct();
    }

    public function getUsuariosE($idempresa){
        $this->db->select("idUsuarioEmpresa, nombre, apellido, correoElectronico, tipoUsuario, img");
        $this->db->from("usuarioEmpresa");
        $this->db->where("idEmpresa",$idempresa);
        $respuesta=$this->db->get()->result();
        return $respuesta;
    }

    public function setUserE($campos,$img)
    {
      $idUsuario=$this->session->userdata('s_idusuario');
      //comprobando que se este logeado para realizar la peticion
      if(!isset($idUsuario))
      {
          return array(
              'error'=>true,
              'mensaje'=>'No se tiene acceso');
      }
      $this->db->insert("usuarioEmpresa",$campos);
      $insert=$this->db->affected_rows();

      if($insert>0)
      {
          //guardando imagen
          $nombreArchivo=$campos["img"];
          $img = str_replace('data:image/png;base64,', '', $img);
          $img = str_replace('data:image/jpg;base64,', '', $img);
          $img = str_replace(' ', '+', $img);
          utf8_encode($img);
          //decodificando la imagen
          $data = base64_decode($img);
          //Asignando nombre al archivo y la carpeta donde estara
          $file =  $nombreArchivo;
          //guardando imagen
          file_put_contents($file, $data);
          return array(
              'error'=>false,
              'mensaje'=>'Insertados correctamente'
          );
      }else
      {
          return array(
              'error'=>true,
              'mensaje'=>'¡No se inserto!'
            );
      }
    }
  }
?>
