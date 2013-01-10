<?php if( !defined('BASEPATH') ) exit('No direct script access allowed.');

	class Member extends CI_Model {

		public function __construct() {
			parent::__construct();

			$this->load->database();
		}
		
		/*
		 * Function to get user details from the 'sailors' table
		 * returns the user details as an array with fields
		 * 'id', 'username', 'password', 'salt', 'name', 'acType'
		 */
		public function getUser($user) {
			$member = $this->db->get_where('sailors', array('username' => $user));

			if($member->num_rows()) {
				$member = $member->row_array();
				return $member;
			} else {
				return false;
			}
		}

		/*
		 * Function to manage the SESSION ID (SID)
		 * Inserts the pertinent SID for the $user, 
		 * after checking to see if that user already has
		 * an associated ID. If so, the previous entries are
		 * deleted. This way, only the most recent login
		 * can remain on the site.
		 *
		 * Function returns FALSE on failure. 
		 * Idk what it returns on success, but probably not FALSE :P
		 */
		public function storeSID($user, $SID) {
			$insertData = array(
					'UID' => $user,
					'SID' => $SID
				);

			// Remove the row if it already exists
			// This way, only the most recent login stays valid
			$this->db->delete('sess_control', array('UID' => $user));

			// Insert the new SID and return the result of the query
			return $this->db->insert('sess_control', $insertData);
		}

		/*
		 * Function to retrieve a users SID, so we can check to make sure
		 * a valid user is accessing the page. Returns a SID when fed a UID
		 */
		public function getSID($UID) {
			$member = $this->db->get_Where('sess_control', array('UID' => $UID));

			if($member->num_rows()) {
				$thisMember = $member->row_array();
				return $thisMember['SID'];
			} else {
				return false;
			}
		}

	}

?>