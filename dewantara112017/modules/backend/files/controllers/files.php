<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class files extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables'));
        $this->load->model('files_model','filesdb',TRUE);
        $this->load->model('album/album_model','albumdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','files');
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

    public function index() {
        $this->template->set_title('Kelola files');
        $this->template->set_layout('dashboard');
        $this->template->add_js('var baseurl="'.base_url().'files/";','embed'); 
       
        $this->template->add_js('modules/files.js');
        // $this->template->add_js('modules/crud.min.js');
        // $this->template->add_js('plugins/interface/datatables.min.js');
        // $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola files',
                        'subtitle'=>'Pengelolaan files',
                        'header_file'=>array('ckeditor'),
                        'parent'=>$this->albumdb->get_dropdown_array('name'),
                        'breadcrumb'=>array(
                            'files'),
                        ));
        
    }
     
    public function ckeditor(){
        session_start();
            $_SESSION['KCFINDER']=array();
            $_SESSION['kcfinder'] = FALSE;
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "../uploads";
            // $this->template->load_view('ckeditor/admin');

    }
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id,filename,title,url,album')
                        ->from('52-viewfiles');
        echo $this->datatables->generate();
    }

   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->filesdb->get_one($id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->filesdb->update($this->input->post('id'));
          }else{
            $this->filesdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->filesdb->update($this->input->post('id'));
              }else{
                $this->filesdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $filenya=$this->filesdb->get_one($this->input->post('id'));

                $file=$filenya['filename'];
                // $file=$filenya['filename'];
                // $this->filedelete($filenya['filename']);
                $this->filesdb->delete($this->input->post('id'));
                
                $this->load->helper('security');
                $file = sanitize_filename($file);
                
                $dir_path = $this->_dir_path();
                @unlink("{$dir_path}{$file}");

                // $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
                // $this->session->set_flashdata('notif',$this->filedelete());
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }

    public function filedelete($file)
    {
        
        // $file = $this->input->post('file');
        // $file_id = $this->input->post('file_id');
        
        
        
        // echo json_encode(array('result' => 'success'));
    }

    private function _dir_path()
    {
        // return HOMEPATH."/files/ckeditor/";
        // return APPPATH."files/ckeditor/";
        return UPDIR."files/images/";
    }

}

/** Module files Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
