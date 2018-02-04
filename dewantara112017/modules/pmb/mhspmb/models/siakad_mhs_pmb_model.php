<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_mhs_pmb_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_mhs_pmb', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*'); //Faktur
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs_pmb');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
   function get_last($prodi){

        $this->db->select('noreg_pmb'); //faktur
        $x=substr($prodi,0,2);
        $this->db->like('noreg_pmb',$x); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs_pmb');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_mhs_pmb');
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
        $this->db->from('siakad_mhs_pmb');
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
    function genkode($prodi){
        $last=$this->get_last($prodi);
       
            $tahun=date("y");
            //     $th=$date;
            // }
            if(!empty($prodi)){
                $num=strlen($prodi);
                // echo $num;
                if($num=5){
                    $pro=substr($prodi,0,2);
                }elseif($num=2){
                    $pro;
                }else{
                    $pro='00';
                }
            }else{
                $pro='00';
            }
        if(!empty($last)):
            $x=$last['noreg_pmb'];
            $y=substr($x,-4);
            $z=strval($y)+1;
            $a="0000".$z;
            $b=substr($a,-4);
            $gen=$pro.$tahun.$b;

        else:
           $gen=$pro.$tahun."0001";
        endif;
        return $gen;
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
        $result = $this->db->get('siakad_mhs_pmb');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_mhs_pmb', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_mhs_pmb', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
                'kode_prodi' => $this->input->post('kode_prodi', TRUE), //valid
             'id_siakad_kelas' => $this->input->post('id_siakad_kelas', TRUE),
             'tgl_reg_pmb' =>NOW(),
             'noreg_pmb' => $this->genkode($this->input->post('kode_prodi', TRUE)),
             'nik_cmhs' => $this->input->post('nik_cmhs', TRUE),
             'nm_cmhs' => $this->input->post('nm_cmhs', TRUE), //valid
             'kelamin_cmhs' => $this->input->post('kelamin_cmhs', TRUE), //valid
             'tmp_cmhs' => $this->input->post('tmp_cmhs', TRUE),
             'tgl_cmhs' => $this->input->post('tgl_cmhs', TRUE),
             'agama_cmhs' => $this->input->post('agama_cmhs', TRUE), //valid
             'almt_cmhs' => $this->input->post('almt_cmhs', TRUE),
             'kota_cmhs' => $this->input->post('kota_cmhs', TRUE),
             'kodepos_cmhs' => $this->input->post('kodepos_cmhs', TRUE),
             'email_cmhs' => $this->input->post('email_cmhs', TRUE),
             'hp_cmhs' => $this->input->post('hp_cmhs', TRUE),
             'telp_cmhs' => $this->input->post('telp_cmhs', TRUE),
             'asal_pend' => $this->input->post('asal_pend', TRUE),
             'jurusan_pend' => $this->input->post('jurusan_pend', TRUE),
             'no_ijazah_pend' => $this->input->post('no_ijazah_pend', TRUE),
             'tgl_ijazah_pend' => $this->input->post('tgl_ijazah_pend'), //valid
             'nil_ijazah_pend' => $this->input->post('nil_ijazah_pend', TRUE),
             'nm_ibu_cmhs' => $this->input->post('nm_ibu_cmhs', TRUE),
             'status_pmb' => 'Baru',
             'id_siakad_keu_rek' => $this->input->post('id_siakad_keu_rek', TRUE),
             'id_siakad_keu_pendaftaran' => $this->input->post('id_siakad_keu_pendaftaran', TRUE),
             'tgl_transfer' => ($this->input->post('tgl_transfer') != FALSE) ? $this->input->post('tgl_transfer') : NULL, //valid
             'nm_transfer' => $this->input->post('nm_transfer', TRUE),
             'img_bukti_transfer' => $this->input->post('img_bukti_transfer', TRUE),
             'img_pasfoto' => $this->input->post('img_pasfoto', TRUE),
             'img_ijazah' => $this->input->post('img_ijazah', TRUE),
             'img_transkrip' => $this->input->post('img_transkrip', TRUE),
             'img_pindah' => $this->input->post('img_pindah', TRUE),
             'status_cmhs' => $this->input->post('status_cmhs', TRUE), //valid
             'memo' => $this->input->post('memo', TRUE),
             'gelid' => $this->input->post('gelid', TRUE),
             'userid' =>userid(),

        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
             'id_siakad_kelas' => $this->input->post('id_siakad_kelas', TRUE),
             'tgl_reg_pmb' =>NOW(),
             'noreg_pmb' => $this->genkode($this->input->post('kode_prodi', TRUE)),
             'nik_cmhs' => $this->input->post('nik_cmhs', TRUE),
             'nm_cmhs' => $this->input->post('nm_cmhs', TRUE),
             'kelamin_cmhs' => $this->input->post('kelamin_cmhs', TRUE),
             'tmp_cmhs' => $this->input->post('tmp_cmhs', TRUE),
             'tgl_cmhs' => $this->input->post('tgl_cmhs', TRUE),
             'agama_cmhs' => $this->input->post('agama_cmhs', TRUE),
             'almt_cmhs' => $this->input->post('almt_cmhs', TRUE),
             'kota_cmhs' => $this->input->post('kota_cmhs', TRUE),
             'kodepos_cmhs' => $this->input->post('kodepos_cmhs', TRUE),
             'email_cmhs' => $this->input->post('email_cmhs', TRUE),
             'hp_cmhs' => $this->input->post('hp_cmhs', TRUE),
             'telp_cmhs' => $this->input->post('telp_cmhs', TRUE),
             'asal_pend' => $this->input->post('asal_pend', TRUE),
             'jurusan_pend' => $this->input->post('jurusan_pend', TRUE),
             'no_ijazah_pend' => $this->input->post('no_ijazah_pend', TRUE),
             'tgl_ijazah_pend' => ($this->input->post('tgl_ijazah_pend') != FALSE) ? $this->input->post('tgl_ijazah_pend') : NULL,
             'nil_ijazah_pend' => $this->input->post('nil_ijazah_pend', TRUE),
             'nm_ibu_cmhs' => $this->input->post('nm_ibu_cmhs', TRUE),
             'status_pmb' => 'Baru',
             'id_siakad_keu_rek' => $this->input->post('id_siakad_keu_rek', TRUE),
             'id_siakad_keu_pendaftaran' => $this->input->post('id_siakad_keu_pendaftaran', TRUE),
             'tgl_transfer' => ($this->input->post('tgl_transfer') != FALSE) ? $this->input->post('tgl_transfer') : NULL,
             'nm_transfer' => $this->input->post('nm_transfer', TRUE),
             'img_bukti_transfer' => $this->input->post('img_bukti_transfer', TRUE),
             'img_pasfoto' => $this->input->post('img_pasfoto', TRUE),
             'img_ijazah' => $this->input->post('img_ijazah', TRUE),
             'img_transkrip' => $this->input->post('img_transkrip', TRUE),
             'img_pindah' => $this->input->post('img_pindah', TRUE),
             'status_cmhs' => $this->input->post('status_cmhs', TRUE),
             'memo' => $this->input->post('memo', TRUE),
             'gelid' => $this->input->post('gelid', TRUE),
             'userid' =>userid(),

        );
      
        return $data;
    }
    function savesiakad_mhs_pmb($data){
        $this->db->insert('siakad_mhs_pmb',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_mhs_pmb_detail',$data);
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
        $this->db->update('siakad_mhs_pmb', $data);
       
    } 
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('siakad_mhs_pmb', $data);
    }
    function update($id) {
        $data = array(
   
       'kode_prodi' => $this->input->post('kode_prodi', TRUE),
       'id_siakad_kelas' => $this->input->post('id_siakad_kelas', TRUE),
       'tgl_reg_pmb' => NOW(),
       'noreg_pmb' => $this->input->post('noreg_pmb', TRUE),
       'nik_cmhs' => $this->input->post('nik_cmhs', TRUE),
       'nm_cmhs' => $this->input->post('nm_cmhs', TRUE),
       'kelamin_cmhs' => $this->input->post('kelamin_cmhs', TRUE),
       'tmp_cmhs' => $this->input->post('tmp_cmhs', TRUE),
       'tgl_cmhs' => $this->input->post('tgl_cmhs', TRUE),
       'agama_cmhs' => $this->input->post('agama_cmhs', TRUE),
       'almt_cmhs' => $this->input->post('almt_cmhs', TRUE),
       'kota_cmhs' => $this->input->post('kota_cmhs', TRUE),
       'kodepos_cmhs' => $this->input->post('kodepos_cmhs', TRUE),
       'email_cmhs' => $this->input->post('email_cmhs', TRUE),
       'hp_cmhs' => $this->input->post('hp_cmhs', TRUE),
       'telp_cmhs' => $this->input->post('telp_cmhs', TRUE),
       'asal_pend' => $this->input->post('asal_pend', TRUE),
       'jurusan_pend' => $this->input->post('jurusan_pend', TRUE),
       'no_ijazah_pend' => $this->input->post('no_ijazah_pend', TRUE),
       'tgl_ijazah_pend' => ($this->input->post('tgl_ijazah_pend') != FALSE) ? $this->input->post('tgl_ijazah_pend') : NULL,
       'nil_ijazah_pend' => $this->input->post('nil_ijazah_pend', TRUE),
       'nm_ibu_cmhs' => $this->input->post('nm_ibu_cmhs', TRUE),
       'status_pmb' => 'Baru',
       'id_siakad_keu_rek' => $this->input->post('id_siakad_keu_rek', TRUE),
       'id_siakad_keu_pendaftaran' => $this->input->post('id_siakad_keu_pendaftaran', TRUE),
       'tgl_transfer' => ($this->input->post('tgl_transfer') != FALSE) ? $this->input->post('tgl_transfer') : NULL,
       'nm_transfer' => $this->input->post('nm_transfer', TRUE),
       'img_bukti_transfer' => $this->input->post('img_bukti_transfer', TRUE),
       'img_pasfoto' => $this->input->post('img_pasfoto', TRUE),
       'img_ijazah' => $this->input->post('img_ijazah', TRUE),
       'img_transkrip' => $this->input->post('img_transkrip', TRUE),
       'img_pindah' => $this->input->post('img_pindah', TRUE),
       'status_cmhs' => $this->input->post('status_cmhs', TRUE),
       'memo' => $this->input->post('memo', TRUE),
       'gelid' => $this->input->post('gelid', TRUE),
       'userid' =>userid(),

        );
        $this->db->where('id', $id);
        $this->db->update('siakad_mhs_pmb', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('siakad_mhs_pmb'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_mhs_pmb_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_mhs_pmb_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from siakad_mhs_pmb order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
        }
        return $result;
    } 
    function getdropkelas(){
        $result = array();
        $array_keys_values = $this->db->query('select id_siakad_kelas,inisial_kelas,nm_kelas from siakad_kelas where thn_akademik="2018" order by id_siakad_kelas asc ');
        $result[0]="-- Pilih Kelas --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_siakad_kelas]= $row->inisial_kelas." - ".$row->nm_kelas;
        }
        return $result;
    }
    function getdropgel(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kodegel,keterangan,date_start,date_end from `001-view-gelpmbaktif` where isactive=1 order by id asc ');
        // $result[0]="-- Pilih Gelombang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->keterangan." <label class='label label-success'>(".$row->date_start." s/d ".$row->date_end.")</label>";
        }
        return $result;
    }

    function dropdown_prodi(){
        $result = array();
            $array_keys_values = $this->db->query('select id,KodeP,Prodi from prodi order by id asc');
  
        $result[0]="-- Pilih Prodi --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->KodeP]= $row->Prodi;
        }
        return $result;
    }

    function dropdown_kelompok(){
        $result = array();
            $array_keys_values = $this->db->query('select id,Kodek,Kelompok from kelompokmhs order by id asc');
  
        $result[0]="-- Pilih Kelompok --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->Kodek]= $row->Kelompok;
        }
        return $result;
    }

    function get_dropdown_calon_mhs(){
        $result = array();
        $array_keys_values = $this->db->query('select id,noreg_pmb,nm_cmhs from siakad_mhs_pmb order by id asc');
        $result[0]="-- Pilih Calon Mahasiswa --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->nm_cmhs." (".$row->noreg_pmb.")" ;
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
