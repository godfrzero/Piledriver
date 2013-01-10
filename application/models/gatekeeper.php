<?php if( !defined('BASEPATH') ) exit('No direct script access allowed.');
	
	class Gatekeeper extends CI_Model {

		public function checkTicket($user, $key) {
			$auth = false;

			// Select row where username matches
			$matches = $this->db->get_where('sailors', array('username' => $user));

			// If a result is returned, check to see that the processed password matches
			if($matches->num_rows()) {
				$match = $matches->row_array();
				$pword = hash('sha1', $user . $key . $match['salt']);
				if($match['password'] == $pword) {
					// If it matches, then user is authenticated. Set Authentication flag to true
					$auth = true;
				}
			}
			return $auth;
		}

	}

?>