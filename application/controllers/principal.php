<?php
defined("BASEPATH") OR exit("No direct script");

class Principal extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("modelo_principal"); // Load the model here
    }

    public function index(){
        $data["total_admins"]=$this->modelo_principal->get_total_admins();
        $data["total_fabricantes"]=$this->modelo_principal->get_total_fabricantes();
        $data["total_productos"]=$this->modelo_principal->get_total_productos();
        if(empty($this->session->userdata('id'))){
            redirect(base_url("principal/logout"));
        }
        else{
        $this->load->view('plantillas/header');
        $this->load->view('plantillas/principal',$data);
        $this->load->view('plantillas/footer');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->load->view('plantillas/login');
    }
    public function verificarUsuario()
    {
            $datos["verificar"] = $this->modelo_principal->verificarUsuario(
                    $this->input->post("user"),
                    $this->input->post("password")
            );
            if (empty($datos["verificar"])) {
                    redirect(base_url("principal/logout"));
            } else {

                    foreach ($datos["verificar"] as $fila) {
                            $id = $fila->id;
                            $nombre = $fila->user;
                            $password = $fila->password;
                            $fotos = $fila->fotos;
                    }
                    $data = array(
                            'id' => $id,
                            'nombre' => $nombre,
                            'password' => $password,
                            'fotos' => $fotos,
                            'login' => TRUE
                            
                    );
                    $this->session->set_userdata($data);
                    redirect(base_url("principal"));
            }
    }
}