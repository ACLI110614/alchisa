<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{       $this->load->view('main/layout/header');
		$this->load->view('upload/upload_form', array('error' => ' ' ));
                $this->load->view('main/layout/footer');
	}

	function do_upload()
	{
		$config['upload_path'] = './allupload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '3100';
		$config['max_width']  = '3024';
		$config['max_height']  = '3768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        $this->load->view('main/layout/header');
			$this->load->view('upload/upload_form', $error);
                        $this->load->view('main/layout/footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload/upload_success', $data);
		}
	}
}
?>
