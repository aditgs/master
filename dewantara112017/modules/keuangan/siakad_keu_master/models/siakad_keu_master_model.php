<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_keu_master_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_keu_master', $limit, $uri);
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
        $this->db->order_by('id_siakad_keu_master','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_keu_master');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id_siakad_keu_master','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_keu_master');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_keu_master');
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
        $this->db->from('siakad_keu_master');
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
    function get_one($id_siakad_keu_master) {
        $this->db->where('id_siakad_keu_master', $id_siakad_keu_master);
        $result = $this->db->get('siakad_keu_master');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_keu_master', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_keu_master', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'nm_tagihan' => $this->input->post('nm_tagihan', TRUE),
           
            'nominal_biaya' => $this->input->post('nominal_biaya', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'nm_tagihan' => $this->input->post('nm_tagihan', TRUE),
           
            'nominal_biaya' => $this->input->post('nominal_biaya', TRUE),
           
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
    function savesiakad_keu_master($data){
        $this->db->insert('siakad_keu_master',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_keu_master_detail',$data);
    }
    function upddel_detail($id_siakad_keu_master=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id_siakad_keu_master', $id_siakad_keu_master);
        $this->db->update('siakad_keu_master', $data);
       
    } 
    function updatebyid($id_siakad_keu_master,$data){
        $this->db->where('id_siakad_keu_master', $id_siakad_keu_master);
        $this->db->update('siakad_keu_master', $data);
    }
    function update($id_siakad_keu_master) {
        $data = array(
        'id_siakad_keu_master' => $this->input->post('id_siakad_keu_master',TRUE),
       'kode_akademik' => $this->input->post('kode_akademik', TRUE),
       
       'nm_tagihan' => $this->input->post('nm_tagihan', TRUE),
       
       'nominal_biaya' => $this->input->post('nominal_biaya', TRUE),
       
        );
        $this->db->where('id_siakad_keu_master', $id_siakad_keu_master);
        $this->db->update('siakad_keu_master', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_siakad_keu_master) {
        $this->db->where('id_siakad_keu_master', $id_siakad_keu_master);
        $this->db->delete('siakad_keu_master'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_keu_master_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_keu_master_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_keu_master, '.$value.' from siakad_keu_master order by id_siakad_keu_master asc');
        $result[0]="-- Pilih Urutan id_siakad_keu_master --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_siakad_keu_master]= $row->$value;
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
