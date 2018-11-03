<?php
  class MLogin extends CI_Model
  {
    function __construct()
    {
      parent:: __construct();
    }

    public function ingresar($email,$pass){
      $this->db->select('idUsuario, nombres, apellidos, email, foto,estado');
      $this->db->from('usuario');
      $this->db->where('email',$email);
      $this->db->where('password',$pass);
     

      $resultado=$this->db->get();

      if ($resultado->num_rows()==1) {
        $r=$resultado->row();
        if($r->estado==0)
        {
          return array(
            'error'=>true,
            'mensaje'=>'El acceso al sitio a sido bloqueado.'
          );
        }else{
          $s_usuario=array(
            's_idusuario'=>$r->idUsuario,
            's_usuario'=>$r->apellidos.", ".$r->nombres,
            's_Correo'=>$r->email,
            's_Foto'=>$r->foto,
            's_tipo'=>1
          );

          $this->session->set_userdata($s_usuario);
          return 1;
        }
      }
      else{
        
        return array(
            'error'=>true,
            'mensaje'=>'Credenciales incorrectas, intentelo de nuevo.'
        );
      }
    }

    public function ingresarEmpresa($email,$pass){
      $this->db->select('idUsuarioEmpresa, nombre, apellido, idEmpresa, tipoUsuario,administrador,img');
      $this->db->from('usuarioEmpresa');
      $this->db->where('correoElectronico',$email);
      $this->db->where('password',$pass);

      $resultado=$this->db->get();

      if ($resultado->num_rows()==1) {
        $r=$resultado->row();

        $s_usuario=array(
          's_idusuario'=>$r->idUsuarioEmpresa,
          's_usuario'=>$r->apellido.", ".$r->nombre,
          's_idempresa'=>$r->idEmpresa,
          's_tipo'=> 0,
          's_admin' => $r->tipoUsuario,
          's_Foto'=>$r->img,
          's_administrador'=>$r->administrador
        );

        $this->session->set_userdata($s_usuario);
        return 1;
      }
      else{

        return array(
            'error'=>true,
            'mensaje'=>'Credenciales incorrectas, intentelo de nuevo.'
        );
      }
    }
  }
?>
