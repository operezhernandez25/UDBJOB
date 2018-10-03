<?php
  class MLogin extends CI_Model
  {
    function __construct()
    {
      parent:: __construct();
    }

    public function ingresar($email,$pass){
      $this->db->select('idUsusuario, nombres, apellido, correo, foto');
      $this->db->from('usuario');
      $this->db->where('skype',$email);
      $this->db->where('password',$pass);

      $resultado=$this->db->get();

      if ($resultado->num_rows()==1) {
        $r=$resultado->row();

        $s_usuario=array(
          's_idusuario'=>$r->idUsusuario,
          's_usuario'=>$r->apellido.", ".$r->nombres,
          's_Correo'=>$r->skype
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
