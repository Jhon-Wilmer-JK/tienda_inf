<?php
defined("BASEPATH") OR exit("No direct script");

class Reportes_fabricantes extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("fpdf/fpdf");
        $this->load->model("modelo_fabricante");
        define('FPDF_FONTPATH',BASEPATH.'/libraries/fpdf/font/');
        #$this->load->model("modelo_reportes"); // Load the model here
    }

    public function imprimir(){
        $this->fpdf->AddPage(); #añade la primra página
        $this->fpdf->setTextColor(0, 0, 0);
        $this->fpdf->SetFont('Times','UB',15); #tipo de letra
        $this->fpdf->SetXY(10,13);
        $this->fpdf->Cell(190,35,"LISTADO DE FABRICANTES:",0,0,'C',0);
        // Ancho de cada celda

        // Primera fila con textos centrados
        $this->fpdf->SetFont('Times','B',12); #tipo de letra

        $this->fpdf->SetXY(10,60);
        $this->fpdf->Cell(10, 10, 'Nro', 1, 0, 'C',0);
        $this->fpdf->Cell(180, 10, 'Nombre', 1, 0, 'C',0);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Times','',12); #tipo de letra

        $i=1;
        $y=70;
        $data['ver']=$this->modelo_fabricante->listar2();
        foreach ($data['ver'] as $fila) { 

            $this->fpdf->SetXY(10, $y);
            $this->fpdf->Cell(10, 10, $i++, 1, 0, 'C', 0);
            $this->fpdf->Cell(180, 10, $fila->nombre, 1, 0, 'C', 0);
            $y += 10;  // Incrementa la posición Y para la siguiente fila
        }
            
        $this->fpdf->Output('Contactos.pdf','I');
       # $this->setTextColor();
       

    }
}