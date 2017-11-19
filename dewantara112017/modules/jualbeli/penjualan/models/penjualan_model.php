<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Penjualan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('penjualan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
        $this->db->select('Faktur'); //Faktur
        $this->db->where('datetime',NULL);
        $this->db->where('Tgl',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('penjualan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('Faktur'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('penjualan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('Faktur,sum(Jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('penjualan_detail');
        $this->db->where('Faktur',$faktur); //field perlu disesuaikan dengan tabel
        $this->db->where('isactive',1);
        $this->db->group_by('Faktur'); //field perlu disesuaikan dengan tabel
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }

    }
    //fungsi dibawah ini biasanya digunakan untuk laporan
    //field dan tabel perlu disesuaikan dengan tabel
    function getdetail($data) {
        $this->db->select('id,Faktur as faktur,Jthtmp as jthtempo,NoBon as nobon,Supplier as kode,total,NmSupplier as nama,NoAccSup as noacc,Tgl as tanggal,IF(LEFT(NoAccSup,5)="1.700","Karyawan",IF(LEFT(NoAccSup,5)="1.250","Customer",IF(LEFT(NoAccSup,5)="2.300","Supplier","-"))) as tipe',FALSE);
        $this->db->from('penjualan');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('Supplier',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
            // return array('sql'=>$this->db->last_query(),'result'=>$result);
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function genfaktur(){
        $last=$this->get_last();
        // print_r($last);
        if(!empty($last)):
            $faktur=genfaktur($last['Faktur'],"PJ");//diganti sesuai faktur/kode transaksi
        else:
            $faktur="PJ".date('ym')."00001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($faktur);
    }
    function getbarang($kode){
        $this->db->where('id', $kode);
        $result = $this->db->get('barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getsatuan($id){
        $this->db->where('id', $id);
        $result = $this->db->get('satuan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('penjualan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('penjualan', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('penjualan', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
        $data = array(
        
            'Faktur' => $this->genfaktur(),
            'FakturAsli' => $this->input->post('FakturAsli', TRUE), //Kena Pajak Atau Tidak
            'Tgl' => $this->input->post('Tgl', TRUE),
            'Jthtmp' => $this->input->post('Jthtmp', TRUE),
            'Term' => $this->input->post('Term', TRUE),
            'Customer' => $this->input->post('Customer', TRUE),
            'NmCustomer' => $this->input->post('NmCustomer', TRUE),
            'cAccPiutang' => $this->input->post('cAccPiutang', TRUE),
            'Gudang' => $this->input->post('Gudang', TRUE),
            'cKeterangan' => $this->input->post('cKeterangan', TRUE),
            'Salesman' => $this->input->post('Salesman', TRUE),
            'Mitra' => $this->input->post('Mitra', TRUE),
            'NmMitra' => $this->input->post('NmMitra', TRUE),
            'GudangMT' => $this->input->post('GudangMT', TRUE),
            'NmGudangMT' => $this->input->post('NmGudangMT', TRUE),
            'Kandang' => $this->input->post('Kandang', TRUE),
            'NmKandang' => $this->input->post('NmKandang', TRUE),
            'PersPPn' => $this->input->post('PersPPn', TRUE),
            'PersDiscount' => $this->input->post('PersDiscount', TRUE),
            'PersDiscount2' => $this->input->post('PersDiscount2', TRUE),
            'PersDiscount3' => $this->input->post('PersDiscount3', TRUE),
            'SubTotal' => $this->input->post('SubTotal', TRUE),
            'PPn' => $this->input->post('PPn', TRUE),
            'Discount' => $this->input->post('Discount', TRUE),
            'Discount2' => $this->input->post('Discount2', TRUE),
            'Discount3' => $this->input->post('Discount3', TRUE),
            'Pembulatan' => $this->input->post('Pembulatan', TRUE),
            'Ongkos' => $this->input->post('Ongkos', TRUE),
            'Total' => $this->input->post('Total', TRUE),
            'Tunai' => $this->input->post('Tunai', TRUE),
            'Kas' => $this->input->post('Kas', TRUE),
            'Bank' => $this->input->post('Bank', TRUE),
            'Piutang' => $this->input->post('Piutang', TRUE),
            'Lunas' => $this->input->post('Lunas', TRUE),
            'Retur' => $this->input->post('Retur', TRUE),
            'DiscLunas' => $this->input->post('DiscLunas', TRUE),
            'Biaya' => $this->input->post('Biaya', TRUE),
            'Sisa' => $this->input->post('Sisa', TRUE),
            'SLunas' => $this->input->post('SLunas', TRUE),
            'SRetur' => $this->input->post('SRetur', TRUE),
            'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
            'Status' => $this->input->post('Status', TRUE),
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
            'lVoid' => $this->input->post('lVoid', TRUE),
            'lPosted' => 1,
            'User' => strtoupper($username),
            'userid' => userid(),
            'datetime' => date('Y-m-d H:i:s'),
            'Time' => date('Y-m-d H:i:s'),
            'isdeleted' => null,
            'datedeleted' => null,
            'islocked' =>1,
            'isactive' => 1,
        );
        
        return $data;
    }
    function __saveas(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
       $data = array(
        
            'Faktur' => $this->input->post('Faktur', TRUE),
            'FakturAsli' => $this->input->post('FakturAsli', TRUE),
            'Tgl' => $this->input->post('Tgl', TRUE),
            'Jthtmp' => $this->input->post('Jthtmp', TRUE),
            'Term' => $this->input->post('Term', TRUE),
            'Customer' => $this->input->post('Customer', TRUE),
            'NmCustomer' => $this->input->post('NmCustomer', TRUE),
            'cAccPiutang' => $this->input->post('cAccPiutang', TRUE),
            'Gudang' => $this->input->post('Gudang', TRUE),
            'cKeterangan' => $this->input->post('cKeterangan', TRUE),
            'Salesman' => $this->input->post('Salesman', TRUE),
            'Mitra' => $this->input->post('Mitra', TRUE),
            'NmMitra' => $this->input->post('NmMitra', TRUE),
            'GudangMT' => $this->input->post('GudangMT', TRUE),
            'NmGudangMT' => $this->input->post('NmGudangMT', TRUE),
            'Kandang' => $this->input->post('Kandang', TRUE),
            'NmKandang' => $this->input->post('NmKandang', TRUE),
            'PersPPn' => $this->input->post('PersPPn', TRUE),
            'PersDiscount' => $this->input->post('PersDiscount', TRUE),
            'PersDiscount2' => $this->input->post('PersDiscount2', TRUE),
            'PersDiscount3' => $this->input->post('PersDiscount3', TRUE),
            'SubTotal' => $this->input->post('SubTotal', TRUE),
            'PPn' => $this->input->post('PPn', TRUE),
            'Discount' => $this->input->post('Discount', TRUE),
            'Discount2' => $this->input->post('Discount2', TRUE),
            'Discount3' => $this->input->post('Discount3', TRUE),
            'Pembulatan' => $this->input->post('Pembulatan', TRUE),
            'Ongkos' => $this->input->post('Ongkos', TRUE),
            'Total' => $this->input->post('Total', TRUE),
            'Tunai' => $this->input->post('Tunai', TRUE),
            'Kas' => $this->input->post('Kas', TRUE),
            'Bank' => $this->input->post('Bank', TRUE),
            'Piutang' => $this->input->post('Piutang', TRUE),
            'Lunas' => $this->input->post('Lunas', TRUE),
            'Retur' => $this->input->post('Retur', TRUE),
            'DiscLunas' => $this->input->post('DiscLunas', TRUE),
            'Biaya' => $this->input->post('Biaya', TRUE),
            'Sisa' => $this->input->post('Sisa', TRUE),
            'SLunas' => $this->input->post('SLunas', TRUE),
            'SRetur' => $this->input->post('SRetur', TRUE),
            'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
            'Status' => $this->input->post('Status', TRUE),
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
            'lVoid' => $this->input->post('lVoid', TRUE),
            'lPosted' => 1,
            'isdeleted' => null,
            'datedeleted' => null,
            'islocked' => 1,
            'isactive' => 1,
            'User' => strtoupper($username),
            'userid' => userid(),
            'datetime' => date('Y-m-d H:i:s'),
            'Time' => NOW(),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        //    'userid' => userid(),
        //    'datetime' => NOW(),
        //    'Time' => NOW(),
        return $data;
    }
    function savepenjualan($data){
        $this->db->insert('penjualan',$data);
    }
    function save_detail($data){
        $this->db->insert('penjualan_detail',$data);
    }
    function upddel_detail($id=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
       
    } 
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
    }
    function update($id) {
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        $data = array(
        // 'id' => $this->input->post('id',TRUE),
        // 'Faktur' => $this->input->post('Faktur', TRUE),
        'FakturAsli' => $this->input->post('FakturAsli', TRUE),
        'Tgl' => $this->input->post('Tgl', TRUE),
        'Jthtmp' => $this->input->post('Jthtmp', TRUE),
        'Term' => $this->input->post('Term', TRUE),
        'Customer' => $this->input->post('Customer', TRUE),
        'NmCustomer' => $this->input->post('NmCustomer', TRUE),
        'cAccPiutang' => $this->input->post('cAccPiutang', TRUE),
        'Gudang' => $this->input->post('Gudang', TRUE),
        'cKeterangan' => $this->input->post('cKeterangan', TRUE),
        'Salesman' => $this->input->post('Salesman', TRUE),
        'Mitra' => $this->input->post('Mitra', TRUE),
        'NmMitra' => $this->input->post('NmMitra', TRUE),
        'GudangMT' => $this->input->post('GudangMT', TRUE),
        'NmGudangMT' => $this->input->post('NmGudangMT', TRUE),
        'Kandang' => $this->input->post('Kandang', TRUE),
        'NmKandang' => $this->input->post('NmKandang', TRUE),
        'PersPPn' => $this->input->post('PersPPn', TRUE),
        'PersDiscount' => $this->input->post('PersDiscount', TRUE),
        'PersDiscount2' => $this->input->post('PersDiscount2', TRUE),
        'PersDiscount3' => $this->input->post('PersDiscount3', TRUE),
        'SubTotal' => $this->input->post('SubTotal', TRUE),
        'PPn' => $this->input->post('PPn', TRUE),
        'Discount' => $this->input->post('Discount', TRUE),
        'Discount2' => $this->input->post('Discount2', TRUE),
        'Discount3' => $this->input->post('Discount3', TRUE),
        'Pembulatan' => $this->input->post('Pembulatan', TRUE),
        'Ongkos' => $this->input->post('Ongkos', TRUE),
        'Total' => $this->input->post('Total', TRUE),
        'Tunai' => $this->input->post('Tunai', TRUE),
        'Kas' => $this->input->post('Kas', TRUE),
        'Bank' => $this->input->post('Bank', TRUE),
        'Piutang' => $this->input->post('Piutang', TRUE),
        'Lunas' => $this->input->post('Lunas', TRUE),
        'Retur' => $this->input->post('Retur', TRUE),
        'DiscLunas' => $this->input->post('DiscLunas', TRUE),
        'Biaya' => $this->input->post('Biaya', TRUE),
        'Sisa' => $this->input->post('Sisa', TRUE),
        'SLunas' => $this->input->post('SLunas', TRUE),
        'SRetur' => $this->input->post('SRetur', TRUE),
        'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
        'Status' => $this->input->post('Status', TRUE),
        'cNoJrn' => $this->input->post('cNoJrn', TRUE),
        'lVoid' => $this->input->post('lVoid', TRUE),
        'lPosted' => 1,
        'isdeleted' => null,
        'datedeleted' => null,
        'islocked' => 1,
        'isactive' => 1,
        'User' => strtoupper($username),
        'userid' => userid(),
        'datetime' => date('Y-m-d H:i:s'),
        'Time' => NOW(),

        );
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('penjualan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('penjualan_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('penjualan_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from penjualan order by id asc');
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
