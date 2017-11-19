<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kartustok_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kartustok', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kartustok');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_last(){

        $this->db->select('faktur');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('kartustok');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getlaporan_faktur($data=null,$query=null){
        // $result = $this->db->get('barang', $limit, $uri);
        $limit=$data['limit'];
        $uri=$data['uri'];
        $result = $this->db->get('00-00-01-00-view-barang',$limit,$uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_barang($limit,$start){
        $result = $this->db->get('00-00-01-00-view-barang', $limit, $start);
        // $result = $this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_kartustok($id=null){
        $this->db->where('id',$id);
        $result = $this->db->get('00-00-25-04-kartustok-barang-rekap');
        // $result = $this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_kartustok_detail($id=null){
        $this->db->where('id',$id);
        $result = $this->db->get('00-00-25-07-kartustok-barang-nosum');
        // $result = $this->db->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function getRows($params = array())
    {
        // $this->db->select('*');
        // $this->db->from('00-00-01-00-view-barang');
        $this->db->order_by('id');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get('00-00-01-00-view-barang');
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_ref' => $this->input->post('faktur_ref', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'akun' => $this->input->post('akun', TRUE),
           
            'tipe_kartustok' => $this->input->post('tipe_kartustok', TRUE),
           
            'tipe' => $this->input->post('tipe', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'id_gudang' => $this->input->post('id_gudang', TRUE),
            'id_kandang' => $this->input->post('id_kandang', TRUE),
            'harga' => $this->input->post('harga', TRUE),
            'hpp' => $this->input->post('hpp', TRUE),
            'debet' => $this->input->post('debet', TRUE),
           
            'kredit' => $this->input->post('kredit', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
             'user_id' =>userid(),
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('kartustok', $data);
    }
    function save_stok($data) {
          
        $this->db->insert('kartustok', $data);
    }
    function save_stok_batch($data) {
          
        $this->db->insert_batch('kartustok', $data);
    }
    function save_detail($data){
        $this->db->insert('kartustok_detail',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_ref' => $this->input->post('faktur_ref', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'akun' => $this->input->post('akun', TRUE),
       
       'tipe_kartustok' => $this->input->post('tipe_kartustok', TRUE),
       
       'tipe' => $this->input->post('tipe', TRUE),
       
       'jumlah' => $this->input->post('jumlah', TRUE),
       
       'id_barang' => $this->input->post('id_barang', TRUE),
       
       'id_satuan' => $this->input->post('id_satuan', TRUE),
        'id_gudang' => $this->input->post('id_gudang', TRUE),
        'id_kandang' => $this->input->post('id_kandang', TRUE),
        'harga' => $this->input->post('harga', TRUE),
        'hpp' => $this->input->post('hpp', TRUE),
       'debet' => $this->input->post('debet', TRUE),
       
       'kredit' => $this->input->post('kredit', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
        'user_id' =>userid(),
        'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('kartustok', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kartustok'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('kartustok_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('kartustok_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from kartustok order by id asc');
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
