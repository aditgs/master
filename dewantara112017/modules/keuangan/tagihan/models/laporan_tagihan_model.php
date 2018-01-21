<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan_tagihan_model extends CI_Model {

	public function method_name()
	{
		
	}
	function getalltagihan() {
		$sql="select `a`.`id` AS `id`,`a`.`kode` AS `kode`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,`a`.`status` AS `status`,if((`a`.`isbayar` = '1'),'oke','belum lunas') AS `islunas`,`a`.`idpaket` AS `idpaket`,`a`.`multipaket` AS `multipaket`,`a`.`isvalidasi` AS `isvalidasi`,`a`.`tglvalidasi` AS `tglvalidasi`,`a`.`isprinted` AS `isprinted`,`a`.`lastprinted` AS `lastprinted`,`a`.`printcount` AS `printcount`,a.total from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`)))";
		// $sql="select * from tagihanmhs";
        $result = $this->db->query($sql);

        return $this->__result($result);
    } 
    function __result($result){
    	if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
}

/* End of file laporan_tagihan_model.php */
/* Location: ./ */ ?>