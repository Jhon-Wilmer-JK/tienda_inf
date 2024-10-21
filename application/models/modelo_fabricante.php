<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_fabricante extends CI_Model {
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function listar2()
	{
        $consulta=$this->db->query("
        Select fabricante.codigo, fabricante.nombre, producto.nombre as nombre_producto, producto.precio
        FROM fabricante
        LEFT JOIN producto on fabricante.codigo = producto.fk_codigo
        GROUP BY fabricante.codigo, fabricante.nombre");
		
		return$consulta->result();
	}
	public function listar() {
        $query = $this->db->get('fabricante');
        return $query->result();
    }
	public function adicionar($nombre){
		$consulta=$this->db->query("INSERT INTO fabricante VALUES(NULL,'$nombre')");
		if ($consulta == true) {
			return true;
		}else {
			return false;
		}
	}
	public function delete($codigo)
	{
		// Primero, verifica si hay productos asociados al fabricante
		$productos_asociados = $this->db->query("SELECT COUNT(*) as total FROM producto WHERE fk_codigo = $codigo")->row()->total;
		if ($productos_asociados > 0) {
			// Mostrar modal si hay productos asociados
			echo '
            <script>
                // Mostrar alert con mensaje personalizado
                alert("No se puede eliminar ese Fabricante porque tiene productos asociados.");

                // Redirigir a otra página después de aceptar el alert
                window.location.href = "' . base_url('controlador_fabricante/ver2') . '";
            </script>
        ';
			// Termina la ejecución para evitar que el resto del código se ejecute
			die;
		}
		else {
			$consulta=$this->db->query("DELETE FROM fabricante WHERE codigo = $codigo");
		} 
		
	}
	public function editar($codigo, $editar="NULL", $nombre="NULL")
	{
		if ($editar == "NULL") {
			$consulta=$this->db->query("Select * From fabricante WHERE codigo = $codigo");
			return $consulta->result();
		}else {
			$consulta=$this->db->query("
			UPDATE fabricante set
			nombre='$nombre'
			WHERE codigo= '$codigo';
			");
			return true;
		}
	}
}
?>