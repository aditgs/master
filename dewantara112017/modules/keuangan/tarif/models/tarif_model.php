<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tarif_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('tarif', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function bacaprodi($kode){
        $this->db->where('KodeP',$kode);
        $result=$this->db->get('prodi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function bacajenis($kode){
        $this->db->where('KodeJ',$kode);
        $result=$this->db->get('jenis');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function bacakelompokmhs($kode){
        $this->db->where('KodeK',$kode);
        $result=$this->db->get('kelompokmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
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

        $result=$this->db->get('tarif');
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

        $result=$this->db->get('tarif');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('tarif');
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
        $this->db->from('tarif');
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
        $result = $this->db->get('tarif');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('tarif', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('tarif', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'KodeT' => $this->input->post('KodeT', TRUE),
           
            'Tarif' => $this->input->post('Tarif', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'KodeT' => $this->input->post('KodeT', TRUE),
           
            'Tarif' => $this->input->post('Tarif', TRUE),
           
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
    function savetarif($data){
        $this->db->insert('tarif',$data);
    }
    function save_detail($data){
        $this->db->insert('tarif_detail',$data);
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
        $this->db->update('tarif', $data);
       
    } 
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tarif', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'KodeT' => $this->input->post('KodeT', TRUE),
       
       'Tarif' => $this->input->post('Tarif', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('tarif', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tarif'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('tarif_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('tarif_detail');       
    }
    function dropdown_jenis(){
        $result = array();
            $array_keys_values = $this->db->query('select id,KodeJ,Jenis from jenis order by id asc');
  
        $result[0]="-- Pilih Jenis --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->KodeJ]= $row->Jenis;
        }
        return $result;
    } 
    function dropdown_prodi(){
        $result = array();
            $array_keys_values = $this->db->query('select id,KodeP,Prodi from prodi order by id asc');
  
        $result[0]="-- Pilih Prodi --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->KodeP]= $row->Prodi;
        }
        return $result;
    } 
    function dropdown_kelompok(){
        $result = array();
            $array_keys_values = $this->db->query('select id,Kodek,Kelompok from kelompokmhs order by id asc');
  
        $result[0]="-- Pilih Kelompok --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kodek]= $row->Kelompok;
        }
        return $result;
    } 
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from tarif order by id asc');
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
