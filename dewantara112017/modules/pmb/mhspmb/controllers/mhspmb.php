<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class mhspmb extends MX_Controller {
    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('siakad_mhs_pmb_model','pmbdb',TRUE);
        $this->session->set_userdata('lihat','siakad_mhs_pmb');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.0.2.ajaxupload.js');
        $this->template->set_layout('dashboard');

        /*UNTUK KEPERLUAN FORM*/
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('jquery.maskMoney.min.js');   
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        
        /*ONLINE CDN*/
       /* $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/jquery.maskmoney/3.0.2/jquery.maskMoney.min.js','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/accounting.js/0.3.2/accounting.min.js','cdn');*/
        
        $this->template->add_js('datepicker.js'); //tanggal
    }

 

    public function indexx() {
        $this->template->set_title('Kelola Calon Mahasiswa');
        $this->template->add_js('var baseurl="'.base_url().'mhspmb/";','embed');  
        // $this->template->add_js('modules/mhspmb.js');  
        $this->template->load_view('siakad_mhs_pmb_view',array(
            'view'=>'',
            'title'=>'Kelola Data Calon Mahasiswa',
            'subtitle'=>'Pengelolaan Calon Mahasiswa',
            'opt_kelas'=>$this->pmbdb->getdropkelas(),
            'opt_gel'=>$this->pmbdb->getdropgel(),
            'breadcrumb'=>array(
            'Siakad_mhs_pmb'),
        ));

        
    
    } 
    public function index() {
        $this->template->set_title('Kelola Calon Mahasiswa');
        $this->template->add_js('var baseurl="'.base_url().'mhspmb/";','embed');  
            $this->template->add_js('var filesurl="'.domain().'uploads/files/";','embed');  
        // $this->template->add_js('modules/mhspmb.js');
             $this->template->add_js('jquery.ui.widget.js');
        $this->template->add_js('jquery.fileupload.js');
        $this->template->add_js('uploader.js');  
        $this->template->load_view('siakad_mhs_pmb_view',array(
            'view'=>'',
            'title'=>'Kelola Data Calon Mahasiswa',
            'subtitle'=>'Pengelolaan Calon Mahasiswa',
            'opt_kelas'=>$this->pmbdb->getdropkelas(),
            'opt_gel'=>$this->pmbdb->getdropgel(),
            'breadcrumb'=>array(
            'Siakad_mhs_pmb'),
                'uppath'=>UPPATH,
            'homepath'=>HOMEPATH,
            'syspath'=>SYSDIR,
            'basepath'=>BASEPATH,
            'fcpath'=>FCPATH,
        ));

        
    
    }
    public function data() {
        $this->template->set_title('Kelola Calon Mahasiswa');
        $this->template->add_js('var baseurl="'.base_url().'mhspmb/";','embed');  
        $this->template->load_view('siakad_mhs_pmb_view',array(
            'view'=>'Siakad_mhs_pmb_data',
            'title'=>'Kelola Data Calon Mahasiswa',
            'subtitle'=>'Pengelolaan Calon Mahasiswa',
            'breadcrumb'=>array(
            'Siakad_mhs_pmb'),
        ));
    }
    public function baru() {
        $this->template->set_title('Kelola Calon Mahasiswa');
        $this->template->add_js('var baseurl="'.base_url().'mhspmb/";','embed');  
        // $this->template->add_js('modules/mhspmb.js');  
        // $this->template->add_js('var baseurl="'.base_url().'uploader/";','embed');  
        $this->template->add_js('var filesurl="'.domain().'uploads/files/";','embed');  
        $this->template->add_js('jquery.ui.widget.js');
        $this->template->add_js('jquery.fileupload.js');
        // $this->template->add_js('uploader.js');
        $this->template->load_view('siakad_mhs_pmb_view',array(
            'view'=>'formcalonmhsupload',
            'title'=>'Kelola Data Calon Mahasiswa',
            'subtitle'=>'Pengelolaan Calon Mahasiswa',
            'opt_kelas'=>$this->pmbdb->getdropkelas(),
            'opt_gel'=>$this->pmbdb->getdropgel(),
            'breadcrumb'=>array(
            'Siakad_mhs_pmb'),
            'uppath'=>UPPATH,
            'homepath'=>HOMEPATH,
            'syspath'=>SYSDIR,
            'basepath'=>BASEPATH,
            'fcpath'=>FCPATH,
            'updir'=>UPDIR
        ));
    }

    function unggahfoto()
    {
        // if ($this->input->post("image_upload")) {
            $upload_path = $this->_dir_path();
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '0';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;
            $config['cerate_thumb'] = TRUE;
            $image_data = array();
            $is_file_error = FALSE;
           /* if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Pilih file gambar.');
            }*/
            if (!$is_file_error) {
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img_pasfoto')) {
                    // $this->handle_error($this->upload->display_errors());
                    $this->upload->display_errors();
                    $is_file_error = TRUE;
                } else {
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path'];
                    $config['maintain_ratio'] = TRUE;
                    $config['create_thumb'] = TRUE;
                    $config['width'] = 113;
                    $config['height'] = 151;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        // $this->handle_error($this->image_lib->display_errors());
                        $this->image_lib->display_errors();
                    }

                    echo "oke disni";
                }
            }

            if ($is_file_error) {
                if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
                   return json_encode(array('st'=>0,'msg'=>$this->error));
            } else {
                $data['resize_img'] = $upload_path . $image_data['file_name'];
                $this->handle_succes('Gambar berhasil di upload <strong>' . $upload_path . '</strong> dan di resize');
                    return json_encode(array('st'=>1,'msg'=>$this->success));
            }
        // }

        // $data['errors'] = $this->error;
        // $data['success'] = $this->success;
        // $this->load->view('formcalonmhsupload', $data);
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->pmbdb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->pmbdb->genfaktur();
            $data['Faktur']=$faktur; //nama field perlu menyesuaikan tabel
            $data['userid']=userid();
            $data['datetime']=date('Y-m-d H:m:s');
            $data['islocked']=1;
            $id=$this->__submitnomor($data);
        }
       
        $session=array('new'=>false,'edit'=>true);
        $nopo=array('faktur'=>$faktur,'idx'=>$id);
        $default['faktur']=$faktur;
    
        return (json_encode($nopo));
        // return base64_encode(json_encode($nopo));
        // echo base64_encode(json_encode($nopo));
    }
    function __submitnomor($data){

       $this->db->insert('siakad_mhs_pmb',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('siakad_mhs_pmb',$data);
    }
     
     //<!-- Start Primary Key -->
    

   public function getdatatables(){
      
            $this->datatables->select('id,noreg_pmb,tgl_reg_pmb,nm_cmhs,kode_prodi,status_pmb,')
                            ->from('siakad_mhs_pmb');
            $this->datatables->edit_column('tgl_reg_pmb',"<div class='text-center'>$1</div>",'thedate(tgl_reg_pmb)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('mhspmb/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tab' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                <button class='btn btn-primary btn-xs dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-print'></i> Cetak <span class='caret'></span></button>'
                <ul class='dropdown-menu' style='position:relative;z-index:10000 !important'>
                <li><a href=".base_url('mhspmb/cetakkwitansi/$2')." target='_blank'><i class='fa fa-money'></i>&nbsp; Kwitansi</a></li>
                <li><a href=".base_url('mhspmb/cetakkartu/$2')." target='_blank'><i class='fa fa-book'></i>&nbsp; Kartu</a></li>
                <li><a href=".base_url('mhspmb/cetakformulir/$2')." target='_blank'><i class='fa fa-file'></i>&nbsp; Formulir</a></li>
                
                </div>" , 'id,base64_encode(id)');
            $this->datatables->unset_column('id');

      
        echo $this->datatables->generate();
    }
    function cetak(){
        $id=$this->input->post('id');
        $this->pmbdb->updcetak($id);

    }
    function cetakkwitansi($id,$pdf=true){
        if(empty($id)||!isset($id)){
            $id=$this->input->post('id');
        }
        $id=base64_decode($id);
        $pdf=base64_decode($pdf);

        if($id!=null){
            $data=$this->pmbdb->get_one($id);
            $this->template->set_layout('cetak');
           
            $html=$this->load->view('template-cetak-kwitansi',array('data'=>$data,'baseurl'=>base_url()),TRUE);
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                kwitansipmb($html, 'INV#'.$id."-".date('d-m-Y-Hms'));
            }else{          
                echo ($html);
            }
        }
    }
    function cetakkartu($id,$pdf=true){

        $id=base64_decode($id);
        $pdf=base64_decode($pdf);

        if($id!=null){
            $data=$this->pmbdb->get_one($id);
            $this->template->set_layout('cetak');
           
            $html=$this->load->view('template-cetak-kartu',array('data'=>$data,'baseurl'=>base_url()),TRUE);
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                kartupmb($html, 'ID#'.$id.date('d-m-Y-Hms'),TRUE);
            }else{          
                echo ($html);
            }
        }
    } 
    function cetakkartu2($id,$pdf=true){

        $id=base64_decode($id);
        $pdf=base64_decode($pdf);

        if($id!=null){
            $data=$this->pmbdb->get_one($id);
            $this->template->set_layout('cetak');
           
            $html=$this->load->view('template-cetak-kartu-backup2',array('data'=>$data,'baseurl'=>base_url()),TRUE);
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                kartupmb($html, 'ID#'.$id.date('d-m-Y-Hms'),TRUE);
            }else{          
                echo ($html);
            }
        }
    }
    function cetakformulir($id,$pdf=true){

        $id=base64_decode($id);
        $pdf=base64_decode($pdf);

        if($id!=null){
            $data=$this->pmbdb->get_one($id);
            $this->template->set_layout('cetak');
           
            $html=$this->load->view('template-cetak-formulir',array('data'=>$data,'baseurl'=>base_url()),TRUE);
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                formulirpmb($html, date('d-m-Y-Hms'),TRUE);
            }else{          
                echo ($html);
            }
        }
    }
    /*UPLOAD*/
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
    public function saveimage()
    {
        echo $this->fileupload();
    }
