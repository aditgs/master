<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan_tagihan_model extends CI_Model {

	public function method_name()
	{
		
	}
	function getalltagihan() {
		// sql view 001-view-tagihanmhs
		$sql="select `a`.`id` AS `id`,`a`.`kode` AS `kode`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,`a`.`status` AS `status`,if((`a`.`isbayar` = '1'),'oke','belum lunas') AS `islunas`,`a`.`idpaket` AS `idpaket`,`a`.`multipaket` AS `multipaket`,`a`.`isvalidasi` AS `isvalidasi`,`a`.`tglvalidasi` AS `tglvalidasi`,`a`.`isprinted` AS `isprinted`,`a`.`lastprinted` AS `lastprinted`,`a`.`printcount` AS `printcount`,a.total from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`)))";
		// $sql="select * from tagihanmhs";
        $result = $this->db->query($sql);

        return $this->__result($result);
    } 
    function getrekappermhs() {
		// sql view 001-view-tagihanmhs
		$sql="select `a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,sum(`a`.`total`) AS `totalmhs` from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`))) group by `a`.`mhs`";
		// $sql="select * from tagihanmhs";
        $result = $this->db->query($sql);

        return $this->__result($result);
    } 
    function getdetailtag($kode=false){
    	// sql view 009-view-tagihandetail`
    	$main="select `a`.`idtagihan` AS `idtagihan`,`a`.`id` AS `iddetail`,`a`.`kodetagihan` AS `kodetagihan`,`a`.`nim` AS `nim`,`a`.`mhs` AS `mhs`,`a`.`tanggal` AS `tanggal`,`a`.`kodetarif` AS `kodetarif`,`a`.`tarif` AS `tarif`,`a`.`total` AS `total`,`b`.`kodepaket` AS `kodepaket`,`b`.`kodemhs` AS `kodemhs`,`b`.`prodi` AS `prodi`,`b`.`angktn` AS `angktn`,`b`.`jenis` AS `jenis`,`b`.`kel` AS `kel`,`b`.`th_akad` AS `th_akad`,`b`.`kdsmster` AS `kdsmster`,`b`.`nmprodi` AS `nmprodi`,`b`.`nmjenis` AS `nmjenis`,`b`.`Kelompok` AS `Kelompok`,`b`.`smster` AS `smster` from (`002-view-tagihandetail` `a` left join `006-view-tarifdetail` `b` on((`b`.`kodetarif` = `a`.`kodetarif`))) ";
    	$order=" group by `a`.`idtagihan`,`a`.`kodetarif` order by `a`.`idtagihan` ";
    	if(!empty($kode)||$kode!==null||$kode!==FALSE){
    		$where=" where kodetagihan='".$kode."'";
    		$sql=$main.$where.$order;
    	}else{
    		$sql=$main.$order;
    	}
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