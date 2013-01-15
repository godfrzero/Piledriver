<?php if( !defined('BASEPATH') ) exit('No direct script access allowed.');

	class Admin extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('member');

			// Let's check if their session is valid.
			// If not, they get kicked out. :D
			$validSession = false;
			$sess_UID = $this->session->userdata('user');
			$sess_SID = $this->session->userdata('SID');

			/*
			 * Let's check if their rank is Admin as well,
			 * hypothetically, if we just check the cookies,
			 * it's possible to modify the cookie and access an
			 * admin page even if the member is just...a member.
			 * So let's get their rank here, and check it along
			 * with the session validity check
			 */

			$accessLevel = $this->member->getUser($sess_UID);
			$accessLevel = $accessLevel['acType'];

			if(isset($sess_UID) && isset($sess_SID)) {

				$userSID = $this->member->getSID($sess_UID);
				if($userSID && $userSID == $sess_SID && $accessLevel == 'Admin') {
					// User is authenticated, their session is valid...probably.
					// They may pass!
					$validSession = true;
				}

			}

			if(!$validSession) {
				redirect('/home/logout');
			}
		}

		public function index() {
			$data['user_name'] = $this->session->userdata('name');
			$data['thisPage'] = 'dashboard';

			$this->load->view('header', $data);
			$this->load->view('admin/sidenav', $data);
			$this->load->view('dashboard', $data);
		}

		public function mControl() {
			$this->load->helper('form');

			$data['user_name'] = $this->session->userdata('name');
			$data['thisPage'] = 'mControl';

			$data['loginHistory'] = $this->member->getLoginHistory(5);

			$data['userList'] = $this->member->getAllUsers();
			foreach($data['userList'] as $index => $thisUser) {
				$data['userList'][$index] = $thisUser['username'];
			}

			$this->load->view('header', $data);
			$this->load->view('admin/sidenav', $data);
			$this->load->view('admin/mControl', $data);
		}

		public function manageMember() {
			$data = $this->input->post();
			$errorStack = array();

			// Check if all the required fields are filled present
			if(
				isset($data['uName']) &&
				isset($data['pWord']) &&
				isset($data['acType'])
				) {

				// Now check to make sure each field satisfies it's minimum criteria
				if( !(strlen($data['uName']) >= 6 && ctype_alnum($data['uName'])) ) {
					array_push($errorStack, array('Username must be atleast 6 characters, and composed of letters/numbers.', 0));
				}

				if( !(strlen($data['pWord']) >= 8)) {
					array_push($errorStack, array('Password must be atleast 8 characters.', 0));	
				}

				if( !in_array($data['acType'], array('Admin', 'Member', 'Client')) ) {
					array_push($errorStack, array('Please select a valid Accout Type (Admin, Member or Client)', 0));
				}

				// Okay, now if there are no errors in the stack, then we're good to go!
				if(!sizeof($errorStack)) {
					$db_data = array(
						'username' => $data['uName'],
						'password' => $data['pWord'],
						'acType' => $data['acType']
						);

					// And...insert the user
					$this->load->model('member');
					$this->member->storeUser($db_data);
					// THIS TYPE OF OUTPUT IS TEMPORARY, INTEGRATE NOTIFICATION SYSTEM AND FINALIZE!!!
					echo "Member stored";
				} else {
					// *BUZZER* Errors! Send them back to the frontend.
					// THIS TYPE OF OUTPUT IS TEMPORARY, INTEGRATE NOTIFICATION SYSTEM AND FINALIZE!!!					
					echo "Insert failed <br /> <pre>";
					print_r($errorStack);
					echo "</pre>";
				}

			}
		}

	}
?>