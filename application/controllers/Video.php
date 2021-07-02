<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_video');
    }


    public function index()
    {
        $data['video']      = $this->db->join('kategori_video', 'id_kategori_video = kategori_video')->order_by('video.kode_video desc')->get('video');

        
        if($this->uri->segment(3)=="create-success") {
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Disimpan...!</p></div>";    
            $this->template->load('layoutbackend', 'video/video_data', $data); 
        }
        else if($this->uri->segment(3)=="update-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Update...!</p></div>"; 
            $this->template->load('layoutbackend', 'video/video_data', $data);
        }
        else if($this->uri->segment(3)=="delete-success"){
            $data['message'] = "<div class='alert alert-block alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <p><strong><i class='icon-ok'></i>Data</strong> Berhasil Dihapus...!</p></div>"; 
            $this->template->load('layoutbackend', 'video/video_data', $data);
        }
        else{
            $data['message'] = "";
            $this->template->load('layoutbackend', 'video/video_data', $data);
        }
    }

    public function create()
    {
        $this->template->load('layoutbackend', 'video/video_create');
    }

    public function insert()
    {
        if(isset($_POST['save'])) {

            //function validasi
            $this->_set_rules();

            //apabila user mengkosongkan form input
            if($this->form_validation->run()==true){
                $kode_video = $this->input->post('kode_video');
                $cek = $this->db->get_where('video',['kode_video' => $kode_video]);
                if($cek->num_rows() > 0){
                    $data['message'] = "<div class='alert alert-block alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <p><strong><i class='icon-ok'></i>Kode video</strong> Sudah Digunakan...!</p></div>"; 
                    $this->template->load('layoutbackend', 'video/video_create', $data); 
                }
                else{
                    $judul = slug($this->input->post('judul'));
                    if($_FILES['userfile']){
                        $config['upload_path']   = './assets/img/video/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size']	     = '1000';
                        $config['max_width']     = '2000';
                        $config['max_height']    = '1024';
                        $config['file_name']     = time(); 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('userfile');
                        $image = $this->upload->data();
                    }
                    if($_FILES['file']){
                        $config['upload_path']   = './assets/video/';
                        $config['allowed_types'] = 'mp4';
                        $config['max_size']	     = '1002400';
                        $config['file_name']     = time(); 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('file');
                        $file = $this->upload->data();
                    }
                     //apabila ada gambar yg diupload
                    if (!empty($_FILES['userfile']['name']) && !empty($_FILES['file']['name'])){
                        $save  = array(
                            'kode_video'   => $this->input->post('kode_video'),
                            'kategori_video'       => $this->input->post('kategori_video'),
                            'judul'       => $this->input->post('judul'),
                            'pembuat'   => $this->input->post('pembuat'),
                            'image'       => $image['file_name'],
                            'file'       => $file['file_name']
                        );
                        $this->db->insert("video", $save);
                        // echo "berhasil"; die();
                        redirect('video/index/create-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Video</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'video/video_create', $data);
                    } 
                }
            
            }
            //jika tidak mengkosongkan form
            else{
                $data['message'] = "";
                $this->template->load('layoutbackend', 'video/video_create', $data);
            }

        }
    }

    public function edit()
    {
        $kode_video = $this->uri->segment(3);
        $data['edit'] = $this->db->get_where('video', ['kode_video' => $kode_video])->row_array();
        $this->template->load('layoutbackend', 'video/video_edit', $data);
    }

    public function update()
    {
        if(isset($_POST['update'])) {

            // echo "proses update"; die();
            //apabila ada gambar yg diupload
            if(!empty($_FILES['userfile']['name']) || !empty($_FILES['file']['name'])) {

                $this->_set_rules();

                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $kode_video = $this->input->post('kode_video');
                    
                    $judul = slug($this->input->post('judul'));
                        //apabila ada gambar yg diupload
                    if (!empty($_FILES['userfile']['name'])){
                        $g = $this->Mod_video->getGambar($kode_video)->row_array();
                        //hapus gambar yg ada diserver
                        unlink('assets/img/video/'.$g['image']);

                        $config['upload_path']   = './assets/img/video/';
                        $config['allowed_types'] = 'jpg|png';
                        $config['max_size']	     = '1000';
                        $config['max_width']     = '2000';
                        $config['max_height']    = '1024';
                        $config['file_name']     = time(); 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('userfile');
                        $image = $this->upload->data();

                        $save  = array(
                            'kode_video'   => $this->input->post('kode_video'),
                            'kategori_video'       => $this->input->post('kategori_video'),
                            'judul'       => $this->input->post('judul'),
                            'pembuat'   => $this->input->post('pembuat'),
                            'image'       => $image['file_name']
                        );

                        $this->Mod_video->updatevideo($kode_video, $save);
                        // echo "berhasil"; die();
                        redirect('video/index/update-success');

                    }
                    if (!empty($_FILES['file']['name'])){
                        $g = $this->Mod_video->getGambar($kode_video)->row_array();
                        //hapus gambar yg ada diserver
                        unlink('assets/video/'.$g['file']);

                        $config['upload_path']   = './assets/video/';
                        $config['allowed_types'] = 'mp4';
                        $config['max_size']	     = '100240';
                        $config['file_name']     = time(); 
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('file');
                        $file = $this->upload->data();

                        $save  = array(
                            'kode_video'   => $this->input->post('kode_video'),
                            'kategori_video'       => $this->input->post('kategori_video'),
                            'judul'       => $this->input->post('judul'),
                            'pembuat'   => $this->input->post('pembuat'),
                            'file'       => $file['file_name']
                        );

                        $this->Mod_video->updatevideo($kode_video, $save);
                        // echo "berhasil"; die();
                        redirect('video/index/update-success');

                    }
                    //apabila tidak ada gambar yg diupload
                    else{
                        $data['message'] = "<div class='alert alert-block alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <p><strong><i class='icon-ok'></i>Gambar</strong> Masih Kosong...!</p></div>"; 
                        $this->template->load('layoutbackend', 'video/video_edit', $data);
                    } 
                        
                    
                }
                //jika tidak mengkosongkan
                else{

                    $kode_video = $this->input->post('kode_video');
                    $data['edit']    = $this->Mod_video->cekvideo($kode_video)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'video/video_edit', $data);
                }
            
            }
            //jika tidak ada gambar yg diupload
            else{
                $this->_set_rules();
                
                //apabila user mengkosongkan form input
                if($this->form_validation->run()==true){
                    // echo "masuk"; die();
                    
                    $kode_video = $this->input->post('kode_video');
                    
                    $save  = array(
                        'kode_video'   => $this->input->post('kode_video'),
                        'judul'       => $this->input->post('judul'),
                        'pembuat'   => $this->input->post('pembuat'),
                        'kategori_video' => $this->input->post('kategori_video')
                    );
                    $this->Mod_video->updatevideo($kode_video, $save);
                    // echo "berhasil"; die();
                    redirect('video/index/update-success');      
                }
                //jika tidak mengkosongkan
                else{
                    $kode_video = $this->input->post('kode_video');
                    $data['edit']    = $this->Mod_video->cekvideo($kode_video)->row_array();
                    $data['message'] = "";
                    $this->template->load('layoutbackend', 'video/video_edit', $data);
                }

            } //end empty $_FILES

        } // end $_POST['update']
    
    }

    public function delete()
    {
        $kode_video = $this->input->post('kode_video');
          
        $g = $this->db->get_where('video', ['kode_video' => $kode_video])->row_array();
        
        //hapus gambar yg ada diserver
        unlink('assets/img/video/'.$g['image']);
        unlink('assets/video/'.$g['file']);

        $this->db->delete('video', ['kode_video' => $kode_video]);
        redirect('video/index/delete-success');
    }

    //function global buat validasi input
    public function _set_rules()
    {
        // $this->form_validation->set_rules('kode_video','Kode video','required|max_length[5]');
        $this->form_validation->set_rules('judul','Judul video','required|max_length[100]');
        $this->form_validation->set_rules('pembuat','Pengarang','required|max_length[50]');
        $this->form_validation->set_message('required', '{field} kosong, silahkan diisi');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert'>&times;</a>","</div>");
    }

}

/* End of file video.php */
