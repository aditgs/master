<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jurnal_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('jurnal_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $result = $this->db->get('jurnal_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_detail($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('jurnal_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function savedetail($data){
        $this->db->insert('jurnal_detail', $data);
    }
    function save() {
           $data = array(
        
            'id_jurnal' => $this->input->post('id_jurnal', TRUE),
           
            'no_jurnal' => $this->input->post('no_jurnal', TRUE),
           
            'akun_detail' => $this->input->post('akun_detail', TRUE),
           
            'tipe_detail' => $this->input->post('tipe_detail', TRUE),
           
            'ket_detail' => $this->input->post('ket_detail', TRUE),
           
            'nilai' => $this->input->post('nilai', TRUE),
           
            'no_urut' => $this->input->post('no_urut', TRUE),
           
            'user_id' =>userid(),
           
            'datetime' => now(),
           
        );
        $this->db->insert('jurnal_detail', $data);
    }
    function save_detail($data) {
         
        $this->db->insert_batch('jurnal_detail', $data);
    }

    function update($id_detail) {
        $data = array(
        'id_detail' => $this->input->post('id_detail',TRUE),
       'id_jurnal' => $this->input->post('id_jurnal', TRUE),
       
       'no_jurnal' => $this->input->post('no_jurnal', TRUE),
       
       'akun_detail' => $this->input->post('akun_detail', TRUE),
       
       'tipe_detail' => $this->input->post('tipe_detail', TRUE),
       
       'ket_detail' => $this->input->post('ket_detail', TRUE),
       
       'nilai' => $this->input->post('nilai', TRUE),
       
       'no_urut' => $this->input->post('no_urut', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_detail', $id_detail);
        $this->db->update('jurnal_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_detail) {
        $this->db->where('id_detail', $id_detail);
        $this->db->delete('jurnal_detail'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_detail, '.$value.' from jurnal_detail order by id_detail asc');
        $result[0]="-- Pilih Urutan id_detail --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_detail]= $row->$value;
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
