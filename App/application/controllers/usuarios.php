<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('clientes_model');
	}

	public function index($id = NULL) {
		if (is_null($id)) {
			$id = 1;
		}
		$data['clientes']=$this->clientes_model->leerclientes($this->session->userdata('id_empresa'));
		$this->load->view('usuarios/index',$data);
	}

	public function leercliente($id = NULL) {
		$data = $this->clientes_model->getbyid($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function crearcliente() {
		$data = array(
			'id_usuario' => 2,
			'nombre' => $this->input->post('nombre'),
			'nit' => $this->input->post('nit'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'ciudad' => $this->input->post('ciudad'));

		$ident = $this->input->post('ident');
		if ($ident !== NULL && !empty($ident)) {
			$this->clientes_model->actualizarcliente($ident, $data);
			$this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok')));
		} else {
			$this->clientes_model->insertcliente($data);
			$this->output->set_content_type('application/json')->set_output(json_encode(array('resultado' => 'ok2')));
		}
	
	}

	public function eliminarUsuario($id = NULL) {
		$this->clientes_model->eliminar($id);
	}

}
?>
