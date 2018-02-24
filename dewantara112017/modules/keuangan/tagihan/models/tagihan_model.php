<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tagihan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('tagihanmhs', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }  
    function getalltagihan() {

        $result = $this->db->get('tagihanmhs');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    function getalltarif() {

        $result = $this->db->get('tarif');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function gettarifcicilan($kode) {

        $this->db->select('id,KodeJ,Jenis,cicilan')->from('002-view-jenis-cicilan')->where('KodeJ',$kode);
        $result = $this->db->get();
        if ($result->num_rows()==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function gettarifpmb($kode) {

        $this->db->select('id,KodeJ,Jenis,pmb')->from('002-view-jenis-pmb')->where('KodeJ',$kode);
        $result = $this->db->get();
        if ($result->num_rows()==1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettarifdetailbykode($kode) {

        $this->db->select('*')->from('006-view-tarifdetail')->where('kodetarif',$kode);
        $result = $this->db->get();
        if ($result->num_rows()==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function gettarifdaftarulang($kode) {

        $this->db->select('id,KodeJ,Jenis,hereg')->from('002-view-jenis-daftarulang')->where('KodeJ',$kode);
        $result = $this->db->get();
        if ($result->num_rows()==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getmultipaket($id){
        $this->db->select('id,multipaket')->from('001-view-tagihanmhs')->where('id',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }elseif($result->num_rows()>1){
            return $result->result_array();
        }else{
            return array();
        }
    }
    function getdetailmultipaket($id){
        $this->db->select('*')->from('002-view-detailtagihan')->where('id_siakad_keu_paket',$id);
        $result=$this->db->get();
    
        if($result->num_rows()>0){
            return $result->result_array();
        }else{
            return array();
        }
    } 
    function gettotalpaket($id){
        $this->db->select('id_siakad_keu_paket as id,sum(nominal_biaya) as totalbiaya')->from('002-view-detailtagihan')->where('id_siakad_keu_paket',$id)->group_by('id_siakad_keu_paket');
        $result=$this->db->get();
    
        if($result->num_rows()>0){
            return $result->row_array();
        }else{
            return array();
        }
    } 
    function getstatus($id){
        $this->db->select('id,status')->from('001-view-tagihanmhs')->where('id',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }
    } 
    function getkodepaket($id){
        $this->db->select('id_siakad_keu_paket as id,kode_akademik as kode,nm_paket as nama')->from('siakad_keu_paket')->where('id_siakad_keu_paket',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }
    }
    function gettagihan($id){
        $this->db->select('*')->from('001-view-tagihanmhs')->where('id',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }   
    } 
    function getdetailtagihanmhs($kodetagihan,$kodetarif){
        $this->db->select('idtagihan as id,iddetail,kodetagihan,nim,mhs,kodetarif,tarif,tagbayar,taghutang,tagdetailbayar,tagdetailhutang')->from('009-view-tagihandetail');
        $this->db->where('kodetagihan',$kodetagihan);
        $this->db->where('kodetarif',$kodetarif);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }   
    }  
    function gettagihanmhs($kodetagihan){
        $this->db->select('idtagihan as id,iddetail,kodetagihan,nim,mhs,kodetarif,tarif,total,tagbayar,taghutang,tagdetailbayar,tagdetailhutang,iscicilan,ispmb')->from('009-view-tagihandetail');
        $this->db->where('kodetagihan',$kodetagihan);
        // $this->db->where('kodetarif',$kodetarif);
        $result=$this->db->get();
        if($result->num_rows()>0){
            return $result->result_array();
        }else{
            return array();
        }   
    } 
    function getpaket($id){
        $this->db->select('id_siakad_keu_paket as id, kode_akademik as kode,nm_paket as nama,')->from('siakad_keu_paket')->where('id_siakad_keu_paket',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }
    } 
    function gettarifbymhs($mhs){
        $this->db->select('*')->from('004-view-tarif')->where('kodemhs',$mhs);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }
    }
    function gettarifbyid($id){
        $this->db->select('*')->from('004-view-tarif')->where('id',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
            return array();
        }
    }
    function getmhs($id){
        $this->db->select('*')->from('mhsmaster')->where('id',$id);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return $result->row_array();
        }else{
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

        $result=$this->db->get('tagihanmhs');
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

        $result=$this->db->get('tagihanmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    // untuk generasi faktur cicilan
    function getinfocicilan($kode){
        $this->db->select('*')->from('tagihan_cicilan')->like('kodetarifcicilan',$kode,'before');
        $result=$this->db->get();
        if ($result->num_rows()>0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getlastcicilan($inv,$trf){

        $this->db->select('kodetarifcicilan,nim'); //faktur
        $this->db->where('kodetagihan',$inv);
        $this->db->where('kodetarif',$trf);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('tagihan_cicilan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotalcicilan($inv,$trf){

        $this->db->select('kodetarifcicilan,nim,tarif,sum(bayar) as totalbayar,sisahutang'); //faktur
        $this->db->where('kodetagihan',$inv);
        $this->db->where('kodetarif',$trf);
        $this->db->order_by('kodetagihan');
        $this->db->order_by('kodetarif');
        // $this->db->limit(1);

        $result=$this->db->get('tagihan_cicilan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getdetailbayar($inv,$trf){

        $this->db->select('kodetarifcicilan,nim,tarif,bayar,sisahutang'); //faktur
        $this->db->where('kodetagihan',$inv);
        $this->db->where('kodetarif',$trf);
        $result=$this->db->get('tagihan_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotalbayar($inv){

        $this->db->select('nim,kodetagihan,sum(tarif) as tottagihan,sum(bayar) as totbayar,sum(sisahutang) as tothutang'); //faktur
        $this->db->where('kodetagihan',$inv);
        $result=$this->db->get('tagihan_detail');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotalcicilanbymhs($nim){

        $this->db->select('kodetarifcicilan,nim,sum(bayar) as totalbayar,sum(sisahutang) as totalhutang'); //faktur
        // $this->db->where('kodetagihan',$inv);
         // $this->db->where('kodetarif',$trf);
        $this->db->order_by('nim','ASC');
        $this->db->order_by('kodetagihan','ASC');
      
        $result=$this->db->get('tagihan_cicilan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('tagihanmhs');
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
        $this->db->select('*');
        $this->db->from('tagihanmhs');
      
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
    function genkodecicilan($inv,$trf){
        $last=$this->getlastcicilan($inv,$trf);
        $tagihanmhs=$this->getdetailtagihanmhs($inv,$trf);
        $nim=$tagihanmhs['nim'];
        if(!empty($last)):
            $tx=$last['kodetarifcicilan'];
            $right=substr($last['kodetarifcicilan'],-2);
            $no=intval($right)+1;
            $new=substr("00".$no,-2);
            $kode=$trf.".".$nim.".".$new;
        else:
            $kode=$trf.".".$nim."."."01";//diganti sesuai faktur/kode transaksi
        endif;
        return ($kode);
    }
    function genfaktur(){
        $last=$this->get_last();
        // print_r($last);
        if(!empty($last)):
            $kode=genfaktur($last['kode'],"INV",3);//diganti sesuai faktur/kode transaksi
        else:
            $kode="INV".date('ym')."0001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($kode);
    }
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('tagihanmhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('tagihanmhs', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('tagihanmhs', $data);

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
            'tanggal' => $this->input->post('tanggal', TRUE),
            'tgltempo' => $this->input->post('tgltempo', TRUE),
            'total' => $this->input->post('total', TRUE),
            'multipaket' => $this->input->post('multipaket', TRUE),
            'mhs' => $this->input->post('mhs', TRUE),
            'kodebank' => $this->input->post('kodebank', TRUE),
            'idpaket' => $this->input->post('idpaket', TRUE),
            'status' => $this->input->post('status', TRUE),
            'dateopen' => $this->input->post('dateopen', TRUE),
            'dateclosed' => $this->input->post('dateclosed', TRUE),
            'refbank' => $this->input->post('refbank', TRUE),
            'isbayar' => $this->input->post('isbayar', TRUE),
            'tglbayar' => $this->input->post('tglbayar', TRUE),
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
            'isactive' => $this->input->post('isactive', TRUE),
            'islocked' => $this->input->post('islocked', TRUE),
            'isdeleted' => $this->input->post('isdeleted', TRUE),
            'datedeleted' => $this->input->post('datedeleted', TRUE),
            'userid' => userid(),
            'datetime' => NOW(),
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
            'tanggal' => $this->input->post('tanggal', TRUE),
            'tgltempo' => $this->input->post('tgltempo', TRUE),
            'total' => $this->input->post('total', TRUE),
            'multipaket' => $this->input->post('multipaket', TRUE),
            'mhs' => $this->input->post('mhs', TRUE),
            'kodebank' => $this->input->post('kodebank', TRUE),
            'idpaket' => $this->input->post('idpaket', TRUE),
            'status' => $this->input->post('status', TRUE),
            'dateopen' => $this->input->post('dateopen', TRUE),
            'dateclosed' => $this->input->post('dateclosed', TRUE),
            'refbank' => $this->input->post('refbank', TRUE),
            'isbayar' => $this->input->post('isbayar', TRUE),
            'tglbayar' => $this->input->post('tglbayar', TRUE),
            'isvalidasi' => $this->input->post('isvalidasi', TRUE),
            'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
            'isactive' => $this->input->post('isactive', TRUE),
            'islocked' => $this->input->post('islocked', TRUE),
            'isdeleted' => $this->input->post('isdeleted', TRUE),
            'datedeleted' => $this->input->post('datedeleted', TRUE),
            'userid' => userid(),
            'datetime' => NOW(),
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
    function savetagihanmhs($data){
        $this->db->insert('tagihanmhs',$data);
    }
    function savedetailbatch($data){
        $this->db->insert_batch('tagihan_detail',$data);
    }
    function save_detail($data){
        $this->db->insert('tagihan_detail',$data);
    }
    function updatestatus($id,$status="open") {
        if($status=='close'){

            $data = array(
               'status' => $status,
               'dateclosed'=>NOW(),
               'userid' => userid(),
               // 'datetime' => NOW(),
            );
        }else{
            $data = array(
               'status' => $status,
               'dateopen'=>NOW(),
               'userid' => userid(),
               // 'datetime' => NOW(),
            );

        }
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }
    function upddel_detail($id=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'datetime' => NOW(),

            );
        
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
       
    } 
    function validasitagihan($id=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'islocked' => 1,
             'tglvalidasi' => NOW(),
             'isvalidasi' => 1,
             'islocked' => 1,
             'isactive' => 1,
             'uservalidated' => userid(),
             

            );
        
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
        $this->validasidetail($id);
        return $this->db->affected_rows();
        
       
    } 
    function validasidetail($id){
        $tag=$this->get_one($id);
        $kodetagih=$tag['kode'];
        $detail=array(
            // 'kodetagihan'=>$kodetagih,
             // 'islocked' => 1,
             'datevalidated' => NOW(),
             'isvalidated' => 1,
             // 'islocked' => 1,
             'isactive' => 1,
             'uservalidated' => userid(),
             

            );
        $this->db->where('kodetagihan', $kodetagih);
        $this->db->update('tagihan_detail', $detail);
        return $this->db->affected_rows();
    }
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
    }
    function updcetak($id){
        $cetak=$this->get_one($id);
        if(!empty($cetak)){
            if(isset($cetak['printcount'])||$cetak['printcount']>0){
                $numcetak=$cetak['printcount']+1;
            }else{
                $numcetak=1;
            }
        }else{
            $numcetak=1;
        }
        $data=array(
            'isprinted'=>1,
            'lastprinted'=>NOW(),
            'printcount'=>$numcetak,
            'userprinted'=>userid(),
        );
        $this->db->where('id', $id);

        $this->db->update('tagihanmhs', $data);
    }
    function updvalid($id){
        $data=array(
            'isvalidated'=>1,
            'datevalidated'=>NOW(),
            'uservalidated'=>userid(),
        );
        $this->db->where('id', $id);

        $this->db->update('tagihan_detail', $data);
        return $this->db->affected_rows();
    }
    function update($id) {
        $data = array(
        
           'kode' => $this->input->post('kode', TRUE),
           'tanggal' => $this->input->post('tanggal', TRUE),
           'tgltempo' => $this->input->post('tgltempo', TRUE),
           'mhs' => $this->input->post('mhs', TRUE),
            'total' => $this->input->post('total', TRUE),
            'multipaket' => $this->input->post('multipaket', TRUE),
           'kodebank' => $this->input->post('kodebank', TRUE),
           'idpaket' => $this->input->post('idpaket', TRUE),
           'status' => $this->input->post('status', TRUE),
           'dateopen' => $this->input->post('dateopen', TRUE),
           'dateclosed' => $this->input->post('dateclosed', TRUE),
           'refbank' => $this->input->post('refbank', TRUE),
           'isbayar' => $this->input->post('isbayar', TRUE),
           'tglbayar' => $this->input->post('tglbayar', TRUE),
           'isvalidasi' => $this->input->post('isvalidasi', TRUE),
           'tglvalidasi' => $this->input->post('tglvalidasi', TRUE),
           'isactive' => $this->input->post('isactive', TRUE),
           'islocked' => $this->input->post('islocked', TRUE),
           'isdeleted' => $this->input->post('isdeleted', TRUE),
           'datedeleted' => $this->input->post('datedeleted', TRUE),
           'userid' => userid(),
           'datetime' => NOW(),

        );
        $this->db->where('id', $id);
        $this->db->update('tagihanmhs', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tagihanmhs'); 
        return $this->db->affected_rows();
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('tagihan_detail'); 
       
    } 
    function deldetailbykode($kode=null) {
        $this->db->where('kodetagihan', $kode);
        $this->db->delete('tagihan_detail');       
    }
    function get_dropdown_mhs(){
        $result = array();
        $array_keys_values = $this->db->query('select id,nim,nama from mhsmaster order by id asc');
        $result[0]="-- Pilih Mahasiswa --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->nama." (".$row->nim.")" ;
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

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from tagihanmhs order by id asc');
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
