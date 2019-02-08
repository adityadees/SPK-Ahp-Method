   <?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Jalan extends Admin {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mymod');
    }


    public function index() {
        if($_SESSION['level']==='camat' || $_SESSION['level']==='desa'){
            $this->data['title'] = 'Jalan';
            $this->data['output'] = 'JalanView';
            $camat = $this->Mymod->ViewDataWhere('kecamatan',['user_id' => $_SESSION['user_id']])->row_array();

            if($_SESSION['level']==='camat'){

                $table = [
                    'desa' => 'kode_desa',
                    'jalan' => 'kode_desa'
                ];
                $where=[
                    'kode_kecamatan'=>$camat['kode_kecamatan'],
                ];
                $desa = $this->Mymod->getJoinWhere($table,$where)->result_array();
                $this->data['qPenilaian'] = $desa;
            } else if($_SESSION['level']==='desa'){
                $table = [
                    'desa' => 'kode_desa',
                    'jalan' => 'kode_desa'
                ];
                $where=[
                    'user_id'=>$_SESSION['user_id'],
                ];
                $desa = $this->Mymod->getJoinWhere($table,$where)->result_array();
                $this->data['qPenilaian'] = $desa;
            } else {}
            $this->data['qKriteria'] = $this->Mymod->ViewData('kriteria');
            $this->load->view('layout', $this->data);
        } else {
            redirect('/');
        }
    }

    public function add() {
        if($_SESSION['level']==='desa'){
            $this->data['title'] = 'Jalan';
            $this->data['output'] = 'JalanAdd';
            $this->data['qKriteria'] = $this->Mymod->ViewData('kriteria');
            $this->load->view('layout', $this->data);
        } else {
            redirect('/');
        }
    }


    public function save_jalan(){
        if($_SESSION['level']==='desa'){

            $user_id = $this->input->post('user_id');
            $nama_jalan = $this->input->post('nama_jalan');
            $periode = $this->input->post('periode');
            $kriteria_val = $this->input->post('kriteria_val');
            $kriteria_id = $this->input->post('kriteria_id');
            $kode_jalan = rand(1,999).rand(1,99).rand(1,9);

            $aq = $this->Mymod->ViewDataWhere('desa',['user_id' => $user_id])->row_array();
            $data =[ 
                'kode_desa'=>$aq['kode_desa'],
                'nama_jalan'=>$nama_jalan,
                'periode'=>$periode,
                'kode_jalan'=>$kode_jalan,
            ];

            $InsertData=$this->Mymod->InsertData('jalan',$data);
            if($InsertData){
                for($i=0;$i<count($kriteria_val);$i++){
                    $data =[ 
                        'kode_jalan'=>$kode_jalan,
                        'penilaian_nilai'=>$kriteria_val[$i],
                        'kriteria_id'=>$kriteria_id[$i],
                    ];
                    $Insert=$this->Mymod->InsertData('penilaian',$data);
                }
                $this->session->set_flashdata('success', 'Berhasil menambah data ');
                redirect('jalan/add');
            } else {
                $this->session->set_flashdata('success', 'Gagal menambah data ');
                redirect('jalan/add');
            }
        } else {
            redirect('/');
        }
    }
}