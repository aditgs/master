<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*UPDATE FROM MAIN MODULE Copied on 25/12/2016*/
class Kartupiutang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kartupiutang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('kartupiutang');
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

        $result=$this->db->get('kartupiutang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function ceksaldodebet($akun){
       $this->db->where('akun_hutang', $akun);
        $result = $this->db->get('00-00-24-01-view-piutang-sum-saldodebet');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function ceksaldodebetbyfaktur($data){
        // print_r($data);
         $this->db->where('akun_hutang', $data['akun_hutang']);
         // $this->db->where('id', $id);
         $this->db->where('faktur_trx', $data['faktur_ref']);
         $this->db->order_by('id','DESC');
         $this->db->limit(1);
         // $this->db->where('faktur_ref', $data['faktur_ref']);
        $result = $this->db->get('00-00-24-15-view-piutang-sum-saldodebetbyfaktur');
        if ($result->num_rows()==1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function ceksaldokredit($akun){
         $this->db->where('akun_hutang', $akun);
        $result = $this->db->get('00-00-24-01-view-piutang-sum-saldokredit');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function ceksaldorekening($akun){

        $this->db->select('faktur,noacc,saldo');
        $this->db->where('noacc', $akun);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $result = $this->db->get('saldorekening');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getrekap_piutang($data){
        if(!empty($data['id_customer'])||$data['id_customer']>0){
                $this->db->where('id_customer',!empty($data['id_customer'])?$data['id_customer']:0);
        }
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-02-view-rekap-piutang-customer');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getlaporan_piutang($data){
        $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        if(!empty($data['id_customer'])||$data['id_customer']>0){
                $this->db->where('id_customer',!empty($data['id_customer'])?$data['id_customer']:0);
        }
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-00-view-piutang-customer');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getsummary(){
        
     
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-05-view-summary-piutang-customer');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getpelunasan($faktur){
        
        $this->db->where('fakturlunas',$faktur);
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-03-view-pelunasan-piutang');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getcustomertempo($data){
        $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        if(!empty($data['id_customer'])||$data['id_customer']>0){
                $this->db->where('id_customer',!empty($data['id_customer'])?$data['id_customer']:0);
        }
        $this->db->group_by('id_customer');
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-06-view-piutang-jatuhtempo');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getjatuhtempodetail($data){
        $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        if(!empty($data['id_customer'])||$data['id_customer']>0){
                $this->db->where('id_customer',!empty($data['id_customer'])?$data['id_customer']:0);
        }
        $this->db->order_by('id','asc');
        $result = $this->db->get('00-00-24-06-view-piutang-jatuhtempo');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function getsalestrxdetail($faktur){
        $this->db->where('faktur',$faktur);
        $this->db->order_by('id_detail','asc');
        $result = $this->db->get('00-00-19-01-view-sales-trx-detail');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'faktur' => $this->input->post('faktur', TRUE),
           
            'faktur_ref' => $this->input->post('faktur_ref', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'tgltempo' => $this->input->post('tgltempo', TRUE),
           
            'akun' => $this->input->post('akun', TRUE),
           
            'akun_hutang' => $this->input->post('akun_hutang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_customer' => $this->input->post('id_customer', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'id_mitra' => $this->input->post('id_mitra', TRUE),
           
            'id_gudang' => $this->input->post('id_gudang', TRUE),
           
            'id_kandang' => $this->input->post('id_kandang', TRUE),
           
            'mutasidebet' => $this->input->post('mutasidebet', TRUE),
           
            'mutasikredit' => $this->input->post('mutasikredit', TRUE),
           
            'saldodebet' => $this->input->post('saldodebet', TRUE),
           
            'saldokredit' => $this->input->post('saldokredit', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('kartupiutang', $data);
    }
    function save_detail($data){
        $this->db->insert('kartupiutang_detail',$data);
    } 
    function savepiutang($data){
        $this->db->insert('kartupiutang',$data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'faktur' => $this->input->post('faktur', TRUE),
       
       'faktur_ref' => $this->input->post('faktur_ref', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'tgltempo' => $this->input->post('tgltempo', TRUE),
       
       'akun' => $this->input->post('akun', TRUE),
       
       'akun_hutang' => $this->input->post('akun_hutang', TRUE),
       
       'jumlah' => $this->input->post('jumlah', TRUE),
       
       'id_customer' => $this->input->post('id_customer', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'id_mitra' => $this->input->post('id_mitra', TRUE),
       
       'id_gudang' => $this->input->post('id_gudang', TRUE),
       
       'id_kandang' => $this->input->post('id_kandang', TRUE),
       
       'mutasidebet' => $this->input->post('mutasidebet', TRUE),
       
       'mutasikredit' => $this->input->post('mutasikredit', TRUE),
       
       'saldodebet' => $this->input->post('saldodebet', TRUE),
       
       'saldokredit' => $this->input->post('saldokredit', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('kartupiutang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
    function updatepiutang($id,$data){
        $this->db->where('id', $id);
        $this->db->update('kartupiutang', $data);
    }
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('kartupiutang'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
      
        $this->db->delete('kartupiutang_detail'); 
       
    } 
    function delete_by_bukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('kartupiutang_detail');

         
      
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from kartupiutang order by id asc');
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
