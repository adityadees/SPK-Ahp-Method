   <?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Inbox extends Admin {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mymod');
    }


    public function index() {
        if($_SESSION['level']==='desa'){
            $this->data['title'] = 'Inbox';
            $this->data['output'] = 'InboxDesa';
            $whereD=[
                'user_id'=>$_SESSION['user_id'],
            ];
            $g_desa = $this->Mymod->ViewDataWhere('desa',$whereD)->row_array();

            $whereCD=[
                'kode_desa'=>$g_desa['kode_desa'],
            ];
            $pesan = $this->Mymod->ViewDataWhere('pesan',$whereCD)->result_array();

            $this->data['pesan'] = $pesan;
            
            $this->load->view('layout', $this->data);
        } else if($_SESSION['level']==='admin'){
            $this->data['title'] = 'InboxAdmin';
            $this->data['output'] = 'InboxAdmin';
            $pesan = $this->Mymod->ViewData('kritik');
            $this->data['pesan'] = $pesan;
            
            $this->load->view('layout', $this->data);
        } else {
            redirect('home');
        }
    }



    public function del_pesan(){
        $pesan_id=$this->input->post('pesan_id');
        $table='pesan';

        $where =[ 
            'pesan_id' => $pesan_id
        ];
        $this->Mymod->DeleteData($table,$where);
        $this->session->set_flashdata('success', 'Berhasil menghapus data');
        redirect('inbox');
    }


    public function del_pesan_adm(){
        $kritik_id=$this->input->post('kritik_id');
        $table='kritik';

        $where =[ 
            'kritik_id' => $kritik_id
        ];
        $this->Mymod->DeleteData($table,$where);
        $this->session->set_flashdata('success', 'Berhasil menghapus data');
        redirect('inbox');
    }



}