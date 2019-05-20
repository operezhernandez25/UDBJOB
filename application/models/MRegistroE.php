<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MRegistroE extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

  public function registrar($data)
  {
    return $this->db->insert("usuarioempresa",$data);
  }

	public function InsertEmpresa($data)
	{
		return $this->db->insert('empresa',$data);
	}

	public function idEmpresa($nombre)
	{
		$this->db->where("nombre",$nombre);
		$query = $this->db->get("empresa");
		return $query->result();
	}

}
