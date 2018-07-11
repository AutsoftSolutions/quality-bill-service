<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configuracion extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->library('upload');
	}

	public function index($id = NULL) {
		if (is_null($id)) {
			$id = 1;
		}

		$dato['data'] = $this->usuario_model->obtenerUsuario($this->session->userdata('id_empresa'));
		$this->load->view('configuracion/index', $dato);
	}

	function guardarinfo() {
		$data = array(
			'usuario' => $this->input->post('usuario'),
			'password' => $this->input->post('password'),
			'nombre' => $this->input->post('nombre'),
			'nit' => $this->input->post('nit'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'correo' => $this->input->post('correo'),
			'resolucion' => $this->input->post('resolucion'),
			'fecha_resolucion' => $this->input->post('fecha_resolucion'),
			'actividad' => $this->input->post('actividad'),
			'factura_desde' => $this->input->post('factura_desde'),
			'factura_hasta' => $this->input->post('factura_hasta'),
			'ica' => $this->input->post('tarifa'));

		$ident = $this->session->userdata('id_empresa');
		$this->usuario_model->actualizarusuario($ident, $data);

		$config['upload_path'] = './uploads/logos/';
		$config['file_name'] = "Logo-".$ident . ".png";
		$config['allowed_types'] = '*';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '100000';
		$config['width'] = 166;
		$config['height'] = 90;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload("imagen")) {
				$this->session->set_flashdata('Error', $this->upload->display_errors());
		} else {
				$this->upload->data();
				$adjunto = './uploads/logos/Logo-' . $ident . '.png';
				$this->usuario_model->insertarchivo($adjunto, $ident);
				$this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok')));
		}
			
	}

}
?>
