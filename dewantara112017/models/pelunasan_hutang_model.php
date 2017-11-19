<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pelunasan_hutang_model extends CI_Model {

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

        $result=$this->db->get('pelunasan_hutang');
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

        $result = $this->db->get('pelunasan_hutang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('pelunasan_hutang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getonetrxbelifaktur($faktur) {
        $this->db->where('faktur_pt', $faktur);
        $result = $this->db->get('purchase_transaction');
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

        $result=$this->db->get('pelunasan_hutang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
                'faktur' => $this->input->post('faktur', TRUE),
               'faktur_ref' => $this->input->post('faktur_ref', TRUE),
               'faktur_trx' => $this->input->post('faktur_trx', TRUE),
               'tanggal' => $this->input->post('tanggal', TRUE),
               'tempohari' => $this->input->post('tempohari', TRUE),
               'jthtempo' => $this->input->post('jthtempo', TRUE),
               'akun_hutang' => $this->input->post('akun_hutang', TRUE),
               'id_supplier' => $this->input->post('id_supplier', TRUE),
               'id_customer' => $this->input->post('id_customer', TRUE),
               'plafon' => $this->input->post('plafon', TRUE),
               'hutang' => $this->input->post('hutang', TRUE),
               'bayar' => $this->input->post('bayar', TRUE),
               'sisa' => $this->input->post('sisa', TRUE),
               'userid' => userid(),
               'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('pelunasan_hutang', $data);
    }
    function savepelunasan($data){
        $this->db->insert('pelunasan_hutang', $data);
    }
    function save_detail($data){
        $this->db->insert('pelunasan_hutang_detail',$data);
    }
    function update($id) {
        $data = array(
            'id' => $this->input->post('id',TRUE),
           'faktur' => $this->input->post('faktur', TRUE),
           'faktur_ref' => $this->input->post('faktur_ref', TRUE),
           'faktur_trx' => $this->input->post('faktur_trx', TRUE),
           'tanggal' => $this->input->post('tanggal', TRUE),
           'tempohari' => $this->input->post('tempohari', TRUE),
           'jthtempo' => $this->input->post('jthtempo', TRUE),
           'akun_hutang' => $this->input->post('akun_hutang', TRUE),
           'id_banks' => $this->input->post('id_banks', TRUE),
           'id_supplier' => $this->input->post('id_supplier', TRUE),
           'id_customer' => $this->input->post('id_customer', TRUE),
           'plafon' => $this->input->post('plafon', TRUE),
           'hutang' => $this->input->post('hutang', TRUE),
           'bayar' => $this->input->post('bayar', TRUE),
           'sisa' => $this->input->post('sisa', TRUE),
           'userid' => userid(),
           'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('pelunasan_hutang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pelunasan_hutang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('pelunasan_hutang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('pelunasan_hutang_detail');

         
      
       
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
    
    function drophutang_cs(){
        $result = array();
    
        $array_keys_values = $this->db->query("SELECT b.id,b.Kode,b.Nama,a.idcs FROM customer AS b INNER JOIN `00-00-24-00-view-hutang-customer` AS a ON a.idcs = b.id group by b.id");
        if($array_keys_values->num_rows()>0){
          $result[0]="-- Pilih Customer --";
          
          foreach ($array_keys_values->result() as $row)
          {
              $result[$row->id]= $row->Nama." (".$row->Kode.")";
          }
        }else{
          
          $result[0]="-- Pilih Customer --";
        }
        return $result;
    }
  function drophutang_sp(){
        $result = array();
       
            $array_keys_values = $this->db->query("SELECT b.id,b.Kode,b.Nama,a.idsp FROM supplier AS b INNER JOIN `00-00-24-00-view-hutang-supplier` AS a ON a.idsp = b.id group by b.id");

            $result[0]="-- Pilih Supplier --";
       
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
        $array_keys_values = $this->db->query('select id, '.$value.' from pelunasan_hutang order by id asc');
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
