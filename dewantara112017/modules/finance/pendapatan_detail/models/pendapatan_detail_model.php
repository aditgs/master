<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pendapatan_detail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('pendapatan_detail', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*');
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('pendapatan_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('pendapatan_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
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
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('pendapatan_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'kode' => $this->input->post('kode', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'rekening' => $this->input->post('rekening', TRUE),
           
            'ket' => $this->input->post('ket', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'status' => $this->input->post('status', TRUE),
           
            'isdeleted' => $this->input->post('isdeleted', TRUE),
           
            'datedeleted' => $this->input->post('datedeleted', TRUE),
           
            'islocked' => $this->input->post('islocked', TRUE),
           
            'isactive' => $this->input->post('isactive', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('pendapatan_detail', $data);
    }
    function savependapatan_detail($data){
        $this->db->insert('pendapatan_detail',$data);
    }
    function save_detail($data){
        $this->db->insert('pendapatan_detail_detail',$data);
    }
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('pendapatan_detail', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'kode' => $this->input->post('kode', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'rekening' => $this->input->post('rekening', TRUE),
       
       'ket' => $this->input->post('ket', TRUE),
       
       'jumlah' => $this->input->post('jumlah', TRUE),
       
       'status' => $this->input->post('status', TRUE),
       
       'isdeleted' => $this->input->post('isdeleted', TRUE),
       
       'datedeleted' => $this->input->post('datedeleted', TRUE),
       
       'islocked' => $this->input->post('islocked', TRUE),
       
       'isactive' => $this->input->post('isactive', TRUE),
       
       'userid' => $this->input->post('userid', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('pendapatan_detail', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pendapatan_detail'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('pendapatan_detail_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('pendapatan_detail_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from pendapatan_detail order by id asc');
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
