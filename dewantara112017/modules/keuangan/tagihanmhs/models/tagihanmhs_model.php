<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tagihanmhs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('tagihanmhs', $limit, $uri);
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
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('tagihanmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('tagihanmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('tagihanmhs');
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
        $this->db->from('tagihanmhs');
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
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('tagihanmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('tagihanmhs', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('tagihanmhs', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tgltempo' => $this->input->post('tgltempo', TRUE),
           
            'mhs' => $this->input->post('mhs', TRUE),
           
            'kodebank' => $this->input->post('kodebank', TRUE),
           
            'idpaket' => $this->input->post('idpaket', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'dateopen' => $this->input->post('dateopen', TRUE),
           
            'dateclosed' => $this->input->post('dateclosed', TRUE),
           
            'refbank' => $this->input->post('refbank', TRUE),
           
            'isbayar' => $this->input->post('isbayar', TRUE),
           
            'tglbayar' => $this->input->post('tglbayar', TRUE),
           
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
           
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
           
            'isactive' => $this->input->post('isactive', TRUE),
           
            'islocked' => $this->input->post('islocked', TRUE),
           
            'isdeleted' => $this->input->post('isdeleted', TRUE),
           
            'datedeleted' => $this->input->post('datedeleted', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tgltempo' => $this->input->post('tgltempo', TRUE),
           
            'mhs' => $this->input->post('mhs', TRUE),
           
            'kodebank' => $this->input->post('kodebank', TRUE),
           
            'idpaket' => $this->input->post('idpaket', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'dateopen' => $this->input->post('dateopen', TRUE),
           
            'dateclosed' => $this->input->post('dateclosed', TRUE),
           
            'refbank' => $this->input->post('refbank', TRUE),
           
            'isbayar' => $this->input->post('isbayar', TRUE),
           
            'tglbayar' => $this->input->post('tglbayar', TRUE),
           
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
           
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
           
            'isactive' => $this->input->post('isactive', TRUE),
           
            'islocked' => $this->input->post('islocked', TRUE),
           
            'isdeleted' => $this->input->post('isdeleted', TRUE),
           
            'datedeleted' => $this->input->post('datedeleted', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
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
    function savetagihanmhs($data){
        $this->db->insert('tagihanmhs',$data);
    }
    function save_detail($data){
        $this->db->insert('tagihanmhs_detail',$data);
    }
    function upddel_detail($id=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
       
    } 
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kode' => $this->input->post('kode', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tgltempo' => $this->input->post('tgltempo', TRUE),
       
       'mhs' => $this->input->post('mhs', TRUE),
       
       'kodebank' => $this->input->post('kodebank', TRUE),
       
       'idpaket' => $this->input->post('idpaket', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'dateopen' => $this->input->post('dateopen', TRUE),
       
       'dateclosed' => $this->input->post('dateclosed', TRUE),
       
       'refbank' => $this->input->post('refbank', TRUE),
       
       'isbayar' => $this->input->post('isbayar', TRUE),
       
       'tglbayar' => $this->input->post('tglbayar', TRUE),
       
       'isvalidasi' => $this->input->post('isvalidasi', TRUE),
       
       'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
       
       'isactive' => $this->input->post('isactive', TRUE),
       
       'islocked' => $this->input->post('islocked', TRUE),
       
       'isdeleted' => $this->input->post('isdeleted', TRUE),
       
       'datedeleted' => $this->input->post('datedeleted', TRUE),
       
       'userid' => $this->input->post('userid', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tagihanmhs'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('tagihanmhs_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('tagihanmhs_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from tagihanmhs order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
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
