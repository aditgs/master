<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pelunasan_piutang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function ceknomornull(){
          // $this->db->select('*');
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('pelunasan_piutang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getbanks($id){
        $this->db->where('id', $id);
        $result = $this->db->get('banks');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function savebanks($data){
        $this->db->insert('bank', $data);
    }
    function get_all($limit, $uri) {

        $result = $this->db->get('pelunasan_piutang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('pelunasan_piutang');
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

        $result=$this->db->get('pelunasan_piutang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getsalesfaktur($faktur){
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('sales_trx');
       
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getpakanfaktur($faktur){
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('recording_pakan');
       
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getcs($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('customer');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function savepiutang($data){
        $this->db->insert('kartupiutang',$data);
    }
    function save() {
        // $piutang=!empty($this->input->post('piutang'))?$this->input->post('piutang'):0;
        $default=$this->session->flashdata('default');
        $piutang=$default['piutang'];
        $bayar=!empty($this->input->post('bayar'))?$this->input->post('bayar'):0;
        $sisa=$piutang-$bayar;
            $plafon=$default['plafon'];
           $akun=$default['akun'];

           $data = array(
        
            'faktur' => $default['faktur'],
           
            'faktur_ref' => $default['faktur_ref'],
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tempohari' => $this->input->post('tempohari', TRUE),
           
            'jthtempo' => $this->input->post('jthtempo', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'plafon' => $default['plafon'],
            'akun' => $default['akun'],
           
            'piutang' => $default['piutang'],
           
            'bayar' => $this->input->post('bayar', TRUE),
           
            'sisa' => $sisa,
           
            'userid' =>userid(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('pelunasan_piutang', $data);
    }
    function save_detail($data){
        $this->db->insert('pelunasan_piutang_detail',$data);
    }
    function update($id) {
        $piutang=!empty($this->input->post('piutang'))?$this->input->post('piutang'):0;
        $bayar=!empty($this->input->post('bayar'))?$this->input->post('bayar'):0;
        $sisa=$piutang-$bayar;
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_ref' => $this->input->post('faktur_ref', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tempohari' => $this->input->post('tempohari', TRUE),
       
       'jthtempo' => $this->input->post('jthtempo', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'plafon' => $this->input->post('plafon', TRUE),
       'akun' => $this->input->post('akun', TRUE),
       
       'piutang' => $this->input->post('piutang', TRUE),
       
       'bayar' => $this->input->post('bayar', TRUE),
       
       'sisa' => $sisa,
       
       'userid' =>userid(),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('pelunasan_piutang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pelunasan_piutang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('pelunasan_piutang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('pelunasan_piutang_detail');   
    }
    function dropdown_banks(){
       $result = array();
    
        $array_keys_values = $this->db->query("SELECT * from banks");
        if($array_keys_values->num_rows()>0){
          $result[0]="-- Pilih Rekening Bank --";
          
          foreach ($array_keys_values->result() as $row)
          {
              $result[$row->id]= $row->Keterangan." (".$row->Kode.")";
          }
        }else{
          
          $result[0]="-- Pilih Rekening Bank --";
        }
        return $result;
    }
    function dropdown_customer($id=null){
        $result = array();
        if($id!=null||!empty($id)){
            $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="MT" and id="'.$id.'"order by id asc');
        }else{

            $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="MT" order by id asc');
            $result[0]="-- Pilih Customer --";
        }
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from pelunasan_piutang order by id asc');
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
