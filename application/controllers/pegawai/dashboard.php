<?php 

class Dashboard extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('hak_akses') !='2') {
            $this->session->set_flashdata('pesan',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Silahkan Login!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span> 
					</button>
				</div>');
				redirect('welcome');
        }
    }
    
    public function index()
    {
        $data['tittle'] =   "Dashboard";
        $id=$this->session->userdata('id_karyawan');
        $data['karyawan']   = $this->db->query("SELECT * from data_karyawan where id_karyawan='$id'")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboard',$data);
        $this->load->view('templates_pegawai/footer');
    }

}

?>