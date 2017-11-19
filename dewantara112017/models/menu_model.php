<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Menu_model extends CI_Model {

	public function method_name()
	{
		
	}

	function getmenus($id=null,$gid=null,$module=null) {
		if(!empty($id)||!is_null($id)){
            $this->db->where('parent', $id);
        }
        if(!empty($gid)||!is_null($gid)){
            $this->db->where_in('groupid', $gid);
        }
        if(!empty($module)||!is_null($module)){
        	$this->db->where('module', $module);
		}
        $result = $this->db->get('menu');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function getchild($parent=null) {
		if(!empty($parent)||!is_null($parent)){
        	$this->db->where('parent', $parent);
		}
        $result = $this->db->get('00-00-view-child-menu');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
}

/* End of file menu_model.php */
/* Location: ./ */
 ?>