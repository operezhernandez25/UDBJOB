<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CRegistroE extends CI_Controller
{
   public function  __construct()
   {
    parent::__construct();
    $this->load->model('MRegistroE');
   }

   public function index()
   {
      $errores = array();
      $errores['error'] = false;
      $this->load->view('registro/RegistroE',$errores);
   }

   public function registrar()
   {
     $nombre = $this->input->POST('nombre');
     $apellido = $this->input->POST('apellido');
     $password = sha1($this->input->POST('password'));
     $email = $this->input->POST('email');
     $tipoUsuario = 0;
     $estado = 1;

     $nombreEmp = $this->input->POST('nombreEmp');
     $razonSocial = $this->input->POST('razonSocial');
     $numTrabajadores = $this->input->POST('numTrabajadores');
     $cmbNacionalidad = $this->input->POST('cmbNacionalidad');
     $departamento = $this->input->POST('departamento');
     $direccion = $this->input->POST('direccion');
     $sector = $this->input->POST('sector');

     //$error = true;
     $errores = array();

     //Para la Foto
     $this->load->library('upload');
     if (!empty($_FILES['foto']['name']))
     {
         // Configuración para el Archivo
         $config['upload_path'] = 'public/photos/';
         $config['allowed_types'] = 'jpg|png|jpeg';

         // Cargamos la configuración del Archivo
         $this->upload->initialize($config);

         // Subimos archivo
         if ($this->upload->do_upload('foto'))
         {
             $data = $this->upload->data();
             $foto = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errores['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }

     //Para el NIT
     $this->load->library('upload');
     if (!empty($_FILES['nit']['name']))
     {
         $config['upload_path'] = 'public/files/nit/';
         $config['allowed_types'] = 'pdf|jpg|jpeg|png';

         $this->upload->initialize($config);

         if ($this->upload->do_upload('nit'))
         {
             $data = $this->upload->data();
             $nit = $data['file_name'];
             $errores['error'] = false;
         }
         else
         {
             //echo $this->upload->display_errors();
             $errorers['error'] = true;
             $errores['error_archivo'] = "No se ha podido subir el arcivo. Revise si la extensión es la correcta.";
         }
     }
     else
     {
       $errores['error'] = true;
       $errores['error_archivo'] = "Debes subir los archivos necesarios.";
     }

     $this->form_validation->set_rules('password', 'Password', 'required');
     $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');

     if ($this->form_validation->run() && !$errores['error'])
     {
       //Agregando empresa
       $empresa = array(
         'nombre' => $nombreEmp,
         'razonSocial' => $razonSocial,
         'NIT' => $nit,
         'pais' => $cmbNacionalidad,
         'region' => $departamento,
         'direccion' => $direccion,
         'sector' => $sector,
         'numTrabajadores' => $numTrabajadores
        );

       $this->MRegistroE->InsertEmpresa($empresa);

       //Obteniendo ID de la empresa
       $idEmpresa = $this->MRegistroE->idEmpresa($nombreEmp);

       if ($idEmpresa != FALSE)
       {
         foreach ($idEmpresa as $row)
         {
           $idEmp = $row->idEmpresa;
         }
       }

       $usuarioEmpresa = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'idEmpresa' => $idEmp,
        'password' => $password,
        'correoElectronico' => $email,
        'tipoUsuario' => $tipoUsuario,
        'img' => $foto,
        'estado' => $estado
       );

       if($this->MRegistroE->registrar($usuarioEmpresa))
       {
         redirect('/login/','refresh');
       }
       else
       {
         $this->load->view('registro/RegistroE',$errores);
       }
     }
     else
     {
       $this->load->view('registro/RegistroE',$errores);
     }

   }
}
?>
