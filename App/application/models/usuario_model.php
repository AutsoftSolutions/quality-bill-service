<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	function obtenerUsuario($username) {
		$this->db->from('clientes');
		$this->db->where('USUARIO', $username);
		$q = $this->db->get();

		return $q->result();
	}

	function leeUsuariocurso($id) {
		$this->db->where('curso', $id);
		$query = $this->db->get('usuario');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function getbyid($id) {
		$this->db->from('usuario');
		$this->db->where('id', $id);
		$q = $this->db->get();

		return $q->result();
	}

	function insertprofe($data) {
		$this->db->insert('usuario', array('user' => $data['usuario'], 'password' => $data['password'], 'cargo' => $data['cargo'], 
			'nombreco' => $data['nombre'], 'curso' => $data['curso'], 'division' => $data['division']));
	}

	function insertdirector($data) {
		$this->db->insert('usuario', array('user' => $data['usuario'], 'password' => $data['password'], 'cargo' => $data['cargo'], 
			'nombreco' => $data['nombre']));
	}
	function insertpadre($data) {
		$this->db->insert('usuario', array('user' => $data['usuario'], 'password' => $data['password'], 'cargo' => $data['cargo'], 
			'nombreco' => $data['nombre'], 'nombrees' => $data['nombre-estudiante'], 'curso' => $data['curso'], 'division' => $data['division']));
	}

	function leerdirector($id) {
		$sql = 'SELECT usuario.id, usuario.imagen, usuario.nombreco, usuario.nombrees, curso.nombrecurso FROM usuario LEFT JOIN curso ON usuario.curso = curso.id WHERE usuario.cargo=?';
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function leerusuarios() {
		$query = $this->db->get('usuario');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	function leerprofesorcurso($id) {
		$this->db->where('cargo', 2);
		$this->db->where('curso', $id);
		$query = $this->db->get('usuario');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function eliminar($id) {
		$this->db->where('id', $id);
		$this->db->delete('usuario');
	}

	function actualizarprofe($id, $data) {
		$datos = array('user' => $data['usuario'], 'password' => $data['password'], 'nombreco' => $data['nombre'], 'curso' => $data['curso'], 
			'division' => $data['division'],'imagen' => $data['image']);
		$this->db->where('id', $id);
		$query = $this->db->update('usuario', $datos);
	}

	function actualizardirector($id, $data) {
		$datos = array('user' => $data['usuario'], 'password' => $data['password'], 'nombreco' => $data['nombre'], 'imagen' => $data['image']);
		$this->db->where('id', $id);
		$query = $this->db->update('usuario', $datos);
	}

	function actualizarpadre($id, $data) {
		$datos = array('user' => $data['usuario'], 'password' => $data['password'], 'nombreco' => $data['nombre'], 
			'nombrees' => $data['nombre-estudiante'], 'curso' => $data['curso'], 'division' => $data['division']);
		$this->db->where('id', $id);
		$query = $this->db->update('usuario', $datos);
	}
	
}
?>