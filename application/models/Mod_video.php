<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_video extends CI_Model {

    private $table   = "video";
    private $primary = "kode_video";

    function searchvideo($cari, $limit, $offset)
    {
        $this->db->like($this->primary,$cari);
        $this->db->or_like("judul",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table);
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    
    function getAll()
    {
        $this->db->order_by('video.kode_video desc');
        return $this->db->get('video');
    }

    function insertvideo($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekvideo($kode)
    {
        $this->db->where("kode_video", $kode);
        return $this->db->get("video");
    }

    function updatevideo($kode_video, $data)
    {
        $this->db->where('kode_video', $kode_video);
		$this->db->update('video', $data);
    }

    function getGambar($kode_video)
    {
        $this->db->select('image');
        $this->db->from('video');
        $this->db->where('kode_video', $kode_video);
        return $this->db->get();
    }

    function deletevideo($kode, $table)
    {
        $this->db->where('kode_video', $kode);
        $this->db->delete($table);
    }

    function BookSearch($judul)
    {
        $this->db->like($this->primary,$judul);
        $this->db->or_like("judul",$judul);
        $this->db->limit(10);
        return $this->db->get($this->table);
    }



}

/* End of file ModelName.php */
