<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_prodi_log_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_prodi_log', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*'); //Faktur
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id_siakad_prodi_log','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_prodi_log');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id_siakad_prodi_log','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_prodi_log');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_prodi_log');
        $this->db->where('faktur',$faktur); //field perlu disesuaikan dengan tabel
        $this->db->where('isactive',1);
        $this->db->group_by('faktur'); //field perlu disesuaikan dengan tabel
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }

    }
    //fungsi dibawah ini biasanya digunakan untuk laporan
    //field dan tabel perlu disesuaikan dengan tabel
    function getdetail($data) {
        $this->db->select('id,Faktur as faktur,Jthtmp as jthtempo,NoBon as nobon,Supplier as kode,total,NmSupplier as nama,NoAccSup as noacc,Tgl as tanggal,IF(LEFT(NoAccSup,5)="1.700","Karyawan",IF(LEFT(NoAccSup,5)="1.250","Customer",IF(LEFT(NoAccSup,5)="2.300","Supplier","-"))) as tipe',FALSE);
        $this->db->from('siakad_prodi_log');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('Supplier',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
            // return array('sql'=>$this->db->last_query(),'result'=>$result);
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function genfaktur(){
        $last=$this->get_last();
        // print_r($last);
        if(!empty($last)):
            $faktur=genfaktur($last['faktur'],"PL");//diganti sesuai faktur/kode transaksi
        else:
            $faktur="PL".date('ym')."00001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($faktur);
    }
    function get_one($id_siakad_prodi_log) {
        $this->db->where('id_siakad_prodi_log', $id_siakad_prodi_log);
        $result = $this->db->get('siakad_prodi_log');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_prodi_log', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_prodi_log', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
           
            'user_prodi' => $this->input->post('user_prodi', TRUE),
           
            'pass_prodi' => $this->input->post('pass_prodi', TRUE),
           
            'email_prodi' => $this->input->post('email_prodi', TRUE),
           
            'style_prodi' => $this->input->post('style_prodi', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
           
            'user_prodi' => $this->input->post('user_prodi', TRUE),
           
            'pass_prodi' => $this->input->post('pass_prodi', TRUE),
           
            'email_prodi' => $this->input->post('email_prodi', TRUE),
           
            'style_prodi' => $this->input->post('style_prodi', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        //    'userid' => userid(),
        //    'datetime' => NOW(),
        //    'Time' => NOW(),
        return $data;
    }
    function savesiakad_prodi_log($data){
        $this->db->insert('siakad_prodi_log',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_prodi_log_detail',$data);
    }
    function upddel_detail($id_siakad_prodi_log=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id_siakad_prodi_log', $id_siakad_prodi_log);
        $this->db->update('siakad_prodi_log', $data);
       
    } 
    function updatebyid($id_siakad_prodi_log,$data){
        $this->db->where('id_siakad_prodi_log', $id_siakad_prodi_log);
        $this->db->update('siakad_prodi_log', $data);
    }
    function update($id_siakad_prodi_log) {
        $data = array(
        'id_siakad_prodi_log' => $this->input->post('id_siakad_prodi_log',TRUE),
       'kode_prodi' => $this->input->post('kode_prodi', TRUE),
       
       'user_prodi' => $this->input->post('user_prodi', TRUE),
       
       'pass_prodi' => $this->input->post('pass_prodi', TRUE),
       
       'email_prodi' => $this->input->post('email_prodi', TRUE),
       
       'style_prodi' => $this->input->post('style_prodi', TRUE),
       
        );
        $this->db->where('id_siakad_prodi_log', $id_siakad_prodi_log);
        $this->db->update('siakad_prodi_log', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_siakad_prodi_log) {
        $this->db->where('id_siakad_prodi_log', $id_siakad_prodi_log);
        $this->db->delete('siakad_prodi_log'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_prodi_log_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_prodi_log_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_prodi_log, '.$value.' from siakad_prodi_log order by id_siakad_prodi_log asc');
        $result[0]="-- Pilih Urutan id_siakad_prodi_log --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_siakad_prodi_log]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
