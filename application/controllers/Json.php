<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
    }

    public function populer()//sampul->blm di fix
    {
    // get popularity from database
    // SELECT
    //   *
    // FROM
    //   log_skripsi
    // GROUP BY
    //   id_skripsi
    // ORDER BY
    //   SUM(id_skripsi) DESC
    // LIMIT 5


    // SELECT
    //   productID
    // FROM
    //   yourTable
    // GROUP BY
    //   productID
    // ORDER BY
    //   SUM(Quantity) DESC
        $data =  $this->db->query('SELECT * FROM log_buku LEFT JOIN buku ON log_buku.id_buku = buku.kode_buku GROUP BY id_buku ORDER BY SUM(id_buku) DESC LIMIT 8')->result_array();
        echo json_encode($data);
    }
    
    public function katBuku()
    {
        $data =  $this->db->order_by('nama_kategori_buku', 'ASC')->get('kategori_buku')->result_array();
        echo json_encode($data);
    }

    public function katVideo()
    {
        $data =  $this->db->order_by('nama_kategori_video', 'ASC')->get('kategori_video')->result_array();
        echo json_encode($data);
    }
    
    public function listKatBuku()
    {
        $id = $this->input->get('data');
        $data =  $this->db->order_by('judul', 'ASC')->get_where('buku',['kategori_buku'=>$id])->result_array();
        echo json_encode($data);
        // echo ($id);
    }

    public function listKatVideo()
    {
        $id = $this->input->get('data');
        $data =  $this->db->order_by('judul', 'ASC')->get_where('video',['kategori_video'=>$id])->result_array();
        echo json_encode($data);
        // echo ($id);
    }

    public function bukuTerbaru()
    {
        $data =  $this->db->limit('5')->order_by('tahun_terbit', 'DESC')->get('buku')->result_array();
        echo json_encode($data);
    }

    //add data to log_buku
    public function add_log_buku()
    {
        $user = $this->input->get('user');
        $kode = $this->input->get('kode');
        $data = array(
            'id_log_buku' => '',
            'id_user' => $user,
            'id_buku' => $kode
        );
        $data =  $this->db->insert('log_buku', $data);
        if($this->db->affected_rows() > 0){
			$res = [true,'data berhasil ditambah'];
		}else{
			$res = [true,'data gagal ditambah'];
        }
        echo json_encode($res);
    }
}