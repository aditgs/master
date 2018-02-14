<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan_pmb_model extends CI_Model {

	public function method_name()
	{
		
	}
	function getallpmb($data=null) {
        // sql view 001-view-tagihanmhs
        // $sql="select `a`.`id` AS `id`,`a`.`kode` AS `kode`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,`a`.`status` AS `status`,if((`a`.`isbayar` = '1'),'oke','belum lunas') AS `islunas`,`a`.`idpaket` AS `idpaket`,`a`.`multipaket` AS `multipaket`,`a`.`isvalidasi` AS `isvalidasi`,`a`.`tglvalidasi` AS `tglvalidasi`,`a`.`isprinted` AS `isprinted`,`a`.`lastprinted` AS `lastprinted`,`a`.`printcount` AS `printcount`,a.total from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`)))";
        $this->db->select('*')->from('009-view-tagihandetail a')->join('mhsmaster b','a.mhs=b.id');
        if(!empty($data['tahun'])||$data['tahun']!=='0'):
            $this->db->where('th_akad',$data['tahun']);
        endif;
        if(!empty($data['semester'])||$data['semester']!=='0'):
            $this->db->where('kdsmster',$data['semester']);
        endif;
        if(!empty($data['mhs'])||$data['mhs']!=='0'):
            $this->db->where('mhs',$data['mhs']);
        endif;
        if(!empty($data['prodi'])||$data['prodi']!=='0'):
            // $this->db->where('prodi',!empty($data['prodi'])?$data['prodi']:'61');
            $this->db->where('prodi',$data['prodi']);
        endif;
        if(!empty($data['kelompok'])||$data['kelompok']!=='0'):
            // $this->db->where('kelompok',!empty($data['kelompok'])?$data['kelompok']:'61');
            $this->db->where('kel',$data['kelompok']);
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('a.tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('a.tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif; 
        $this->db->group_by('a.kodetagihan');
        // $sql="select * from tagihanmhs";
        // $result = $this->db->query($sql);
        $result = $this->db->get();

        return $this->__result($result);
    }
    function getalltagjenis($data=null) {
		// sql view 001-view-tagihanmhs
		// $sql="select `a`.`id` AS `id`,`a`.`kode` AS `kode`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,`a`.`status` AS `status`,if((`a`.`isbayar` = '1'),'oke','belum lunas') AS `islunas`,`a`.`idpaket` AS `idpaket`,`a`.`multipaket` AS `multipaket`,`a`.`isvalidasi` AS `isvalidasi`,`a`.`tglvalidasi` AS `tglvalidasi`,`a`.`isprinted` AS `isprinted`,`a`.`lastprinted` AS `lastprinted`,`a`.`printcount` AS `printcount`,a.total from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`)))";
		$this->db->select('*')->from('009-view-tagihandetail a')->join('mhsmaster b','a.mhs=b.id');
		if(!empty($data['tahun'])||$data['tahun']!=='0'):
            $this->db->where('th_akad',$data['tahun']);
        endif;
        if(!empty($data['semester'])||$data['semester']!=='0'):
            $this->db->where('kdsmster',$data['semester']);
        endif;
        if(!empty($data['mhs'])||$data['mhs']!=='0'):
            $this->db->where('mhs',$data['mhs']);
        endif;
		if(!empty($data['prodi'])||$data['prodi']!=='0'):
            // $this->db->where('prodi',!empty($data['prodi'])?$data['prodi']:'61');
            $this->db->where('prodi',$data['prodi']);
        endif;
        if(!empty($data['kelompok'])||$data['kelompok']!=='0'):
            // $this->db->where('kelompok',!empty($data['kelompok'])?$data['kelompok']:'61');
            $this->db->where('kel',$data['kelompok']);
        endif;
		if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('a.tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('a.tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif; 
        $this->db->group_by('a.kodejenis');
		// $sql="select * from tagihanmhs";
        // $result = $this->db->query($sql);
        $result = $this->db->get();

        return $this->__result($result);
    }
    function getdetailtagihan($kode){
    	// sql view 009-view-tagihandetail`
    	$this->db->select('*')->from('009-view-tagihandetail');
    	$this->db->where('kodetagihan',$kode);
    	$result = $this->db->get();

        return $this->__result($result);
    }
    function getrekappermhsx() {
        // sql view 010-view-totaltagih-permhs
        $sql="select `a`.`mhs` AS `mhs`,`b`.`nim` AS `nimmhs`,left(`b`.`nim`,4) AS `kodemhs`,`b`.`nama` AS `nmmhs`,sum(`a`.`total`) AS `totalmhs` from (`tagihanmhs` `a` left join `mhsmaster` `b` on((`a`.`mhs` = `b`.`id`))) group by `a`.`mhs`";
        // $sql="select * from tagihanmhs";
        $result = $this->db->query($sql);

        return $this->__result($result);
    } 
    function getrekappermhs($data) {
		// sql view 010-view-totaltagih-permhs
		if(!empty($data['tahun'])||$data['tahun']!=='0'):
            $this->db->where('th_akad',$data['tahun']);
        endif;
        if(!empty($data['semester'])||$data['semester']!=='0'):
            $this->db->where('kdsmster',$data['semester']);
        endif;
        if(!empty($data['mhs'])||$data['mhs']!=='0'):
            $this->db->where('mhs',$data['mhs']);
        endif;
        if(!empty($data['prodi'])||$data['prodi']!=='0'):
            // $this->db->where('prodi',!empty($data['prodi'])?$data['prodi']:'61');
            $this->db->where('prodi',$data['prodi']);
        endif;
        if(!empty($data['kelompok'])||$data['kelompok']!=='0'):
            // $this->db->where('kelompok',!empty($data['kelompok'])?$data['kelompok']:'61');
            $this->db->where('kel',$data['kelompok']);
        endif;
        if(!empty($data['start'])||$data['start']!==''):
            $this->db->where('a.tanggal >=',!empty($data['start'])?$data['start']:date('Y-m-d'));
        endif;
        if(!empty($data['end'])||$data['end']!==''):
            $this->db->where('a.tanggal <=',!empty($data['end'])?$data['end']:date('Y-m-d'));
        endif; 
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