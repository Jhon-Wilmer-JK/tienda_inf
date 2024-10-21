<?php
    class Controlador_fabricante extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper("url");
            $this->load->model("modelo_fabricante");
        }
        public function ver2()
        {
            $data2['ver2']=$this->modelo_fabricante->listar2();
            if(empty($this->session->userdata('id'))){
                redirect(base_url("principal/logout"));
            }
            else{
            $this->load->view('plantillas/header');
            $this->load->view('fabricante/vista_fabricante',$data2);
            $this->load->view('plantillas/footer');
            }
        }

        public function verAdd(){
            if(empty($this->session->userdata('id'))){
                redirect(base_url("principal/logout"));
            }
            else{
            $this->load->view('plantillas/header');
            $this->load->view('fabricante/vista_nuevo_fabricante');
            $this->load->view('plantillas/footer');
            }
            
        }
        public function adicionar()
        {
            $adicionar=$this->modelo_fabricante->adicionar(
                $this->input->post("nombre")
            );
            redirect(base_url('controlador_fabricante/ver2'));
        }
        public function delete($codigo)
        {
            $eliminar=$this->modelo_fabricante->delete($codigo);
            redirect(base_url('controlador_fabricante/ver2'));
        }
        public function editar($codigo)
        {
            if (is_numeric($codigo)) {
                $data2["datos"]=$this->modelo_fabricante->editar($codigo);
                if(empty($this->session->userdata('id'))){
                    redirect(base_url("principal/logout"));
                }
                else{
                $this->load->view('plantillas/header');
                $this->load->view('fabricante/vista_editar_fabricante', $data2);
                $this->load->view('plantillas/footer');
                }
                if ($this->input->post("editar")) {
                    $modificar=$this->modelo_fabricante->editar(
                        $codigo,
                        $this->input->post("editar"),
                        $this->input->post("nombre")
                    );
                    redirect(base_url('controlador_fabricante/ver2'));
                }
            }
        }
    }
?>
