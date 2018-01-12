<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Files_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('files', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('files');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'filename' => $this->input->post('filename', TRUE),
           
            'title' => $this->input->post('title', TRUE),
           
            'url' => $this->input->post('url', TRUE),
           
            'type' => $this->input->post('type', TRUE),
           
            'album_id' => $this->input->post('album_id', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'timestamp' => $this->input->post('timestamp', TRUE),
           
        );
        $this->db->insert('files', $data);
    }

    function upload($data=null) {
          /* $data = array(
        
            'filename' => $this->input->post('filename', TRUE),
           
            'title' => $this->input->post('title', TRUE),
           
            'url' => $this->input->post('url', TRUE),
           
            'type' => $this->input->post('type', TRUE),
           
            'album_id' => $this->input->post('album_id', TRUE),
           
            'user_id' => $this->input->post('user_id', TRUE),
           
            'timestamp' => $this->input->post('timestamp', TRUE),
           
        );*/
        $this->db->insert('files', $data);
    }

    function update($id) {
        $data = array(
        'id' => $this->input->post('id',TRUE),
       'filename' => $this->input->post('filename', TRUE),
       
       'title' => $this->input->post('title', TRUE),
       
       'url' => $this->input->post('url', TRUE),
       
       'type' => $this->input->post('type', TRUE),
       
       'album_id' => $this->input->post('album_id', TRUE),
       
       'user_id' => $this->input->post('user_id', TRUE),
       
       'timestamp' => $this->input->post('timestamp', TRUE),
       
        );
        $this->db->where('id', $id);
        $this->db->update('files', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('files'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id, '.$value.' from files order by id asc');
        $result[0]="-- Pilih Urutan id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->$value;
        }
        return $result;
    }
    
}
?>
