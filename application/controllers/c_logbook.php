<?php
class c_logbook extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('m_logbook');
		$this->load->helper(array('form', 'url'));
		$this->load->model('logbook_model');
		$this->load->library('pagination');
	}

	public function index() {
		$data['title'] = "Dashboard";
		// $data['sql'] = $this->m_logbook->log();
		$config['base_url'] = site_url('c_logbook/index'); //site url
        $config['total_rows'] = $this->db->count_all('laporan'); //total row
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['sql'] = $this->logbook_model->get_laporan_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
		if(isset($_SESSION['udhmasuk'])){
		
			$this->load->view('v_logbook',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function indexx() {
		$data['title'] = "Dashboard";
		$data['sql'] = $this->m_logbook->log();
		$config['base_url'] = site_url('c_logbook/indexx'); //site url
        $config['total_rows'] = $this->db->count_all('laporan'); //total row
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['sql'] = $this->logbook_model->get_laporan_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('v_logbook_user',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function add() {
		$data['op'] = 'tambah';	
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_petugas',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function add_kegiatan($id) {
		$data['op'] = 'tambah';
		$data['sql'] = $this->m_logbook->edit_id($id);	
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_kegiatan',$data);
		}
		else{
			redirect('c_login/index');
		}
	} 
	
	public function simpan_petugas(){
		$op = $this->input->post('op');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
		$shift = $this->input->post('shift');
		$inventaris = implode(", ", $this->input->post('inventaris'));
		$data = array(
			'nama' => $nama,
			'tanggal' => $tanggal,
			'shift' => $shift,
			'inventaris' => $inventaris
			);
			echo "<pre>";
var_dump($this->input->post());
echo "</pre>";
die();
		if($op=="tambah"){
			$this->m_logbook->simpan_petugas($data);
		}
		else{
			$this->m_logbook->update_petugas($id,$data);
		}
		redirect('c_logbook/index');
	}

	public function simpan_kegiatan(){
		$op = $this->input->post('op');
		$id = $this->input->post('id');
		$id_k = $this->input->post('id_k');
		$waktu_awal = $this->input->post('waktu_awal');
		$waktu_akhir = $this->input->post('waktu_akhir');
		$kegiatan = $this->input->post('kegiatan');
		$data = array(
			'id' => $id,
			'waktu_awal' => $waktu_awal,
			'waktu_akhir' => $waktu_akhir,
			'kegiatan' => $kegiatan	
			);
		if($op=="tambah"){
			$this->m_logbook->simpan_kegiatan($data);
		}
		else{
			$this->m_logbook->update_kegiatan($id_k,$data);
		}
		redirect('c_logbook/index');
	}

	public function id($id){
		$this->m_logbook->id($id);
	}

	public function data_id($id){
		$data['sql1'] = $this->m_logbook->log_id($id);
		$data['sql2'] = $this->m_logbook->log_id_k($id);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('data_id',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function data_id_user($id){
		$data['sql1'] = $this->m_logbook->log_id($id);
		$data['sql2'] = $this->m_logbook->log_id_k($id);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('data_id_user',$data);
		}
		else{
			redirect('c_login/index');
		}
	}


	public function hapus_id($id){
		$this->m_logbook->hapus_id($id);
		redirect('c_logbook/index');
	}

	public function hapus_id_k($id_k){
		$this->m_logbook->hapus_id_k($id_k);
		redirect('c_logbook/index');
	}

	public function edit_id($id) {
		$data['op'] = 'edit';
		$data['sql'] = $this->m_logbook->edit_id($id);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_petugas_edit',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	public function edit_id_k($id_k) {
		$data['op'] = 'edit';
		$data['sql'] = $this->m_logbook->edit_id_k($id_k);
		if(isset($_SESSION['udhmasuk'])){
			$this->load->view('form_kegiatan',$data);
		}
		else{
			redirect('c_login/index');
		}
	}

	function search_date(){
        $date1 = $this->input->post('date1'); //YYYY-MM-DD
        $date2 = $this->input->post('date2');
        echo "<pre>";
		var_dump($this->input->post());
		echo "</pre>";
		die();
        if($date1 == "" || $date2 == ""){
        	$data['sql'] = $this->m_logbook->log();
        	$config['base_url'] = site_url('c_logbook/search_date'); //site url
	        $config['total_rows'] = $this->db->count_all('laporan'); //total row
	        $config['per_page'] = 4;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);

	        // Membuat Style pagination untuk BootStrap v4
	        $config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        	//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        	$data['sql'] = $this->logbook_model->get_laporan_list($config["per_page"], $data['page']);   
        }
        else{
        	$data['sql'] = $this->m_logbook->search($date1,$date2);
        }
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('v_logbook',$data);
    }

    function search_datex(){
        $date1 = $this->input->post('date1'); //YYYY-MM-DD
        $date2 = $this->input->post('date2');

        if($date1 == "" || $date2 == ""){
        	$data['sql'] = $this->m_logbook->log();
        	$config['base_url'] = site_url('c_logbook/search_datex'); //site url
	        $config['total_rows'] = $this->db->count_all('laporan'); //total row
	        $config['per_page'] = 4;  //show record per halaman
	        $config["uri_segment"] = 3;  // uri parameter
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = floor($choice);

	        // Membuat Style pagination untuk BootStrap v4
	        $config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';

	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        	//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        	$data['sql'] = $this->logbook_model->get_laporan_list($config["per_page"], $data['page']);   
        }
        else{
        	$data['sql'] = $this->m_logbook->search($date1,$date2);
        }


        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('v_logbook_user',$data);
    }
}