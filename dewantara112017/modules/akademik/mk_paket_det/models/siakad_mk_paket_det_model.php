<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_mk_paket_det_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_mk_paket_det', $limit, $uri);
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
        $this->db->order_by('id_siakad_mk_paket_det','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mk_paket_det');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id_siakad_mk_paket_det','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mk_paket_det');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_mk_paket_det');
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
        $this->db->from('siakad_mk_paket_det');
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
    function get_one($id_siakad_mk_paket_det) {
        $this->db->where('id_siakad_mk_paket_det', $id_siakad_mk_paket_det);
        $result = $this->db->get('siakad_mk_paket_det');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_mk_paket_det', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_mk_paket_det', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode_mk' => $this->input->post('kode_mk', TRUE),
           
            'id_siakad_mk_paket' => $this->input->post('id_siakad_mk_paket', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode_mk' => $this->input->post('kode_mk', TRUE),
           
            'id_siakad_mk_paket' => $this->input->post('id_siakad_mk_paket', TRUE),
           
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
    function savesiakad_mk_paket_det($data){
        $this->db->insert('siakad_mk_paket_det',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_mk_paket_det_detail',$data);
    }
    function upddel_detail($id_siakad_mk_paket_det=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id_siakad_mk_paket_det', $id_siakad_mk_paket_det);
        $this->db->update('siakad_mk_paket_det', $data);
       
    } 
    function updatebyid($id_siakad_mk_paket_det,$data){
        $this->db->where('id_siakad_mk_paket_det', $id_siakad_mk_paket_det);
        $this->db->update('siakad_mk_paket_det', $data);
    }
    function update($id_siakad_mk_paket_det) {
        $data = array(
        'id_siakad_mk_paket_det' => $this->input->post('id_siakad_mk_paket_det',TRUE),
       'kode_mk' => $this->input->post('kode_mk', TRUE),
       
       'id_siakad_mk_paket' => $this->input->post('id_siakad_mk_paket', TRUE),
       
        );
        $this->db->where('id_siakad_mk_paket_det', $id_siakad_mk_paket_det);
        $this->db->update('siakad_mk_paket_det', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_siakad_mk_paket_det) {
        $this->db->where('id_siakad_mk_paket_det', $id_siakad_mk_paket_det);
        $this->db->delete('siakad_mk_paket_det'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_mk_paket_det_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_mk_paket_det_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_mk_paket_det, '.$value.' from siakad_mk_paket_det order by id_siakad_mk_paket_det asc');
        $result[0]="-- Pilih Urutan id_siakad_mk_paket_det --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_siakad_mk_paket_det]= $row->$value;
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