public function fileupload()
    {
        $config['upload_path'] = $this->_dir_path();
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // $config['max_size'] = '1024';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['file_name'] = date('YmdHis');
        // $filename;
        // $config['allowed_types']='rar|RAR|Rar|zip|Zip|ZIP|docx|DOCX|DOC|Doc|doc|PDF|pdf|Pdf|ODT|odt|Odt';

        $this->load->library('upload', $config);
        
        // file_logo
        if (!$this->upload->do_upload('images')) {
            log_message('error', $this->upload->display_errors('', ''));
            $error = array('error' => $this->upload->display_errors());
            
            echo json_encode(array('st'=>0,'msg'=>$error));

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
                'user_id'=>userid(),
                'timestamp'=>NOW(),
                );
            $this->db->insert('files',$data);
            $idimages=$this->db->insert_id();
            // print_r($file);
            echo json_encode(array('st'=>1,'msg'=>'Pasfoto berhasil diupload','filename'=>$file['file_name'],'id'=>$idimages));
             // echo json_encode(array('files' => array($info)));
           // echo json_encode(array('st'=>'1','msg'=>'File berhasil diupload','data'=>$data,'file'=>$info, 'files' => array($info)));
           // echo json_encode(array('st'=>'1','msg'=>'File berhasil diupload','imgurl'=>$info['url'],'filename'=>$file['file_name']));

        }
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
    /*END OF UPLOAD*/

    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('siakad_mhs_pmb');
    }
    function isadmin(){
       return $this->ion_auth->is_admin();
    }
    function getuser(){
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
            if (!empty($user)):
                $userid=$user->id;
                return $userid;
            else:
                return array();
            endif;
        endif;
    }
    function forms(){   

        $this->load->view('siakad_mhs_pmb_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->pmbdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('siakad_mhs_pmb_data');
    }

    function getonex($id=null){
        if($id!==null){
            $data=$this->pmbdb->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";
            $i=0;
            foreach ($data as $key => $value) {
                # code...
                
                
                    $div.="<tr>";
                
                $div.="<td>".$key."</td>";
                $div.="<td>".$value."</td>";
                    $div.="</tr>";
                
                $i++;

            }
            $div.="</table>";
           echo $div;
      
        }
      
    }
    function getone($id){
        $data=$this->pmbdb->get_one($id);
        $html=$this->load->view('view-detail-mhs',array('data'=>$data),true);
        $this->output->set_output($html);
    }

function __formvalidation(){
        $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required|trim|xss_clean');
        $this->form_validation->set_rules('nm_cmhs','Nama Calon Mahasiswa','required|trim|xss_clean');
        $this->form_validation->set_rules('kelamin_cmhs','Jenis Kelamin Calon Mahasiswa','required|trim|xss_clean'); 
        $this->form_validation->set_rules('agama_cmhs','Agama Calon Mahasiswa','required|trim|xss_clean');
        $this->form_validation->set_rules('gelid','Gelombang PMB','required|trim|xss_clean');
        $this->form_validation->set_rules('tgl_ijazah_pend','Tanggal Ijazah','required|trim|xss_clean');
        $this->form_validation->set_rules('status_cmhs','Status Pendaftaran Calon Mahasiswa','required|trim|xss_clean');


        // $this->form_validation->set_rules('tgl_transfer','tgl_transfer','required|trim|xss_clean');


       

        if ($this->form_validation->run() == FALSE)
            {
                // $this->session->set_flashdata(validation_errors());             
                return json_encode(array('st'=>0, 'msg' => validation_errors()));
                // return FALSE;
            }
        else{
            return TRUE;
        }
        // return $status;
    }
    public function submit(){
        if($this->__formvalidation()===TRUE):
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->pmbdb->update($this->input->post('id'));
          }else{
            //$this->pmbdb->save();
            $this->pmbdb->saveas();
            // echo $this->unggahfoto();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->pmbdb->update($this->input->post('id'));
              }else{
                //$this->pmbdb->save();
                $this->pmbdb->saveas();
                // echo $this->unggahfoto();
              }
          }
        }
        echo json_encode(array('st'=>1, 'msg' => '<h3 class="text-center alert-success alert"><i class="fa fa-check fa2x" ></i> Data tagihan berhasil disimpan</h3>'));
        else:
            echo $this->__formvalidation();
        endif;
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pmbdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pmbdb->upddel_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Delete Detail!</strong> Sukses...
            </div>';
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
            
        }
    } 
     public function delete_detailxx(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pmbdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    

    

}

/** Module siakad_mhs_pmb Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
