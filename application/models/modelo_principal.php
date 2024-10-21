<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modelo_principal extends CI_MODEL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function verificarUsuario($user, $pass)
    {
        $consulta = $this->db->query("SELECT * FROM administracion  
        WHERE user='$user' AND password='$pass'; ");
        return  $consulta->result();

    }
    public function get_total_admins() {
        return $this->db->count_all('administracion');
    }
    public function get_total_fabricantes() {
        return $this->db->count_all('fabricante');
    }
    public function get_total_productos() {
        return $this->db->count_all('producto');
    }
}