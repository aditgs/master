<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('customer', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getcustomer($data) {
      // print_r($data);
        if(!empty($data['id_customer'])||$data['id_customer']>0){
          $this->db->where('id',$data['id_customer']);
        }
          $result = $this->db->get('customer');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('customer');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function get_onebykode($kode) {
        $this->db->where('Kode', $kode);
        $result = $this->db->get('customer');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_onebynoacc($noacc) {
        $this->db->where('NoAcc', $noacc);
        $result = $this->db->get('customer');
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
           
            'Wilayah' => $this->input->post('Wilayah', TRUE),
           
            'Area' => $this->input->post('Area', TRUE),
           
            'Contact' => $this->input->post('Contact', TRUE),
           
            'Telepon' => $this->input->post('Telepon', TRUE),
           
            'Fax' => $this->input->post('Fax', TRUE),
           
            'Kota' => $this->input->post('Kota', TRUE),
           
            'JthTempo' => $this->input->post('JthTempo', TRUE),
           
            'Diskon' => $this->input->post('Diskon', TRUE),
           
            'Plafond' => $this->input->post('Plafond', TRUE),
           
            'Subsidi' => $this->input->post('Subsidi', TRUE),
           
            'NPWP' => $this->input->post('NPWP', TRUE),
           
            'Status' => $this->input->post('Status', TRUE),
           
            'Hutang' => $this->input->post('Hutang', TRUE),
           
            'Bayar' => $this->input->post('Bayar', TRUE),
           
            'Sisa' => $this->input->post('Sisa', TRUE),
           
            'Bank' => $this->input->post('Bank', TRUE),
           
            'Rekening' => $this->input->post('Rekening', TRUE),
           
            'AnRekening' => $this->input->post('AnRekening', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => $this->input->post('Time', TRUE),
           
            'Golongan' => $this->input->post('Golongan', TRUE),
           
            'NoAcc' => $this->input->post('NoAcc', TRUE),
           
            'LastPrint' => $this->input->post('LastPrint', TRUE),
           
            'StAktif' => $this->input->post('StAktif', TRUE),
           
        );
        $this->db->insert('customer', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Alamat' => $this->input->post('Alamat', TRUE),
       
       'Wilayah' => $this->input->post('Wilayah', TRUE),
       
       'Area' => $this->input->post('Area', TRUE),
       
       'Contact' => $this->input->post('Contact', TRUE),
       
       'Telepon' => $this->input->post('Telepon', TRUE),
       
       'Fax' => $this->input->post('Fax', TRUE),
       
       'Kota' => $this->input->post('Kota', TRUE),
       
       'JthTempo' => $this->input->post('JthTempo', TRUE),
       
       'Diskon' => $this->input->post('Diskon', TRUE),
       
       'Plafond' => $this->input->post('Plafond', TRUE),
       
       'Subsidi' => $this->input->post('Subsidi', TRUE),
       
       'NPWP' => $this->input->post('NPWP', TRUE),
       
       'Status' => $this->input->post('Status', TRUE),
       
       'Hutang' => $this->input->post('Hutang', TRUE),
       
       'Bayar' => $this->input->post('Bayar', TRUE),
       
       'Sisa' => $this->input->post('Sisa', TRUE),
       
       'Bank' => $this->input->post('Bank', TRUE),
       
       'Rekening' => $this->input->post('Rekening', TRUE),
       
       'AnRekening' => $this->input->post('AnRekening', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
       'Golongan' => $this->input->post('Golongan', TRUE),
       
       'NoAcc' => $this->input->post('NoAcc', TRUE),
       
       'LastPrint' => $this->input->post('LastPrint', TRUE),
       
       'StAktif' => $this->input->post('StAktif', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('customer', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('customer'); 
       
    }
  

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from customer order by id asc');
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
     function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="MT" order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
    function dropdown_mitra(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,Nama from customer where golongan="MT" order by id asc');
        $result[0]="-- Pilih Mitra --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->Nama.")";
        }
        return $result;
    }
}
?>
