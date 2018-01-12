<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multiupload extends MX_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url','html'));
    }

    function index()
    {
        $data['title'] = 'Multiple Upload form';
        $sub_data = array(
            'error' => '',
            'result' => ''
        );
         if($this->input->post('go_upload')) {
            $config['upload_path'] = '../uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '500';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            print_r($config['upload_path']);
            $this->load->library('upload', $config);
            $sub_data['result'] = '';
            $result_array = array();

            for ($i = 1; $i <=8; $i++){
               if (!empty($_FILES['userfile'.$i]['name'])) {
                    if (!$this->upload->do_upload('userfile'.$i))
                        $sub_data['error'] = $this->upload->display_errors();
                    else
                        array_push($result_array,$this->upload->data());
                }
            }
            $sub_data['result'] = $result_array;
         }
         
        $data['body'] = $this->load->view('upload_form', $sub_data);
        $this->load->view('output_html', $data);
    }
}