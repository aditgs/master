<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Barang_satuan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('barang_satuan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('barang_satuan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    
    function getbarang($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function getsatuan($id) {
        $this->db->where('id_barang', $id);
        $result = $this->db->get('barang_satuan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function get_satuan($id) {
        $this->db->where('id_barang', $id);
        $result = $this->db->get('00-00-01-05-view-barang-satuan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'kode' => $this->input->post('kode', TRUE),
           
            'Isi2' => $this->input->post('Isi2', TRUE),
           
            'Isi3' => $this->input->post('Isi3', TRUE),
           
            'Satuan1' => $this->input->post('Satuan1', TRUE),
           
            'Satuan2' => $this->input->post('Satuan2', TRUE),
           
            'Satuan3' => $this->input->post('Satuan3', TRUE),
           
            'Max' => $this->input->post('Max', TRUE),
           
            'SatuanMax' => $this->input->post('SatuanMax', TRUE),
           
            'Min' => $this->input->post('Min', TRUE),
           
            'SatuanMin' => $this->input->post('SatuanMin', TRUE),
           
            'StKon' => $this->input->post('StKon', TRUE),
           
            'User' => userid(),
           
            'datetime' =>date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('barang_satuan', $data);
        $idsatuan=$this->db->insert_id();
        $data["id_satuan"]=$idsatuan;
        // array_push($data,$data);
        echo json_encode($data);
    }
    function update_satuan($id,$data){
        $this->db->where('id_barang',$id);
        $this->db->update('barang_satuan', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'kode' => $this->input->post('kode', TRUE),
       
       'Isi2' => $this->input->post('Isi2', TRUE),
       
       'Isi3' => $this->input->post('Isi3', TRUE),
       
       'Satuan1' => $this->input->post('Satuan1', TRUE),
       
       'Satuan2' => $this->input->post('Satuan2', TRUE),
       
       'Satuan3' => $this->input->post('Satuan3', TRUE),
       
       'Max' => $this->input->post('Max', TRUE),
       
       'SatuanMax' => $this->input->post('SatuanMax', TRUE),
       
       'Min' => $this->input->post('Min', TRUE),
       
       'SatuanMin' => $this->input->post('SatuanMin', TRUE),
       
       'StKon' => $this->input->post('StKon', TRUE),
       
       'User' => userid(),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('barang_satuan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('barang_satuan'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from barang_satuan order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
        }
        return $result;
    } 
    function get_dropdown_satuan(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Keterangan from satuan order by id asc');
        $result['']="-- Pilih Satuan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kode]= $row->Kode." (".$row->Keterangan.")";
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
