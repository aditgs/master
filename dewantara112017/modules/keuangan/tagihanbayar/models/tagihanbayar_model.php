<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tagihanbayar_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('tagihanbayar', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          $this->db->select('kode'); //Faktur
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('tagihanbayar');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('kode'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('tagihanbayar');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('tagihanbayar');
        $this->db->where('faktur',$faktur); //field perlu disesuaikan dengan tabel
        $this->db->where('isactive',1);
        $this->db->group_by('faktur'); //field perlu disesuaikan dengan tabel
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
        $this->db->from('tagihanbayar');
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
            $faktur=genfaktur($last['kode'],"PAY",3);//diganti sesuai faktur/kode transaksi
        else:
            $faktur="PAY".date('ym')."0001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($faktur);
    }
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('tagihanbayar');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('tagihanbayar', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('tagihanbayar', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
           
            'invoice' => $this->input->post('invoice', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'bank' => $this->input->post('bank', TRUE),
           
            'refbank' => $this->input->post('refbank', TRUE),
           
            'tglbank' => $this->input->post('tglbank', TRUE),
           
            'totalbayar' => $this->input->post('totalbayar', TRUE),
           
            'sisabayar' => $this->input->post('sisabayar', TRUE),
           
            'totaltagihan' => $this->input->post('totaltagihan', TRUE),
           
            'sisatagihan' => $this->input->post('sisatagihan', TRUE),
           
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
           
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
           
            'isactive' => $this->input->post('isactive', TRUE),
           
            'islocked' => $this->input->post('islocked', TRUE),
           
            'isdeleted' => $this->input->post('isdeleted', TRUE),
           
            'datedeleted' => $this->input->post('datedeleted', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
           
            'invoice' => $this->input->post('invoice', TRUE),
           
            'tanggal' => $this->input->post('tanggal', TRUE),
           
            'bank' => $this->input->post('bank', TRUE),
           
            'refbank' => $this->input->post('refbank', TRUE),
           
            'tglbank' => $this->input->post('tglbank', TRUE),
           
            'totalbayar' => $this->input->post('totalbayar', TRUE),
           
            'sisabayar' => $this->input->post('sisabayar', TRUE),
           
            'totaltagihan' => $this->input->post('totaltagihan', TRUE),
           
            'sisatagihan' => $this->input->post('sisatagihan', TRUE),
           
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
           
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
           
            'isactive' => $this->input->post('isactive', TRUE),
           
            'islocked' => $this->input->post('islocked', TRUE),
           
            'isdeleted' => $this->input->post('isdeleted', TRUE),
           
            'datedeleted' => $this->input->post('datedeleted', TRUE),
           
            'userid' => $this->input->post('userid', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
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
    function savetagihanbayar($data){
        $this->db->insert('tagihanbayar',$data);
    }
    function save_detail($data){
        $this->db->insert('tagihanbayar_detail',$data);
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
        $this->db->update('tagihanbayar', $data);
       
    } 
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tagihanbayar', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'kode' => $this->input->post('kode', TRUE),
       
       'invoice' => $this->input->post('invoice', TRUE),
       
       'tanggal' => $this->input->post('tanggal', TRUE),
       
       'bank' => $this->input->post('bank', TRUE),
       
       'refbank' => $this->input->post('refbank', TRUE),
       
       'tglbank' => $this->input->post('tglbank', TRUE),
       
       'totalbayar' => $this->input->post('totalbayar', TRUE),
       
       'sisabayar' => $this->input->post('sisabayar', TRUE),
       
       'totaltagihan' => $this->input->post('totaltagihan', TRUE),
       
       'sisatagihan' => $this->input->post('sisatagihan', TRUE),
       
       'isvalidasi' => $this->input->post('isvalidasi', TRUE),
       
       'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
       
       'isactive' => $this->input->post('isactive', TRUE),
       
       'islocked' => $this->input->post('islocked', TRUE),
       
       'isdeleted' => $this->input->post('isdeleted', TRUE),
       
       'datedeleted' => $this->input->post('datedeleted', TRUE),
       
       'userid' => $this->input->post('userid', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('tagihanbayar', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tagihanbayar'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('tagihanbayar_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('tagihanbayar_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from tagihanbayar order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
        }
        return $result;
    }
    function get_dropdown_paket(){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_keu_paket as id,kode_akademik as kode,nm_paket as nama from siakad_keu_paket order by id asc');
        // $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->nama." (".$row->kode.")" ;
        }
        return $result;
    }
    function getinvoice(){
        $result = array();
        $array_keys_values = $this->db->query('select `a`.`id` AS `id`,`a`.`kode` AS `kode`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`mhs` AS `mhs`,`c`.`nama` AS `nama`,`c`.`nim` AS `nim`,`a`.`multipaket` AS `multipaket`,`a`.`total` AS `total`,`a`.`status` AS `status`,`b`.`id` AS `idbayar`,`b`.`kode` AS `kodebayar`,`b`.`invoice` AS `kodetagih`,`b`.`tanggal` AS `tgltagih` from ((`tagihanmhs` `a` left join `tagihanbayar` `b` on((`a`.`kode` = `b`.`invoice`))) join `mhsmaster` `c` on((`a`.`mhs` = `c`.`id`))) where isnull(`b`.`invoice`)');
        $result[0]="-- Pilih Invoice --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->kode] = $row->kode." - (".$row->nim.") ".$row->nama;
            // $result[$row->id] = $row->kode;
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
