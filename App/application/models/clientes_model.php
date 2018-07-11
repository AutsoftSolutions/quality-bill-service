<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function obtenerUsuario($username) {
		$this->db->from('clientes');
		$this->db->where('USUARIO', $username);
		$q = $this->db->get();

		return $q->result();
	}

	function insertcliente($data) {
		$this->db->insert('clientes', array('NOMBRE' => $data['nombre'],'NIT' => $data['nit'], 'DIRECCION' => $data['direccion'], 
			'TELEFONO' => $data['telefono'],'CIUDAD' => $data['CIUDAD'], 'ID_USUARIO' => $data['id_usuario']));
	}

	function getbyid($id) {
		$this->db->where('ID', $id);
		$query = $this->db->get('clientes');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
		//return $q->result();
	}
	
	function leerclientes($id) {
		$this->db->where('ID_USUARIO', $id);
		$query = $this->db->get('clientes');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function eliminar($id) {
		$this->db->where('ID', $id);
		$this->db->delete('clientes');
	}

	function actualizarcliente($id, $data) {
		$datos = array('NOMBRE' => $data['nombre'],'NIT' => $data['nit'], 'DIRECCION' => $data['direccion'], 'TELEFONO' => $data['telefono'], 
			'CIUDAD' => $data['ciudad']);
		$this->db->where('ID', $id);
		$query = $this->db->update('clientes', $datos);
	}

	
}
?>