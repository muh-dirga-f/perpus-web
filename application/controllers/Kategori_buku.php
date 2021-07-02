<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_buku extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data['buku']      = $this->db->get('kategori_buku');
        
        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_data', $data);
        }
        
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                $nama_kategori_buku = $this->input->post('nama_kategori_buku');
                $cek = $this->db->get_where('kategori_buku', ['nama_kategori_buku' => $nama_kategori_buku]);
                //cek nis yg sudah digunakan
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kategori Buku</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_create', $data); 
                }
                else{
                    $save  = array(
                        'id_kategori_buku'   => $this->input->post('id_kategori_buku'),
                        'nama_kategori_buku' => $this->input->post('nama_kategori_buku'),
                    );
                    $this->db->insert("kategori_buku", $save);
                    // echo "berhasil"; die();
                    redirect('kategori_buku/index/create-success');
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_create', $data);
            }

        }
    }

    public function edit()
    {
        $id_kategori_buku = $this->uri->segment(3);
        
        $data['edit']    = $this->db->get_where('kategori_buku', ['id_kategori_buku' => $id_kategori_buku])->row_array();
        // $data['anggota'] =  $this->Mod_anggota->getAll()->result_array();
        // print_r($data['edit']); die();
        $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            $this->_set_rules();
            
            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                // echo "masuk"; die();
                
                $id_kategori_buku = $this->input->post('id_kategori_buku');
                
                $save  = array(
                    'id_kategori_buku'   => $this->input->post('id_kategori_buku'),
                    'nama_kategori_buku'       => $this->input->post('nama_kategori_buku'),
                );
                $this->db->update('kategori_buku', $save, ['id_kategori_buku' => $id_kategori_buku]);
                // echo "berhasil"; die();
                redirect('kategori_buku/index/update-success');      
            }
            //jika tidak mengkosongkan
            else{
                $id_kategori_buku = $this->input->post('id_kategori_buku');
                $data['edit']    = $this->db->get_where('kategori_buku', ['id_kategori_buku' => $id_kategori_buku])->row_array();
                $data['message'] = "";
                $this->template->load('layoutbackend', 'kategori_buku/kategori_buku_edit', $data);
            }

        } // end $_POST['update']
    
    }

    public function delete()
    {
        $kode_buku = $this->input->post('kode_buku');
        $this->db->delete('kategori_buku', ['id_kategori_buku'=>$kode_buku]);
        redirect('kategori_buku/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        // $this->form_validation->set_rules('id_kategori_buku','Id Kategori Buku','required|max_length[11]');
        $this->form_validation->set_rules('nama_kategori_buku','Nama Kategori Buku','required|max_length[50]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file Buku.php */
