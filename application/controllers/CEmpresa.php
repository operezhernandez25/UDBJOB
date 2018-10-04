<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CEmpresa extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
   }

   function index()
   {
    $this->load->helper('form');
    echo form_open_multipart('CEmpresa/do_upload');
    echo form_input(array('type' => 'file','name' => 'userfile'));
    echo form_submit('submit','upload'); 
    echo form_close(); 

   }
   //PRUEBA
   function do_upload()
    {
        // load codeigniter helpers
        $this->load->helper(array('form','url'));
        // set path to store uploaded files
        $config['upload_path'] = './uploads/';
        // set allowed file types
        $config['allowed_types'] = 'pdf';
        // set upload limit, set 0 for no limit
        $config['max_size']    = 0;
 
        // load upload library with custom config settings
        $this->load->library('upload', $config);
 
         // if upload failed , display errors
        if (!$this->upload->do_upload())
        {
            $this->data['error'] = $this->upload->display_errors();
             $this->data['page_data'] = 'admin/upload_view';
             $this->load->view('admin/admin', $this->data);
         }
        else
        {
              print_r($this->upload->data());
             // print uploaded file data
        }
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
    function guardarPropuesta()
    {
       $this->input->post("titulo"); 
       $conocimientos =$this->input->post("conocimientos");
      
       $this->input->post("descripcion");

       
    }



}

?>