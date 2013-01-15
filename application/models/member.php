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
		 * Function to get all users. Returns an array of arrays
		 * for the entire table on success
		 */
		public function getAllUsers() {
			$members = $this->db->get('sailors');

			return $members->result_array();
		}

		/*
		 * Function to get recently logged users. Function takes
		 * an integer as an optional argument. If no argument is 
		 * passed, it gets the entire login list. If an argument
		 * is passed, it retrieves the latest (n) logins, where 
		 * n is the argument passed.
		 *
		 * Data is returned as an associative array with fields
		 * 'UID' and 'Timestamp'
		 */
		function getLoginHistory($limit = 0) {
			$this->db->select('UID, Timestamp');
			$this->db->order_by('timestamp', 'desc');
			if($limit) {
				$history = $this->db->get('sess_control', $limit);
			} else {
				$history = $this->db->get('sess_control');
			}

			return $history->result_array();
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

		/*
		 * Function to insert a new member into the database
		 * ##-------------------CAUTION-------------------##
		 * ## WILL REPLACE USER IF THE USERNAME IS SAME.  ##
		 * ## CHECK WITH memberExists() BEFORE USING THIS.##
		 * ##---------------------------------------------##
		 *
		 * Function expects input as an associative array with
		 * fields 'username', 'password', 'name', 'acType'
		 * Where 'acType' is enumerated as ('Admin', 'Member', 'Client')
		 */
		public function storeUser($data) {
			$status = false;

			if(sizeof($data) && is_array($data)) {
				// Now check if the member already exists
				if($uData = $this->member->getUser($data['username'])) {
					// User exists, so we're replacing this user. In this case, check to see if 
					// Name is populated. If not, populate it with an empty string
					if( !(isset($data['name']) && strlen($data['name'])) ) {
						$data['name'] = '';
					}

					// Now encode the password
					$data['password'] = sha1($data['username'] . $data['password'] . $uData['salt']); 

					// Now replace the entry
					$this->db->where('username', $data['username']);
					$status = $this->db->update('sailors', $data);
				} else {
					// User doesn't exist, so we can insert a fresh row
					// But first, generate the SALT, which is a four digit number
					$data['salt'] = mt_rand(1000, 9999);

					// And...encode the password with the new salt.
					$data['password'] = sha1($data['username'] . $data['password'] . $data['salt']); 					
					$status = $this->db->insert('sailors', $data);
				}
			}

			return $status;
		}

	}

?>