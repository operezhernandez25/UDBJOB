<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsuariosModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

  public function registrar($data)
  {
    return $this->db->insert("usuario",$data);
  }

	public function InsertPhone($data)
	{
		return $this->db->insert('telefonos',$data);
	}

	public function idPhone($phone)
	{
		$this->db->where("numero",$phone);
		$query = $this->db->get("telefonos");
		return $query->result();
	}
}
