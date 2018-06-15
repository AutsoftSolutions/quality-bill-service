<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuarios extends Auth_Controller {
	public function __construct() {
		parent::__construct();
		
	}

	public function index($id = NULL) {
		if (is_null($id)) {
			$id = 1;
		}
		$this->load->view('config/index');
	}

}
?>
