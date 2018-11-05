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
        $this->db->where("estado",1);
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
          $z=$campos["img"];
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

    public function updateNombre($id,$nombre)
    {
       $idUsuario=$this->session->userdata('s_idusuario');
       if(!isset($idUsuario))
       {
           return array(
               'error'=>true,
               'mensaje'=>'No se tiene acceso');
       }

       if($id=="" || $nombre=="")
       {
        return array(
            'error'=>true,
            'mensaje'=>'Faltan datos');
       }
       $datos=array('nombre'=>$nombre);
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update("usuarioEmpresa",$datos);
       //verificando si se actualizo
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización   ->'.$nombre.'  '
            );
        }else if($this->db->affected_rows()>0)
        {
            return array(
                'error'=>false,
                'mensaje'=>'Nombre actualizado con exito!'
            );
        }
    }

    public function updateApellido($id,$apellido)
    {
       $idUsuario=$this->session->userdata('s_idusuario');
       if(!isset($idUsuario))
       {
           return array(
               'error'=>true,
               'mensaje'=>'No se tiene acceso');
       }

       if($id=="" || $apellido=="")
       {
        return array(
            'error'=>true,
            'mensaje'=>'Faltan datos');
       }
       $datos=array('apellido'=>$apellido);
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update("usuarioEmpresa",$datos);
       //verificando si se actualizo
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización   ->'.$apellido.'  '
            );
        }else if($this->db->affected_rows()>0)
        {
            return array(
                'error'=>false,
                'mensaje'=>'Apellido actualizado con exito!'
            );
        }
    }

    public function updateCorreo($id,$correo)
    {
       $idUsuario=$this->session->userdata('s_idusuario');
       if(!isset($idUsuario))
       {
           return array(
               'error'=>true,
               'mensaje'=>'No se tiene acceso');
       }

       if($id=="" || $correo=="")
       {
        return array(
            'error'=>true,
            'mensaje'=>'Faltan datos');
       }
       $datos=array('correoElectronico'=>$correo);
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update("usuarioEmpresa",$datos);
       //verificando si se actualizo
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización   ->'.$correo.'  '
            );
        }else if($this->db->affected_rows()>0)
        {
            return array(
                'error'=>false,
                'mensaje'=>'Correo actualizado con exito!'
            );
        }
    }

    public function updateTipo($id,$tipo)
    {
       $idUsuario=$this->session->userdata('s_idusuario');
       if(!isset($idUsuario))
       {
           return array(
               'error'=>true,
               'mensaje'=>'No se tiene acceso');
       }

       if($id=="" || $tipo=="")
       {
        return array(
            'error'=>true,
            'mensaje'=>'Faltan datos');
       }
       $datos=array('tipoUsuario'=>$tipo);
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update("usuarioEmpresa",$datos);
       //verificando si se actualizo
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización   ->'.$correo.'  '
            );
        }else if($this->db->affected_rows()>0)
        {
            return array(
                'error'=>false,
                'mensaje'=>'Tipo usuario actualizado con exito!'
            );
        }
    }

    public function updateImagen($id,$img,$nombreArchivo)
    {
        $idUsuario=$this->session->userdata('s_idusuario');
        //comprobando que se este logeado para realizar la peticion
        if(!isset($idUsuario))
        {
            return array(
                'error'=>true,
                'mensaje'=>'No se tiene acceso');

        }
        if($id=="" || $img=="" || $nombreArchivo=="")
       {
        return array(
            'error'=>true,
            'mensaje'=>'Faltan datos');
       }
       $datos=array("img"=>'uploads/usere/'.$nombreArchivo.'.jpg');
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update("usuarioEmpresa",$datos);
       //verificando si actualizo
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización   ->'.$nombre.'  '
            );
        }else if($this->db->affected_rows()>0)
        {
            //guardando imagen

            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace('data:image/jpg;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
           // utf8_encode($img);
            //decodificando la imagen
            $data = base64_decode($img);
            //Asignando nombre al archivo y la carpeta donde estara
            $file =  'uploads/usere/'.$nombreArchivo.'.jpg';
            //guardando imagen
                file_put_contents($file, $data);
            return array(
                'error'=>false,
                'mensaje'=>'Foto perfil actualizada con exito'
            );
        }
    }

    public function deleteUsere($id)
    {
       //comprobando que no este siendo utilizado
       $idUsuario=$this->session->userdata('s_idusuario');
       if(!isset($idUsuario))
       {
           return array(
               'error'=>true,
               'mensaje'=>'No se tiene acceso');
       }
       $this->db->reset_query();
       $datos=array(
           'estado'=>0
       );
       $this->db->reset_query();
       $this->db->where("idUsuarioEmpresa",$id);
       $this->db->update('usuarioEmpresa',$datos);
       if($this->db->affected_rows()==0)
        {
            return array(
                'error'=>true,
                'mensaje'=>'Error en el servidor no fue posible la actualización'
            );
        }else if($this->db->affected_rows()>0)
        {
            return array(
                'error'=>false,
                'mensaje'=>'Usuario eliminado con exito'
            );
        }
    }

  }
?>
