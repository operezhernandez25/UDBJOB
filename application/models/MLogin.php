<?php
  class MLogin extends CI_Model
  {
    function __construct()
    {
      parent:: __construct();
    }

    public function ingresar($email,$pass){
      $this->db->select('idUsuario, nombres, apellidos, email, foto');
      $this->db->from('usuario');
      $this->db->where('email',$email);
      $this->db->where('password',$pass);

      $resultado=$this->db->get();

      if ($resultado->num_rows()==1) {
        $r=$resultado->row();

        $s_usuario=array(
          's_idusuario'=>$r->idUsuario,
          's_usuario'=>$r->apellidos.", ".$r->nombres,
          's_Correo'=>$r->email,
          's_Foto'=>$r->foto
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

    public function ingresarEmpresa($email,$pass){
      $this->db->select('idUsuarioEmpresa, nombre, apellido, idEmpresa');
      $this->db->from('usuarioEmpresa');
      $this->db->where('correoElectronico',$email);
      $this->db->where('password',$pass);

      $resultado=$this->db->get();

      if ($resultado->num_rows()==1) {
        $r=$resultado->row();

        $s_usuario=array(
          's_idusuario'=>$r->idUsuarioEmpresa,
          's_usuario'=>$r->apellido.", ".$r->nombre
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
