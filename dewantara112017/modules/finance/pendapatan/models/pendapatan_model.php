<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pendapatan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('pendapatan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function getvendorid($tipe=null,$kode=null) {
        $this->db->where('Kode',$kode);
        if($tipe==1){ //customer
            $result = $this->db->get('customer');
        }elseif($tipe==2){ //supplier
            $result = $this->db->get('supplier');
        }else{
           /* $this->db->select("*,0 as JthTempo");
            $this->db->from('karyawan');
            $result = $this->db->get();*/
            $result=$this->db->query("select *,0 as JthTempo from karyawan");
        }
        // print_r($this->db->last_query());
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    function getvendor($kode=null) {
        // $this->$db->where('xx.Kode =','A0001');
        // $kode="A0001";
        if(!empty($kode) && ($kode!==null||$kode>0)){
            $result=$this->db->query("select xx.* from (select id,Kode,Nama,JthTempo as tempo,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,JthTempo as tempo,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'0' as tempo,'karyawan' as nmtipe,'3' as tipe from karyawan c)) as xx where xx.Kode='".$kode."'");
        }else{

            $result=$this->db->query("select xx.* from (select id,Kode,Nama,JthTempo as tempo,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,JthTempo as tempo,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'0' as tempo,'karyawan' as nmtipe,'3' as tipe from karyawan c)) as xx");
        }
       // print_r($this->db->last_query());
        // $result = $this->db->get();
        if ($result->num_rows() > 0) {
            if(($kode!==0||$kode!=='')&&(!empty($kode))){
                return $result->row_array();

            }else{
                return $result->result_array();
            }
        } else {
            return array();
        }
    }
    function getvendor_byjenis($jenis) {
        // $this->$db->where('xx.Kode =','A0001');
        // $jenis="A0001";
    if($jenis>0){
        $result=$this->db->query("select z.* from (select xx.* from (select id,Kode,Nama,JthTempo as tempo,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,JthTempo as tempo,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'0' as tempo,'karyawan' as nmtipe,'3' as tipe from karyawan c)) as xx where xx.tipe='".$jenis."') as z order by z.id");
        
    }else{
        $result=$this->db->query("select xx.* from (select id,Kode,Nama,JthTempo as tempo,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,JthTempo as tempo,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'0' as tempo,'karyawan' as nmtipe,'3' as tipe from karyawan c)) as xx");
    }
       // print_r($this->db->last_query());
        // $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getone_vendor($kode) {
        // $this->$db->where('xx.Kode =','A0001');
        // $kode="A0001";
       $result=$this->db->query("select xx.* from (select id,Kode,Nama,JthTempo as tempo,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,JthTempo as tempo,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'0' as tempo,'karyawan' as nmtipe,'3' as tipe from karyawan c)) as xx where xx.Kode='".$kode."'");
       // print_r($this->db->last_query());
        // $result = $this->db->get();
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function getrekap_vendor($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        // $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan","Customer") as xxx',FALSE);
        $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan",IF(LEFT(NoAccCust,5)="1.250","Customer",IF(LEFT(NoAccCust,5)="2.300","Customer","-"))) as tipe',FALSE);
        $this->db->from('pendapatan');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('Customer',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        $this->db->order_by('NoAccCust','Asc');
        $this->db->order_by('NmCustomer','Asc');
        $this->db->group_by('Customer');
        // $this->db->limit(10);
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function getrekap_pendapatan($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        // $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan","Customer") as xxx',FALSE);
        $this->db->select('id,faktur,tanggal,kode,keterangan,ket,rekening,sum(jumlah) as totalx');
        $this->db->from('pendapatan_detail');
       
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        $this->db->order_by('kode','Asc');
        $this->db->group_by('kode');
        // $this->db->limit(10);
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function getdetail($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        // $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan","Customer") as xxx',FALSE);
        $this->db->select('id,Faktur as faktur,Jthtmp as jthtempo,Customer as kode,total,NmCustomer as nama,NoAccCust as noacc,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan",IF(LEFT(NoAccCust,5)="1.250","Customer",IF(LEFT(NoAccCust,5)="2.300","Customer","-"))) as tipe',FALSE);
        $this->db->from('pendapatan');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('Customer',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        // $this->db->order_by('NoAccCust','Asc');
        // $this->db->order_by('NmCustomer','Asc');
        // $this->db->group_by('Customer');
        // $this->db->limit(10);
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
            // return array('sql'=>$this->db->last_query(),'result'=>$result);
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function getdetailbon($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        // $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan","Customer") as xxx',FALSE);
        $this->db->select('id,faktur,tanggal,kode,nmkaryawan,noacc,keterangan,jumlah,JthTmp,TglKembali,fakturpendapatan',FALSE);
        $this->db->from('bon');
        if(!empty($data['kdvendor'])||$data['kdvendor']!==''):
            $this->db->where('kode',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        // $this->db->order_by('NoAccCust','Asc');
        // $this->db->order_by('NmCustomer','Asc');
        // $this->db->group_by('Customer');
        // $this->db->limit(10);
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
            // return array('sql'=>$this->db->last_query(),'result'=>$result);
        } else {
            // return array('sql'=>$this->db->last_query());
            return array();
        }
    }
    function getdetailpendapatan($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        // $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as tanggal,IF(LEFT(NoAccCust,5)="1.700","Karyawan","Customer") as xxx',FALSE);
        $this->db->select('id,faktur,tanggal,kode,keterangan,ket,rekening,jumlah');
        $this->db->from('pendapatan_detail');
        if(!empty($data['faktur'])||$data['faktur']!==''):
            $this->db->where('faktur',((!empty($data['faktur'])||($data['faktur']>0))?$data['faktur']:'0'));
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif;
        // $this->db->order_by('NoAccCust','Asc');
        // $this->db->order_by('NmCustomer','Asc');
        // $this->db->group_by('Customer');
        // $this->db->limit(10);
        $result = $this->db->get();
        if ($result->num_rows() >0) {
            return $result->result_array();
            // return array('sql'=>$this->db->last_query(),'result'=>$result);
        } else {
            return array('sql'=>$this->db->last_query());
            // return array();
        }
    }
    function getrekap_somevendor($data) {
        // $sql="select * from (select a.Customer as kode,a.NmCustomer as nama,a.NoAccCust as noacc,sum(a.Total) as totalx from pendapatan a group by NoAccCust) as x where x.kode='".$kode."'";
       
        // $result=$this->db->query($sql);
        // print_r($this->db->last_query());
        $this->db->select('Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx');
        $this->db->from('pendapatan');
        $this->db->where('Customer',((!empty($data['kdvendor'])||($data['kdvendor']>0))?$data['kdvendor']:'0'));
        $this->db->where('Tgl >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        $this->db->where('Tgl <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        $this->db->group_by('Customer');
        $result = $this->db->get();
        if ($result->num_rows() ==1) {
            return $result->row_array();
        } else {
            return array('sql'=>$this->db->last_query());
            // return array();
        }
    }
    function getdropvendor(){
        $query=$this->db->query("select id,Kode,Nama,'customer' as nmtipe,'1' as tipe from customer a union select id,Kode,Nama,'supplier' as nmtipe,'2' as tipe from supplier b union (select id,Kode,Nama,'karyawan' as nmtipe,'3' as tipe from karyawan c)");
        $result = array();
        // $array_keys_values = $this->db->query('select id, '.$value.' from pendapatan order by id asc');
        $array_keys_values=$query;
        $result[0]="-- Pilih Vendor --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kode]= strtoupper($row->nmtipe).", ".$row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
    function getdroppendapatan(){
        $result = array();
        // $array_keys_values = $this->db->query('select id,Kode,Keterangan from rekening where cJenisAcc=5 order by id asc');
        $array_keys_values = $this->db->query('select Kode,Keterangan,rekening from pendapatan_detail group by kode order by kode asc');

        // $array_keys_values=$query;
        $result[0]="-- Pilih Rekening --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kode]= strtoupper($row->Kode)." - ".$row->Keterangan;
        }
        return $result;
    }
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*');
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('pendapatan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('faktur'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('pendapatan');
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
        $result = $this->db->get('pendapatan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
           $data = array(
        
            'Faktur' => $this->genfaktur(),
            'Tgl' => $this->input->post('Tgl', TRUE),
            'Jthtmp' => $this->input->post('Jthtmp', TRUE),
            'Customer' => $this->input->post('Customer', TRUE),
            'NmCustomer' => $this->input->post('NmCustomer', TRUE),
            'StCust' => $this->input->post('StCust', TRUE),
            'Alamat' => $this->input->post('Alamat', TRUE),
            'NoAccCust' => $this->input->post('NoAccCust', TRUE),
            'Total' => $this->input->post('Total', TRUE),
            'Tunai' => $this->input->post('Tunai', TRUE),
            'Piutang' => $this->input->post('Piutang', TRUE),
            'Lunas' => $this->input->post('Lunas', TRUE),
            'DiscLunas' => $this->input->post('DiscLunas', TRUE),
            'Sisa' => $this->input->post('Sisa', TRUE),
            'SLunas' => $this->input->post('SLunas', TRUE),
            'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
            'Status' => $this->input->post('Status', TRUE),
            'Kas' => $this->input->post('Kas', TRUE),
            'Bank' => $this->input->post('Bank', TRUE),
            'KodeBank' => $this->input->post('KodeBank', TRUE),
            'NoAccBank' => $this->input->post('NoAccBank', TRUE),
            'JenisBayar' => $this->input->post('JenisBayar', TRUE),
            'NoBukti' => $this->input->post('NoBukti', TRUE),
            'JthTmpGiro' => $this->input->post('JthTmpGiro', TRUE),
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
            'lVoid' => $this->input->post('lVoid', TRUE),
            'lPosted' => $this->input->post('lPosted', TRUE),
            'isdeleted' => $this->input->post('isdeleted', TRUE),
            'datedeleted' => $this->input->post('datedeleted', TRUE),
            'islocked' => $this->input->post('islocked', TRUE),
            'isactive' => $this->input->post('isactive', TRUE),
            'userid' => userid(),
            'User' => $this->input->post('User', TRUE),
            'datetime' =>NOW(),
            'Time' => NOW(),
           
        );
        $this->db->insert('pendapatan', $data);
    }
    function saveas() {
           $data = array(
        
            'Faktur' => $this->input->post('Faktur', TRUE),
            'Tgl' => $this->input->post('Tgl', TRUE),
            'Jthtmp' => $this->input->post('Jthtmp', TRUE),
            'Customer' => $this->input->post('Customer', TRUE),
            'NmCustomer' => $this->input->post('NmCustomer', TRUE),
            'StCust' => $this->input->post('StCust', TRUE),
            'Alamat' => $this->input->post('Alamat', TRUE),
            'NoAccCust' => $this->input->post('NoAccCust', TRUE),
            'Total' => $this->input->post('Total', TRUE),
            'Tunai' => $this->input->post('Tunai', TRUE),
            'Piutang' => $this->input->post('Piutang', TRUE),
            'Lunas' => $this->input->post('Lunas', TRUE),
            'DiscLunas' => $this->input->post('DiscLunas', TRUE),
            'Sisa' => $this->input->post('Sisa', TRUE),
            'SLunas' => $this->input->post('SLunas', TRUE),
            'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
            'Status' => $this->input->post('Status', TRUE),
            'Kas' => $this->input->post('Kas', TRUE),
            'Bank' => $this->input->post('Bank', TRUE),
            'KodeBank' => $this->input->post('KodeBank', TRUE),
            'NoAccBank' => $this->input->post('NoAccBank', TRUE),
            'JenisBayar' => $this->input->post('JenisBayar', TRUE),
            'NoBukti' => $this->input->post('NoBukti', TRUE),
            'JthTmpGiro' => $this->input->post('JthTmpGiro', TRUE),
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
            'lVoid' => $this->input->post('lVoid', TRUE),
            'lPosted' => $this->input->post('lPosted', TRUE),
            'isdeleted' => $this->input->post('isdeleted', TRUE),
            'datedeleted' => $this->input->post('datedeleted', TRUE),
            'islocked' => $this->input->post('islocked', TRUE),
            'isactive' => $this->input->post('isactive', TRUE),
            'userid' => userid(),
            'User' => $this->input->post('User', TRUE),
            'datetime' =>NOW(),
            'Time' => NOW(),
           
        );
        $this->db->insert('pendapatan', $data);
    }
    function savependapatan($data){
        $this->db->insert('pendapatan',$data);
    }
    function save_detail($data){
        $this->db->insert('pendapatan_detail',$data);
    }
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('pendapatan', $data);
    }
    function update($id) {
        $data = array(
            'id' => $this->input->post('id',TRUE),
            'Faktur' => $this->input->post('Faktur', TRUE),
            'Tgl' => $this->input->post('Tgl', TRUE),
            'Jthtmp' => $this->input->post('Jthtmp', TRUE),
            'Customer' => $this->input->post('Customer', TRUE),
            'NmCustomer' => $this->input->post('NmCustomer', TRUE),
            'StCust' => $this->input->post('StCust', TRUE),
            'Alamat' => $this->input->post('Alamat', TRUE),
            'NoAccCust' => $this->input->post('NoAccCust', TRUE),
            'Total' => $this->input->post('Total', TRUE),
            'Tunai' => $this->input->post('Tunai', TRUE),
            'Piutang' => $this->input->post('Piutang', TRUE),
            'Lunas' => $this->input->post('Lunas', TRUE),
            'DiscLunas' => $this->input->post('DiscLunas', TRUE),
            'Sisa' => $this->input->post('Sisa', TRUE),
            'SLunas' => $this->input->post('SLunas', TRUE),
            'SDiscLunas' => $this->input->post('SDiscLunas', TRUE),
            'Status' => $this->input->post('Status', TRUE),
            'Kas' => $this->input->post('Kas', TRUE),
            'Bank' => $this->input->post('Bank', TRUE),
            'KodeBank' => $this->input->post('KodeBank', TRUE),
            'NoAccBank' => $this->input->post('NoAccBank', TRUE),
            'JenisBayar' => $this->input->post('JenisBayar', TRUE),
            'NoBukti' => $this->input->post('NoBukti', TRUE),
            'JthTmpGiro' => $this->input->post('JthTmpGiro', TRUE),
            'cNoJrn' => $this->input->post('cNoJrn', TRUE),
            'lVoid' => $this->input->post('lVoid', TRUE),
            'lPosted' => $this->input->post('lPosted', TRUE),
            'isdeleted' => $this->input->post('isdeleted', TRUE),
            'datedeleted' => $this->input->post('datedeleted', TRUE),
            'islocked' => $this->input->post('islocked', TRUE),
            'isactive' => $this->input->post('isactive', TRUE),
            'userid' => userid(),
            'User' => $this->input->post('User', TRUE),
            'datetime' =>NOW(),
            'Time' => NOW(),
        );
        $this->db->where('id', $id);
        $this->db->update('pendapatan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pendapatan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('pendapatan_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('pendapatan_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from pendapatan order by id asc');
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
