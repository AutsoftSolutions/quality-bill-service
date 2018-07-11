<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function obtenerUsuario($id) {
		$this->db->from('usuario');
		$this->db->where('ID', $id);
		$q = $this->db->get();

		return $q->result();
	}
	function obtenerbyuser($username) {
		$this->db->from('usuario');
		$this->db->where('USUARIO', $username);
		$q = $this->db->get();

		return $q->result();
	}

	function actualizarusuario($id, $data) {
		$datos = array('USUARIO' => $data['usuario'],'PASSWORD' => $data['password'],'NOMBRE' => $data['nombre'],'NIT' => $data['nit'], 
			'DIRECCION' => $data['direccion'], 'TELEFONO' => $data['telefono'], 'CORREO' => $data['correo'], 'RESOLUCION' => $data['resolucion'],
			'FECHA_RESOLUCION' => $data['fecha_resolucion'], 'ACTIVIDAD_ECONOMICA' => $data['actividad'], 'FACTURA_DESDE' => $data['factura_desde'], 
			'FACTURA_HASTA' => $data['factura_hasta'],'ICA' => $data['ica']);
		$this->db->where('ID', $id);
		$query = $this->db->update('usuario', $datos);
	}

	function insertarchivo($data, $id) {
		$datos = array('IMAGEN' => $data);
		$this->db->where('ID', $id);
		$query = $this->db->update('usuario', $datos);
	}

}
?>