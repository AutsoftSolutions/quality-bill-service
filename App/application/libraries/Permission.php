<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 *    Clase para el manejo de permisos, basada en la clase Permissions de Codeigniter:
 *
 *    Permission Class
 *    COPYRIGHT (C) 2008-2009 Haloweb Ltd
 *    http://www.haloweb.co.uk/blog/
 *
 *    Version:    0.9.1
 *    Wiki:       http://codeigniter.com/wiki/Permission_Class/
 *
 *    Description:
 *    The Permission class uses keys in a session to allow or disallow functions
 *    or areas of a site. The keys are stored in a database and this class adds
 *    and/or takes them away. The use of IF statements are required within
 *    controllers and views, please see wiki for code.
 *
 **/

class Permission {

	// init vars
	var $CI; // CI instance
	var $where = array();
	var $set = array();
	var $required = array();

	function Permission() {
		// init vars
		$this->CI = &get_instance();

		// set rolID from session (if set)
		$this->rolID = ($this->CI->session->userdata('rolID')) ? $this->CI->session->userdata('rolID') : 0;
	}

	// get permissions from for this group
	function get_user_permissions($rolID) {
		// grab keys Update
		/*
	        $this->CI->db->select('key');
	        $this->CI->db->join('permissions', 'permissions.permissionID = permission_map.permissionID');

	        // get groups
	        $this->CI->db->where('rolID', $rolID);
*/

		$this->CI->db->select('key');
		$this->CI->db->from('permiso');
		$this->CI->db->join('rol_permiso', 'rol_permiso.id_permiso = permiso.id_permiso');
		$this->CI->db->where('id_rol', $rolID);
		// get groups
		$query = $this->CI->db->get();
		// set permissions array and return
		if ($query->num_rows()) {
			foreach ($query->result_array() as $row) {
				$permissions[] = $row['key'];
			}

			return $permissions;
		} else {
			return false;
		}
	}

	// get all permissions, or permissions from a group for the purposes of listing them in a form
	function get_permissions($rolID = '') {
		// select
		$this->CI->db->select('DISTINCT(id_modulo), modulo');
		$this->CI->db->from('permiso');
		$this->CI->db->join('modulo', 'permiso.id_modulo = modulo.id_modulo');

		// if rolID is set get on that rolID
		if ($rolID) {
			$this->CI->db->where_in('key', $this->get_user_permissions($rolID));
		}

		// order
		$this->CI->db->order_by('modulo.id_modulo');

		// return
		$query = $this->CI->db->get();

		if ($query->num_rows()) {
			$result = $query->result_array();

			foreach ($result as $row) {
				if ($cat_perms = $this->get_perms_from_mod($row['id_modulo'])) {

					$permissions[$row['modulo']] = $cat_perms;
				} else {
					$permissions[$row['modulo']] = 'N/A';
				}
			}
			return $permissions;
		} else {
			return false;
		}
	}

	// get permissions from a category name, for the purposes of showing permissions inside a category
	function get_perms_from_mod($modulo = '') {
		// where
		if ($modulo) {
			$this->CI->db->where('id_modulo', $modulo);
		}

		// return
		$query = $this->CI->db->get('permiso');

		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	// get the map of keys from a group ID
	function get_permission_map($rolID) {
		// grab keys
		$this->CI->db->select('id_permiso');

		// where
		$this->CI->db->where('id_rol', $rolID);

		// return
		$query = $this->CI->db->get('rol_permiso');

		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	// get the groups, for the purposes of displaying them in a form
	function get_roles() {
		// return
		$query = $this->CI->db->get('roles');

		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return false;
		}
	}

	// add permissions to a group, each permission must have an input name of "perm1", or "perm2" etc
	function add_permissions($rolID) {
		// delete all permissions on this rolID first
		$this->CI->db->where('id_rol', $rolID);
		$this->CI->db->delete('rol_permiso');

		// get post
		$post = $this->CI->easysite->get_post();
		foreach ($post as $key => $value) {
			if (preg_match('/^perm([0-9]+)/i', $key, $matches)) {
				$this->CI->db->set('id_rol', $rolID);
				$this->CI->db->set('id_permiso', $matches[1]);
				$this->CI->db->insert('rol_permiso');
			}
		}

		return true;
	}

	function check_permission($permission) {
		$permissions = $this->CI->session->userdata('permisos');
		if (!in_array($permission, $permissions)) {
			show_error('Usted no tiene permisos para acceder a esta página.');
		}
	}

	function check_permission2($permission) {
		$permissions = $this->CI->session->userdata('permisos');
		return in_array($permission, $permissions);
	}

	function check_permission_user($user, $permission) {
		$this->CI->db->where('CEDULA', $user);
		$query = $this->CI->db->get('usuario');
		if ($query->num_rows() > 0) {
			$result = $query->result();
			$usuario = $result[0];
			$permissions = $this->CI->permission->get_user_permissions($usuario->CARGO);
			if($permissions == null){	
				return false;
			}else{
				return in_array($permission, $permissions);
			}			
		} else {
			return false;
		}
	}

}
?>