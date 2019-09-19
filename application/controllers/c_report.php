<?php
class c_report extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('pdf_report');
		$this->load->model('m_logbook');
	}

	public function index($id){
		$data['sql1'] = $this->m_logbook->log_id($id);
		$data['sql2'] = $this->m_logbook->log_id_k($id);
		$this->load->view('v_report',$data);
	}
}