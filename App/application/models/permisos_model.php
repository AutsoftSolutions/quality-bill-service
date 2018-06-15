<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	function leer() {
		$query = $this->db->get('permiso');
		if ($query->num_rows() > 0) {
			return $query;
		} else {
			return false;
		}

	}

	function consultar($id_rol) {
		$this->db->select('p.*, COUNT(rp.ID_PERMISO) tiene');
		$this->db->from('permiso as p');
		$this->db->join('rol_permiso as rp', 'p.ID_PERMISO = rp.ID_PERMISO AND rp.ID_ROL=' . $id_rol, 'left');
		$this->db->group_by('p.ID_PERMISO');
		$q = $this->db->get();

		return $q->result();

	}

	function actualizarPermisos($permisos, $rol) {
		$this->db->delete('rol_permiso', array('ID_ROL' => $rol));
		if (is_null($permisos) == false) {
			$this->db->trans_start();
			foreach ($permisos as $permiso) {
				$data = array(
					'ID_ROL' => $rol,
					'ID_PERMISO' => $permiso);
				$this->db->insert('rol_permiso', $data);
			}
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return false;
			} else {
				return true;
			}
		} else {
			return true;
		}

	}

}