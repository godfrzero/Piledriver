<?php if( !defined('BASEPATH') ) exit('No direct script access allowed.');

	class Home extends CI_Controller {

		public function __construct() {
			parent::__construct();

			$this->load->helper('url');
		}

		public function index() {
			$this->load->view('404');
		}

		public function goBack() {
			$inputs = $this->input->post();
			$formString = 
			"<form action='" . base_url() . "home/back' method='POST'>".
				"<label for='u'>Username:</label><br />".
				"<input type='text' id='u' name='u' /><br />".
				"<label for='p'>Password:</label><br />".
				"<input type='password' id='p' name='p' /><br />".
				"<input type='submit' value='Enter' />".
			"</form>";
			if( isset($inputs['u']) && $inputs['u'] == 'OPENSESAME' ) {
				echo '{ "r" : "'. $formString .'" }';
			}
		}

		public function back() {

			$this->load->database();
			$this->load->library('session');
			$this->load->helper('string');
			$this->load->model('gatekeeper');
			$this->load->model('member');

			// Store the post data to a variable so we don't break out fingers typing more than necessary :P
			$inputs = $this->input->post();

			// Get username and password from POST
			$uname = ( isset($inputs['u']) ? $inputs['u'] : '' );
			$pword = ( isset($inputs['p']) ? $inputs['p'] : '' );

			// Flag that determines if the user gets in, or is kicked out.
			$ticket = false;

			// Authenticate the user, returns TRUE on success and FALSE on failure
			$auth = $this->gatekeeper->checkTicket($uname, $pword);

			/*
			 * If user is authenticated, then we set the necessary variables in session and
			 * forward them to the dashboard. The frontend already has the code to forward to
			 * whatever address is give in the 'r' field.
			 */
			if($auth) {

				$userData = $this->member->getUser($uname);

				// getUser returns false if the fetch fails
				if($userData) {
					// Set session variables
					$this->session->set_userdata( array(
						'user' 	=> $userData['username'],
						'name' 	=> $userData['name'],
						'SID'		=> $SID = random_string('alnum', 16),
						'acType'=> $userData['acType']
					));

					/*
					 * Store the Session ID (SID) in the DB, so we can check this to make sure
					 * that only one system is logged into an account at a time.
					 * Also store the login time, so we can have a session timeout.
					 */
					$insertSID = $this->member->storeSID($userData['username'], $SID);

					if($insertSID) {
						// If everything succeeds, then we give the user a valid ticket
						$ticket = true;
					}
				}
			}

			// User is only allowed in if they have a valid ticket
			if($ticket) {
				// 'r' is the forwarding path to redirect the user to
				switch($userData['acType']) {
					case 'Admin':	
					redirect('admin/');
					break;
					// END OF ADMIN ******************************************

					case 'Member':
					redirect('member/');
					break;
					// END OF MEMBER *****************************************

					case 'Client':
					redirect('client/');
					break;
					// END OF CLIENT *****************************************

					default:
					// Lol, dafuq happened here? get out.
					redirect('/home/logout');
					break;
					// END OF DEFAULT ****************************************
				}
			} else {
				// GTFO stranger.
				redirect('/home/logout');
			}
		}

		public function logout() {
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect('http://redatomstudios.com');
		}

	}
?>