<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['t_buku'] = $this->db->get('buku')->num_rows();
        $data['t_video'] = $this->db->get('video')->num_rows();
        $this->template->load('layoutbackend', 'dashboard/dashboard_data', $data);
    }
        
    


}
/* End of file Controllername.php */
 