<?php

class FrontendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function Index(){
		$y['title']='Home';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/index');
		$this->load->view('frontend/layout/footer');
	}


	public function visimisi(){
		$y['title']='Visi & Misi';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/visimisi');
		$this->load->view('frontend/layout/footer');
	}


	public function sejarah(){
		$y['title']='Sejarah';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/sejarah');
		$this->load->view('frontend/layout/footer');
	}


	public function rekap(){
		$y['title']='Rekap Pembangunan';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/rekap');
		$this->load->view('frontend/layout/footer');
	}


	public function gallery(){
		$y['title']='Gallery';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/gallery');
		$this->load->view('frontend/layout/footer');
	}


	public function hubungi(){
		$y['title']='Hubungi Kami';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/hubungi');
		$this->load->view('frontend/layout/footer');
	}
	public function kritik(){
		$y['title']='Kritik & Saran';
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/kritik');
		$this->load->view('frontend/layout/footer');
	}
	

}