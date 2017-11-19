<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Bank_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('bank', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('bank');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_total_detail($bukti) {
        $this->db->where('bukti_bank', $bukti);
        $result = $this->db->get('00-00-09-02-view-total-detail-bank');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function get_total_giro($bukti) {
        $this->db->where('bukti_bank', $bukti);
        $result = $this->db->get('00-00-09-04-view-total-tt-giro');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function get_last_bk(){

        $this->db->select('id,bukti_bank');
        $this->db->where('first','BK');
        $this->db->where('tipe_trx','K');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-09-01-view-bank-kode');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function get_onebyfaktur($faktur) {
        $this->db->where('faktur_pt', $faktur);
        $result = $this->db->get('purchase_transaction');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_onebyfaktur_sales($faktur) {
        $this->db->where('faktur', $faktur);
        $result = $this->db->get('sales_trx');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_onedetailbyfaktur($faktur) {
        $this->db->where('pt', $faktur);
        $result = $this->db->get('purchase_transaction_detail');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_onedetail($id) {
        $this->db->where('id_detail', $id);
        $result = $this->db->get('purchase_transaction_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function get_last_bm(){

        $this->db->select('id,bukti_bank');
         $this->db->where('first','BM');
        $this->db->where('tipe_trx','D');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('00-00-09-01-view-bank-kode');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'bukti_bank' => $this->input->post('bukti_bank', TRUE),
           
            'tipe_trx' => $this->input->post('tipe_trx', TRUE),
           
            'akun_bank' => $this->input->post('akun_bank', TRUE),
           
            'id_bank' => $this->input->post('id_bank', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'tgl_bank' => $this->input->post('tgl_bank', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'total_bank' => $this->input->post('total_bank', TRUE),
           
            'total_giro' => $this->input->post('total_giro', TRUE),
           
            'ref' => $this->input->post('ref', TRUE),
           
            'user_id' => $this->session->userdata('user_id'),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('bank', $data);
        return $this->db->insert_id();

    }

    function save_detail($data){
        $this->db->insert('bank_detail',$data);
    }
     function save_tt_giro($data) {
           
        $this->db->insert('bank_giro', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'bukti_bank' => $this->input->post('bukti_bank', TRUE),
       
       'tipe_trx' => $this->input->post('tipe_trx', TRUE),
       
       'akun_bank' => $this->input->post('akun_bank', TRUE),
       
       'id_bank' => $this->input->post('id_bank', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'tgl_bank' => $this->input->post('tgl_bank', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'total_bank' => $this->input->post('total_bank', TRUE),
       
       'total_giro' => $this->input->post('total_giro', TRUE),
       
       'ref' => $this->input->post('ref', TRUE),
       
       'user_id' => $this->session->userdata('user_id'),
       
       'datetime' =>  date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('bank', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
     function update_giro($bukti,$id_trx) {
        $data = array(
           'id_trx_bank' => $id_trx,
           'user_id' => $this->session->userdata('user_id'),
           'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('bukti_bank', $bukti);
        $this->db->update('bank_giro', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('bank'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('bank_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('bukti_bank', $bukti);
        $this->db->delete('bank_detail');

         
        $this->db->where('bukti_bank', $bukti);
        $this->db->delete('bank_giro'); 
       
    }
    function dropdown_supplier(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->nama.")";
        }
        return $result;
    }
    function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` order by id asc');
        $result[0]="-- Pilih Customer --";
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
        $array_keys_values = $this->db->query('select id, '.$value.' from bank order by id asc');
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
    