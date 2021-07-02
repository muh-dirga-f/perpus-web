<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_video extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['video']      = $this->db->get('kategori_video');
        
        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori_video/kategori_video_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'kategori_video/kategori_video_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'kategori_video/kategori_video_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'kategori_video/kategori_video_data', $data);
        }
        
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'kategori_video/kategori_video_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $nama_kategori_video = $this->input->post('nama_kategori_video');
                $cek = $this->db->get_where('kategori_video', ['nama_kategori_video' => $nama_kategori_video]);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kategori video</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'kategori_video/kategori_video_create', $data); 
                }
                else{
                    $save  = array(
                        'id_kategori_video'   => $this->input->post('id_kategori_video'),
                        'nama_kategori_video' => $this->input->post('nama_kategori_video'),
                    );
                    $this->db->insert("kategori_video", $save);
                    // echo "berhasil"; die();
                    redirect('kategori_video/index/create-success');
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'kategori_video/kategori_video_create', $data);
            }

        }
    }

    public function edit()
    {
        $id_kategori_video = $this->uri->segment(3);
        
        $data['edit']    = $this->db->get_where('kategori_video', ['id_kategori_video' => $id_kategori_video])->row_array();
        // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
        // print_r($data['edit']); die();
        $this->template->load('layoutbackend', 'kategori_video/kategori_video_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            $this->_set_rules();
            
            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                
                $id_kategori_video = $this->input->post('id_kategori_video');
                
                $save  = array(
                    'id_kategori_video'   => $this->input->post('id_kategori_video'),
                    'nama_kategori_video'       => $this->input->post('nama_kategori_video'),
                );
                $this->db->update('kategori_video', $save, ['id_kategori_video' => $id_kategori_video]);
                // echo "berhasil"; die();
                redirect('kategori_video/index/update-success');      
            }
            //jika tidak mengkosongkan
            else{
                $id_kategori_video = $this->input->post('id_kategori_video');
                $data['edit']    = $this->db->get_where('kategori_video', ['id_kategori_video' => $id_kategori_video])->row_array();
                $data['message'] = "";
                $this->template->load('layoutbackend', 'kategori_video/kategori_video_edit', $data);
            }

        } // end $_POST['update']
    
    }

    public function delete()
    {
        $kode_video = $this->input->post('kode_video');
        $this->db->delete('kategori_video',['id_kategori_video'=>$kode_video]);
        redirect('kategori_video/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        // $this->form_validation->set_rules('id_kategori_video','Id Kategori video','required|max_length[11]');
        $this->form_validation->set_rules('nama_kategori_video','Nama Kategori video','required|max_length[50]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file video.php */
