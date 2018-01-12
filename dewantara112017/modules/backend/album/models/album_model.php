<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Album_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('album', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($album_id) {
        $this->db->where('album_id', $album_id);
        $result = $this->db->get('album');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'name' => $this->input->post('name', TRUE),
           
            'description' => $this->input->post('description', TRUE),
           
            'parent' => $this->input->post('parent', TRUE),
           
            'timestamp' => $this->input->post('timestamp', TRUE),
           
        );
        $this->db->insert('album', $data);
    }

    function update($album_id) {
        $data = array(
        'album_id' => $this->input->post('album_id',TRUE),
       'name' => $this->input->post('name', TRUE),
       
       'description' => $this->input->post('description', TRUE),
       
       'parent' => $this->input->post('parent', TRUE),
       
       'timestamp' => $this->input->post('timestamp', TRUE),
       
        );
        $this->db->where('album_id', $album_id);
        $this->db->update('album', $data);
    }

    function delete($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->delete('album'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select album_id, '.$value.' from album order by album_id asc');
        $result[0]="-- Pilih Urutan album_id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->album_id]= $row->$value;
        }
        return $result;
    }
    
}
?>
