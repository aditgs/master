<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class album extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables'));
        $this->load->model('album_model','albumdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','album');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola album');
        $this->template->set_layout('dashboard');
        $this->template->add_js('var baseurl="'.base_url().'album/";','embed');  
        $this->template->add_js('modules/album.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('contents/index',array(
                        'title'=>'Kelola album',
                        'subtitle'=>'Pengelolaan album',
                        'header_file'=>array('ckeditor'),
                        'parent'=>$this->albumdb->get_dropdown_array('name'),
                        'breadcrumb'=>array(
                            'Album Foto'),
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
        $this->datatables->select('album_id,name,description,parent')
                        ->from('51-viewalbum');
        echo $this->datatables->generate();
    }

   

    public function get($album_id=null){
        if($album_id!==null){
            echo json_encode($this->albumdb->get_one($album_id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('album_id')){
            $this->albumdb->update($this->input->post('album_id'));
          }else{
            $this->albumdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('album_id')){
                $this->albumdb->update($this->input->post('album_id'));
              }else{
                $this->albumdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->albumdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module album Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
