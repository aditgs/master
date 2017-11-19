<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jurnal_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('jurnal', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_last_jr(){

        $this->db->select('id,no_jurnal');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('jurnal');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('jurnal');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function gettotal_detail($no) {
        $this->db->where('no_jurnal', $no);
        $result = $this->db->get('00-00-11-02-view-total-jurnal');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'no_jurnal' => $this->input->post('no_jurnal', TRUE),
           
            'no_bukti' => $this->input->post('no_bukti', TRUE),
           
            'jurnal_group' => $this->input->post('jurnal_group', TRUE),
           
            'tgl' => $this->input->post('tgl', TRUE),
           
            'ket' => $this->input->post('ket', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
           
            'akun_jurnal' => $this->input->post('akun_jurnal', TRUE),
           
            'total_debet' => $this->input->post('total_debet', TRUE),
           
            'total_kredit' => $this->input->post('total_kredit', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'is_jrnl' => $this->input->post('is_jrnl', TRUE),
           
            'is_void' => $this->input->post('is_void', TRUE),
           
            'from_trx' => $this->input->post('from_trx', TRUE),
           
            'is_posted' => $this->input->post('is_posted', TRUE),
           
            'tgl_posted' => $this->input->post('tgl_posted', TRUE),
           
            'is_cancel' => $this->input->post('is_cancel', TRUE),
           
            'tgl_cancel' => $this->input->post('tgl_cancel', TRUE),
           
            'alasan' => $this->input->post('alasan', TRUE),
           
            'user_id' =>$this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('jurnal', $data);
    }
    function save_jurnal($data) {
          
        $this->db->insert('jurnal', $data);
    }
    function save_jurnal_batch($data) {
          
        $this->db->insert_batch('jurnal', $data);
    }
  
    function save_detail($data) {
        $this->db->insert('jurnal_detail', $data);
    }
    function save_detail_batch($data){
        $this->db->insert_batch('jurnal_detail', $data);

    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'no_jurnal' => $this->input->post('no_jurnal', TRUE),
       
       'no_bukti' => $this->input->post('no_bukti', TRUE),
       
       'jurnal_group' => $this->input->post('jurnal_group', TRUE),
       
       'tgl' => $this->input->post('tgl', TRUE),
       
       'ket' => $this->input->post('ket', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       
       'akun_jurnal' => $this->input->post('akun_jurnal', TRUE),
       
       'total_debet' => $this->input->post('total_debet', TRUE),
       
       'total_kredit' => $this->input->post('total_kredit', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'is_jrnl' => $this->input->post('is_jrnl', TRUE),
       
       'is_void' => $this->input->post('is_void', TRUE),
       
       'from_trx' => $this->input->post('from_trx', TRUE),
       
       'is_posted' => $this->input->post('is_posted', TRUE),
       
       'tgl_posted' => $this->input->post('tgl_posted', TRUE),
       
       'is_cancel' => $this->input->post('is_cancel', TRUE),
       
       'tgl_cancel' => $this->input->post('tgl_cancel', TRUE),
       
       'alasan' => $this->input->post('alasan', TRUE),
       
       'user_id' =>$this->session->userdata('user_id'),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('jurnal', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('jurnal'); 
    }
    function delete_detail($id) {
        $this->db->where('id_detail', $id);
        $this->db->delete('jurnal_detail'); 
    }

    function delete_by_jurnal($bukti=null) {
        $this->db->where('no_jurnal', $bukti);
        $this->db->delete('jurnal_detail');

         
       
    }
    function dropdown_bukti(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode_bukti,Keterangan from bukti where is_active=1 order by id asc');
        $result[0]="-- Pilih Kelompok Bukti --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode_bukti." (".$row->Keterangan.")";
        }
        return $result;
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from jurnal order by id asc');
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
