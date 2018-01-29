<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Setup_model extends CI_Model {

	function savesetup($data){
        $this->db->insert('setup_tarif',$data);
        return $this->db->insert_id();
    }
    function savedetailbatch($data){
        $this->db->insert_batch('tagihan_detail',$data);
    }
    function savetarifbatch($data){
        $this->db->insert_batch('tarif',$data);
    }
   
}

/* End of file setup_model.php */
/* Location: ./ */ ?>