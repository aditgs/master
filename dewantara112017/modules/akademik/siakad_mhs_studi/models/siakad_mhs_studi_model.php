<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_mhs_studi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_mhs_studi', $limit, $uri);
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
        $this->db->order_by('id_siakad_mhs_studi','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs_studi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id_siakad_mhs_studi','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs_studi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_mhs_studi');
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
        $this->db->from('siakad_mhs_studi');
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
    function get_one($id_siakad_mhs_studi) {
        $this->db->where('id_siakad_mhs_studi', $id_siakad_mhs_studi);
        $result = $this->db->get('siakad_mhs_studi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_mhs_studi', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_mhs_studi', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'nim_mhs' => $this->input->post('nim_mhs', TRUE),
           
            'id_siakad_jadwal' => $this->input->post('id_siakad_jadwal', TRUE),
           
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'kode_mk' => $this->input->post('kode_mk', TRUE),
           
            'status_studi' => $this->input->post('status_studi', TRUE),
           
            'nil_tugas' => $this->input->post('nil_tugas', TRUE),
           
            'nil_uts' => $this->input->post('nil_uts', TRUE),
           
            'nil_uas' => $this->input->post('nil_uas', TRUE),
           
            'nil_akhir' => $this->input->post('nil_akhir', TRUE),
           
            'nilai_angka_studi' => $this->input->post('nilai_angka_studi', TRUE),
           
            'nilai_huruf_studi' => $this->input->post('nilai_huruf_studi', TRUE),
           
            'status_nil_mk' => $this->input->post('status_nil_mk', TRUE),
           
            'status_val_studi' => $this->input->post('status_val_studi', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'nim_mhs' => $this->input->post('nim_mhs', TRUE),
           
            'id_siakad_jadwal' => $this->input->post('id_siakad_jadwal', TRUE),
           
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'kode_mk' => $this->input->post('kode_mk', TRUE),
           
            'status_studi' => $this->input->post('status_studi', TRUE),
           
            'nil_tugas' => $this->input->post('nil_tugas', TRUE),
           
            'nil_uts' => $this->input->post('nil_uts', TRUE),
           
            'nil_uas' => $this->input->post('nil_uas', TRUE),
           
            'nil_akhir' => $this->input->post('nil_akhir', TRUE),
           
            'nilai_angka_studi' => $this->input->post('nilai_angka_studi', TRUE),
           
            'nilai_huruf_studi' => $this->input->post('nilai_huruf_studi', TRUE),
           
            'status_nil_mk' => $this->input->post('status_nil_mk', TRUE),
           
            'status_val_studi' => $this->input->post('status_val_studi', TRUE),
           
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
    function savesiakad_mhs_studi($data){
        $this->db->insert('siakad_mhs_studi',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_mhs_studi_detail',$data);
    }
    function upddel_detail($id_siakad_mhs_studi=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id_siakad_mhs_studi', $id_siakad_mhs_studi);
        $this->db->update('siakad_mhs_studi', $data);
       
    } 
    function updatebyid($id_siakad_mhs_studi,$data){
        $this->db->where('id_siakad_mhs_studi', $id_siakad_mhs_studi);
        $this->db->update('siakad_mhs_studi', $data);
    }
    function update($id_siakad_mhs_studi) {
        $data = array(
        'id_siakad_mhs_studi' => $this->input->post('id_siakad_mhs_studi',TRUE),
       'nim_mhs' => $this->input->post('nim_mhs', TRUE),
       
       'id_siakad_jadwal' => $this->input->post('id_siakad_jadwal', TRUE),
       
       'kode_akademik' => $this->input->post('kode_akademik', TRUE),
       
       'kode_mk' => $this->input->post('kode_mk', TRUE),
       
       'status_studi' => $this->input->post('status_studi', TRUE),
       
       'nil_tugas' => $this->input->post('nil_tugas', TRUE),
       
       'nil_uts' => $this->input->post('nil_uts', TRUE),
       
       'nil_uas' => $this->input->post('nil_uas', TRUE),
       
       'nil_akhir' => $this->input->post('nil_akhir', TRUE),
       
       'nilai_angka_studi' => $this->input->post('nilai_angka_studi', TRUE),
       
       'nilai_huruf_studi' => $this->input->post('nilai_huruf_studi', TRUE),
       
       'status_nil_mk' => $this->input->post('status_nil_mk', TRUE),
       
       'status_val_studi' => $this->input->post('status_val_studi', TRUE),
       
        );
        $this->db->where('id_siakad_mhs_studi', $id_siakad_mhs_studi);
        $this->db->update('siakad_mhs_studi', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_siakad_mhs_studi) {
        $this->db->where('id_siakad_mhs_studi', $id_siakad_mhs_studi);
        $this->db->delete('siakad_mhs_studi'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_mhs_studi_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_mhs_studi_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_mhs_studi, '.$value.' from siakad_mhs_studi order by id_siakad_mhs_studi asc');
        $result[0]="-- Pilih Urutan id_siakad_mhs_studi --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_siakad_mhs_studi]= $row->$value;
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
