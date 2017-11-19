<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Barang_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('barang', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('barang');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'Kode' => $this->input->post('Kode', TRUE),
           
            'Cabang' => $this->input->post('Cabang', TRUE),
           
            'Barcode' => $this->input->post('Barcode', TRUE),
           
            'Nama' => $this->input->post('Nama', TRUE),
           
            'Keterangan' => $this->input->post('Keterangan', TRUE),
           
            'id_golongan' => $this->input->post('id_golongan', TRUE),
           
            'Kemasan' => $this->input->post('Kemasan', TRUE),
           
            'Isi2' => $this->input->post('Isi2', TRUE),
           
            'Isi3' => $this->input->post('Isi3', TRUE),
           
            'StKon' => $this->input->post('StKon', TRUE),
           
            'id_supplier' => $this->input->post('id_supplier', TRUE),
           
            'User' => $this->input->post('User', TRUE),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        $this->db->insert('barang', $data);
         $idbarang=$this->db->insert_id();
        $data["id"]=$idbarang;
        // array_push($data,$data);
        echo json_encode($data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'Kode' => $this->input->post('Kode', TRUE),
       
       'Cabang' => $this->input->post('Cabang', TRUE),
       
       'Barcode' => $this->input->post('Barcode', TRUE),
       
       'Nama' => $this->input->post('Nama', TRUE),
       
       'Keterangan' => $this->input->post('Keterangan', TRUE),
       
       'id_golongan' => $this->input->post('id_golongan', TRUE),
       
       'Kemasan' => $this->input->post('Kemasan', TRUE),
       
       'Isi2' => $this->input->post('Isi2', TRUE),
       
       'Isi3' => $this->input->post('Isi3', TRUE),
       
       'StKon' => $this->input->post('StKon', TRUE),
       
       'id_supplier' => $this->input->post('id_supplier', TRUE),
       
       'User' => $this->input->post('User', TRUE),
       
       'datetime' => date('Y-m-d H:m:s'),
       
        );
        $this->db->where('id', $id);
        $this->db->update('barang', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('barang'); 
       
    }
    function dropdown_supplier($type=null){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            if(!empty($type)||$type=TRUE):
            $result[$row->kode]= $row->kode." (".$row->nama.")";
            else:
            $result[$row->id]= $row->kode." (".$row->nama.")";
            endif;
        }
        return $result;
    }
    function dropdown_kategori($type=null){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Keterangan from `jenis_barang` order by id asc');
        $result[0]="-- Pilih Kategori Barang --";
        foreach ($array_keys_values->result() as $row)
        { 
            if(!empty($type)||$type=TRUE):
                $result[$row->Kode]= $row->Kode." (".$row->Keterangan.")";
            else:
                $result[$row->id]= $row->Kode." (".$row->Keterangan.")";
            endif;
        }
        return $result;
    }
    function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by id asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by id asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
        return $result;
    } 
    function dropdown_satuan($id_barang){
        $result = array();
        $sql="select idsatuan,value,descrip,kode
            from(
            select id, id_barang,kode,'1' idsatuan,Satuan1 VALUE,'Satuan1' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'2' idsatuan,Satuan2 VALUE,'Satuan2' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'3' idsatuan,Satuan3 VALUE,'Satuan3' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            ) src group by descrip ";
        // $array_keys_values = $this->db->query('select id,Kode,Nama from supplier order by id asc');
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->idsatuan]= $row->value." (".$row->descrip.")";
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from barang order by id asc');
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
