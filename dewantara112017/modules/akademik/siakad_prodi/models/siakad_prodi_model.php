<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_prodi_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_prodi', $limit, $uri);
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
        $this->db->order_by('kode_prodi','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_prodi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('kode_prodi','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_prodi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_prodi');
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
        $this->db->from('siakad_prodi');
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
    function get_one($kode_prodi) {
        $this->db->where('kode_prodi', $kode_prodi);
        $result = $this->db->get('siakad_prodi');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_prodi', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_prodi', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode_pt' => $this->input->post('kode_pt', TRUE),
           
            'kode_prodi_less' => $this->input->post('kode_prodi_less', TRUE),
           
            'nm_prodi' => $this->input->post('nm_prodi', TRUE),
           
            'strata_prodi' => $this->input->post('strata_prodi', TRUE),
           
            'tgl_prodi' => $this->input->post('tgl_prodi', TRUE),
           
            'sk_prodi' => $this->input->post('sk_prodi', TRUE),
           
            'tgl_sk_prodi' => $this->input->post('tgl_sk_prodi', TRUE),
           
            'sks_prodi' => $this->input->post('sks_prodi', TRUE),
           
            'status_prodi' => $this->input->post('status_prodi', TRUE),
           
            'sk_banpt_prodi' => $this->input->post('sk_banpt_prodi', TRUE),
           
            'thn_banpt_prodi' => $this->input->post('thn_banpt_prodi', TRUE),
           
            'akr_banpt_prodi' => $this->input->post('akr_banpt_prodi', TRUE),
           
            'ex_banpt_prodi' => $this->input->post('ex_banpt_prodi', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode_pt' => $this->input->post('kode_pt', TRUE),
           
            'kode_prodi_less' => $this->input->post('kode_prodi_less', TRUE),
           
            'nm_prodi' => $this->input->post('nm_prodi', TRUE),
           
            'strata_prodi' => $this->input->post('strata_prodi', TRUE),
           
            'tgl_prodi' => $this->input->post('tgl_prodi', TRUE),
           
            'sk_prodi' => $this->input->post('sk_prodi', TRUE),
           
            'tgl_sk_prodi' => $this->input->post('tgl_sk_prodi', TRUE),
           
            'sks_prodi' => $this->input->post('sks_prodi', TRUE),
           
            'status_prodi' => $this->input->post('status_prodi', TRUE),
           
            'sk_banpt_prodi' => $this->input->post('sk_banpt_prodi', TRUE),
           
            'thn_banpt_prodi' => $this->input->post('thn_banpt_prodi', TRUE),
           
            'akr_banpt_prodi' => $this->input->post('akr_banpt_prodi', TRUE),
           
            'ex_banpt_prodi' => $this->input->post('ex_banpt_prodi', TRUE),
           
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
    function savesiakad_prodi($data){
        $this->db->insert('siakad_prodi',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_prodi_detail',$data);
    }
    function upddel_detail($kode_prodi=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('kode_prodi', $kode_prodi);
        $this->db->update('siakad_prodi', $data);
       
    } 
    function updatebyid($kode_prodi,$data){
        $this->db->where('kode_prodi', $kode_prodi);
        $this->db->update('siakad_prodi', $data);
    }
    function update($kode_prodi) {
        $data = array(
        'kode_prodi' => $this->input->post('kode_prodi',TRUE),
       'kode_pt' => $this->input->post('kode_pt', TRUE),
       
       'kode_prodi_less' => $this->input->post('kode_prodi_less', TRUE),
       
       'nm_prodi' => $this->input->post('nm_prodi', TRUE),
       
       'strata_prodi' => $this->input->post('strata_prodi', TRUE),
       
       'tgl_prodi' => $this->input->post('tgl_prodi', TRUE),
       
       'sk_prodi' => $this->input->post('sk_prodi', TRUE),
       
       'tgl_sk_prodi' => $this->input->post('tgl_sk_prodi', TRUE),
       
       'sks_prodi' => $this->input->post('sks_prodi', TRUE),
       
       'status_prodi' => $this->input->post('status_prodi', TRUE),
       
       'sk_banpt_prodi' => $this->input->post('sk_banpt_prodi', TRUE),
       
       'thn_banpt_prodi' => $this->input->post('thn_banpt_prodi', TRUE),
       
       'akr_banpt_prodi' => $this->input->post('akr_banpt_prodi', TRUE),
       
       'ex_banpt_prodi' => $this->input->post('ex_banpt_prodi', TRUE),
       
        );
        $this->db->where('kode_prodi', $kode_prodi);
        $this->db->update('siakad_prodi', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($kode_prodi) {
        $this->db->where('kode_prodi', $kode_prodi);
        $this->db->delete('siakad_prodi'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_prodi_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_prodi_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select kode_prodi, '.$value.' from siakad_prodi order by kode_prodi asc');
        $result[0]="-- Pilih Urutan kode_prodi --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kode_prodi]= $row->$value;
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
