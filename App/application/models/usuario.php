<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {
	function obtenerUsuario($username) {
		$this->db->from('usuario');
		$this->db->where('USUARIO', $username);
		$q = $this->db->get();

		return $q->result();
	}
}