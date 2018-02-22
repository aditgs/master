<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        // $this->load->library('template');
        // $this->load->library('Ion_auth/Ion_auth');
        $this->load->helper(array('url'));
        $this->load->model('files/files_model','filesdb',TRUE);
        if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('admin');
            redirect('auth/login', 'refresh');
        else:
            if(!$this->ion_auth->in_group(array(1,2))){
            // redirect('../site', 'refresh');
            redirect('../auth/logout', 'refresh');

            }
        endif;
    }
    

    public function index()
    {
        // echo HOMEPATH."files/ckeditor/";
        $this->template->set_title('Kelola CKEditor');
        // $this->template->set_layout('dashboard');
       
        /*$this->template->add_js('ckeditor/ckeditor.js');
        $this->template->add_js('ckeditor/adapters/jquery.js');*/
        $this->template->add_js('var baseurl="'.base_url().'uploader/";','embed');  
        $this->template->add_js('var filesurl="'.domain().'uploads/files/";','embed');  
        $this->template->add_js('jquery.ui.widget.js');
        $this->template->add_js('jquery.fileupload.js');
        $this->template->add_js('uploader.js');
        // $this->template->add_css('jquery.fileupload-ui.css');
        // $this->template->add_css('editor.css');

        $this->template->load_view('index',array(
            'uppath'=>UPPATH,
            'homepath'=>HOMEPATH,
            'syspath'=>SYSDIR,
            'basepath'=>BASEPATH,
            'fcpath'=>FCPATH,
            'updir'=>UPDIR

            ));
    }
    
    public function save()
    {
        $this->fileupload();
    }
    
    public function fileupload()
    {
        $config['upload_path'] = $this->_dir_path();
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // $config['allowed_types']='rar|RAR|Rar|zip|Zip|ZIP|docx|DOCX|DOC|Doc|doc|PDF|pdf|Pdf|ODT|odt|Odt';

        $this->load->library('upload', $config);
        
        // file_logo
        if (!$this->upload->do_upload('image')) {
            log_message('error', $this->upload->display_errors('', ''));
            $error = array('error' => $this->upload->display_errors());
            
            echo json_encode(array($error));
        } else {
            $file = $this->upload->data();
            // echo var_dump($file);
            $info['name'] = $file['file_name'];
            $info['size'] = $file['file_size'];
            $info['type'] = $file['file_type'];
            $info['url'] = $this->_file_url($file['file_name']);
            $info['thumbnail_url'] = $this->_file_url("thumbnail-".$file['file_name']);
            $info['delete_url'] = $this->_delete_url();
            $info['delete_type'] = 'DELETE';
           
            $data=array(
                'filename'=>$file['file_name'],
                'url'=>$info['url'],
                'type'=>$file['file_type'],
                );
            $this->db->insert('files',$data);
            // print_r($file);

            echo json_encode(array('files' => array($info)));
        }
    }
    
    public function filebrowse()
    {
        $files = array();
        
        $this->load->helper('file');
        $filenames = get_filenames($this->_dir_path());
        if ($filenames) {
            sort($filenames);
            foreach ($filenames as $filename) {
                $url = $this->_file_url($filename);
                $files[] = array(
                    'name' => $filename, 
                    'size' =>filesize($this->_file_path($filename)),
                    'url' => $this->_file_url($filename),
                    // 'thumbnail_url' => $this->_file_url("thumbnail-".$file['file_name']),
                    'delete' => $this->_delete_url()
                );
            }
        }
        
        echo json_encode(array('files' => $files));
    }
    public function resize_image($file_path, $width, $height) {

        $this->load->library('image_lib');

        $img_cfg['image_library'] = 'gd2';
        $img_cfg['source_image'] = $file_path;
        $img_cfg['maintain_ratio'] = TRUE;
        $config['create_thumb'] = TRUE;
        $img_cfg['new_image'] = $file_path;
        $img_cfg['width'] = $width;
        $img_cfg['quality'] = 100;
        $img_cfg['height'] = $height;

        $this->image_lib->initialize($img_cfg);
        $this->image_lib->resize();

    }
    public function filedelete()
    {
        $file = $this->input->post('file');
        
        $this->load->helper('security');
        $file = sanitize_filename($file);
        
        $dir_path = $this->_dir_path();
        $this->filesdb->deletefile($file);
        @unlink("{$dir_path}{$file}");
        
        echo json_encode(array('result' => 'success','source'=>$dir_path.$file));
    }
    private function _dir_path()
    {
        // return HOMEPATH."/files/ckeditor/";
        // return APPPATH."files/ckeditor/";
        // print_r(UPDIR."files/images");
        return UPDIR."files/images/";
    }
    
    private function _file_path($filename)
    {
        $dir_path = $this->_dir_path();
        return "{$dir_path}{$filename}";
    }
    
    private function _file_url($filename)
    {
        return files_url()."/images/{$filename}";
    }
    
    private function _delete_url()
    {
        return base_url()."uploader/filedelete";
    }
    
   
}
