<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("modelo_admin");
    }
	public function ver(){
        $data["ver"]=$this->modelo_admin->ver();
        
        #print_r($data);Die();
        if(empty($this->session->userdata('id'))){
            redirect(base_url("principal/logout"));
        }
        else{
        $this->load->view('plantillas/header');
		$this->load->view('admin/vista_admin',$data);
        $this->load->view('plantillas/footer');
        }
	}

    public function verAdd(){
        if(empty($this->session->userdata('id'))){
            redirect(base_url("principal/logout"));
        }
        else{
        $this->load->view('plantillas/header');
        $this->load->view('admin/vista_nuevo_admin');
        $this->load->view('plantillas/footer');
        }
        
    }
    public function adicionar(){
        #print_r($this->input->post());die();
        $nombre_img=$_FILES['upload']['name'];
        $this->guardar_archivo();
        $adicionar=$this->modelo_admin->adicionar(
            $this->input->post("user"),
            $this->input->post("password"),
            $nombre_img
            );
            redirect(base_url('controlador_admin/ver'));
    }
    public function eliminar($id){
		#print_r($IdProducto);die();
		$this->modelo_admin->eliminar($id);
		redirect(base_url('controlador_admin/ver'));
	}
    public function editar($id){
        #print_r($id);die();
        if (is_numeric($id)){
            $data["datos"]=$this->modelo_admin->editar($id);
            #print_r($data);die();
            if(empty($this->session->userdata('id'))){
                redirect(base_url("principal/logout"));
            }
            else{
            $this->load->view('plantillas/header');
            $this->load->view("admin/vista_editar_admin",$data);
            $this->load->view('plantillas/footer');
            }
            
            
            if ($this->input->post("editar")){
                // Verificar si el usuario ha cargado una nueva imagen
                if (!empty($_FILES['upload']['name'])) {
                    $nombre_img = $_FILES['upload']['name'];
                    $this->guardar_archivo();  // Llamada a tu función para guardar el archivo
                } else {
                    // Si no se ha cargado una nueva imagen, mantenemos la imagen actual
                    $nombre_img = $this->input->post('foto_actual');
                }
                $modificar=$this->modelo_admin->editar(
                    $id,
                    $this->input->post("editar"),
                    $this->input->post("user"),
                    $this->input->post("password"),
                    $nombre_img
                );
                redirect(base_url('controlador_admin/ver'));
            }
        }
    }
    private function guardar_archivo()
    {
        $mi_archivo = 'upload';
        //print_r($mi_archivo);die();
        $config['upload_path'] = "fotos/";
        //$config['file_name']= "nombre_archivo";
        $config['allowed_types'] = "*";
        //$config['allowed_types'] = "png";
        $config['max_size'] = "5000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        var_dump($this->upload->data());

    }

}
