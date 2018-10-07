<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CEmpresa extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   }

   


    function nuevaPropuesta()
    {
        $this->db->select("*");
        $this->db->from("conocimientos");
        $data["conocimientos"]=$this->db->get()->result();
        $this->load->view('home/header');
        $this->load->view('home/asidenav');
        $this->load->view('empresa/vnuevapropuesta',$data);
        $this->load->view('home/footer');
    }

    function verMisPropuestas()
    {
        $this->db->select("idPropuesta,titulo,fecha,estado,jornada,salario");
        $this->db->from("propuesta");
        $data["propuestas"]=$this->db->get()->result();
        $this->load->view('home/header');
        $this->load->view('home/asidenav');
        $this->load->view('empresa/vvermisPropuestas',$data);
        $this->load->view('home/footer');
    }

    function verPropuesta($id)
    {
        $this->load->view('home/header');
        $this->load->view('home/asidenav');
        $this->load->view("empresa/verPropuesta");
        $this->load->view('home/footer');
    }

    function guardarPropuesta()
    {
       $this->input->post("titulo"); 
       $conocimientos =$this->input->post("conocimientos");
      
       $this->input->post("descripcion");
        $idUsuario=$this->session->userdata('s_idusuario');
        $datos = array(
            'titulo'=>$this->input->post("titulo"),
            'descripcion'=>$this->input->post("descripcion"),
            'fecha'=>date('Y-m-d h:i:s'),
            'jornada'=>$this->input->post("jornada"),
            'salario'=>$this->input->post("salario"),
            'idUsuarioEmpresa'=>$idUsuario
        );
        $this->db->insert("propuesta",$datos);
        $id=$this->db->insert_id();

        foreach($conocimientos as $cono)
        {
            $dataConocimiento = array(
                'idPropuesta'=>$id,
                'idConocimiento'=>$cono,
                'idNivel'=>1
            );
            $this->db->insert("propuestaConocimiento",$dataConocimiento);
        }


        redirect('/CEmpresa/nuevaPropuesta','refresh');

    }

    function agregarConocimiento()
    {
        $this->db->insert("conocimientos",array('conocimientos'=>$this->input->post("conocimiento")));

        echo json_encode(array('error'=>false,'id'=>$this->db->insert_id()));
    }



}

?>