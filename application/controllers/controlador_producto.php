<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_producto extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("modelo_producto");
		$this->load->model("modelo_fabricante");
	}
	public function ver()
	{
        $data['ver']=$this->modelo_producto->listar();
        if(empty($this->session->userdata('id'))){
            redirect(base_url("principal/logout"));
        }
        else{
		$this->load->view('plantillas/header');
		$this->load->view('producto/vista_producto',$data);
		$this->load->view('plantillas/footer');
        }
	}
	public function verAdd(){
		$data['marcas'] = $this->modelo_fabricante->listar();
        if(empty($this->session->userdata('id'))){
            redirect(base_url("principal/logout"));
        }
        else{
		$this->load->view('plantillas/header');
		$this->load->view('producto/vista_nuevo_producto',$data);
		$this->load->view('plantillas/footer');
        }
		
	}

	public function adicionar(){
        #print_r($this->input->post());die();
        $nombre_img=$_FILES['upload']['name'];
        $this->guardar_archivo();
        $adicionar=$this->modelo_producto->adicionar(
			$this->input->post("nombre"),
			$this->input->post("precio"),
			$this->input->post("fk_codigo"),
			$nombre_img
            );
            redirect(base_url('controlador_producto/ver'));
    }

	public function delete($codigo)
    {
        $eliminar=$this->modelo_producto->delete($codigo);
        redirect(base_url('controlador_producto/ver'));
    }
	public function editar($codigo)
    {
        if (is_numeric($codigo)) {
            $data["datos"]=$this->modelo_producto->editar($codigo);
			$data["marcas"] = $this->modelo_fabricante->listar();
            if(empty($this->session->userdata('id'))){
                redirect(base_url("principal/logout"));
            }
            else{
			$this->load->view('plantillas/header');
            $this->load->view('producto/vista_editar_producto', $data);
			$this->load->view('plantillas/footer');
            }
            if ($this->input->post("editar")) {
                // Verificar si el usuario ha cargado una nueva imagen
                if (!empty($_FILES['upload']['name'])) {
                    $nombre_img = $_FILES['upload']['name'];
                    $this->guardar_archivo();  // Llamada a tu función para guardar el archivo
                } else {
                    // Si no se ha cargado una nueva imagen, mantenemos la imagen actual
                    $nombre_img = $this->input->post('foto_actual');
                }
                $modificar=$this->modelo_producto->editar(
                    $codigo,
                    $this->input->post("editar"),
                    $this->input->post("nombre"),
					$this->input->post("precio"),
					$nombre_img,
					$this->input->post("fk_codigo")
                );
                redirect(base_url('controlador_producto/ver'));
            }
        }
    }
    private function guardar_archivo()
    {
        $mi_archivo = 'upload';
       //    print_r($mi_archivo);die();
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
?>