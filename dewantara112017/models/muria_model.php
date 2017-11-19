<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Muria_model extends CI_Model {

	public function method_name()
	{
		
	}
	function dropdown_supplier(){
        $result = array();
        $array_keys_values = $this->db->query('select id,kode,nama from `00-00-02-02-view-supplier-kode` order by id asc');
        $result[0]="-- Pilih Supplier --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".$row->nama.")";
        }
        return $result;
    }
     function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="MT" order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        return $result;
    }
	function view_barang() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` as `a`;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat`,`b`.`Kode` AS `kdsupplier`,`b`.`id` AS `id_supplier` from (`view_barang` `a` left join `supplier` `b` on((`b`.`Kode` = `a`.`id_supplier`))) where (`b`.`Kode` is not null) group by `a`.`Kode` order by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_no_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from (`view_barang` `a` left join `supplier` `b` on((`b`.`Kode` = `a`.`id_supplier`))) where (isnull(`b`.`Kode`) or isnull(`a`.`id_supplier`)) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_tanpa_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from (`view_barang` `a` left join `supplier` `b` on((`b`.`Kode` = `a`.`id_supplier`))) where isnull(`a`.`id_supplier`) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_semua_barang_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat`,`b`.`Kode` AS `kdsupplier` from (`view_barang` `a` left join `supplier` `b` on((`b`.`Kode` = `a`.`id_supplier`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_drop_barang_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`b`.`id` AS `id_supplier`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat` from (`view_barang` `a` left join `supplier` `b` on((`b`.`Kode` = `a`.`id_supplier`))) where (`b`.`Kode` is not null) group by `a`.`Kode` order by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_satuan($id=null) {
		$sql="select `a`.`id` AS `id`,`a`.`id_barang` AS `id_barang`,`a`.`kode` AS `kode`,`b`.`Nama` AS `nmbarang`,`a`.`Satuan1` AS `Satuan1`,`a`.`Isi2` AS `Isi2`,`a`.`Satuan2` AS `Satuan2`,`a`.`Isi3` AS `Isi3`,`a`.`Satuan3` AS `Satuan3`,`a`.`Max` AS `Max`,`a`.`SatuanMax` AS `SatuanMax`,`a`.`Min` AS `Min`,`a`.`SatuanMin` AS `SatuanMin` from (`barang_satuan` `a` join `barang` `b` on((`b`.`id` = `a`.`id_barang`))) ;";
		$this->db->where('id_barang',$id);
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_kategori() {
		$sql="select `barang`.`id` AS `id`,`barang`.`Kode` AS `Kode`,`barang`.`Nama` AS `Nama`,`barang`.`id_golongan` AS `id_golongan` from `barang` order by `barang`.`Kode`,`barang`.`id_golongan` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_ayam() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` `a` where (`a`.`id_golongan` = '05') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_pakan() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` `a` where (`a`.`id_golongan` = '02') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_obatvaksin() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` `a` where ((`a`.`id_golongan` = '03') or (`a`.`id_golongan` = '15')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_telur() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` `a` where (`a`.`id_golongan` = '01') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_sapronak() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime` from `barang` `a` where (`a`.`id_golongan` = '06') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_barang_beli_customer() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama` from `view_barang` `a` where ((`a`.`Nama` like '%sekem%') or (`a`.`Nama` like 'retak') or (`a`.`Nama` like 'telur') or (`a`.`Nama` like 'jagung') or (`a`.`Nama` like 'katul')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_supplier() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`Alamat` AS `Alamat`,`a`.`Kota` AS `Kota`,`a`.`Telepon` AS `Telepon`,`a`.`Fax` AS `Fax`,`a`.`NoAcc` AS `NoAcc`,`a`.`Contact` AS `Contact` from `supplier` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_supplier_hutang() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`Alamat` AS `Alamat`,`a`.`Kota` AS `Kota`,`a`.`Telepon` AS `Telepon`,`a`.`Fax` AS `Fax`,`a`.`NoAcc` AS `NoAcc`,`a`.`Contact` AS `Contact`,cast(`a`.`Hutang` as decimal(20,2)) AS `Hutang`,cast(`a`.`Bayar` as decimal(20,2)) AS `Bayar`,cast(`a`.`Sisa` as decimal(20,2)) AS `Sisa` from `supplier` `a` where (`a`.`Hutang` > 0) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_supplier_kode() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kode`,substr(`a`.`Kode`,3,4) AS `right`,`a`.`Nama` AS `nama` from `view_supplier` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_po_invoice() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_invoice` AS `faktur_invoice`,`a`.`faktur_po` AS `faktur_po`,`a`.`id_supplier` AS `id_supplier`,`a`.`tgl_invoice` AS `tgl_invoice`,`a`.`pembayaran` AS `pembayaran`,`a`.`jatuh_tempo` AS `jatuh_tempo`,`a`.`status` AS `status`,`a`.`datetime` AS `datetime` from `invoice_po` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_purchase_order() {
		$sql="select `a`.`id` AS `idpo`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`a`.`status` AS `status`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `namasupplier`,`a`.`tgl_kirim_po` AS `tgl_kirim_po`,`a`.`tgl_kedaluarsa_po` AS `tgl_kedaluarsa_po`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idsupplier`,`d`.`id` AS `id_armada`,`e`.`nama` AS `nama_armada`,`e`.`kode` AS `kode`,`e`.`nopol` AS `nopol`,`f`.`nama_supir` AS `nama_supir` from (((((`purchase_order` `a` join `supplier` `b` on((`b`.`id` = `a`.`id_supplier`))) left join `jenis_pembayaran` `c` on((`c`.`id` = `a`.`id_bayar`))) left join `armada` `d` on((`d`.`id` = `a`.`id_armada`))) left join `kendaraan` `e` on((`e`.`id` = `d`.`kendaraan_id`))) left join `supir_armada` `f` on((`f`.`id` = `d`.`supir_id`))) order by `a`.`faktur_po` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_po_2015() {
		$sql="select `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,date_format(`a`.`Time`,'%d_%m_%Y') AS `tgl_po`,format(sum(cast(`a`.`Jumlah` as decimal(20,2))),2,'id_ID') AS `jtotal`,date_format(`a`.`Time`,'%Y') AS `tahun` from `beli` `a` where (date_format(`a`.`Time`,'%Y') = '2015') group by `a`.`Faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_po_trx() {
		$sql="select `a`.`id` AS `idpo`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`a`.`status` AS `status`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `namasupplier`,`a`.`tgl_kirim_po` AS `tgl_kirim_po`,`a`.`tgl_kedaluarsa_po` AS `tgl_kedaluarsa_po`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idsupplier`,`d`.`id` AS `idpt`,`d`.`faktur_pt` AS `usedby` from (((`purchase_order` `a` join `supplier` `b` on((`b`.`id` = `a`.`id_supplier`))) left join `jenis_pembayaran` `c` on((`c`.`id` = `a`.`id_bayar`))) left join `purchase_transaction` `d` on((`d`.`id_po` = `a`.`id`))) order by `a`.`faktur_po` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_po_detail_2015() {
		$sql="select `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,cast(`a`.`Qty` as decimal(10,0)) AS `Qty`,`a`.`Satuan` AS `Satuan`,format(cast(`a`.`Harga` as decimal(20,2)),2,'id_ID') AS `harga`,format(cast(`a`.`Jumlah` as decimal(20,2)),2,'id_ID') AS `jtotal`,`a`.`Status` AS `Status`,`a`.`User` AS `User`,`a`.`Time` AS `tanggal`,date_format(`a`.`Time`,'%Y') AS `tahun` from `beli` `a` where (date_format(`a`.`Time`,'%Y') = '2015') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_detail_po_lamax() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,`a`.`jumlah` AS `jumlah`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`d`.`hb1` AS `harga_kemasan`,`d`.`hb2` AS `harga_satuan`,`e`.`Satuan1` AS `satuan_kemasan`,`e`.`Satuan2` AS `satuan`,(`a`.`jumlah` * `d`.`hb1`) AS `subtot_kemasan`,(`a`.`jumlah` * `d`.`hb2`) AS `subtot_satuan` from (((`purchase_order_detail` `a` join `barang` `c` on((`c`.`id` = `a`.`id_barang`))) join `barang_harga` `d` on((`d`.`id_barang` = `c`.`id`))) join `barang_satuan` `e` on((`e`.`id_barang` = `a`.`id_barang`))) order by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_detail_po() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`e`.`Satuan1`,if((`a`.`id_satuan` = 2),`e`.`Satuan2`,`e`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga`,(`a`.`jumlah` * if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`))) AS `subtotal`,`c`.`id` AS `idbarang` from (((`purchase_order_detail` `a` join `barang` `c` on((`c`.`id` = `a`.`id_barang`))) join `barang_harga` `d` on((`d`.`id_barang` = `c`.`id`))) join `barang_satuan` `e` on((`e`.`id_barang` = `a`.`id_barang`))) order by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_detail_po_total() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,sum(`a`.`subtotal`) AS `total`,format(cast(sum(`a`.`subtotal`) as decimal(20,2)),2,'id_ID') AS `rptotal` from `view_detail_po` `a` group by `a`.`po` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_aktiva() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = 1) order by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_pasiva() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = 2) group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_modal() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = 3) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_pendapatan() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = 4) order by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_biaya() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = 5) group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_bank() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '1.200') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_kas() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '1.100') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_piutang_dagang() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '1.250') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_hpp() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,1) = '6') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_hutang_dagang() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '2.300') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_piutang_karyawan() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '1.700') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_biaya_penyusutan() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '5.900') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekening_retur_jual() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '5.700') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rek_penjualan() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '4.900') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rek_pembelian() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime` from `rekening` `a` where (left(`a`.`Kode`,5) = '2.200') group by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_customer_kode() {
		$sql="select `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,substr(`a`.`Kode`,_(4)) AS `right`,`a`.`Nama` AS `Nama` from `customer` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_purchasing() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_pt` AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`a`.`id_po` AS `id_po`,`purchase_order`.`faktur_po` AS `faktur_po`,`purchase_order`.`tgl_po` AS `tgl_po` from (`purchase_transaction` `a` left join `purchase_order` on((`purchase_order`.`id` = `a`.`id_po`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_transaksi_beli() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_pt` AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`b`.`jenis_beli` AS `jenis_beli`,if((`a`.`id_po` <> 0),`c`.`faktur_po`,'') AS `po`,`c`.`tgl_po` AS `tgl_po`,`a`.`tgl_jatuh_tempo` AS `tgl_jatuh_tempo`,`c`.`id_supplier` AS `id_supplier`,`a`.`id_supplier` AS `idsp`,`supplier`.`Kode` AS `Kode`,`supplier`.`Nama` AS `Nama`,`a`.`id_customer` AS `id_customer`,`e`.`Kode` AS `kdcs`,`e`.`Nama` AS `namacs`,`a`.`totalbayar` AS `totalbayar`,`a`.`uangmuka` AS `uangmuka`,`a`.`biayakirim` AS `biayakirim`,`a`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`b`.`datetime` AS `datetime` from ((((`purchase_transaction` `a` left join `jenis_pembelian` `b` on((`b`.`id` = `a`.`id_tipe_beli`))) left join `purchase_order` `c` on((`c`.`id` = `a`.`id_po`))) left join `supplier` on(((`supplier`.`id` = `c`.`id_supplier`) or (`a`.`id_supplier` = `supplier`.`id`)))) left join `customer` `e` on((`e`.`id` = `a`.`id_customer`))) order by `a`.`id`,`a`.`faktur_pt` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_transaksi_beli_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_pt` AS `id_pt`,`a`.`pt` AS `faktur_pt`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,`a`.`harga_beli` AS `harga_beli`,(if(((`a`.`harga_beli` <= 0) or isnull(`a`.`harga_beli`)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) * `a`.`jumlah`) AS `subtotal`,if(((`a`.`harga_beli` <= 0) or isnull(`a`.`harga_beli`)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) AS `harga`,`a`.`keterangan` AS `keterangan`,`b`.`id` AS `id` from ((((`purchase_transaction_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `purchase_transaction` `x` on(((`x`.`id` = `a`.`id_pt`) or (`x`.`faktur_pt` = `a`.`pt`)))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_trx_beli_detail_total() {
		$sql="select `a`.`id_pt` AS `id_pt`,`a`.`faktur_pt` AS `faktur_pt`,sum(`a`.`subtotal`) AS `total`,format(sum(`a`.`subtotal`),2) AS `rptotal` from `view_transaksi_beli_detail` `a` group by `a`.`faktur_pt` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_hutang_supplier() {
		$sql="select `a`.`idsp` AS `idsp`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,sum(`a`.`totalbayar`) AS `totalbayar`,sum(`a`.`uangmuka`) AS `uangmuka`,sum((`a`.`totalbayar` _ `a`.`uangmuka`)) AS `sisa_hutang` from `view_transaksi_beli` `a` group by `a`.`idsp`,`a`.`Kode` order by `a`.`Kode` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_beli_customer() {
		$sql="select `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan`,`a`.`Harga` AS `Harga`,`a`.`Jumlah` AS `Jumlah` from `beli` `a` where ((`a`.`NmBarang` like '%sekem%') or (`a`.`NmBarang` like 'retak') or (`a`.`NmBarang` like 'telur') or (`a`.`NmBarang` like 'jagung') or (`a`.`NmBarang` like 'katul')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_per_transaksi_beli() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,date_format(`a`.`tgl_pt`,'%d/%m/%Y') AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`b`.`jenis_beli` AS `jenis_beli`,`c`.`id_supplier` AS `id_supplier`,`a`.`id_supplier` AS `idsp`,`supplier`.`Kode` AS `kdsp`,`supplier`.`Nama` AS `namasp`,`a`.`id_customer` AS `idcs`,`e`.`Kode` AS `kdcs`,`e`.`Nama` AS `namacs`,`xx`.`id` AS `idbrg`,`xx`.`Kode` AS `kdbrg`,`xx`.`Nama` AS `namabrg`,`xx`.`jumlah` AS `jumlah`,`xx`.`satuan` AS `satuan`,cast(`xx`.`harga` as decimal(20,2)) AS `harga` from (((((`purchase_transaction` `a` left join `jenis_pembelian` `b` on((`b`.`id` = `a`.`id_tipe_beli`))) left join `purchase_order` `c` on((`c`.`id` = `a`.`id_po`))) left join `supplier` on(((`supplier`.`id` = `c`.`id_supplier`) or (`a`.`id_supplier` = `supplier`.`id`)))) left join `customer` `e` on((`e`.`id` = `a`.`id_customer`))) left join `view_transaksi_beli_detail` `xx` on((`xx`.`faktur_pt` = `a`.`faktur_pt`))) order by `a`.`id`,`a`.`faktur_pt` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_purchase_return() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pr` AS `faktur_pr`,`c`.`faktur_pt` AS `pt`,`a`.`tgl_pr` AS `tgl_pr`,if((`a`.`tipe_retur` = 1),'Berdasarkan Supplier','Dari Transaksi Pembelian') AS `tipe_retur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`totalretur` AS `totalretur`,`a`.`bayar` AS `bayar`,`a`.`biayakirim` AS `biayakirim`,`c`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`a`.`keterangan` AS `keterangan`,`a`.`id_supplier` AS `id_supplier` from ((`purchase_return` `a` join `supplier` `b` on((`b`.`id` = `a`.`id_supplier`))) left join `purchase_transaction` `c` on((`a`.`id_pt` = `c`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_detail_return() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur_pr` AS `faktur_pr`,`a`.`id_pr` AS `id_pr`,`a`.`jumlah` AS `jumlah`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_beli`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from (((`purchase_return_detail` `a` join `barang` `b` on((`b`.`id` = `a`.`id_barang`))) join `barang_satuan` `c` on((`c`.`id_barang` = `a`.`id_barang`))) join `barang_harga` `d` on((`d`.`id_barang` = `a`.`id_barang`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_kas_masuk_total() {
		$sql="select `a`.`id_kas_masuk` AS `id_kas_masuk`,`a`.`faktur_kas` AS `faktur_kas`,sum(`a`.`nominal`) AS `kas_total` from `kas_masuk_detail` `a` group by `a`.`faktur_kas`,`a`.`id_kas_masuk` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_kas_keluar_total() {
		$sql="select `a`.`id_kas_keluar` AS `id_kas_keluar`,`a`.`faktur_kas` AS `faktur_kas`,sum(`a`.`nominal`) AS `kas_total` from `kas_keluar_detail` `a` group by `a`.`faktur_kas`,`a`.`id_kas_keluar` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_kas_masuk() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_kas` AS `faktur_kas`,`a`.`tgl_kas` AS `tgl_kas`,`a`.`akun_kas` AS `akun_kas`,`a`.`nominal` AS `nominal`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`b`.`Wilayah` AS `Wilayah`,`a`.`keterangan` AS `keterangan` from (`kas_masuk` `a` join `customer` `b` on((`b`.`id` = `a`.`id_customer`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_kas_keluar() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_kas` AS `faktur_kas`,`a`.`tgl_kas` AS `tgl_kas`,`a`.`akun_kas` AS `akun_kas`,`a`.`nominal` AS `nominal`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`a`.`keterangan` AS `keterangan` from (`kas_keluar` `a` join `supplier` `b` on((`b`.`id` = `a`.`id_supplier`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bank_kode() {
		$sql="select `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti_bank`,`a`.`tipe_trx` AS `tipe_trx`,substr(`a`.`bukti_bank`,1,2) AS `first` from `bank` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_total_detail_bank() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_trx_bank` AS `id_trx_bank`,`a`.`bukti_bank` AS `bukti_bank`,sum(`a`.`nominal_detail`) AS `total_nominal` from `bank_detail` `a` group by `a`.`bukti_bank`,`a`.`id_trx_bank` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bank() {
		$sql="select `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti_bank`,`a`.`tipe_trx` AS `tipe_trx`,`a`.`akun_bank` AS `akun_bank`,`a`.`tgl_bank` AS `tgl_bank`,`a`.`keterangan` AS `keterangan`,`a`.`total_bank` AS `total_bank`,`a`.`total_giro` AS `total_giro`,`a`.`ref` AS `ref`,`b`.`Kode` AS `kode_bank`,`b`.`Rekening` AS `Rekening`,`b`.`Keterangan` AS `ket_rek`,concat(`c`.`Nama`,' (',`c`.`Kode`,')') AS `supplier`,concat(`d`.`Nama`,' (',`d`.`Kode`,')') AS `customer` from (((`banks` `b` join `bank` `a` on((`b`.`id` = `a`.`id_bank`))) left join `supplier` `c` on((`c`.`id` = `a`.`id_supplier`))) left join `customer` `d` on((`d`.`id` = `a`.`id_customer`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_total_tt_giro() {
		$sql="select `a`.`id` AS `id`,`a`.`id_trx_bank` AS `id_trx_bank`,`a`.`bukti_bank` AS `bukti_bank`,sum(`a`.`nominal`) AS `total_tt_giro` from `bank_giro` `a` group by `a`.`bukti_bank`,`a`.`id_trx_bank` order by `a`.`id` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_bank_masuk() {
		$sql="select `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti`,`a`.`akun_bank` AS `akun`,`a`.`tipe_trx` AS `tipe_trx` from `bank` `a` where (`a`.`tipe_trx` = 'D') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_bank_keluar() {
		$sql="select `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti`,`a`.`akun_bank` AS `akun`,`a`.`tipe_trx` AS `tipe_trx` from `bank` `a` where (`a`.`tipe_trx` = 'K') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_kas_masuk() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_kas` AS `bukti`,`a`.`akun_kas` AS `akun` from `kas_masuk` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_kas_keluar() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_kas` AS `bukti`,`a`.`akun_kas` AS `akun` from `kas_keluar` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_pt() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pt` AS `bukti`,`a`.`akun_hutang` AS `akun` from `purchase_transaction` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_purchase_return() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_pr` AS `bukti`,`a`.`akun_hutang` AS `akun` from `purchase_return` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_sales_trx() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_piutang` AS `akun` from `sales_trx` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_sales_return() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur_sr` AS `bukti`,`a`.`akun_piutang` AS `akun` from `sales_return` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_recording_ayam() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun` from `recording_ayam` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_recording_telur() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun` from `recording_telur` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_recording_pakan() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun` from `recording_pakan` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_bukti_recording_medis() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun` from `recording_medis` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_jurnal_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_jurnal` AS `id_jurnal`,`a`.`no_jurnal` AS `no_jurnal`,`a`.`akun_detail` AS `akun_detail`,`a`.`ket_detail` AS `ket_detail`,if((`a`.`tipe_detail` = 'D'),`a`.`nilai`,0) AS `debet`,if((`a`.`tipe_detail` = 'K'),`a`.`nilai`,0) AS `kredit` from `jurnal_detail` `a` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_total_jurnal() {
		$sql="select `a`.`id_jurnal` AS `id_jurnal`,`a`.`no_jurnal` AS `no_jurnal`,sum(`a`.`debet`) AS `totdebet`,sum(`a`.`kredit`) AS `totkredit` from `view_jurnal_detail` `a` group by `a`.`no_jurnal` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`b`.`Kode` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`d`.`nama` AS `recording`,`a`.`total` AS `total`,`a`.`jumlah` AS `jumlah`,date_format(`a`.`tanggal`,'%Y_%m') AS `tahunbulan`,substr(`a`.`faktur`,1,3) AS `kodefaktur`,substr(`a`.`faktur`,4,4) AS `blnthnfaktur`,year(`a`.`tanggal`) AS `tahun`,week(`a`.`tanggal`,3) AS `minggu`,`a`.`keterangan` AS `keterangan`,`a`.`datetime` AS `datetime` from (((`recording_ayam` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) join `jenis_recording` `d` on((`a`.`id_recording` = `d`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayamx() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`a`.`usia` AS `usia`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from ((((`recording_ayam_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `recording_ayam` `x` on(((`x`.`id` = `a`.`id_recording_ayam`) or (`x`.`faktur` = `a`.`faktur_recording`)))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur_recording` AS `faktur`,`a`.`faktur_reff` AS `faktur_reff`,`b`.`Kode` AS `Kode`,`a`.`usia` AS `usia`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from ((((`recording_ayam_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `recording_ayam` `x` on(((`x`.`id` = `a`.`id_recording_ayam`) or (`x`.`faktur` = `a`.`faktur_recording`)))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_total() {
		$sql="select `a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`,`a`.`jumlah_satuan` AS `jumlah`,if((`a`.`id_satuan` = 1),`b`.`Satuan1`,`b`.`Satuan2`) AS `satuan`,if(((`a`.`id_satuan` = 1) and (`b`.`Isi2` > 0)),(`a`.`jumlah_satuan` * 100),`a`.`jumlah_satuan`) AS `jmlekor`,`b`.`Satuan1` AS `Satuan1`,`b`.`Satuan2` AS `Satuan2`,`b`.`Satuan3` AS `Satuan3`,`b`.`Isi2` AS `Isi2`,`b`.`Isi3` AS `Isi3` from (`view_rekam_ayam_detail` `a` join `barang_satuan` `b` on((`b`.`kode` = `a`.`Kode`))) group by `a`.`faktur` order by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_mati_kartustok() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording` from (`kartustok` `a` left join `recording_ayam` `b` on((`b`.`faktur` = `a`.`faktur_ref`))) where ((left(`a`.`faktur_ref`,3) = 'RAM') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_afkir_kartustok() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording` from (`kartustok` `a` left join `recording_ayam` `b` on((`b`.`faktur` = `a`.`faktur_ref`))) where ((left(`a`.`faktur_ref`,3) = 'RAA') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_ayam_perkandang() {
		$sql="select `a`.`kandang` AS `kandang`,sum(if((substr(`a`.`faktur`,3,1) = 'I'),`a`.`jumlah`,0)) AS `isi`,sum(if((substr(`a`.`faktur`,3,1) = 'T'),`a`.`jumlah`,0)) AS `tambah`,sum(if((substr(`a`.`faktur`,3,1) = 'A'),`a`.`jumlah`,0)) AS `afkir`,sum(if((substr(`a`.`faktur`,3,1) = 'M'),`a`.`jumlah`,0)) AS `mati`,sum(if((substr(`a`.`faktur`,3,1) = 'K'),`a`.`jumlah`,0)) AS `kosong` from `view_rekam_ayam` `a` where (`a`.`kandang` is not null) group by `a`.`kandang` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_isi_kartustok() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording` from (`kartustok` `a` left join `recording_ayam` `b` on((`b`.`faktur` = `a`.`faktur_ref`))) where ((left(`a`.`faktur_ref`,3) = 'RAI') and (`a`.`tipe` = 'D') and (`a`.`tipe_kartustok` = 'Ayam')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_tambah_kartustok() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording` from (`kartustok` `a` left join `recording_ayam` `b` on((`b`.`faktur` = `a`.`faktur_ref`))) where ((left(`a`.`faktur_ref`,3) = 'RAT') and (`a`.`tipe` = 'D') and (`a`.`tipe_kartustok` = 'Ayam')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_kosong_kartustok() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording` from (`kartustok` `a` left join `recording_ayam` `b` on((`b`.`faktur` = `a`.`faktur_ref`))) where ((left(`a`.`faktur_ref`,3) = 'RAK') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam') and (`b`.`id_kandang` is not null) and (`b`.`id_mitra` is not null)) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_is_lama() {
		$sql="select `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,0) AS `weekyear`,`a`.`Kandang` AS `Kandang`,`a`.`Kandang` AS `kd_kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Qty` AS `Qty`,`a`.`QtyReal` AS `QtyReal`,`a`.`Customer` AS `kd_mitra`,`a`.`NmCustomer` AS `nm_mitra`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`Kode` AS `KodeBarang`,`a`.`Nmbarang` AS `Nmbarang` from `isilayer` `a` where (left(`a`.`Faktur`,2) = 'IS') order by `a`.`Tgl` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_mtaf_lama() {
		$sql="select `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,3) AS `weeks`,sum(`a`.`Qty`) AS `total`,sum(`a`.`QtyReal`) AS `qtyasli`,`a`.`Umur` AS `Umur`,`a`.`Customer` AS `Customer`,`a`.`NmCustomer` AS `NmCustomer`,`a`.`Kandang` AS `Kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Satuan` AS `Satuan`,`a`.`User` AS `User`,`a`.`Time` AS `Time` from `isilayer` `a` where ((left(`a`.`Faktur`,2) = 'AM') or (left(`a`.`Faktur`,2) = 'PJ')) group by `a`.`Kandang`,`a`.`Tgl` order by `a`.`Tgl` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_ta_lama() {
		$sql="select `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,3) AS `weeks`,year(`a`.`Tgl`) AS `yearnum`,sum(`a`.`Qty`) AS `total`,sum(`a`.`QtyReal`) AS `qtyasli`,`a`.`Customer` AS `Customer`,`a`.`NmCustomer` AS `NmCustomer`,`a`.`Kandang` AS `Kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`User` AS `User`,`a`.`Time` AS `Time` from `isilayer` `a` where (left(`a`.`Faktur`,2) = 'TA') group by `a`.`Kandang`,`a`.`Faktur` order by `a`.`Tgl` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_lama() {
		$sql="select `a`.`Kandang` AS `Kandang`,`a`.`Kandang` AS `kd_kandang`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,0) AS `weekyear`,`a`.`NmKandang` AS `NmKandang`,`a`.`Customer` AS `kd_mitra`,`a`.`NmCustomer` AS `nm_mitra`,sum(if((left(`a`.`Faktur`,2) = 'IS'),`a`.`Qty`,0)) AS `isi`,sum(if((left(`a`.`Faktur`,2) = 'TA'),`a`.`Qty`,0)) AS `tambah`,sum(if((left(`a`.`Faktur`,2) = 'AM'),`a`.`Qty`,0)) AS `mati`,sum(if((left(`a`.`Faktur`,2) = 'PJ'),`a`.`Qty`,0)) AS `afkir`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`Kode` AS `KodeBarang`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`User` AS `User`,`a`.`Time` AS `Time` from `isilayer` `a` group by `a`.`Kandang`,`a`.`Tgl` order by `a`.`Tgl` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_baru() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`minggu` AS `weekyear`,`b`.`Kode` AS `kdbarang`,`b`.`Nama` AS `nama`,`b`.`jumlah_satuan` AS `jumlah`,`b`.`usia` AS `usia`,floor((`b`.`usia` / 7)) AS `weekolds`,(`b`.`usia` % 7) AS `weeksdays`,`a`.`datetime` AS `datetime` from (`view_rekam_ayam` `a` left join `view_rekam_ayam_detail` `b` on((`a`.`faktur` = `b`.`faktur`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_isi_ayam_baru() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`tanggal` AS `Tgl`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`jumlah` AS `Qty`,`a`.`usia` AS `usia`,`a`.`usia` AS `Umur`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y_%m_%d') AS `datestamp` from `view_rekam_ayam_baru` `a` where (`a`.`kodefaktur` = 'RAI') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_tambah_ayam_baru() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y_%m_%d') AS `datestamp` from `view_rekam_ayam_baru` `a` where (`a`.`kodefaktur` = 'RAT') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_mati_baru() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y_%m_%d') AS `datestamp` from `view_rekam_ayam_baru` `a` where (`a`.`kodefaktur` = 'RAM') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_afkir() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays` from `view_rekam_ayam_baru` `a` where (`a`.`kodefaktur` = 'RAA') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_ayam_kosong() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays` from `view_rekam_ayam_baru` `a` where (`a`.`kodefaktur` = 'RAK') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_telur() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`reff` AS `faktur_reff`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`jumlah` AS `jumlah`,`a`.`total` AS `total`,`a`.`id_kandang` AS `id_kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_recording` AS `id_recording`,`a`.`id_mitra` AS `id_mitra`,date_format(`a`.`tanggal`,'%Y_%m') AS `tahunbulan`,substr(`a`.`faktur`,1,3) AS `kodefaktur`,substr(`a`.`faktur`,4,4) AS `blnthnfaktur`,`a`.`keterangan` AS `keterangan` from (((`recording_telur` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) join `jenis_recording` `d` on((`a`.`id_recording` = `d`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_telur_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_recording_telur` AS `id_recording_telur`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_butir` AS `jumlah_butir`,`a`.`jumlah_total` AS `jumlah_total`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_total`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from ((((`recording_telur_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `recording_telur` `x` on(((`x`.`id` = `a`.`id_recording_telur`) or (`x`.`faktur` = `a`.`faktur_recording`)))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_telur_total() {
		$sql="select `a`.`id_recording_telur` AS `id_recording_telur`,`a`.`faktur` AS `faktur`,`a`.`harga_satuan` AS `harga_satuan`,`a`.`jumlah_total` AS `jumlah`,`a`.`jumlah_butir` AS `butir`,sum(`a`.`subtotal`) AS `total` from `view_rekam_telur_detail` `a` group by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_telur() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan` from `view_rekam_telur_detail` `a` where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_stok_telur() {
		$sql="select sum(if(((`a`.`Nama` = 'Telur') or (`a`.`Kode` = '010001')),`a`.`jumlah_total`,0)) AS `Telur`,sum(if(((`a`.`Nama` = 'Retak') or (`a`.`Kode` = '010002')),`a`.`jumlah_total`,0)) AS `Retak`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan` from `view_rekam_telur_detail` `a` where ((substr(`a`.`faktur`,1,3) = 'RTS') and (`a`.`satuan` = 'KG')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_rusak_telur() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan` from `view_rekam_telur_detail` `a` where ((substr(`a`.`faktur`,1,3) = 'RTR') and (`a`.`satuan` = 'KG')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_pakai_telur() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan` from `view_rekam_telur_detail` `a` where ((substr(`a`.`faktur`,1,3) = 'RTP') and (`a`.`satuan` = 'KG')) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_harian() {
		$sql="select `b`.`tanggal` AS `tanggal`,month(`b`.`tanggal`) AS `bulan`,year(`b`.`tanggal`) AS `tahun`,sum(`a`.`jumlah_total`) AS `jml`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG')) group by `b`.`tanggal` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_telur_perbulan_kandang() {
		$sql="select `b`.`tanggal` AS `tanggal`,month(`b`.`tanggal`) AS `bulan`,year(`b`.`tanggal`) AS `tahun`,sum(`a`.`jumlah_total`) AS `jml`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`,`b`.`kandang` AS `kandang`,`b`.`gudang` AS `gudang`,`b`.`namagudang` AS `namagudang` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG')) group by `bulan`,`b`.`kandang` order by `b`.`tanggal`,`b`.`kandang` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_bulanan() {
		$sql="select year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y_%m') AS `bulanan`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now()))) group by `tahun`,`bulan` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_matriks_hasil_bulanan() {
		$sql="select year(`b`.`tanggal`) AS `tahun`,sum(if((month(`b`.`tanggal`) = 1),`a`.`jumlah_total`,0)) AS `jan`,sum(if((month(`b`.`tanggal`) = 2),`a`.`jumlah_total`,0)) AS `feb`,sum(if((month(`b`.`tanggal`) = 3),`a`.`jumlah_total`,0)) AS `mar`,sum(if((month(`b`.`tanggal`) = 4),`a`.`jumlah_total`,0)) AS `apr`,sum(if((month(`b`.`tanggal`) = 5),`a`.`jumlah_total`,0)) AS `mei`,sum(if((month(`b`.`tanggal`) = 6),`a`.`jumlah_total`,0)) AS `jun`,sum(if((month(`b`.`tanggal`) = 7),`a`.`jumlah_total`,0)) AS `jul`,sum(if((month(`b`.`tanggal`) = 8),`a`.`jumlah_total`,0)) AS `ags`,sum(if((month(`b`.`tanggal`) = 9),`a`.`jumlah_total`,0)) AS `sep`,sum(if((month(`b`.`tanggal`) = 10),`a`.`jumlah_total`,0)) AS `okt`,sum(if((month(`b`.`tanggal`) = 11),`a`.`jumlah_total`,0)) AS `nov`,sum(if((month(`b`.`tanggal`) = 12),`a`.`jumlah_total`,0)) AS `des` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG')) group by `tahun` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_stok_bulanan() {
		$sql="select year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y_%m') AS `bulanan`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`,sum(if((`a`.`Kode` = '010001'),`a`.`jumlah_total`,0)) AS `telur`,sum(if((`a`.`Kode` = '010002'),`a`.`jumlah_total`,0)) AS `retak`,(sum(if((`a`.`Kode` = '010001'),`a`.`jumlah_total`,0)) + sum(if((`a`.`Kode` = '010002'),`a`.`jumlah_total`,0))) AS `stok` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTS') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now()))) group by `tahun`,`bulan` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_bulanan_kandang() {
		$sql="select year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y_%m') AS `bulanan`,`b`.`kandang` AS `kandang`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now()))) group by `bulan`,`b`.`kandang` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekap_hasil_bulanan_permitra() {
		$sql="select year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y_%m') AS `bulanan`,sum(if((`b`.`mitra` = 'B0027'),`a`.`jumlah_total`,0)) AS `bakalan`,sum(if((`b`.`mitra` = 'R0020'),`a`.`jumlah_total`,0)) AS `peletrenteng`,sum(if((`b`.`mitra` = 'W0008'),`a`.`jumlah_total`,0)) AS `wagir`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total` from (`view_rekam_telur_detail` `a` join `view_rekam_telur` `b` on((`a`.`faktur` = `b`.`faktur`))) where ((substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now()))) group by `bulan` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_hasil_telur() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,week(`a`.`tanggal`,0) AS `minggu`,year(`a`.`tanggal`) AS `tahun`,`a`.`kandang` AS `kandang`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`recording` AS `recording`,`a`.`jumlah` AS `jumlah`,`a`.`id_kandang` AS `id_kandang`,`a`.`id_recording` AS `id_recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`keterangan` AS `keterangan`,`view_rekam_telur_detail`.`jumlah_butir` AS `jumlah_butir`,`view_rekam_telur_detail`.`jumlah_total` AS `jumlah_total` from (`view_rekam_telur` `a` join `view_rekam_telur_detail` on((`view_rekam_telur_detail`.`faktur` = `a`.`faktur`))) where (left(`a`.`faktur`,3) = 'RTH') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_pakan() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`total` AS `total` from (((`recording_pakan` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) join `jenis_recording` `d` on((`a`.`id_recording` = `d`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_pakan_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_recording_pakan` AS `id_recording_pakan`,`a`.`faktur_recording` AS `faktur_recording`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from ((((`recording_pakan_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `recording_pakan` `x` on(((`x`.`id` = `a`.`id_recording_pakan`) or (`x`.`faktur` = `a`.`faktur_recording`)))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_pakan_total() {
		$sql="select `a`.`id_recording_pakan` AS `id_recording_pakan`,`a`.`faktur_recording` AS `faktur`,sum(`a`.`subtotal`) AS `total` from `view_rekam_pakan_detail` `a` group by `a`.`faktur_recording` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_pakan_lama_kandang() {
		$sql="select `a`.`cNoJrn` AS `cNoJrn`,date_format(`a`.`dTanggal`,'%Y_%m_%d') AS `dTanggal`,`a`.`cNoBukti` AS `cNoBukti`,trim(right(`a`.`cKeterangan`,(length(`a`.`cKeterangan`) _ locate(':',`a`.`cKeterangan`,22)))) AS `kandang`,year(`a`.`dTanggal`) AS `yearnum`,week(`a`.`dTanggal`,3) AS `minggu`,`b`.`Kode` AS `Kode`,`b`.`NmBarang` AS `NmBarang`,`b`.`Qty` AS `Qty`,`b`.`Satuan` AS `Satuan`,`b`.`Gudang` AS `Gudang` from (`tbjurnal` `a` left join `pakan` `b` on((`b`.`Faktur` = `a`.`cNoBukti`))) where ((left(`a`.`cNoBukti`,2) = 'PT') and (`b`.`Kode` = '020078')) order by `a`.`dTanggal` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_pakan_baru() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,left(`a`.`faktur`,2) AS `kd`,`a`.`tanggal` AS `tanggal`,year(`a`.`tanggal`) AS `tahun`,week(`a`.`tanggal`,0) AS `weekyear`,`a`.`kandang` AS `kandang`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`jumlah_satuan` AS `jumlah`,`b`.`satuan` AS `satuan` from (`view_rekam_pakan` `a` join `view_rekam_pakan_detail` `b` on((`a`.`faktur` = `b`.`faktur_recording`))) where (left(`a`.`faktur`,2) = 'RP') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_summary_rekam_pakan_kandang() {
		$sql="select `a`.`cNoJrn` AS `cNoJrn`,date_format(`a`.`dTanggal`,'%Y_%m_%d') AS `dTanggal`,`a`.`cNoBukti` AS `cNoBukti`,trim(right(`a`.`cKeterangan`,(length(`a`.`cKeterangan`) _ locate(':',`a`.`cKeterangan`,22)))) AS `kandang`,year(`a`.`dTanggal`) AS `yearnum`,week(`a`.`dTanggal`,3) AS `minggu`,`b`.`Kode` AS `Kode`,`b`.`NmBarang` AS `NmBarang`,sum(`b`.`Qty`) AS `Qty`,`b`.`Satuan` AS `Satuan`,`b`.`Gudang` AS `Gudang` from (`tbjurnal` `a` left join `pakan` `b` on((`b`.`Faktur` = `a`.`cNoBukti`))) where ((left(`a`.`cNoBukti`,2) = 'PT') and (`b`.`Kode` = '020078')) group by `yearnum`,`kandang`,`minggu` order by `a`.`dTanggal` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_pakan_jadi() {
		$sql="select `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Gudang` AS `Gudang`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan` from `pakan` `a` where (`a`.`Kode` = '020078') ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_medis() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`total` AS `total` from (((`recording_medis` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) join `jenis_recording` `d` on((`a`.`id_recording` = `d`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_medis_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`id_recording_medis` AS `id_recording_medis`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`a`.`umur` AS `umur`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan` from ((((`recording_medis_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `recording_medis` `x` on(((`x`.`id` = `a`.`id_recording_medis`) or (`x`.`faktur` = `a`.`faktur_recording`)))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_medis_total() {
		$sql="select `a`.`id_recording_medis` AS `id_recording_medis`,`a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total` from `view_rekam_medis_detail` `a` group by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_assembly() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`kd_gudang` AS `kd_gudang`,`b`.`nama` AS `nama`,`c`.`faktur` AS `formula`,`c`.`tanggal` AS `tgl_formula`,`a`.`jumlah` AS `jumlah`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_formulasi` AS `id_formulasi` from ((`assembly_pakan` `a` join `gudang` `b` on((`a`.`id_gudang` = `b`.`id`))) left join `formulasi` `c` on((`a`.`id_formulasi` = `c`.`id`))) order by `a`.`id` desc ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_assembly_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`b`.`Keterangan` AS `keterangan`,`a`.`urutan` AS `urutan` from ((((`assembly_pakan_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `assembly_pakan` `x` on((`x`.`faktur` = `a`.`faktur`))) group by `a`.`id_detail` order by `a`.`urutan`,`a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_rekam_assembly_total() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total` from `view_rekam_assembly_detail` `a` group by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_purchase_request() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`is_approved` AS `is_approved`,`a`.`keterangan` AS `keterangan` from ((`purchase_request` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_purchase_request_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`keterangan` AS `keterangan`,`c`.`kode` AS `kode` from ((`purchase_request_detail` `a` join `barang` `b` on((`b`.`id` = `a`.`id_barang`))) join `barang_satuan` `c` on((`c`.`id_barang` = `a`.`id_barang`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_receive_item() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`is_approved` AS `is_approved`,`a`.`keterangan` AS `keterangan` from ((`receive_item` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) order by `a`.`id` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_receive_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`keterangan` AS `keterangan`,`c`.`kode` AS `kode`,`a`.`jumlah_retur` AS `jumlah_retur` from ((`receive_item_detail` `a` join `barang` `b` on((`b`.`id` = `a`.`id_barang`))) join `barang_satuan` `c` on((`c`.`id_barang` = `a`.`id_barang`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_order() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tgl` AS `tgl`,`b`.`Kode` AS `kdcustomer`,`b`.`Nama` AS `namacustomer`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`tgl_kedaluarsa` AS `tgl_kedaluarsa`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`d`.`nama` AS `nama`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idcustomer`,`e`.`faktur` AS `fakturtrx` from ((((`sales_order` `a` left join `customer` `b` on((`b`.`id` = `a`.`id_customer`))) left join `jenis_pembayaran` `c` on((`c`.`id` = `a`.`id_bayar`))) left join `sales` `d` on((`a`.`id_sales` = `d`.`id_karyawan`))) left join `sales_trx` `e` on((`a`.`faktur` = `e`.`ref`))) order by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_trx() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tgl` AS `tgl`,`a`.`status` AS `status`,`b`.`Kode` AS `kdcustomer`,`b`.`Nama` AS `namacustomer`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`ref` AS `ref`,`a`.`id_so` AS `id_so` from ((`sales_trx` `a` join `customer` `b` on((`b`.`id` = `a`.`id_customer`))) left join `jenis_pembayaran` `c` on((`c`.`id` = `a`.`id_bayar`))) order by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_order_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,`a`.`harga_jual` AS `harga_jual`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`))) AS `harga`,if((`a`.`harga_jual` > 0),(`a`.`harga_jual` * `a`.`jumlah`),(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah`)) AS `subtotal`,`b`.`id` AS `idbarang` from ((((`sales_order_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `sales_order` `x` on((`x`.`faktur` = `a`.`faktur`))) group by `a`.`id_detail` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_trx_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`harga_jual` AS `harga_jual`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`))) AS `harga`,(if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`))) * `a`.`jumlah`) AS `subtotal` from ((((`sales_trx_detail` `a` join `barang_satuan` `c` on((`a`.`id_barang` = `c`.`id_barang`))) join `barang` `b` on((`a`.`id_barang` = `b`.`id`))) join `barang_harga` `d` on((`b`.`id` = `d`.`id_barang`))) left join `sales_trx` `x` on((`x`.`faktur` = `a`.`faktur`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_order_total() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total` from `view_sales_order_detail` `a` group by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_sales_trx_total() {
		$sql="select `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total` from `view_sales_trx_detail` `a` group by `a`.`faktur` ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_penyesuaian_barang() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_reff` AS `faktur_reff`,`a`.`akun` AS `akun`,`a`.`tanggal` AS `tanggal`,`c`.`nama` AS `namagudang`,`a`.`keterangan` AS `keterangan` from (`penyesuaian` `a` left join `gudang` `c` on((`a`.`id_gudang` = `c`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_penyesuaian_barang_detail() {
		$sql="select `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`jumlah_baru` AS `jumlah_baru`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`ket_detail` AS `keterangan`,`c`.`kode` AS `kode` from ((`penyesuaian_detail` `a` join `barang` `b` on((`b`.`id` = `a`.`id_barang`))) join `barang_satuan` `c` on((`c`.`id_barang` = `a`.`id_barang`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_armada() {
		$sql="select `a`.`id` AS `id`,`b`.`nama` AS `nama`,`c`.`nama_supir` AS `nama_supir`,`b`.`kode` AS `kode`,`b`.`nopol` AS `nopol`,`c`.`id_karyawan` AS `id_karyawan` from ((`armada` `a` join `kendaraan` `b` on((`b`.`id` = `a`.`kendaraan_id`))) join `supir_armada` `c` on((`c`.`id` = `a`.`supir_id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function view_formula() {
		$sql="select `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`nama` AS `nama`,`a`.`keterangan` AS `keterangan`,`a`.`id_kandang` AS `id_kandang`,`b`.`Kode` AS `Kode`,`b`.`Gudang` AS `Gudang`,`b`.`NmGudang` AS `NmGudang`,`b`.`Mitra` AS `Mitra`,`b`.`NmMitra` AS `NmMitra`,`a`.`jml_hasil_jadi` AS `jml_hasil_jadi`,`a`.`satuan_jadi` AS `satuan_jadi` from (`formulasi` `a` left join `kandang` `b` on((`a`.`id_kandang` = `b`.`id`))) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function kandang_isi() {
		$sql="select `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Customer` AS `Customer`,`a`.`Kandang` AS `Kandang`,`a`.`Gudang` AS `Gudang`,`a`.`NmGudang` AS `NmGudang`,`a`.`Keterangan` AS `Keterangan`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan`,`a`.`QtyReal` AS `QtyReal`,`a`.`Umur` AS `Umur`,`a`.`NmCustomer` AS `NmCustomer` from `isilayer` `a` where (left(`a`.`Faktur`,2) = 'IS') order by `a`.`Tgl` desc ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
	function menu() {
		$sql="select `a`.`id` AS `id`,`a`.`title` AS `title`,`a`.`url` AS `url`,`a`.`parent` AS `parent`,`a`.`module` AS `module`,`a`.`data_remote` AS `data_remote`,`a`.`data_target` AS `data_target`,`a`.`levelid` AS `levelid`,`a`.`groupid` AS `groupid`,`a`.`is_ajax_url` AS `is_ajax_url`,`a`.`datetime` AS `datetime`,`a`.`icon` AS `icon`,`a`.`orders` AS `orders`,`a`.`is_active` AS `is_active`,`a`.`is_disabled` AS `is_disabled` from `menu` `a` where (`a`.`parent` <> 0) ;";
		$result=$this->db->query($sql);
		if ($result->num_rows() > 0) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
	}
}

/* End of file muria_model.php */
/* Location: ./ */

 ?>