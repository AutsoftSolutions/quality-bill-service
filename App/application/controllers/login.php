<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('usuario_model');
		$user_db = $this->usuario_model->obtenerbyuser($username);

		if (isset($user_db[0]) && $password == $user_db[0]->PASSWORD) {
			$this->session->set_userdata('logged_in', 'true');
			$this->session->set_userdata('id_empresa', $user_db[0]->ID);
			$this->session->set_userdata('nombre_usuario', $user_db[0]->NOMBRE);
			$this->session->set_userdata('nit', $user_db[0]->NIT);
			redirect(base_url("index.php/factura/".$user_db[0]->ID));
		} else {
			$this->session->set_flashdata('mensaje', 'El usuario o contraseña son incorrectos.');
			redirect(base_url("index.php"));
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url("index.php"));
	}
}
?>