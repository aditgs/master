<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_mhs_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_mhs', $limit, $uri);
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
        $this->db->order_by('nim_mhs','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('nim_mhs','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_mhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_mhs');
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
        $this->db->from('siakad_mhs');
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
            $faktur=genfaktur($last['faktur'],"PL");//diganti sesuai faktur/kode transaksi
        else:
            $faktur="PL".date('ym')."00001";//diganti sesuai faktur/kode transaksi
        endif;
        return ($faktur);
    }
    function get_one($nim_mhs) {
        $this->db->where('nim_mhs', $nim_mhs);
        $result = $this->db->get('siakad_mhs');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_mhs', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_mhs', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'npm_mhs' => $this->input->post('npm_mhs', TRUE),
           
            'noreg_pmb' => $this->input->post('noreg_pmb', TRUE),
           
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
           
            'nm_mhs' => $this->input->post('nm_mhs', TRUE),
           
            'thn_masuk' => $this->input->post('thn_masuk', TRUE),
           
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'bts_akademik' => $this->input->post('bts_akademik', TRUE),
           
            'kelamin_mhs' => $this->input->post('kelamin_mhs', TRUE),
           
            'tmp_mhs' => $this->input->post('tmp_mhs', TRUE),
           
            'tgl_mhs' => $this->input->post('tgl_mhs', TRUE),
           
            'agama_mhs' => $this->input->post('agama_mhs', TRUE),
           
            'almt_mhs' => $this->input->post('almt_mhs', TRUE),
           
            'kota_mhs' => $this->input->post('kota_mhs', TRUE),
           
            'kodepos_mhs' => $this->input->post('kodepos_mhs', TRUE),
           
            'email_mhs' => $this->input->post('email_mhs', TRUE),
           
            'hp_mhs' => $this->input->post('hp_mhs', TRUE),
           
            'telp_mhs' => $this->input->post('telp_mhs', TRUE),
           
            'status_mhs' => $this->input->post('status_mhs', TRUE),
           
            'nip_dosen' => $this->input->post('nip_dosen', TRUE),
           
            'img_mhs' => $this->input->post('img_mhs', TRUE),
           
            'pass_mhs' => $this->input->post('pass_mhs', TRUE),
           
            'tgl_lulus_mhs' => $this->input->post('tgl_lulus_mhs', TRUE),
           
            'no_transkrip' => $this->input->post('no_transkrip', TRUE),
           
            'status_masuk' => $this->input->post('status_masuk', TRUE),
           
            'style_mhs' => $this->input->post('style_mhs', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'npm_mhs' => $this->input->post('npm_mhs', TRUE),
           
            'noreg_pmb' => $this->input->post('noreg_pmb', TRUE),
           
            'kode_prodi' => $this->input->post('kode_prodi', TRUE),
           
            'nm_mhs' => $this->input->post('nm_mhs', TRUE),
           
            'thn_masuk' => $this->input->post('thn_masuk', TRUE),
           
            'kode_akademik' => $this->input->post('kode_akademik', TRUE),
           
            'bts_akademik' => $this->input->post('bts_akademik', TRUE),
           
            'kelamin_mhs' => $this->input->post('kelamin_mhs', TRUE),
           
            'tmp_mhs' => $this->input->post('tmp_mhs', TRUE),
           
            'tgl_mhs' => $this->input->post('tgl_mhs', TRUE),
           
            'agama_mhs' => $this->input->post('agama_mhs', TRUE),
           
            'almt_mhs' => $this->input->post('almt_mhs', TRUE),
           
            'kota_mhs' => $this->input->post('kota_mhs', TRUE),
           
            'kodepos_mhs' => $this->input->post('kodepos_mhs', TRUE),
           
            'email_mhs' => $this->input->post('email_mhs', TRUE),
           
            'hp_mhs' => $this->input->post('hp_mhs', TRUE),
           
            'telp_mhs' => $this->input->post('telp_mhs', TRUE),
           
            'status_mhs' => $this->input->post('status_mhs', TRUE),
           
            'nip_dosen' => $this->input->post('nip_dosen', TRUE),
           
            'img_mhs' => $this->input->post('img_mhs', TRUE),
           
            'pass_mhs' => $this->input->post('pass_mhs', TRUE),
           
            'tgl_lulus_mhs' => $this->input->post('tgl_lulus_mhs', TRUE),
           
            'no_transkrip' => $this->input->post('no_transkrip', TRUE),
           
            'status_masuk' => $this->input->post('status_masuk', TRUE),
           
            'style_mhs' => $this->input->post('style_mhs', TRUE),
           
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
    function savesiakad_mhs($data){
        $this->db->insert('siakad_mhs',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_mhs_detail',$data);
    }
    function upddel_detail($nim_mhs=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('nim_mhs', $nim_mhs);
        $this->db->update('siakad_mhs', $data);
       
    } 
    function updatebyid($nim_mhs,$data){
        $this->db->where('nim_mhs', $nim_mhs);
        $this->db->update('siakad_mhs', $data);
    }
    function update($nim_mhs) {
        $data = array(
        'nim_mhs' => $this->input->post('nim_mhs',TRUE),
       'npm_mhs' => $this->input->post('npm_mhs', TRUE),
       
       'noreg_pmb' => $this->input->post('noreg_pmb', TRUE),
       
       'kode_prodi' => $this->input->post('kode_prodi', TRUE),
       
       'nm_mhs' => $this->input->post('nm_mhs', TRUE),
       
       'thn_masuk' => $this->input->post('thn_masuk', TRUE),
       
       'kode_akademik' => $this->input->post('kode_akademik', TRUE),
       
       'bts_akademik' => $this->input->post('bts_akademik', TRUE),
       
       'kelamin_mhs' => $this->input->post('kelamin_mhs', TRUE),
       
       'tmp_mhs' => $this->input->post('tmp_mhs', TRUE),
       
       'tgl_mhs' => $this->input->post('tgl_mhs', TRUE),
       
       'agama_mhs' => $this->input->post('agama_mhs', TRUE),
       
       'almt_mhs' => $this->input->post('almt_mhs', TRUE),
       
       'kota_mhs' => $this->input->post('kota_mhs', TRUE),
       
       'kodepos_mhs' => $this->input->post('kodepos_mhs', TRUE),
       
       'email_mhs' => $this->input->post('email_mhs', TRUE),
       
       'hp_mhs' => $this->input->post('hp_mhs', TRUE),
       
       'telp_mhs' => $this->input->post('telp_mhs', TRUE),
       
       'status_mhs' => $this->input->post('status_mhs', TRUE),
       
       'nip_dosen' => $this->input->post('nip_dosen', TRUE),
       
       'img_mhs' => $this->input->post('img_mhs', TRUE),
       
       'pass_mhs' => $this->input->post('pass_mhs', TRUE),
       
       'tgl_lulus_mhs' => $this->input->post('tgl_lulus_mhs', TRUE),
       
       'no_transkrip' => $this->input->post('no_transkrip', TRUE),
       
       'status_masuk' => $this->input->post('status_masuk', TRUE),
       
       'style_mhs' => $this->input->post('style_mhs', TRUE),
       
        );
        $this->db->where('nim_mhs', $nim_mhs);
        $this->db->update('siakad_mhs', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($nim_mhs) {
        $this->db->where('nim_mhs', $nim_mhs);
        $this->db->delete('siakad_mhs'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_mhs_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_mhs_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select nim_mhs, '.$value.' from siakad_mhs order by nim_mhs asc');
        $result[0]="-- Pilih Urutan nim_mhs --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->nim_mhs]= $row->$value;
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
