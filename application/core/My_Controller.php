<?php 
defined('BASEPATH') or die('No direct script access allowed');
/**
* Core Controller
* powerd by gufakto
*/
class Admin extends CI_Controller
{
	var $data = [];

	public function __construct()
	{
		parent::__construct();
		
		if( $this->session->userdata('logged_in') !== TRUE ){
			redirect('login', 'refresh');
			die();
		}
		$this->data['css_files'] 	 = [
			base_url() . 'template/vendors/bootstrap/dist/css/bootstrap.min.css',
			base_url() . 'template/vendors/font-awesome/css/font-awesome.min.css',
			base_url() . 'template/vendors/nprogress/nprogress.css',
			base_url() . 'template/vendors/google-code-prettify/bin/prettify.min.css',
			base_url() . 'template/build/css/custom.min.css'
		];

		$this->data['js_files']		 = [
			base_url() . 'template/vendors/bootstrap/dist/js/bootstrap.min.js',
			base_url() . 'template/vendors/fastclick/lib/fastclick.js',
			base_url() . 'template/vendors/nprogress/nprogress.js',
			base_url() . 'template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js',
			base_url() . 'template/vendors/jquery.hotkeys/jquery.hotkeys.js',
			base_url() . 'template/vendors/google-code-prettify/src/prettify.js',
			base_url() . 'template/build/js/custom.min.js'
		];
		$this->data['output']		 = FALSE;
		$this->data['sess_username'] = $this->session->userdata('username');
		$this->data['sess_level'] 	 = $this->session->userdata('level');
		$this->data['sess_nama'] 	 = $this->session->userdata('nama');
		
	}

	// Append Grocery CRUD assets
	public function append_array( $arr )
	{
		foreach($arr->js_files as $val_js):
			array_push($this->data['js_files'], $val_js);
		endforeach;

		foreach ($arr->css_files as $val_css):
			array_push( $this->data['css_files'] , $val_css);
		endforeach;
		$this->data['output'] = $arr->output;
	}

}