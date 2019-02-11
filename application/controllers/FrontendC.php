<?php

class FrontendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function Index(){
		$y['title']='Home';
		$x['gallery'] = $this->db->query("SELECT * FROM gallery limit 6")->result_array();
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/index',$x);
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
		$x['print']=$this->db->query("select kode_jalan, nama_jalan, periode,nila_weigh from jalan order by nila_weigh")->result();
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/rekap',$x);
		$this->load->view('frontend/layout/footer');
	}


	public function gallery(){
		$y['title']='Gallery';

		$x['gallery'] = $this->Mymod->ViewData('gallery');
		$this->load->view('frontend/layout/header',$y);
		$this->load->view('frontend/layout/topbar');
		$this->load->view('frontend/gallery',$x);
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
	

	public function save_kritik(){
		$kritik_nama = $this->input->post('name');
		$kritik_email = $this->input->post('email');
		$kritik_telepon = $this->input->post('tel');
		$kritik_isi = $this->input->post('comment');

		$data =[ 
			'kritik_nama'=>$kritik_nama,
			'kritik_email'=>$kritik_email,
			'kritik_telepon'=>$kritik_telepon,
			'kritik_isi'=>$kritik_isi,
		];

		$InsertData=$this->Mymod->InsertData('kritik',$data);
		if($InsertData){
			$this->session->set_flashdata('success', 'Berhasil mengirim pesan ');
			redirect('kritik');
		} else {
			$this->session->set_flashdata('success', 'Gagal mengirim pesan ');
			redirect('kritik');
		}
	}
}