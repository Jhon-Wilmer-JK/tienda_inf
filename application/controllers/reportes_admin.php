<?php
defined("BASEPATH") OR exit("No direct script");

class Reportes_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("fpdf/fpdf");
        $this->load->model("modelo_admin");
        define('FPDF_FONTPATH',BASEPATH.'/libraries/fpdf/font/');
        #$this->load->model("modelo_reportes"); // Load the model here
    }

    public function imprimir(){
        $this->fpdf->AddPage(); #añade la primra página
        $this->fpdf->setTextColor(0, 0, 0);
        $this->fpdf->SetFont('Times','UB',15); #tipo de letra
        $this->fpdf->SetXY(10,13);
        $this->fpdf->Cell(190,35,"LISTADO DE ADMINISTRACION:",0,0,'C',0);
        // Ancho de cada celda

        // Primera fila con textos centrados
        $this->fpdf->SetFont('Times','B',12); #tipo de letra

        $this->fpdf->SetXY(10,60);
        $this->fpdf->Cell(10, 10, 'Nro', 1, 0, 'C',0);
        $this->fpdf->Cell(37, 10, 'Foto', 1, 0, 'C',0);
        $this->fpdf->Cell(80, 10, 'User', 1, 0, 'C',0);
        $this->fpdf->Cell(60, 10, 'Password', 1, 0, 'C',0);
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Times','',12); #tipo de letra

        $i=1;
        $y=70;
        $data['ver']=$this->modelo_admin->ver();
        foreach ($data['ver'] as $fila) { 

            $this->fpdf->SetXY(10, $y);
            $this->fpdf->Cell(10, 10, $i++, 1, 0, 'C', 0);
            $this->fpdf->Cell(37, 10, '', 1, 0, 'C', 0);
            $this->fpdf->Image(base_url("fotos/").$fila->fotos,25,$y+0.5,9);
            $this->fpdf->Cell(80, 10, $fila->user, 1, 0, 'C', 0);
            $this->fpdf->Cell(60, 10, $fila->password, 1, 0, 'C', 0);
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
        $this->fpdf->Cell(190,35,"Administrador",0,0,'C',0);
        if (is_numeric($id)){
            $data["datos"]=$this->modelo_admin->editar($id);
            
        foreach ($data["datos"] as $fila) {
        // Ancho de cada celda
        $this->fpdf->Image(base_url("fotos/").$fila->fotos,10,60,50);

        $this->fpdf->SetFont('Times','B',20); #tipo de letra
        $this->fpdf->SetXY(100,60);
        $this->fpdf->Cell(250, 10, 'User:', 0, 0, 'L',0);
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Times','U',20); #tipo de letra
        $this->fpdf->SetXY(100,70);
        $this->fpdf->Cell(250, 10, $fila->user, 0, 0, 'L',0);
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Times','B',20); #tipo de letra
        $this->fpdf->SetXY(100,80);
        $this->fpdf->Cell(250, 10, 'Password:', 0, 0, 'L',0);
        $this->fpdf->Ln();
        
        $this->fpdf->SetFont('Times','U',20); #tipo de letra
        $this->fpdf->SetXY(100,90);
        $this->fpdf->Cell(250, 10, $fila->password, 0, 0, 'L',0);
        $this->fpdf->Output('Contactos.pdf','I');
        }
        }
    }
}