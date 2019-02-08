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


                $whereD=[
                    'user_id'=>$_SESSION['user_id'],
                ];
                $g_desa = $this->Mymod->ViewDataWhere('desa',$whereD)->row_array();

                $whereCD=[
                    'kode_desa'=>$g_desa['kode_desa'],
                ];
                $pesan = $this->Mymod->ViewDataWhere('pesan',$whereCD)->result_array();

                $this->data['pesan'] = $pesan;
            } else {}
            $this->load->view('layout', $this->data);
        } else {
            redirect('/');
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



}