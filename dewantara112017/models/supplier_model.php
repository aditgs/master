<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Supplier_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('supplier', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('supplier');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function get_onebykode($kode) {
        $this->db->where('Kode', $kode);
        $result = $this->db->get('supplier');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Nama' => $this->input->post('Nama', TRUE),
           
            'Alamat' => $this->input->post('Alamat', TRUE),
           
            'Kota' => $this->input->post('Kota', TRUE),
           
            'Telepon' => $this->input->post('Telepon', TRUE),
           
            'Fax' => $this->input->post('Fax', TRUE),
           
            'Contact' => $this->input->post('Contact', TRUE),
           
            'JthTempo' => $this->input->post('JthTempo', TRUE),
           
            'Diskon' => $this->input->post('Diskon', TRUE),
           
            'NPWP' => $this->input->post('NPWP', TRUE),
           
            'Hutang' => $this->input->post('Hutang', TRUE),
           
            'Bayar' => $this->input->post('Bayar', TRUE),
           
            'Sisa' => $this->input->post('Sisa', TRUE),
           
            'Bank' => $this->input->post('Bank', TRUE),
           
            'Rekening' => $this->input->post('Rekening', TRUE),
           
            'AnRekening' => $this->input->post('AnRekening', TRUE),
           
            'Potongan' => $this->input->post('Potongan', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
            'NoAcc' => $this->input->post('NoAcc', TRUE),
           
        );
        $this->db->insert('supplier', $data);
    }
    function save_detail($data){
        $this->db->insert('supplier_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Alamat' => $this->input->post('Alamat', TRUE),
       
       'Kota' => $this->input->post('Kota', TRUE),
       
       'Telepon' => $this->input->post('Telepon', TRUE),
       
       'Fax' => $this->input->post('Fax', TRUE),
       
       'Contact' => $this->input->post('Contact', TRUE),
       
       'JthTempo' => $this->input->post('JthTempo', TRUE),
       
       'Diskon' => $this->input->post('Diskon', TRUE),
       
       'NPWP' => $this->input->post('NPWP', TRUE),
       
       'Hutang' => $this->input->post('Hutang', TRUE),
       
       'Bayar' => $this->input->post('Bayar', TRUE),
       
       'Sisa' => $this->input->post('Sisa', TRUE),
       
       'Bank' => $this->input->post('Bank', TRUE),
       
       'Rekening' => $this->input->post('Rekening', TRUE),
       
       'AnRekening' => $this->input->post('AnRekening', TRUE),
       
       'Potongan' => $this->input->post('Potongan', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
       'NoAcc' => $this->input->post('NoAcc', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('supplier', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('supplier'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('supplier_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('supplier_detail');

         
      
       
    }
      function dropdown_supplier(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->nama.")";
        }
        return $result;
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from supplier order by id asc');
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
