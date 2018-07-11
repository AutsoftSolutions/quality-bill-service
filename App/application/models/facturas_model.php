<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function insert($data) {
		$this->db->insert('facturas', array('ID_USUARIO' => $data));
	}

	function check_cb($id_check) {
		if ($id_check) {
			return 1;
		} else {
			return 0;
		}
	}

	function insertarchivo($data, $id) {
		$datos = array('FACTURA' => $data);
		$this->db->where('ID', $id);
		$query = $this->db->update('facturas', $datos);
	}
	
}
?>