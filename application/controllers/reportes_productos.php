<?php
defined("BASEPATH") OR exit("No direct script");

class Reportes_productos extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("fpdf/fpdf");
        $this->load->model("modelo_producto");
        $this->load->model("modelo_fabricante");
        define('FPDF_FONTPATH',BASEPATH.'/libraries/fpdf/font/');
        #$this->load->model("modelo_reportes"); // Load the model here
    }



    public function imprimir(){
        $this->fpdf->AddPage(); #añade la primra página
        $this->fpdf->setTextColor(0, 0, 0);
        $this->fpdf->SetFont('Times','UB',15); #tipo de letra
        $this->fpdf->SetXY(10,13);
        $this->fpdf->Cell(190,35,"LISTADO DE PRODUCTO:",0,0,'C',0);
        // Ancho de cada celda

        // Primera fila con textos centrados
        $this->fpdf->SetFont('Times','B',12); #tipo de letra

        $this->fpdf->SetXY(10,60);
        $this->fpdf->Cell(10, 10, 'Nro', 1, 0, 'C',0);
        $this->fpdf->Cell(28, 10, 'Foto', 1, 0, 'C',0);
        $this->fpdf->Cell(65, 10, 'Nombre', 1, 0, 'C',0);
        $this->fpdf->Cell(32, 10, 'Precio', 1, 0, 'C',0);
        $this->fpdf->Cell(57, 10, 'Marca', 1, 0, 'C',0);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Times','',12); #tipo de letra

        $i=1;
        $y=70;
        $data['ver']=$this->modelo_producto->listar();
        foreach ($data['ver'] as $fila) { 

            $this->fpdf->SetXY(10, $y);
            $this->fpdf->Cell(10, 10, $i++, 1, 0, 'C', 0);
            $this->fpdf->Cell(28, 10, "", 1, 0, 'C', 0);  
            $this->fpdf->Image(base_url("fotos/").$fila->fotos,23,$y+1,9);
            $this->fpdf->Cell(65, 10, $fila->nombre, 1, 0, 'C', 0);
            $this->fpdf->Cell(32, 10, $fila->precio, 1, 0, 'C', 0);
            $this->fpdf->Cell(57, 10, $fila->nombre_marca, 1, 0, 'C', 0);
            $y += 10;  // Incrementa la posición Y para la siguiente fila
        }
            
        $this->fpdf->Output('Contactos.pdf','I');
       # $this->setTextColor();
       

    }

    public function imprimir2($id){
        $this->fpdf->AddPage(); #añade la primra página
        $this->fpdf->setTextColor(0, 0, 0);
        $this->fpdf->SetFont('Times','UB',20); #tipo de letra
        $this->fpdf->SetXY(10,13);
        $this->fpdf->Cell(190,35,"Producto",0,0,'C',0);
        if (is_numeric($id)){
            $data["datos"]=$this->modelo_producto->editar($id);
            
        foreach ($data["datos"] as $fila) {
        // Ancho de cada celda
        $this->fpdf->Image(base_url("fotos/").$fila->fotos,10,60,50);

        $this->fpdf->SetFont('Times','B',20); #tipo de letra
        $this->fpdf->SetXY(100,60);
        $this->fpdf->Cell(250, 10, 'Nombre:', 0, 0, 'L',0);
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Times','U',20); #tipo de letra
        $this->fpdf->SetXY(100,70);
        $this->fpdf->Cell(250, 10, $fila->nombre, 0, 0, 'L',0);
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Times','B',20); #tipo de letra
        $this->fpdf->SetXY(100,80);
        $this->fpdf->Cell(250, 10, 'Precio:', 0, 0, 'L',0);
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Times','U',20); #tipo de letra
        $this->fpdf->SetXY(100,90);
        $this->fpdf->Cell(250, 10, $fila->precio, 0, 0, 'L',0);

        $this->fpdf->SetFont('Times','B',20); #tipo de letra
        $this->fpdf->SetXY(10,110);
        $this->fpdf->Cell(250, 10, 'Marca:', 0, 0, 'L',0);
        $this->fpdf->Ln();
        $data2["datos"]=$this->modelo_fabricante->editar($fila->fk_codigo);
        foreach ($data2["datos"] as $marca){
        $this->fpdf->SetFont('Times','U',20); #tipo de letra
        $this->fpdf->SetXY(10,120);
        $this->fpdf->Cell(250, 10,  $marca->nombre, 0, 0, 'L',0);
        $this->fpdf->Output('Contactos.pdf','I');
        }
        }
        }
    }

}