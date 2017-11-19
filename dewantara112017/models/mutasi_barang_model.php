<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Mutasi_barang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('mutasi_barang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('mutasi_barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function get_last(){

        $this->db->select('id,faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('mutasi_barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_reff' => $this->input->post('faktur_reff', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tipe' => $this->input->post('tipe', TRUE),
            'id_gd_asal' => $this->input->post('id_gd_asal', TRUE),
           
            'id_gd_tujuan' => $this->input->post('id_gd_tujuan', TRUE),
           
            'id_kdg_asal' => $this->input->post('id_kdg_asal', TRUE),
           
            'id_kdg_tujuan' => $this->input->post('id_kdg_tujuan', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'user_id' => userid(),
           
            'datetime' => now(),
           
        );
        $this->db->insert('mutasi_barang', $data);
    }
    function save_mutasi($data) {
        $this->db->insert('mutasi_barang', $data);
    } 
    function save_batch($data){
        $this->db->insert_batch('mutasi_barang', $data);
    }

    function save_detail($data){
        $this->db->insert('mutasi_barang_detail',$data);
    } 
    function save_detail_batch($data){
        $this->db->insert_batch('mutasi_barang_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'id_gd_asal' => $this->input->post('id_gd_asal', TRUE),
       
       'id_gd_tujuan' => $this->input->post('id_gd_tujuan', TRUE),
       
       'id_kdg_asal' => $this->input->post('id_kdg_asal', TRUE),
       
       'id_kdg_tujuan' => $this->input->post('id_kdg_tujuan', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'user_id' => userid(),
       
       'datetime' => now(),
       
        );
        $this->db->where('id', $id);
        $this->db->update('mutasi_barang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('mutasi_barang'); 
       
    } 
    function delete_byfaktur($faktur) {
        $this->db->where('faktur_reff', $faktur);
        $this->db->delete('mutasi_barang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('mutasi_barang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('mutasi_barang_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from mutasi_barang order by id asc');
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
