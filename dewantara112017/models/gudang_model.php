<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Gudang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('gudang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('gudang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kd_gudang' => $this->input->post('kd_gudang', TRUE),
           
            'nama' => $this->input->post('nama', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'kode_mitra' => $this->input->post('kode_mitra', TRUE),
           
            'id_user' => $this->input->post('id_user', TRUE),
           
            'id_wilayah' => $this->input->post('id_wilayah', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
            'timestamp' => $this->input->post('timestamp', TRUE),
           
        );
        $this->db->insert('gudang', $data);
    }
    function save_detail($data){
        $this->db->insert('gudang_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kd_gudang' => $this->input->post('kd_gudang', TRUE),
       
       'nama' => $this->input->post('nama', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'kode_mitra' => $this->input->post('kode_mitra', TRUE),
       
       'id_user' => $this->input->post('id_user', TRUE),
       
       'id_wilayah' => $this->input->post('id_wilayah', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
       'timestamp' => $this->input->post('timestamp', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('gudang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('gudang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('gudang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('gudang_detail');

         
      
       
    }
    function dropdown_gudang(){
        $result = array();
        $array_keys_values = $this->db->query('select id, kd_gudang as kode,nama from gudang order by id asc');
        // $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Gudang --";
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
        $array_keys_values = $this->db->query('select id, '.$value.' from gudang order by id asc');
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
