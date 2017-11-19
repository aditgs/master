<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Muria extends MX_Controller {
	function __construct(){
		parent::__construct();
		// $this->load->model('muria_model','mdb',TRUE);
		$this->load->model('harga_barang_model','pricedb',TRUE);
		$this->load->model('barang_satuan_model','satdb',TRUE);
	}
	public function index()
	{
		echo "this is global";
	}
	function get_satuan($id_barang){
		// $data=$this->mdb->view_barang_satuan();
    	
    	return $this->satdb->getsatuan($id_barang);
		
	}
	function cek_hargasatuan($id_barang){
		$satuan=$this->get_satuan($id_barang);
		$data['id_barang']=$satuan['id_barang'];
		$data['kode']=$satuan['kode'];

		if($satuan['Satuan1']!=null||!empty($satuan['Satuan1'])){
			$data['sat1']=$satuan['Satuan1'];
			$data['isi1']=1;

		}
		if($satuan['Satuan2']!=null||!empty($satuan['Satuan2'])){
			$data['sat2']=$satuan['Satuan2'];
			$data['isi2']=$satuan['Isi2'];

		}
		if($satuan['Satuan3']!=null||!empty($satuan['Satuan3'])){
			$data['sat3']=$satuan['Satuan3'];
			$data['isi3']=$satuan['Isi3'];
			
		}
		return $data;
	}
	function update_hargabelitable($id_barang,$harga){
		$satuan=$this->cek_hargasatuan($id_barang);
		// print_r($satuan);
		$harga1=$harga;
		$data['hb1']=$harga1;
		if(isset($satuan['sat2'])):
			if(!empty($satuan['sat2'])||$satuan['sat2']!=null){
				$isi2=$satuan['isi2'];
				$harga2=$harga1/$isi2;
				$data['hb2']=$harga2;
			}else{
				$data['hb2']=null;

			}
		else:
				$data['hb2']=null;
		endif;
		if(isset($satuan['sat3'])):
			if(!empty($satuan['sat3'])||$satuan['sat3']!=null){
				$isi3=$satuan['isi3'];
				$harga3=$harga2/$isi3;
				$data['hb3']=$harga3;
			}else{
				$data['hb3']=null;
				
			}
		else:
				$data['hb3']=null;
		endif;
		return $data;

	}
	function update_hargajualtable($id_barang,$harga){
		$satuan=$this->cek_hargasatuan($id_barang);
		// print_r($satuan);
		$harga1=$harga;
		$data['hj1r']=$harga1;
		if(isset($satuan['sat2'])):
			if(!empty($satuan['sat2'])||$satuan['sat2']!=null){
				$isi2=$satuan['isi2'];
				$harga2=$harga1/$isi2;
				$data['hj2r']=$harga2;
			}else{
				$data['hj2r']=null;

			}
		else:
				$data['hj2r']=null;
		endif;
		if(isset($satuan['sat3'])):
			if(!empty($satuan['sat3'])||$satuan['sat3']!=null){
				$isi3=$satuan['isi3'];
				$harga3=$harga2/$isi3;
				$data['hj3r']=$harga3;
			}else{
				$data['hj3r']=null;
				
			}
		else:
				$data['hj3r']=null;
		endif;
		return $data;

	}
	function submit_hargabelitable($id_barang,$harga){
		$data=$this->update_hargabelitable($id_barang,$harga);
		return ($data);

	}
	function submit_hargajualtable($id_barang,$harga){
		$data=$this->update_hargajualtable($id_barang,$harga);
		return ($data);

	}
	function cekbeli_hargalama($id_barang,$id_satuan,$aktif=null){
        $harga=$this->hargabeli_lama($id_barang,$id_satuan,$aktif);
        return $harga;
    }
    function cekjual_hargalama($id_barang,$id_satuan,$aktif=null){
        $harga=$this->hargajual_lama($id_barang,$id_satuan,$aktif);
        return $harga;
    }
    function hargabeli_lama($id_barang,$id_satuan,$aktif=null){
    	
        $last=$this->pricedb->getbeli_lastprice($id_barang,$id_satuan,$aktif);
        // if(isset($last['last_id'])):
	        if(empty($last['last_id'])|| $last['last_id']==null){
	            $lama=$this->pricedb->getbeli_pricetab($id_barang,$id_satuan);
	            $lama['id_satuan']=$id_satuan;
	            return $lama;
	        }else{
	            
	            return $last;
	        }
	    // else:
	    // 	return $last;
	   	// endif;


    }
    function hargajual_lama($id_barang,$id_satuan,$aktif=null){
    	
        $last=$this->pricedb->getjual_lastprice($id_barang,$id_satuan,$aktif);
        // if(isset($last['last_id'])):
	        if(empty($last['last_id'])|| $last['last_id']==null){
	            $lama=$this->pricedb->getjual_pricetab($id_barang,$id_satuan);
	            $lama['id_satuan']=$id_satuan;
	            return $lama;
	        }else{
	            
	            return $last;
	        }
	    // else:
	    // 	return $last;
	   	// endif;


    }
    
}

/* End of file global.php */
/* Location: ./ */

 ?>