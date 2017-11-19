<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Harga_barang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('harga_barang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('harga_barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getbeli_pricetab($id,$satuan=null){
        if(!empty($satuan)||$satuan>0){
            if($satuan==1||$satuan=='1'){
                $this->db->select('id_barang,hb1 as harga_baru');
            }elseif($satuan==2||$satuan=='2'){
                $this->db->select('id_barang,hb2 as harga_baru');

            }else{
                $this->db->select('id_barang,hb3 as harga_baru');
            }
        }else{
            $this->db->select('id_barang,hb1 as harga_baru');
        }

        $this->db->where('id_barang', $id);
        $result = $this->db->get('00-00-01-13-view-barang-harga-table');
        if ($result->num_rows() == 1) {
      
            return $result->row_array();
     

        } else {
            return array();
        }
    }
    function getjual_pricetab($id,$satuan=null){
        if(!empty($satuan)||$satuan>0){
            if($satuan==1||$satuan=='1'){
                $this->db->select('id_barang,hj1r as harga_baru');
            }elseif($satuan==2||$satuan=='2'){
                $this->db->select('id_barang,hj2r as harga_baru');

            }else{
                $this->db->select('id_barang,hj3r as harga_baru');
            }
        }else{
            $this->db->select('id_barang,hj1r as harga_baru');
        }

        $this->db->where('id_barang', $id);
        $result = $this->db->get('00-00-01-13-view-barang-harga-table');
        if ($result->num_rows() == 1) {
      
            return $result->row_array();
     

        } else {
            return array();
        }
    }
    function getbeli_lastprice($id,$satuan=null,$active=FALSE,$jenis=null){
        $this->db->select('id as last_id,id_barang,id_satuan,harga_baru');

        $this->db->where('id_barang', $id);
        $this->db->where('id_satuan', $satuan);
        $this->db->where('jenis_harga', 'beli');

        $this->db->order_by('id desc');
        $this->db->limit(1);
        

        if(!empty($active)||$active==TRUE){

            $this->db->where('is_active','1');
        }
        $result = $this->db->get('harga_barang');
        // return ($this->db->last_query());
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getjual_lastprice($id,$satuan=null,$active=FALSE,$jenis=null){
        $this->db->select('id as last_id,id_barang,id_satuan,harga_baru');

        $this->db->where('id_barang', $id);
        $this->db->where('id_satuan', $satuan);
        $this->db->where('jenis_harga', 'jual');

        $this->db->order_by('id desc');
        $this->db->limit(1);
        

        if(!empty($active)||$active==TRUE){

            $this->db->where('is_active','1');
        }
        $result = $this->db->get('harga_barang');
        // return ($this->db->last_query());
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
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'jenis_harga' => $this->input->post('jenis_harga', TRUE),
           
            'harga_lama' => $this->input->post('harga_lama', TRUE),
           
            'harga_baru' => $this->input->post('harga_baru', TRUE),
           
            'userid' => userid(),
           
            'tgl_aktif' => $this->input->post('tgl_aktif', TRUE),
           
            'tgl_nonaktif' => $this->input->post('tgl_nonaktif', TRUE),
           
            'is_active' => $this->input->post('is_active', TRUE),
           
            'is_delete' => $this->input->post('is_delete', TRUE),
           
            'is_syarat' => $this->input->post('is_syarat', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('harga_barang', $data);
    }
    function save_detail($data){
        $this->db->insert('harga_barang_detail',$data);
    }
    function update_hargabarang($id,$data){
        $this->db->where('id_barang',$id);
        $this->db->update('harga_barang', $data);
    }
    function update_hargatable($id,$data){
        $this->db->where('id_barang',$id);
        $this->db->update('barang_harga', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_reff' => $this->input->post('faktur_reff', TRUE),
       
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'id_satuan' => $this->input->post('id_satuan', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'jenis_harga' => $this->input->post('jenis_harga', TRUE),
       
       'harga_lama' => $this->input->post('harga_lama', TRUE),
       
       'harga_baru' => $this->input->post('harga_baru', TRUE),
       
       'userid' => userid(),
       
       'tgl_aktif' => $this->input->post('tgl_aktif', TRUE),
       
       'tgl_nonaktif' => $this->input->post('tgl_nonaktif', TRUE),
       
       'is_active' => $this->input->post('is_active', TRUE),
       
       'is_delete' => $this->input->post('is_delete', TRUE),
       
       'is_syarat' => $this->input->post('is_syarat', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('harga_barang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
    function save_harga($data){
        // $this->db->where('id', $id);
        $this->db->insert('harga_barang', $data);
        
    }
     function save_harga_batch($data) {
        $this->db->insert_batch('harga_barang', $data);
        
        return $this->db->insert_id();

    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('harga_barang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('harga_barang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('harga_barang_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from harga_barang order by id asc');
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
