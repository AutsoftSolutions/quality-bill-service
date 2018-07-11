<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('facturas_model');
                $this->load->model('clientes_model');
                $this->load->model('usuario_model');
                $this->load->library('upload');
	}

	public function index($id = NULL) {
		if (is_null($id)) {
			$id = 1;
		}
                $data['clientes']=$this->clientes_model->leerclientes($id);
		$this->load->view('factura/index', $data);
	}

	public function generarpdf(){
                $id_cliente=$this->input->post('id_cliente');
                $cliente = $this->clientes_model->getbyid($id_cliente);
                $usuario = $this->usuario_model->obtenerUsuario($this->session->userdata('id_empresa'));

                $iva = $this->facturas_model->check_cb($this->input->post('iva'));
                $administracion = $this->facturas_model->check_cb($this->input->post('administracion'));
                $imprevistos = $this->facturas_model->check_cb($this->input->post('imprevistos'));
                $utilidad = $this->facturas_model->check_cb($this->input->post('utilidad'));
		
                $data=$this->session->userdata('id_empresa');
		        $this->facturas_model->insert($data);
                $date = new DateTime('now');

                $subtotal=$this->input->post('totalfactura');///1.1263;

                if ($iva==1) {
                        $dato_iva=$subtotal*0.0421*0.19;
                }else{
                        $dato_iva=$this->input->post('totalfactura')*0.19;
                }
                if ($administracion==1) {
                        $porcentaje_a='5%';
                        $valor_a=$subtotal*0.0421;
                }else{
                        $porcentaje_a='0%';
                        $valor_a=0.0;
                }
                if ($imprevistos==1) {
                        $porcentaje_i='5%';
                        $valor_i=$subtotal*0.0421;
                }else{
                        $porcentaje_i='0%';
                        $valor_i=0.0;
                }
                if ($utilidad==1) {
                        $porcentaje_u='2%';
                        $valor_u=$subtotal*0.02;//0.0421;
                }else{
                        $porcentaje_u='0%';
                        $valor_u=0.0;
                }

                $subtotal=$subtotal+$valor_a+$valor_i+$valor_u;

		$num_factura=$this->db->insert_id();

		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Factura_No.'.$num_factura);
		$pdf->SetHeaderMargin(30);
		$pdf->SetTopMargin(20);
		$pdf->setFooterMargin(20);
		$pdf->SetAutoPageBreak(true);
		$pdf->SetAuthor($this->session->userdata('nombre_usuario'));
		$pdf->SetDisplayMode('real', 'default');

		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->AddPage();

		if ($usuario[0]->IMAGEN != null) {
            $pdf->Image($usuario[0]->IMAGEN, 5, 5, 30, 30, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        }
        

		$html = '';
                $html .= "<style type=text/css>";
                $html .= "th{color: #fff; font-weight: bold; background-color: #222}";
                $html .= "td{background-color: #AAC7E3; color: #fff}";
                $html .= "</style>";
                $html .= "<h1>".$usuario[0]->NOMBRE."</h1><h3>NIT ".$this->session->userdata('nit')."</h3>";
    
                $pdf->writeHTMLCell($w = 0, $h = 0, $x = 40, $y = 7, $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = false);
 		
 		$pdf->SetFillColor(255, 255, 255);
                $pdf->setCellPaddings(1, 1, 1, 1);
                $pdf->setCellMargins(1, 1, 1, 1);
                $pdf->SetFont('helvetica', 'B', 15);

                $html = '';
                $html .="Factura de venta No.\n";
                $html .="PMG-503\n";
                
                $pdf->MultiCell(55, 5, $html, 0, 'C', 0, 1, 145, 7, true);

                $pdf->SetFillColor(255, 255, 255);
 		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFont('helvetica', '', 8);

 		$html = '';
 		$html .="RÉGIMEN COMÚN\n";
 		$html .="Resolución de Facturación No.".$usuario[0]->RESOLUCION."\n";
 		$html .="Fecha resolución ".$usuario[0]->FECHA_RESOLUCION."\n";
 		$html .="Autoriza Facturación de ".$usuario[0]->FACTURA_DESDE." a ".$usuario[0]->FACTURA_HASTA."\n";
 		$html .="Actividad económica ".$usuario[0]->ACTIVIDAD_ECONOMICA."\n";
 		$html .="Tarifa ICA ".$usuario[0]->ICA."\n";

 		// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

 		$pdf->MultiCell(55, 5, $html, 0, 'C', 0, 1, 145, 27, true);

 		$pdf->MultiCell(20, 5, 'CLIENTE', 1, 'C', 0, 1, 10, 45, true);
                $pdf->MultiCell(80, 5, $cliente->NOMBRE, 1, 'C', 0, 1, 30, 45, true);
                $pdf->MultiCell(20, 5, 'NIT', 1, 'C', 0, 1, 10, 50, true);
                $pdf->MultiCell(80, 5, $cliente->NIT, 1, 'C', 0, 1, 30, 50, true);
                $pdf->MultiCell(50, 5, 'DIRECCION', 1, 'C', 0, 1, 10, 55, true);
                $pdf->MultiCell(50, 5, 'TELEFONO', 1, 'C', 0, 1, 60, 55, true);
                $pdf->MultiCell(50, 5, $cliente->DIRECCION, 1, 'C', 0, 1, 10, 60, true);
                $pdf->MultiCell(50, 5, $cliente->TELEFONO, 1, 'C', 0, 1, 60, 60, true);
                $pdf->MultiCell(100, 5, 'CIUDAD', 1, 'L', 0, 1, 10, 65, true);
                $pdf->MultiCell(100, 5, $cliente->CIUDAD, 1, 'L', 0, 1, 10, 70, true);     

                $pdf->MultiCell(35, 5, 'FECHA FACTURA', 1, 'C', 0, 1, 120, 65, true);
                $pdf->MultiCell(35, 5, 'FECHA VENCIMIENTO', 1, 'C', 0, 1, 155, 65, true);
                $pdf->MultiCell(35, 5, $date->format('d/m/Y'), 1, 'C', 0, 1, 120, 70, true);
                $pdf->MultiCell(35, 5, $date->format('d/m/Y'), 1, 'C', 0, 1, 155, 70, true);

                $pdf->MultiCell(145, 5, 'Descripción', 1, 'C', 0, 1, 10, 80, true);
                $pdf->MultiCell(35, 5, 'Total', 1, 'C', 0, 1, 155, 80, true);
                $pdf->MultiCell(145, 140, $this->input->post('descripcion'), 1, 'C', 0, 1, 10, 85, true);
                $pdf->MultiCell(35, 140, number_format($this->input->post('totalfactura')), 1, 'R', 0, 1, 155, 85, true);

                $pdf->MultiCell(110, 5, 'Valor en letras', 0, 'L', 0, 1, 10, 225, true);
                $pdf->MultiCell(110, 10, 'VENTIÚN  MILLONES QUINIENTOS SETENTA Y CUATRO MIL TRESCIENTOS VENTI TRES PESOS M/CTE', 0, 'L', 0, 1, 10, 230, true);
        
                $pdf->MultiCell(28, 5, 'ADMINISTRACION', 1, 'C', 0, 1, 120, 225, true);
                $pdf->MultiCell(7, 5, $porcentaje_a, 1, 'C', 0, 1, 148, 225, true);
                $pdf->MultiCell(35, 5, number_format($valor_a), 1, 'R', 0, 1, 155, 225, true);
                $pdf->MultiCell(28, 5, 'IMPREVISTOS', 1, 'C', 0, 1, 120, 230, true);
                $pdf->MultiCell(7, 5, $porcentaje_i, 1, 'C', 0, 1, 148, 230, true);
                $pdf->MultiCell(35, 5, number_format($valor_i), 1, 'R', 0, 1, 155, 230, true);
                $pdf->MultiCell(28, 5, 'UTILIDAD', 1, 'C', 0, 1, 120, 235, true);
                $pdf->MultiCell(7, 5, $porcentaje_u, 1, 'C', 0, 1, 148, 235, true);
                $pdf->MultiCell(35, 5, number_format($valor_u), 1, 'R', 0, 1, 155, 235, true);
                $pdf->MultiCell(35, 5, 'SUBTOTAL', 1, 'C', 0, 1, 120, 240, true);
                $pdf->MultiCell(35, 5, number_format($subtotal), 1, 'R', 0, 1, 155, 240, true);
                $pdf->MultiCell(35, 5, 'ANTICIPO', 1, 'C', 0, 1, 120, 245, true);
                $pdf->MultiCell(35, 5, '0,00', 1, 'R', 0, 1, 155, 245, true);
                $pdf->MultiCell(35, 5, 'IVA', 1, 'C', 0, 1, 120, 250, true);
                $pdf->MultiCell(35, 5, number_format($dato_iva), 1, 'R', 0, 1, 155, 250, true);
                $pdf->MultiCell(35, 5, 'RETEFUENTE', 1, 'C', 0, 1, 120, 255, true);
                $pdf->MultiCell(35, 5, '0,00', 1, 'R', 0, 1, 155, 255, true);
                $pdf->MultiCell(35, 5, 'RETEGARANTIA', 1, 'C', 0, 1, 120, 260, true);
                $pdf->MultiCell(35, 5, '0,00', 1, 'R', 0, 1, 155, 260, true);
                $pdf->MultiCell(35, 5, 'RETEICA', 1, 'C', 0, 1, 120, 265, true);
                $pdf->MultiCell(35, 5, '0,00', 1, 'R', 0, 1, 155, 265, true);
                $pdf->MultiCell(35, 5, 'TOTAL FACTURA', 1, 'C', 0, 1, 120, 270, true);
                $pdf->MultiCell(35, 5, number_format($subtotal+$dato_iva), 1, 'R', 0, 1, 155, 270, true);

                $pdf->MultiCell(105, 10, 'Observaciones: '.$this->input->post('observaciones'), 1, 'L', 0, 1, 10, 240, true);

                $pdf->MultiCell(105, 5, 'Firma Cliente_________________  Firma PMG_________________', 0, 'L', 0, 1, 10, 255, true);

                $pdf->MultiCell(105, 10, 'ESTA FACTURA SE ASIMILA PARA TODOS SUS EFECTOS LEGALES A UNA LETRA DE CAMBIO (ART 774 DEL CÓDIGO DE COMERCIO) Y ES 
        	       UN TITULO VALOR EMITIDO DE ACUERDO A LA LEY 1231 DE 2008. Y CAUSARA INTERESES BANCARIOS A PARTIR DE LA FECHA DE VENCIMIENTO: ', 1, 'C', 0,
        	       1, 10, 260, true);
        
                $pdf->MultiCell(180, 5, $usuario[0]->DIRECCION.' - Teléfono: '.$usuario[0]->TELEFONO, 0, 'C', 0, 1, 10, 280, true);
                $pdf->MultiCell(180, 5, $usuario[0]->CORREO, 0, 'C', 0, 1, 10, 285, true);

                $nombre_archivo = utf8_decode("Factura_No.".$num_factura);

                $adjunto = './uploads/pdf/' . $nombre_archivo;
                $this->facturas_model->insertarchivo($adjunto, $num_factura);


                $pdf->Output('C:\/wamp\/www\/quality-bill-service\/App\/uploads\/pdf\/' .$nombre_archivo.'.pdf', 'FI');
	}

        public function sendemail(){

        $this->load->library('email');
      $this->email->from('felipe.arevalo9502@gmail.com'); // change it to yours
      $this->email->to('pipe.213@hotmail.com');// change it to yours
      $this->email->subject('Resume from JobsBuddy for your Job posting');
      $this->email->message('Testing the email class.');
      if($this->email->send())
     {
        $data['msg'] = "email sent!";
     }
     else
    {
        $data['msg'] = "email was not send";
    }
    $this->load->view('emailresult',$data);
} 

}
?>
