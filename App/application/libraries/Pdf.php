<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {
	function __construct() {
		parent::__construct();
	}

	var $logoProyecto;
	var $descripcionProyecto;

	public function setcustomHeader($logoProyecto, $descripcionProyecto) {
		if ($logoProyecto != null) {
			$this->logoProyecto = $logoProyecto;
			$this->descripcionProyecto = $descripcionProyecto;
		} else {
			$this->logoProyecto = K_PATH_IMAGES . '/logo_ani.jpg';
			$this->descripcionProyecto = '';
		}
	}

	public function Header() {
		// Logo
		$image_ani = K_PATH_IMAGES . '/logo_ani.jpg';
		$image_logo = $this->logoProyecto;
		$this->Image($image_ani, 15, 15, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		//fuente y tamaño de letra
		$this->SetFont('helvetica', 'B', 8);
		//titulo
		$this->MultiCell(110, 5, $this->descripcionProyecto, 1, 'C', 0, 1, '', '', true);

		$this->Image($image_logo, 156, 15, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

	}

	// Page footer
	public function Footer() {
		// posicion -15mm
		$this->SetY(-15);
		$this->SetX(-15);
		// fuente
		$this->SetFont('helvetica', 'I', 9);
		// numeracion
		$this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->SetX(0);
		//$this->Cell(0, 10, 'Avenida calle 6 39B 95 Bloque F 502 Tel: 2771195 – 320 8032044 Bogotá', 0, false, 'C', 0, '', 0, false, 'T', 'M');

	}
}