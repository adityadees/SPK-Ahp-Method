   <?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Foto extends Admin {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mymod');
    }


    public function index() {
        $this->data['title'] = 'Foto';
        $this->data['output'] = 'FotoJalan';
        if($_SESSION['level']==='desa'){

            $whereD=[
                'user_id'=>$_SESSION['user_id'],
            ];
            $g_desa = $this->Mymod->ViewDataWhere('desa',$whereD)->row_array();

            $whereCD=[
                'kode_desa'=>$g_desa['kode_desa'],
            ];
            

            $table = [
                'gallery' => 'kode_jalan',
                'jalan' => 'kode_jalan'
            ];
            $where=[
                'kode_desa'=>$g_desa['kode_desa'],
            ];
            $fjalan = $this->Mymod->getJoinWhere($table,$where)->result_array();

            $this->data['FJalan'] = $fjalan;
        } else {}
        $this->load->view('layout', $this->data);

    }


    public function add() {
        if($_SESSION['level']==='desa'){
            $this->data['title'] = 'Foto';
            $this->data['output'] = 'FotoAdd';

            $whereD=[
                'user_id'=>$_SESSION['user_id'],
            ];
            $g_desa = $this->Mymod->ViewDataWhere('desa',$whereD)->row_array();

            $whereCD=[
                'kode_desa'=>$g_desa['kode_desa'],
            ];

            $gJl = $this->Mymod->ViewDataWhere('jalan',$whereCD)->result_array();
            $this->data['gJl'] = $gJl;
            $this->load->view('layout', $this->data);
        } else {
            redirect('dashboard');
        }
    }



    public function save_foto(){
        $judul_foto=$this->input->post('judul_foto');
        $jalan=$this->input->post('jalan');
        $title='Foto';
        $table='gallery';

        if(!empty($_FILES['filefoto']['name'])){
            $config['upload_path'] = 'assets\images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['filefoto']['name'];
            $config['width'] = 700;
            $config['height'] = 700;

            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('filefoto')){
                $uploadData = $this->upload->data();
                $filefoto = $uploadData['file_name'];
            }else{
                $filefoto='defaultkat.png';
            }
        }else{
            $filefoto='defaultkat.png';
        }
        $data =[ 
            'gallery_judul'=>$judul_foto,
            'kode_jalan'=>$jalan,
            'filefoto' => $filefoto
        ];
        $InsertData=$this->Mymod->InsertData($table,$data);
        if($InsertData){
            $this->session->set_flashdata('success', 'Berhasil menambah data '.$title);
            redirect('foto/add');     
        }else{
            $this->session->set_flashdata('error', 'Gagal menambah data '.$title);
            redirect('foto/add');     
        }
    }   



    public function del_foto(){
        $gallery_id=$this->input->post('gallery_id');
        $table='gallery';

        $where =[ 
            'gallery_id' => $gallery_id
        ];
        $this->Mymod->DeleteData($table,$where);
        $this->session->set_flashdata('success', 'Berhasil menghapus data');
        redirect('foto');
    }
}