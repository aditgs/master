<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imageupload extends CI_Controller {

	//variabel penampung error
	private $error;

	//Variabel penampung sukses
	private $success;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	private function handle_error($err)
	{
		$this->error .= $err . "rn";
	}

	private function handle_succes($succ)
	{
		$this->error .= $succ . "rn";
	}

	public function index()
	{
		if ($this->input->post("image_upload")) {
			$upload_path = './upload';
			$config['upload_path'] = $upload_path;
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '0';
			$config['max_filename'] = '255';
			$config['encrypt_name'] = FALSE;
			$config['cerate_thumb'] = TRUE;
			$image_data = array();
			$is_file_error = FALSE;
			if (!$_FILES) {
				$is_file_error = TRUE;
				$this->handle_error('Pilih file gambar.');
			}
			if (!$is_file_error) {
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image_name')) {
					$this->handle_error($this->upload->display_errors());
					$is_file_error = TRUE;
				} else {
					$image_data = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $image_data['full_path'];
					$config['maintain_ratio'] = TRUE;
					$config['cerate_thumb'] = TRUE;
					$config['width'] = 113;
					$config['height'] = 151;
					$this->load->library('image_lib', $config);
					if (!$this->image_lib->resize()) {
						$this->handle_error($this->image_lib->display_errors());
					}
				}
			}

			if ($is_file_error) {
				if ($image_data) {
					$file = $upload_path . $image_data['file_name'];
					if (file_exists($file)) {
						unlink($file);
					}
				}
			} else {
				$data['resize_img'] = $upload_path . $image_data['file_name'];
				$this->handle_succes('Gambar berhasil di upload <strong>' . $upload_path . '</strong> dan di resize');
			}
		}

		$data['errors'] = $this->error;
		$data['success'] = $this->success;

		$this->load->view('image_upload', $data);
	}

}

/* End of file imageupload.php */
/* Location: ./application/controllers/imageupload.php */