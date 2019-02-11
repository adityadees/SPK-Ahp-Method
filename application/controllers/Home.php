<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Mymod');
        $this->load->library('Pdf');
    }

    public function index()
    {
    	$this->data['title']  = "Dashboard";
        if($_SESSION['level']==='camat'){
            $camat = $this->Mymod->ViewDataWhere('kecamatan',['user_id' => $_SESSION['user_id']])->row_array();
            $c_camat = $this->Mymod->ViewDataWhere('desa',['kode_kecamatan' => $camat['kode_kecamatan']])->result_array();
            $table = [
                'desa' => 'kode_desa',
                'jalan' => 'kode_desa'
            ];
            $where=[
                'kode_kecamatan'=>$camat['kode_kecamatan'],
            ];
            $c_jalan = $this->Mymod->getJoinWhere($table,$where)->result_array();

            $this->data['countDesa'] = count($c_camat);
            $this->data['countJalan'] = count($c_jalan);
            $this->data['g_camat'] = $c_camat;
        } else if($_SESSION['level']==='desa'){


            $whereD=[
                'user_id'=>$_SESSION['user_id'],
            ];
            $g_desa = $this->Mymod->ViewDataWhere('desa',$whereD)->row_array();


            $table = [
                'desa' => 'kode_desa',
                'jalan' => 'kode_desa'
            ];
            $where=[
                'user_id'=>$_SESSION['user_id'],
            ];
            $c_jalan = $this->Mymod->getJoinWhere($table,$where)->result_array();

            $whereCD=[
                'kode_desa'=>$g_desa['kode_desa'],
            ];
            $c_pesan = $this->Mymod->ViewDataWhere('pesan',$whereCD)->result_array();


            $this->data['countJalan'] = count($c_jalan);
            $this->data['countPesan'] = count($c_pesan);

        } else if($_SESSION['level']==='admin'){
            $user = $this->Mymod->ViewData('login');
            $kecamatan = $this->Mymod->ViewData('kecamatan');
            $desa = $this->Mymod->ViewData('desa');
            $jalan = $this->Mymod->ViewData('jalan');


            $this->data['countDesa'] = count($desa);
            $this->data['countJalan'] = count($jalan);
            $this->data['countUser'] = count($user);
            $this->data['countCamat'] = count($kecamatan);
        }
        $this->data['output']= $this->load->view('admin/home', $this->data, true);
        $this->load->view('layout', $this->data);
    }

    public function camat()
    {
        if( $this->data['sess_level'] != "superadmin")
            redirect("logout"); die();
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('kecamatan');
        $crud->required_fields('nama_kecamatan');
        $this->append_array($crud->render());

        $this->data['title'] = 'Kecamatan';
        $this->load->view('layout', $this->data);

    }

    public function desa()
    {
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('desa');
        $crud->columns('nama_desa', 'user_id', 'kode_kecamatan','luas_desa');
        $crud->set_relation('kode_kecamatan', 'kecamatan', 'nama_kecamatan')->display_as('kode_kecamatan', 'Nama Kecamatan');
        $crud->set_relation('user_id', 'login', 'nama')->display_as('user_id', 'Nama');
        $crud->required_fields('kode_kecamatan','nama_desa', 'luas_desa', 'nama_kepala_desa');
        $this->append_array($crud->render());

        $this->data['title'] = 'Desa';
        $this->load->view('layout', $this->data);

    }

    public function lurah()
    {
        if( $this->data['sess_level'] != "superadmin" || $this->data['sess_level'] != 'desa' || $this->data['sess_level'] != 'lurah')
            redirect("logout"); die();
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('lurah');
        $crud->set_relation('kode_desa', 'desa', 'nama_desa')
        ->display_as('kode_desa', 'Desa');
        $crud->required_fields('kode_desa', 'nama_kelurahan', 'nama_kepala_lurah');
        $this->append_array($crud->render());

        $this->data['title'] = 'Lurah';
        $this->load->view('layout', $this->data);
    }

    public function jalan()
    {

        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('jalan');
        $crud->columns('kode_lurah', 'nama_jalan', 'periode');
        $crud->fields('user_id','kode_lurah', 'nama_jalan', 'periode');
        $crud->set_relation('user_id', 'login', 'nama')->display_as('user_id', 'Nama');
        $crud->set_relation('kode_lurah', 'lurah', 'nama_kelurahan')->display_as('kode_lurah', 'Kelurah');
        $crud->required_fields('kode_lurah', 'nama_jalan', 'periode');
        $this->append_array($crud->render());

        $this->data['title'] = 'Jalan';
        $this->load->view('layout', $this->data);
    }



    public function kecamatan()
    {
        /*$this->load->config('grocery_crud');
        $this->config->set_item('grocery_crud_date_format','y');*/
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('kecamatan');
        $crud->columns('nama_kecamatan', 'user_id');
        $crud->fields('nama_kecamatan', 'user_id');
        $crud->set_relation('user_id', 'login', 'nama')->display_as('user_id', 'Nama');
        $crud->required_fields('kode_kecamatan', 'nama_kecamatan', 'user_id');
        $this->append_array($crud->render());

        $this->data['title'] = 'Kecamatan';
        $this->load->view('layout', $this->data);
    }


    public function users()
    {
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('login');
        $crud->columns(['username', 'nama', 'email', 'nope', 'level']);
        $crud->required_fields('username', 'password', 'nama', 'nope', 'email', 'level');
        $crud->field_type('password', 'password');
        $crud->callback_before_insert([$this,'encrypt_password_callback']);
        $crud->callback_before_update([$this,'encrypt_password_callback']);
        $this->append_array($crud->render());

        $this->data['title'] = 'Users';
        $this->load->view('layout', $this->data);
    }

    public function encrypt_password_callback($post_array, $primary_key = null)
    {
        $post_array['password'] = md5($post_array['password']);
        return $post_array;
    }


    /*PERHITUNGAN AHP*/
    public function kriteria()
    {
        $crud = new grocery_CRUD();
        $crud->unset_jquery();
        $crud->set_table('kriteria');
        $crud->required_fields('nama_kriteria');
        $this->append_array($crud->render());

        $this->data['title'] = 'Users';
        $this->load->view('layout', $this->data);
    }

    public function set_kriteria()
    {
        $this->data['kriteria']     = $this->db->query("select * from kriteria order by id_kriteria asc");
        $this->data['jalan']        = $this->db->query("select kode_jalan, nama_jalan from jalan order by kode_jalan asc");
        $this->data['title']        = "Set Nilai Kriteria";
        $this->data['output']       = $this->load->view('admin/set_nilai_kriteria', $this->data, true);
        $this->load->view('layout', $this->data);
    }

    // Inti perhitungan Metode AHP
    // Penilaian Jalan
    public function set_kriteria_proc()
    {
        $this->load->library("AHPMath");

        $data = $this->input->post("val_kriteria");
        $jalan= $this->input->post("jalan");

        // Chnage Index Kriteria Jalan
        $result = change_index_arr($jalan);   

        // Normalisasi Jalan
        $res_jalan = [];
        $res_jalan_change = [];
        foreach ($result as $keyl => $valuea) {
            for( $ic=0; $ic<count($valuea); $ic++ ){
                for( $ik=0; $ik<count( $valuea ); $ik++ )
                    $res_jalan[$keyl][$ic][$ik] = ($result[$keyl][$ic]/$result[$keyl][$ik]);

            }
            $res_jalan_change[$keyl] = change_index_arr($res_jalan[$keyl]);
        }

        // Hitung Matrix Weigh Jalan
        $weigh_jalan = [];
        for($ix=0; $ix<count($res_jalan_change); $ix++){
            $matr = AHPMath::matrix($res_jalan_change[$ix]);
            $weigh_jalan[$ix] = $matr->weigh();
        }

        // Convert value string Kriteria to integer
        $res = [];
        foreach ($data as $key => $value) {
            $keys = array_keys( $value );
            for( $i=0; $i<count($keys); $i++ )
                $res[] = (int)$value[ $keys[$i] ];
        }
        
        // Hitung matrix Kriteria
        $corner = AHPMath::inflate( $res );
        $weigh_kriteria = $corner->weigh();

        // Mendapatkan hasil final
        // Dengan mengalikan kemudian menjumlahkan nila normalisasi
        // matrix jalan dengan matrix kriteria
        $final_weigh_jalan = change_index_arr( $weigh_jalan );
        $final = [];
        foreach ($final_weigh_jalan as $key_fwj => $val_fwj) {
            $multiply = [];
            for( $ikr=0; $ikr<count( $val_fwj ); $ikr++)
                $multiply[] = $val_fwj[$ikr]*$weigh_kriteria[$ikr];
            $final[$key_fwj]= array_sum( $multiply );
        }


        // Ambil Data jalan dari database
        $data_kriteria = $this->db->query("select * from jalan order by kode_jalan asc");
        $save_kriteria_weight = [];
        if( $data_kriteria->num_rows() ):
            foreach ($data_kriteria->result() as $key => $value)
                $save_kriteria_weight[] = [
                    'kode_jalan'    => $value->kode_jalan,
                    'nama_jalan'    => $value->nama_jalan,
                    'nila_weigh'    => 0
                ];

                $corner_weigh = $final;
            // Isi data hasil perhitungan ahp kedalam array 
            // untuk disimpan kedalam database
                for( $i=0; $i<count($corner_weigh); $i++ )
                    $save_kriteria_weight[$i]['nila_weigh'] = $corner_weigh[$i];
            endif;

        // Simpan Hasil akhir kedalam database
            if( $save_kriteria_weight )
                $this->db->update_batch('jalan', $save_kriteria_weight, "kode_jalan");
            $table_jalan = '';
            foreach ($final_weigh_jalan as $key_t => $val_t) {
                $table_jalan .= '<tr>'; 
                for( $it=0; $it<count( $val_t ); $it++ )
                    $table_jalan .= '<td>'.$val_t[$it].'</td>';
                $table_jalan .= '</tr>'; 
            }


        // menampilkan hasil sementara 
        // dari setiap matriks jalan dan kriteria 
        // yang sudah dinormalisasi
        // atau di hitung vektor eigent nya masing2
            echo json_encode( [
                "kriteria"  => str_replace("</table>", "", str_replace("<table border=1>", "", $corner)),
                "jalan"     => $table_jalan
            ] );

        }

        public function hasil()
        {
            $data = $this->db->query("select kode_jalan, nama_jalan, nila_weigh from jalan order by nila_weigh");
            $res = '';
            if( $data->num_rows() )
            {
                $res .= '<table class="table table-bordered table-condensed table-hover table-striped" id="hasil-akhir">
                <thead>
                <tr>
                <th>Kode Jalan</th>
                <th>Nama Jalan</th>
                <th>Nilai</th>
                </tr>
                </thead><tbody>'; 
                foreach ($data->result() as $key => $value) {
                    $res .= '<tr>
                    <td>'.$value->kode_jalan.'</td>
                    <td>'.$value->nama_jalan.'</td>
                    <td>'.$value->nila_weigh.'</td>
                    </tr>';
                }
                $res .= '</tbody></table>';
            }
            echo $res;
        }

        public function hasil_permanen()
        {
            $this->data['hasil'] = $this->db->query("select kode_jalan, nama_jalan, periode, nila_weigh from jalan order by nila_weigh");
            $this->data['title'] = 'Hasil';
            $this->data['output'] = $this->load->view('admin/hasil', $this->data, true);
            $this->load->view('layout', $this->data);
        }


        public function cetak()
        {
            $x['print']=$this->db->query("select kode_jalan, nama_jalan, nila_weigh from jalan order by nila_weigh");
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "report.pdf";
            $this->pdf->load_view('admin/cetak',$x);
            $this->pdf->render();
            $this->pdf->stream();
        }


        public function send_pesan(){
            $kode_desa = $this->input->post('kode_desa');
            $judul = $this->input->post('judul');
            $pesan = $this->input->post('pesan');


            $data =[ 
                'kode_desa'=>$kode_desa,
                'pesan_judul'=>$judul,
                'pesan_message'=>$pesan,
            ];

            $InsertData=$this->Mymod->InsertData('pesan',$data);
            if($InsertData){
                $this->session->set_flashdata('success', 'Berhasil menambah data ');
                redirect('home');
            } else {
                $this->session->set_flashdata('success', 'Gagal menambah data ');
                redirect('home');
            }
        }
    }
