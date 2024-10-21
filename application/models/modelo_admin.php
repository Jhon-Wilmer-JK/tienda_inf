<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_admin extends CI_Model {
    public function adicionar($user, $password, $fotos){
        $consulta = $this->db->query(
            "Insert Into administracion values(
                NULL,'$user','$password','$fotos'
            )");
        return true;
    }
    public function ver(){
        $consulta = $this->db->query("Select * from administracion");
        return $consulta->result();
    }
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function eliminar($id){
        $consulta=$this->db->query(
            "Delete From administracion Where id=$id");
        if ($consulta==true){
            return true;
        }
        else{
            return false;
        }
    }

    public function editar($id,$editar="NULL",$user="NULL",$password="NULL",$fotos="NULL"){
        if($editar=="NULL"){
            $consulta=$this->db->query("Select * from administracion where id = $id");
            return $consulta->result();
        }else{
            $consulta=$this->db->query("
                UPDATE administracion set
                user='$user',
                password='$password',
                fotos='$fotos'
                where id='$id';
            ");
            return true;

        }
        
    }
}
