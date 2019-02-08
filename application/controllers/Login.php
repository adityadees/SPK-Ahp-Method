<?php
defined('BASEPATH') or die('No direct script access allowed!');
/**
* Login Class
* Powered by Gufakto
*/
class Login extends CI_Controller
{
	var $data = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
			$this->data['title'] = 'LOGIN';
			$this->load->view('login', $this->data);
	}

	public function process()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

		if( $this->form_validation->run() == FALSE )
			$this->index();
		else
		{
			$username = $this->input->post('username');
			$password = md5( $this->input->post('password') );

			$check = $this->db->query("select * from login where username='{$username}' and password='{$password}'");
			if( $check->num_rows() ){
				$res  = $check->row();
				$sess = [
					'logged_in'=> TRUE,
					'username' => $res->username,
					'nama'	   => $res->nama,
					'user_id'	   => $res->user_id,
					'level'	   => $res->level
				];
				$this->session->set_userdata( $sess );
				redirect('/');
			}else{
				$this->session->set_flashdata('error', floating_message('error', 'Login salah!'));
				redirect('login');
			}
		}	


	}

	public function logout()
	{
		$sess = [
			'logged_in'=>FALSE,
			'username' => null,
			'nama'     => null,
			'level'    => null
		];
		$this->session->set_userdata($sess);

		redirect('login');
	}

}