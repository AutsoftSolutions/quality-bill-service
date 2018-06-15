<?php
class Auth_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			$this->load->helper('url');
			$this->session->set_userdata('last_page', current_url());
			redirect(base_url("index.php"));
		}
	}
}
?>