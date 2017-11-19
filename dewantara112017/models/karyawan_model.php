<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Karyawan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all($limit, $uri) {

        $result = $this->db->get('karyawan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    //get data terakhir di generate
    function ceknomornull(){
          // $this->db->select('*');
        $this->db->where('datetime',NULL);
        $this->db->where('tanggal',NULL);
        $this->db->where('islocked',NULL);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);

        $result=$this->db->get('karyawan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    //untuk generate faktur baru
    function get_last(){

        $this->db->select('*'); //faktur
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $result=$this->db->get('karyawan');
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
        $result = $this->db->get('karyawan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function get_onebykode($kode) {
        $this->db->where('Kode', $kode);
        $result = $this->db->get('karyawan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Nama' => $this->input->post('Nama', TRUE),
           
            'Alamat' => $this->input->post('Alamat', TRUE),
           
            'TempatLahir' => $this->input->post('TempatLahir', TRUE),
           
            'TglLahir' => $this->input->post('TglLahir', TRUE),
           
            'JK' => $this->input->post('JK', TRUE),
           
            'Telepon' => $this->input->post('Telepon', TRUE),
           
            'Jabatan' => $this->input->post('Jabatan', TRUE),
           
            'NmJabatan' => $this->input->post('NmJabatan', TRUE),
           
            'TglMasuk' => $this->input->post('TglMasuk', TRUE),
           
            'Gapok' => $this->input->post('Gapok', TRUE),
           
            'Lembur' => $this->input->post('Lembur', TRUE),
           
            'TunjanganKeluarga' => $this->input->post('TunjanganKeluarga', TRUE),
           
            'TunjanganJabatan' => $this->input->post('TunjanganJabatan', TRUE),
           
            'Transport' => $this->input->post('Transport', TRUE),
           
            'Makan' => $this->input->post('Makan', TRUE),
           
            'Lain' => $this->input->post('Lain', TRUE),
           
            'Bonus' => $this->input->post('Bonus', TRUE),
           
            'Hutang' => $this->input->post('Hutang', TRUE),
           
            'NoAcc' => $this->input->post('NoAcc', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'Time' => NOW(),
           
        );
        $this->db->insert('karyawan', $data);
    }
    function savekaryawan($data){
        $this->db->insert('karyawan',$data);
    }
    function save_detail($data){
        $this->db->insert('karyawan_detail',$data);
    }
    function updatebyid($id,$data){
        $this->db->where('id', $id);
        $this->db->update('karyawan', $data);
    }
    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Alamat' => $this->input->post('Alamat', TRUE),
       
       'TempatLahir' => $this->input->post('TempatLahir', TRUE),
       
       'TglLahir' => $this->input->post('TglLahir', TRUE),
       
       'JK' => $this->input->post('JK', TRUE),
       
       'Telepon' => $this->input->post('Telepon', TRUE),
       
       'Jabatan' => $this->input->post('Jabatan', TRUE),
       
       'NmJabatan' => $this->input->post('NmJabatan', TRUE),
       
       'TglMasuk' => $this->input->post('TglMasuk', TRUE),
       
       'Gapok' => $this->input->post('Gapok', TRUE),
       
       'Lembur' => $this->input->post('Lembur', TRUE),
       
       'TunjanganKeluarga' => $this->input->post('TunjanganKeluarga', TRUE),
       
       'TunjanganJabatan' => $this->input->post('TunjanganJabatan', TRUE),
       
       'Transport' => $this->input->post('Transport', TRUE),
       
       'Makan' => $this->input->post('Makan', TRUE),
       
       'Lain' => $this->input->post('Lain', TRUE),
       
       'Bonus' => $this->input->post('Bonus', TRUE),
       
       'Hutang' => $this->input->post('Hutang', TRUE),
       
       'NoAcc' => $this->input->post('NoAcc', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'Time' => $this->input->post('Time', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('karyawan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('karyawan'); 
       
    }
    function delete_detail($id=null) {
        $this->db->where('id_detail', $id);
        $this->db->delete('karyawan_detail'); 
       
    } 
    function deletebybukti($bukti=null) {
        $this->db->where('faktur', $bukti);
        $this->db->delete('karyawan_detail');       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from karyawan order by id asc');
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
