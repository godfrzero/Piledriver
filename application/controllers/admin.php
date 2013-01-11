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
			$data['user_name'] = $this->session->userdata('name');
			$data['thisPage'] = 'mControl';

			$this->load->view('header', $data);
			$this->load->view('admin/sidenav', $data);
			$this->load->view('admin/mControl', $data);
		}

	}
?>