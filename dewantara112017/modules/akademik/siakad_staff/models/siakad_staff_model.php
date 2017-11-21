<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Siakad_staff_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('siakad_staff', $limit, $uri);
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
        $this->db->order_by('nip_staff','ASC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_staff');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('nip_staff','DESC');
        $this->db->limit(1);

        $result=$this->db->get('siakad_staff');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    } 
    function gettotaldetail($faktur){
        $this->db->select('faktur,sum(jumlah) as total'); //field perlu disesuaikan dengan tabel
        $this->db->from('siakad_staff');
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
        $this->db->from('siakad_staff');
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
    function get_one($nip_staff) {
        $this->db->where('nip_staff', $nip_staff);
        $result = $this->db->get('siakad_staff');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    
    function save() {
        $data=$this->__save();
        $this->db->insert('siakad_staff', $data);
    }
    function saveas() {
        $data=$this->__saveas();
        $this->db->insert('siakad_staff', $data);

    }
    function __save(){
        $user = $this->ion_auth->user()->row(); 
            if (!empty($user)):
                $userid=$user->id;
                $username=$user->username; //untuk field $User
            endif;
        //ganti faktur dengan ==> 'Faktur' =>$this->genfaktur(),
       $data = array(
        
            'tipe_staff' => $this->input->post('tipe_staff', TRUE),
           
            'jenis_staff' => $this->input->post('jenis_staff', TRUE),
           
            'nidn_staff' => $this->input->post('nidn_staff', TRUE),
           
            'nm_staff' => $this->input->post('nm_staff', TRUE),
           
            'kelamin_staff' => $this->input->post('kelamin_staff', TRUE),
           
            'tmp_staff' => $this->input->post('tmp_staff', TRUE),
           
            'tgl_staff' => $this->input->post('tgl_staff', TRUE),
           
            'agama_staff' => $this->input->post('agama_staff', TRUE),
           
            'almt_staff' => $this->input->post('almt_staff', TRUE),
           
            'kota_staff' => $this->input->post('kota_staff', TRUE),
           
            'email_staff' => $this->input->post('email_staff', TRUE),
           
            'telp_staff' => $this->input->post('telp_staff', TRUE),
           
            'g_dpn_staff' => $this->input->post('g_dpn_staff', TRUE),
           
            'g_blkng_staff' => $this->input->post('g_blkng_staff', TRUE),
           
            'status_staff' => $this->input->post('status_staff', TRUE),
           
            'foto_staff' => $this->input->post('foto_staff', TRUE),
           
            'pass_staff' => $this->input->post('pass_staff', TRUE),
           
            'style_staff' => $this->input->post('style_staff', TRUE),
           
        );
        //'isdeleted' => null,
        //    'datedeleted' => null,
        //    'islocked' =>1,
        //    'isactive' => 1,
        
        return $data;
    }
    function __saveas(){
        
       $data = array(
        
            'tipe_staff' => $this->input->post('tipe_staff', TRUE),
           
            'jenis_staff' => $this->input->post('jenis_staff', TRUE),
           
            'nidn_staff' => $this->input->post('nidn_staff', TRUE),
           
            'nm_staff' => $this->input->post('nm_staff', TRUE),
           
            'kelamin_staff' => $this->input->post('kelamin_staff', TRUE),
           
            'tmp_staff' => $this->input->post('tmp_staff', TRUE),
           
            'tgl_staff' => $this->input->post('tgl_staff', TRUE),
           
            'agama_staff' => $this->input->post('agama_staff', TRUE),
           
            'almt_staff' => $this->input->post('almt_staff', TRUE),
           
            'kota_staff' => $this->input->post('kota_staff', TRUE),
           
            'email_staff' => $this->input->post('email_staff', TRUE),
           
            'telp_staff' => $this->input->post('telp_staff', TRUE),
           
            'g_dpn_staff' => $this->input->post('g_dpn_staff', TRUE),
           
            'g_blkng_staff' => $this->input->post('g_blkng_staff', TRUE),
           
            'status_staff' => $this->input->post('status_staff', TRUE),
           
            'foto_staff' => $this->input->post('foto_staff', TRUE),
           
            'pass_staff' => $this->input->post('pass_staff', TRUE),
           
            'style_staff' => $this->input->post('style_staff', TRUE),
           
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
    function savesiakad_staff($data){
        $this->db->insert('siakad_staff',$data);
    }
    function save_detail($data){
        $this->db->insert('siakad_staff_detail',$data);
    }
    function upddel_detail($nip_staff=null) {
        //semua field ini menyesuaikan dengan yang ada pada model dan tabel
        $data=array(
             'isdeleted' => 1,
             'datedeleted' => NOW(),
             'islocked' => 1,
             'isactive' => 0,
             'userid' => userid(),
             'timestamp' => NOW(),

            );
        
        $this->db->where('nip_staff', $nip_staff);
        $this->db->update('siakad_staff', $data);
       
    } 
    function updatebyid($nip_staff,$data){
        $this->db->where('nip_staff', $nip_staff);
        $this->db->update('siakad_staff', $data);
    }
    function update($nip_staff) {
        $data = array(
        'nip_staff' => $this->input->post('nip_staff',TRUE),
       'tipe_staff' => $this->input->post('tipe_staff', TRUE),
       
       'jenis_staff' => $this->input->post('jenis_staff', TRUE),
       
       'nidn_staff' => $this->input->post('nidn_staff', TRUE),
       
       'nm_staff' => $this->input->post('nm_staff', TRUE),
       
       'kelamin_staff' => $this->input->post('kelamin_staff', TRUE),
       
       'tmp_staff' => $this->input->post('tmp_staff', TRUE),
       
       'tgl_staff' => $this->input->post('tgl_staff', TRUE),
       
       'agama_staff' => $this->input->post('agama_staff', TRUE),
       
       'almt_staff' => $this->input->post('almt_staff', TRUE),
       
       'kota_staff' => $this->input->post('kota_staff', TRUE),
       
       'email_staff' => $this->input->post('email_staff', TRUE),
       
       'telp_staff' => $this->input->post('telp_staff', TRUE),
       
       'g_dpn_staff' => $this->input->post('g_dpn_staff', TRUE),
       
       'g_blkng_staff' => $this->input->post('g_blkng_staff', TRUE),
       
       'status_staff' => $this->input->post('status_staff', TRUE),
       
       'foto_staff' => $this->input->post('foto_staff', TRUE),
       
       'pass_staff' => $this->input->post('pass_staff', TRUE),
       
       'style_staff' => $this->input->post('style_staff', TRUE),
       
        );
        $this->db->where('nip_staff', $nip_staff);
        $this->db->update('siakad_staff', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($nip_staff) {
        $this->db->where('nip_staff', $nip_staff);
        $this->db->delete('siakad_staff'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('siakad_staff_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('siakad_staff_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select nip_staff, '.$value.' from siakad_staff order by nip_staff asc');
        $result[0]="-- Pilih Urutan nip_staff --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->nip_staff]= $row->$value;
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
