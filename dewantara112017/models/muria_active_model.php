<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Muria_active_model extends CI_Model {

	public function method_name()
	{	
		
	}

function view_barang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("barang a");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}

function view_barang_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat`,`b`.`Kode` AS `kdsupplier`,`b`.`id` AS `id_supplier`");
	$this->db->from("`barang` `a`");
	$this->db->join("supplier b","`b`.`Kode` = `a`.`id_supplier`","left");
	$this->db->where("`b`.`Kode` ",!null);
	$this->db->group_by("`a`.`Kode`");
	$this->db->order_by( `a`.`Kode`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_no_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`view_barang` `a`");
	$this->db->join("supplier b","`b`.`Kode` = `a`.`id_supplier`","left");
	$this->db->where("(isnull(`b`.`Kode`) or isnull(`a`.`id_supplier`))");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_tanpa_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("view_barang` `a`");
	$this->db->join("supplier b","`b`.`Kode` = `a`.`id_supplier`","left");
	$this->db->where(" isnull(`a`.`id_supplier`)");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_semua_barang_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat`,`b`.`Kode` AS `kdsupplier`");
	$this->db->from("view_barang` `a`");
	$this->db->join("supplier b","`b`.`Kode` = `a`.`id_supplier`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function drop_barang_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`b`.`id` AS `id_supplier`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `nmsupplier`,`b`.`Alamat` AS `Alamat`");
	$this->db->from("view_barang` `a`");
	$this->db->join("supplier b","`b`.`Kode` = `a`.`id_supplier`","left");
	$this->db->where("`b`.`Kode` ",!null);
	$this->db->group_by("`a`.`Kode`");
	$this->db->order_by( `a`.`Kode`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_satuan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`id_barang` AS `id_barang`,`a`.`kode` AS `kode`,`b`.`Nama` AS `nmbarang`,`a`.`Satuan1` AS `Satuan1`,`a`.`Isi2` AS `Isi2`,`a`.`Satuan2` AS `Satuan2`,`a`.`Isi3` AS `Isi3`,`a`.`Satuan3` AS `Satuan3`,`a`.`Max` AS `Max`,`a`.`SatuanMax` AS `SatuanMax`,`a`.`Min` AS `Min`,`a`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("barang_satuan` `a`");
	$this->db->join("`barang` `b` ","`b`.`id` = `a`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_kategori(){
	$this->db->select(" `barang`.`id` AS `id`,`barang`.`Kode` AS `Kode`,`barang`.`Nama` AS `Nama`,`barang`.`id_golongan` AS `id_golongan`");
	$this->db->from("`barang`");
	$this->db->order_by(`barang`.`Kode`,`barang`.`id_golongan`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_ayam(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`barang` `a` ");
		$this->db->where("`a`.`id_golongan` = '05') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_pakan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`barang` `a` ");
		$this->db->where("`a`.`id_golongan` = '02') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_obatvaksin(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`barang` `a` ");
		$this->db->where("(`a`.`id_golongan` = '03') or (`a`.`id_golongan` = '15')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_telur(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`barang` `a` ");
		$this->db->where("`a`.`id_golongan` = '01') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_sapronak(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Cabang` AS `Cabang`,`a`.`Nama` AS `Nama`,`a`.`Keterangan` AS `Keterangan`,`a`.`StKon` AS `StKon`,`a`.`id_golongan` AS `id_golongan`,`a`.`id_supplier` AS `id_supplier`,`a`.`User` AS `User`,`a`.`datetime` AS `datetime`");
	$this->db->from("`barang` `a` ");
		$this->db->where("`a`.`id_golongan` = '06') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_beli_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`");
	$this->db->from("`view_barang` `a` ");
		$this->db->where("(`a`.`Nama` like '%sekem%') or (`a`.`Nama` like 'retak') or (`a`.`Nama` like 'telur') or (`a`.`Nama` like 'jagung') or (`a`.`Nama` like 'katul') or (`a`.`Nama` like 'egg tray')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_barang_harga_table(){
	$this->db->select(" `a`.`id` AS `id`,`b`.`id_barang` AS `id_barang`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`b`.`hb1` AS `hb1`,`b`.`hb2` AS `hb2`,`b`.`hb3` AS `hb3`,`b`.`HJ1R` AS `hj1r`,`b`.`HJ2R` AS `hj2r`,`b`.`HJ3R` AS `hj3r`,`b`.`max` AS `max`,`b`.`datetime` AS `datetime`");
	$this->db->from("barang` `a`");
	$this->db->join("`barang_harga` `b` ","`a`.`id` = `b`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_supplier(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`Alamat` AS `Alamat`,`a`.`Kota` AS `Kota`,`a`.`Telepon` AS `Telepon`,`a`.`Fax` AS `Fax`,`a`.`NoAcc` AS `NoAcc`,`a`.`Contact` AS `Contact`");
	$this->db->from("`supplier` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_supplier_hutang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`Alamat` AS `Alamat`,`a`.`Kota` AS `Kota`,`a`.`Telepon` AS `Telepon`,`a`.`Fax` AS `Fax`,`a`.`NoAcc` AS `NoAcc`,`a`.`Contact` AS `Contact`,cast(`a`.`Hutang` as decimal(20,2)) AS `Hutang`,cast(`a`.`Bayar` as decimal(20,2)) AS `Bayar`,cast(`a`.`Sisa` as decimal(20,2)) AS `Sisa`");
	$this->db->from("`supplier` `a` ");
		$this->db->where("`a`.`Hutang` > 0) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_supplier_kode(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kode`,substr(`a`.`Kode`,3,4) AS `right`,`a`.`Nama` AS `nama`");
	$this->db->from("`view_supplier` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_invoice(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_invoice` AS `faktur_invoice`,`a`.`faktur_po` AS `faktur_po`,`a`.`id_supplier` AS `id_supplier`,`a`.`tgl_invoice` AS `tgl_invoice`,`a`.`pembayaran` AS `pembayaran`,`a`.`jatuh_tempo` AS `jatuh_tempo`,`a`.`status` AS `status`,`a`.`datetime` AS `datetime`");
	$this->db->from("`invoice_po` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_purchase_order(){
	$this->db->select(" `a`.`id` AS `idpo`,`a`.`faktur_po` AS `faktur_po`,`e`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_po` AS `tgl_po`,`a`.`status` AS `status`,if((`a`.`id_supplier` <> 0),`b`.`Kode`,if((`d`.`id` <> 0),`d`.`Kode`,0)) AS `kd`,if((`a`.`id_supplier` <> 0),`b`.`Nama`,if((`d`.`id` <> 0),`d`.`Nama`,0)) AS `nm`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `namasupplier`,`d`.`Kode` AS `kdcustomer`,`d`.`Nama` AS `namacustomer`,`a`.`tgl_kirim_po` AS `tgl_kirim_po`,`a`.`tgl_jatuhtempo` AS `tgl_jatuhtempo`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idsupplier`,`d`.`id` AS `idcs`,`a`.`nopol` AS `nopol`,`a`.`supir` AS `nama_supir`,`a`.`isactive` AS `isactive`,`a`.`islocked` AS `islocked`,`a`.`isvalidpo` AS `isvalidpo`");
	$this->db->from("((`purchase_order` `a`");
	$this->db->join("supplier b","`b`.`id` = `a`.`id_supplier`","left");
$this->db->join("jenis_pembayaran c ","`c`.`id` = `a`.`id_bayar`","left");
$this->db->join("customer d ","`a`.`id_customer` = `d`.`id`","left");
$this->db->join("view_trx_beli_detail_total e ","`a`.`faktur_po` = `e`.`faktur_po`","left");
$this->db->order_by( `a`.`faktur_po`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_2015(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,date_format(`a`.`Time`,'%d-%m-%Y') AS `tgl_po`,format(sum(cast(`a`.`Jumlah` as decimal(20,2))),2,'id_ID') AS `jtotal`,date_format(`a`.`Time`,'%Y') AS `tahun`");
	$this->db->from("`beli` `a` ");
		$this->db->where("date_format(`a`.`Time`,'%Y') = '2015')");
		$this->db->group_by("`a`.`Faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_trx(){
	$this->db->select(" `a`.`id` AS `idpo`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`a`.`status` AS `status`,`b`.`Kode` AS `kdsupplier`,`b`.`Nama` AS `namasupplier`,`a`.`tgl_kirim_po` AS `tgl_kirim_po`,`a`.`tgl_jatuhtempo` AS `tgl_jatuhtempo`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idsupplier`,`d`.`id` AS `idpt`,`d`.`faktur_pt` AS `usedby`");
	$this->db->from("(`purchase_order` `a`");
	$this->db->join("`supplier` `b` ","`b`.`id` = `a`.`id_supplier`)))");
	$this->db->join("jenis_pembayaran c ","`c`.`id` = `a`.`id_bayar`","left");
$this->db->join("purchase_transaction d ","`d`.`id_po` = `a`.`id`","left");
$this->db->order_by( `a`.`faktur_po`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_detail_2015(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,cast(`a`.`Qty` as decimal(10,0)) AS `Qty`,`a`.`Satuan` AS `Satuan`,format(cast(`a`.`Harga` as decimal(20,2)),2,'id_ID') AS `harga`,format(cast(`a`.`Jumlah` as decimal(20,2)),2,'id_ID') AS `jtotal`,`a`.`Status` AS `Status`,`a`.`User` AS `User`,`a`.`Time` AS `tanggal`,date_format(`a`.`Time`,'%Y') AS `tahun`");
	$this->db->from("`beli` `a` ");
		$this->db->where("date_format(`a`.`Time`,'%Y') = '2015') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_detail_po_lamax(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,`a`.`jumlah` AS `jumlah`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`d`.`hb1` AS `harga_kemasan`,`d`.`hb2` AS `harga_satuan`,`e`.`Satuan1` AS `satuan_kemasan`,`e`.`Satuan2` AS `satuan`,(`a`.`jumlah` * `d`.`hb1`) AS `subtot_kemasan`,(`a`.`jumlah` * `d`.`hb2`) AS `subtot_satuan`");
	$this->db->from("(`purchase_order_detail` `a`");
	$this->db->join("`barang` `c` ","`c`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_harga` `d` ","`d`.`id_barang` = `c`.`id`)))");
	$this->db->join("`barang_satuan` `e` ","`e`.`id_barang` = `a`.`id_barang`)))");
	$this->db->order_by( `a`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_detail_po1(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,`c`.`id` AS `idbarang`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`jumlah_akhir` AS `jumlah_akhir`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`e`.`Satuan1`,if((`a`.`id_satuan` = 2),`e`.`Satuan2`,`e`.`Satuan3`)) AS `satuan`,if((isnull(`a`.`harga_beli`) or (`a`.`harga_beli` = 0)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) AS `harga`,(if((isnull(`a`.`harga_beli`) or (`a`.`harga_beli` = 0)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) * `a`.`jumlah`) AS `subtotal`,`a`.`harga_beli` AS `harga_beli`,`a`.`isactive` AS `isactive`,`a`.`isdeleted` AS `isdeleted`,`c`.`id_supplier` AS `kdsp`,`c`.`NmSupplier1` AS `namasp`");
	$this->db->from("(`purchase_order_detail` `a`");
	$this->db->join("`barang` `c` ","`c`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_harga` `d` ","`d`.`id_barang` = `c`.`id`)))");
	$this->db->join("`barang_satuan` `e` ","`e`.`id_barang` = `a`.`id_barang`)))");
	$this->db->order_by( `a`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_detail_po_total(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`po` AS `po`,sum(`a`.`subtotal`) AS `total`,format(cast(sum(`a`.`subtotal`) as decimal(20,2)),2,'id_ID') AS `rptotal`,`a`.`isactive` AS `isactive`,`a`.`isdeleted` AS `isdeleted`");
	$this->db->from("`view_detail_po1` `a` ");
		$this->db->where("(`a`.`isactive` = 1) and ((`a`.`isdeleted` = 0) or isnull(`a`.`isdeleted`)))");
		$this->db->group_by("`a`.`po` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_supplier(){
	$this->db->select(" distinct `a`.`id` AS `id`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`c`.`JthTempo` AS `JthTempo`,`a`.`id_supplier` AS `id_supplier`,`b`.`pt` AS `pt`,`a`.`isactive` AS `isactivepo`,`a`.`isvalidpo` AS `isvalidpo`,`b`.`isactive` AS `isactivedetail`");
	$this->db->from("`purchase_order` `a`");
	$this->db->join("supplier c ","`a`.`id_supplier` = `c`.`id`","left");
$this->db->join("purchase_transaction_detail b","`a`.`faktur_po` = `b`.`po`","left");
$this->db->where("`a`.`id_supplier` > 0) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_detail_po2(){
	$this->db->select(" `b`.`id_detail` AS `id_detail`,`b`.`po` AS `po`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`b`.`jumlah` AS `jumlah`,`b`.`jumlah_akhir` AS `jumlah_akhir`,if((`b`.`id_satuan` = 1),`e`.`hb1`,if((`b`.`id_satuan` = 2),`e`.`hb2`,`e`.`hb3`)) AS `harga`,if((`b`.`id_satuan` = 1),`d`.`Satuan1`,if((`b`.`id_satuan` = 2),`d`.`Satuan2`,`d`.`Satuan3`)) AS `satuan`,(`e`.`hb1` * `b`.`jumlah`) AS `subtot1`,(if((`b`.`id_satuan` = 1),`c`.`Isi2`,0) * `b`.`jumlah`) AS `jml_isi1`,`d`.`Satuan2` AS `Satuan2`,(`e`.`hb2` * `b`.`jumlah`) AS `subtot2`,(if((`b`.`id_satuan` = 2),`c`.`Isi3`,0) * `b`.`jumlah`) AS `jml_isi2`,`d`.`Satuan3` AS `Satuan3`,(`e`.`hb3` * `b`.`jumlah`) AS `subtot3`,`b`.`id_barang` AS `id_barang`,`b`.`id_satuan` AS `id_satuan`,`b`.`harga_beli` AS `harga_beli`,`a`.`tgl_po` AS `tgl_po`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_customer` AS `id_customer`,`a`.`termin_hari` AS `termin_hari`,`a`.`isactive` AS `isactivepo`,`b`.`isactive` AS `isactive`");
	$this->db->from("((`purchase_order_detail` `b`");
	$this->db->join("barang c ","`c`.`id` = `b`.`id_barang`","left");
$this->db->join("barang_satuan d ","`c`.`id` = `d`.`id_barang`)))");
$this->db->join("`barang_harga` `e` ","`d`.`id_barang` = `e`.`id_barang`","left");
$this->db->join("purchase_order a ","`a`.`faktur_po` = `b`.`po`","left");
$this->db->order_by( `b`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_customer(){
	$this->db->select(" distinct `a`.`id` AS `id`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`id_customer` AS `id_customer`,`b`.`JthTempo` AS `JthTempo`");
	$this->db->from("purchase_order` `a`");
	$this->db->join("customer b","`a`.`id_customer` = `b`.`id`","left");
	$this->db->where("(`a`.`id_customer` is not null) or (`a`.`id_customer` > 0)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_po_detailjumlah(){
	$this->db->select(" `a`.`id` AS `id`,`a1`.`id_detail` AS `id_detail`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_customer` AS `id_customer`,`b`.`kode` AS `kode`,`c`.`Nama` AS `Nama`,`a1`.`id_barang` AS `id_barang`,`a1`.`jumlah` AS `jumlah`,`a1`.`jumlah_akhir` AS `jumlah_akhir`,`a1`.`id_satuan` AS `id_satuan`,if((`a1`.`id_satuan` = 1),`b`.`Satuan1`,if((`a1`.`id_satuan` = 2),`b`.`Satuan2`,`b`.`Satuan3`)) AS `satuan`,if((`a1`.`id_satuan` = 1),`a1`.`jumlah`,NULL) AS `qty1`,if((`a1`.`id_satuan` = 1),`b`.`Satuan1`,NULL) AS `sat1`,if((`a1`.`id_satuan` = 2),`a1`.`jumlah`,NULL) AS `qty2`,if((`a1`.`id_satuan` = 2),`b`.`Satuan2`,NULL) AS `sat2`,if((`a1`.`id_satuan` = 3),`a1`.`jumlah`,NULL) AS `qty3`,if((`a1`.`id_satuan` = 3),`b`.`Satuan3`,NULL) AS `sat3`,`b`.`Satuan1` AS `Satuan1`,`b`.`Isi2` AS `Isi2`,`b`.`Satuan2` AS `Satuan2`,`b`.`Isi3` AS `Isi3`,`b`.`Satuan3` AS `Satuan3`,`b`.`Max` AS `Max`,`b`.`SatuanMax` AS `SatuanMax`,`b`.`Min` AS `Min`,`b`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("(`purchase_order` `a`");
	$this->db->join("purchase_order_detail a1 ","`a1`.`po` = `a`.`faktur_po`","left");
$this->db->join("barang_satuan b","`b`.`id_barang` = `a1`.`id_barang`)))");
$this->db->join("`barang` `c` ","`a1`.`id_barang` = `c`.`id`","left");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_realjumlah_po(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`id_detail` AS `id_detail`,`a`.`faktur_po` AS `faktur_po`,`a`.`tgl_po` AS `tgl_po`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_customer` AS `id_customer`,`a`.`kode` AS `kode`,`a`.`id_barang` AS `id_barang`,`a`.`jumlah` AS `jumlah`,`a`.`jumlah_akhir` AS `jumlah_akhir`,`a`.`jumlah` AS `realqty1`,`a`.`Satuan1` AS `realsat1`,(`a`.`jumlah` * `a`.`Isi2`) AS `realqty2`,`a`.`Satuan2` AS `realsat2`,(`a`.`jumlah` * `a`.`Isi3`) AS `realqty3`,`a`.`Satuan3` AS `realsat3`,`a`.`id_satuan` AS `id_satuan`,`a`.`qty1` AS `qty1`,`a`.`sat1` AS `sat1`,`a`.`qty2` AS `qty2`,`a`.`sat2` AS `sat2`,`a`.`qty3` AS `qty3`,`a`.`sat3` AS `sat3`,`a`.`Satuan1` AS `Satuan1`,`a`.`Isi2` AS `Isi2`,`a`.`Satuan2` AS `Satuan2`,`a`.`Isi3` AS `Isi3`,`a`.`Satuan3` AS `Satuan3`,`a`.`Max` AS `Max`,`a`.`SatuanMax` AS `SatuanMax`,`a`.`Min` AS `Min`,`a`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("`view_po_detailjumlah` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function query_po_detail(){
	$this->db->select(" `a1`.`id` AS `id`,`a2`.`id_detail` AS `id_detail`,`a1`.`faktur_po` AS `faktur_po`,`a1`.`tgl_po` AS `tgl_po`,`a1`.`id_supplier` AS `id_supplier`,`a1`.`id_customer` AS `id_customer`,`a2`.`id_barang` AS `id_barang`,`a2`.`jumlah` AS `jumlah`,`a2`.`jumlah_akhir` AS `jumlah_akhir`,`a2`.`id_satuan` AS `id_satuan`,if((`a2`.`id_satuan` = 1),`b`.`Satuan1`,if((`a2`.`id_satuan` = 2),`b`.`Satuan2`,`b`.`Satuan3`)) AS `satuan`,`a2`.`harga_beli` AS `harga_beli`,`b`.`Isi2` AS `Isi2`,`b`.`Isi3` AS `Isi3`,`b`.`Satuan1` AS `Satuan1`,`b`.`Satuan2` AS `Satuan2`,`b`.`Satuan3` AS `Satuan3`");
	$this->db->from("`purchase_order` `a1`");
	$this->db->join("purchase_order_detail a2 ","`a2`.`po` = `a1`.`faktur_po`","left");
$this->db->join("barang_satuan b","`a2`.`id_barang` = `b`.`id_barang`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `Keterangan`,`a`.`cParent` AS `parents`,if((`a`.`cKelompok` = 1),'Aktiva','Pasiva') AS `nmgroup`,`a`.`cKelompok` AS `rek_group`");
	$this->db->from("`rekening` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_aktiva(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = 1)");
		$this->db->order_by( `a`.`Kode`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_pasiva(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = 2)");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_modal(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = 3) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_pendapatan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = 4)");
		$this->db->order_by( `a`.`Kode`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_biaya(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = 5)");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_bank(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '1.200')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_kas(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '1.100')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_piutang_dagang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '1.250')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_hpp(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,1) = '6')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_hutang_dagang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '2.300')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_piutang_karyawan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '1.700')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_biaya_penyusutan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '5.900')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_retur_jual(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '5.700')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rek_penjualan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '4.900')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rek_pembelian(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdrekening`,`a`.`Keterangan` AS `desc`,`a`.`cParent` AS `parent`,`a`.`cKelompok` AS `rek_group`,`a`.`User` AS `users`,`a`.`Time` AS `datetime`");
	$this->db->from("`rekening` `a` ");
		$this->db->where("left(`a`.`Kode`,5) = '2.200')");
		$this->db->group_by("`a`.`Kode` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_piutang_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `kdsp`,`b`.`Kode` AS `kdrek`,`a`.`NoAcc` AS `NoAcc`,`a`.`Nama` AS `Nama`,`a`.`Alamat` AS `Alamat`,`a`.`JthTempo` AS `JthTempo`,`a`.`Hutang` AS `Hutang`,`a`.`Bayar` AS `Bayar`,`a`.`Sisa` AS `Sisa`,`b`.`id` AS `idrek`,`b`.`Keterangan` AS `Keterangan`");
	$this->db->from("customer` `a`");
	$this->db->join("`rekening` `b` ","`a`.`NoAcc` = `b`.`Kode`)))");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_hutang_supplier(){
	$this->db->select(" `b`.`Kode` AS `kdrek`,`b`.`id` AS `idrek`,`b`.`Keterangan` AS `Keterangan`,`a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`JthTempo` AS `JthTempo`,`a`.`Hutang` AS `Hutang`,`a`.`Bayar` AS `Bayar`,`a`.`Sisa` AS `Sisa`,`a`.`Alamat` AS `Alamat`,`a`.`Kota` AS `Kota`,left(`b`.`Kode`,3) AS `asasd`");
	$this->db->from("rekening` `b`");
	$this->db->join("supplier a ","`a`.`NoAcc` = `b`.`Kode`","left");
	$this->db->where("left(`b`.`Kode`,3) = '2.3') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_saldo(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`noacc` AS `noacc`,`b`.`cParent` AS `induk`,`a`.`id_customer` AS `id_customer`,`a`.`id_supplier` AS `id_supplier`,`a`.`tipe` AS `tipe`,`a`.`awaltahun` AS `awaltahun`,`a`.`awal` AS `awal`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`saldo` AS `saldo`,`b`.`Kode` AS `Kode`,`b`.`cJenis` AS `cJenis`,`b`.`cGlobal` AS `cGlobal`,`b`.`Keterangan` AS `Keterangan`,`b`.`cKelompok` AS `cKelompok`,`b`.`cJenisAcc` AS `cJenisAcc`,`a`.`awalbulan` AS `awalbulan`,`a`.`tahun` AS `tahun`,if((left(`b`.`Kode`,5) = '1.250'),'piutang',if((left(`b`.`Kode`,5) = '2.300'),'hutang',NULL)) AS `jenis`");
	$this->db->from("saldorekening` `a`");
	$this->db->join("`rekening` `b` ","`a`.`noacc` = `b`.`Kode`)))");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekening_saldoperkode(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`noacc` AS `noacc`,`a`.`id_customer` AS `id_customer`,`a`.`id_supplier` AS `id_supplier`,`a`.`tipe` AS `tipe`,sum(`a`.`awaltahun`) AS `awaltahun`,sum(`a`.`awal`) AS `awal`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`saldo` AS `saldo`,`b`.`Kode` AS `Kode`,`b`.`cJenis` AS `cJenis`,`b`.`cGlobal` AS `cGlobal`,`b`.`Keterangan` AS `Keterangan`,`b`.`cKelompok` AS `cKelompok`,`b`.`cJenisAcc` AS `cJenisAcc`,`a`.`awalbulan` AS `awalbulan`,`a`.`tahun` AS `tahun`,if((left(`b`.`Kode`,5) = '1.250'),'piutang',if((left(`b`.`Kode`,5) = '2.300'),'hutang',NULL)) AS `jenis`");
	$this->db->from("saldorekening` `a`");
	$this->db->join("`rekening` `b` ","`a`.`noacc` = `b`.`Kode`)))");
	$this->db->group_by("`b`.`Kode`,`a`.`tahun`");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rek_spcs(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Keterangan` AS `Keterangan`,`a`.`cJenis` AS `cJenis`,`b`.`id` AS `idsp`,`b`.`Kode` AS `kdsp`,`b`.`Nama` AS `namasp`,`c`.`id` AS `idcs`,`c`.`Kode` AS `kdcs`,`c`.`Nama` AS `namacs`");
	$this->db->from("`rekening` `a`");
	$this->db->join("supplier b","`a`.`Kode` = `b`.`NoAcc`","left");
$this->db->join("customer c ","`c`.`NoAcc` = `a`.`Kode`","left");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rek_vendor(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,`a`.`Keterangan` AS `Keterangan`,`a`.`cJenis` AS `cJenis`,if((left(`a`.`Kode`,5) = '1.250'),`a`.`idcs`,if((left(`a`.`Kode`,5) = '2.300'),`a`.`idsp`,NULL)) AS `idvendor`,if((left(`a`.`Kode`,5) = '1.250'),`a`.`kdcs`,if((left(`a`.`Kode`,5) = '2.300'),`a`.`kdsp`,NULL)) AS `kdvendor`,if((left(`a`.`Kode`,5) = '1.250'),`a`.`namacs`,if((left(`a`.`Kode`,5) = '2.300'),`a`.`namasp`,NULL)) AS `namavendor`");
	$this->db->from("`view_rek_spcs` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_customer_kode(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Kode` AS `Kode`,substr(`a`.`Kode`,-(4)) AS `right`,`a`.`Nama` AS `Nama`");
	$this->db->from("`customer` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_purchasing(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_pt` AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`a`.`id_po` AS `id_po`,`purchase_order`.`faktur_po` AS `faktur_po`,`purchase_order`.`tgl_po` AS `tgl_po`");
	$this->db->from("purchase_transaction` `a`");
	$this->db->join("purchase_order n(`purchase_order`.`id` = `a`.`id_po`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_transaksi_beli(){
	$this->db->select(" distinct `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_pt` AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`b`.`jenis_beli` AS `jenis_beli`,`a`.`tgl_jatuh_tempo` AS `tgl_jatuh_tempo`,if((((`a`.`id_supplier` > 0) or (`a`.`id_supplier` is not null)) and (`a`.`id_tipe_beli` = 2)),`d`.`Nama`,if((((`a`.`id_customer` > 0) or (`a`.`id_customer` is not null)) and (`a`.`id_customer` = 1)),`e`.`Nama`,'')) AS `Nama`,if(((`a`.`id_supplier` > 0) and (`a`.`id_supplier` is not null)),`d`.`Kode`,if(((`a`.`id_customer` > 0) and (`a`.`id_customer` is not null)),`e`.`Kode`,'')) AS `Kode`,`d`.`id` AS `id_supplier`,`d`.`Kode` AS `kdsp`,`d`.`Nama` AS `namasp`,`a`.`id_customer` AS `id_customer`,`e`.`Nama` AS `namacs`,`e`.`Kode` AS `kdcs`,`a`.`totalbayar` AS `totalbayar`,`a`.`uangmuka` AS `uangmuka`,`a`.`biayakirim` AS `biayakirim`,`a`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`a`.`sisa` AS `hutang`,`a`.`sisabayar` AS `piutang`,`a`.`diskon` AS `diskon`,`b`.`datetime` AS `datetime`,`a`.`id_supplier` AS `idsp`,`f`.`po` AS `po`,`g`.`tgl_po` AS `tgl_po`,`a`.`isactive` AS `isactive`,`a`.`islocked` AS `islocked`");
	$this->db->from("(((`purchase_transaction` `a`");
	$this->db->join("jenis_pembelian b","`b`.`id` = `a`.`id_tipe_beli`","left");
$this->db->join("supplier d ","`a`.`id_supplier` = `d`.`id`","left");
$this->db->join("customer e ","`e`.`id` = `a`.`id_customer`","left");
$this->db->join("purchase_transaction_detail f ","`a`.`faktur_pt` = `f`.`pt`","left");
$this->db->join("purchase_order g ","`g`.`faktur_po` = `f`.`po`)))");
$this->db->group_by("`a`.`id`","left");
$this->db->order_by( `a`.`faktur_pt`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_transaksi_beli_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`x`.`tgl_pt` AS `tgl_pt`,`a`.`po` AS `faktur_po`,`a`.`pt` AS `faktur_pt`,`a`.`id_barang` AS `id_barang`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,`a`.`harga_beli` AS `harga_beli`,(if(((`a`.`harga_beli` <= 0) or isnull(`a`.`harga_beli`)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) * `a`.`jumlah`) AS `subtotal`,if(((`a`.`harga_beli` <= 0) or isnull(`a`.`harga_beli`)),if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)),`a`.`harga_beli`) AS `harga`,`a`.`keterangan` AS `keterangan`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_supplier` AS `idsp`,`f`.`Kode` AS `kdsp`,`f`.`Nama` AS `namasp`,`a`.`id_customer` AS `id_customer`,`a`.`id_customer` AS `idcs`,`e`.`Kode` AS `kdcs`,`e`.`Nama` AS `namacs`,`x`.`totalbayar` AS `totalbayar`,`x`.`uangmuka` AS `uangmuka`,`x`.`biayakirim` AS `biayakirim`,`x`.`grandtotal` AS `grandtotal`,`x`.`sisa` AS `sisa`,`x`.`sisabayar` AS `sisabayar`,`a`.`id_pt` AS `id_pt`,`a`.`id_po` AS `id_po`,`b`.`id` AS `id`,`c`.`Isi2` AS `Isi2`,`c`.`Isi3` AS `Isi3`,`c`.`Satuan1` AS `Satuan1`,`c`.`Satuan2` AS `Satuan2`,`c`.`Satuan3` AS `Satuan3`,if((`a`.`id_satuan` = 1),`a`.`jumlah`,0) AS `jml1`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,0) AS `sat1`,if((`a`.`id_satuan` = 2),`a`.`jumlah`,0) AS `jml2`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,0) AS `sat2`,if((`a`.`id_satuan` = 3),`a`.`jumlah`,0) AS `jml3`,if((`a`.`id_satuan` = 3),`c`.`Satuan3`,0) AS `sat3`,if(((`a`.`id_supplier` > 0) and (`a`.`id_customer` = 0)),`f`.`Kode`,if(((`a`.`id_customer` > 0) and (`a`.`id_supplier` = 0)),`e`.`Kode`,0)) AS `kd`,if(((`a`.`id_supplier` > 0) and (`a`.`id_customer` = 0)),`f`.`Nama`,if(((`a`.`id_customer` > 0) and (`a`.`id_supplier` = 0)),`e`.`Nama`,0)) AS `nm`,`a`.`isactive` AS `isactive`,`a`.`isdelete` AS `isdelete`,`a`.`datedelete` AS `datedelete`");
	$this->db->from("((((`purchase_transaction_detail` `a`");
	$this->db->join("barang_satuan c ","`a`.`id_barang` = `c`.`id_barang`","left");
$this->db->join("barang b","`a`.`id_barang` = `b`.`id`","left");
$this->db->join("barang_harga d ","`b`.`id` = `d`.`id_barang`","left");
$this->db->join("purchase_transaction x ","`x`.`faktur_pt` = `a`.`pt`","left");
$this->db->join("supplier f ","`a`.`id_supplier` = `f`.`id`","left");
$this->db->join("customer e ","`a`.`id_customer` = `e`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_trx_beli_detail_total(){
	$this->db->select(" `a`.`id_pt` AS `id_pt`,`a`.`faktur_pt` AS `faktur_pt`,sum(`a`.`subtotal`) AS `total`,format(sum(`a`.`subtotal`),2) AS `rptotal`,`a`.`faktur_po` AS `faktur_po`");
	$this->db->from("`view_transaksi_beli_detail` `a` ");
		$this->db->where("`a`.`isactive` = 1)");
		$this->db->group_by("`a`.`faktur_pt` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_supplier1(){
	$this->db->select(" `a`.`idsp` AS `idsp`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,sum(`a`.`totalbayar`) AS `totalbayar`,sum(`a`.`uangmuka`) AS `uangmuka`,sum((`a`.`totalbayar` - `a`.`uangmuka`)) AS `sisa_hutang`");
	$this->db->from("`view_transaksi_beli` `a`");
	$this->db->group_by("`a`.`idsp`,`a`.`Kode`");
	$this->db->order_by( `a`.`Kode`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_beli_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan`,`a`.`Harga` AS `Harga`,`a`.`Jumlah` AS `Jumlah`");
	$this->db->from("`beli` `a` ");
		$this->db->where("(`a`.`NmBarang` like '%sekem%') or (`a`.`NmBarang` like 'retak') or (`a`.`NmBarang` like 'telur') or (`a`.`NmBarang` like 'jagung') or (`a`.`NmBarang` like 'katul')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_per_transaksi_beli(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,date_format(`a`.`tgl_pt`,'%d/%m/%Y') AS `tgl_pt`,`a`.`id_tipe_beli` AS `id_tipe_beli`,`b`.`jenis_beli` AS `jenis_beli`,`a`.`id_supplier` AS `idsp`,`supplier`.`Kode` AS `kdsp`,`supplier`.`Nama` AS `namasp`,`a`.`id_customer` AS `idcs`,`e`.`Kode` AS `kdcs`,`e`.`Nama` AS `namacs`,`xx`.`id` AS `idbrg`,`xx`.`Kode` AS `kdbrg`,`xx`.`Nama` AS `namabrg`,`xx`.`jumlah` AS `jumlah`,`xx`.`satuan` AS `satuan`,`a`.`totalbayar` AS `totalbayar`,`a`.`uangmuka` AS `uangmuka`,`a`.`biayakirim` AS `biayakirim`,`a`.`grandtotal` AS `grandtotal`,`a`.`sisa` AS `sisa`,`a`.`sisabayar` AS `sisabayar`,cast(`xx`.`harga` as decimal(20,2)) AS `harga`,`xx`.`isactive` AS `isactive`,`xx`.`isdelete` AS `isdelete`");
	$this->db->from("((`purchase_transaction` `a`");
	$this->db->join("jenis_pembelian b","`b`.`id` = `a`.`id_tipe_beli`","left");
$this->db->join("supplier n(`a`.`id_supplier` = `supplier`.`id`","left");
$this->db->join("customer e ","`e`.`id` = `a`.`id_customer`","left");
$this->db->join("view_transaksi_beli_detail xx ","`xx`.`faktur_pt` = `a`.`faktur_pt`","left");
$this->db->order_by( `a`.`id`,`a`.`faktur_pt`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function query_pt_detail(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pt` AS `faktur_pt`,`a`.`tgl_pt` AS `tgl_pt`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_customer` AS `id_customer`,`b`.`id_detail` AS `id_detail`,`b`.`po` AS `po`,`b`.`id_po` AS `id_po`,`b`.`id_barang` AS `id_barang`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`b`.`jumlah` AS `jumlah`,`b`.`id_satuan` AS `id_satuan`,if((`b`.`id_satuan` = 1),`d`.`Satuan1`,if((`b`.`id_satuan` = 2),`d`.`Satuan2`,`d`.`Satuan3`)) AS `satuan`,`b`.`harga_beli` AS `harga_beli`,`d`.`Isi2` AS `Isi2`,`d`.`Isi3` AS `Isi3`,`d`.`Satuan1` AS `Satuan1`,`d`.`Satuan2` AS `Satuan2`,`d`.`Satuan3` AS `Satuan3`");
	$this->db->from("(`purchase_transaction` `a`");
	$this->db->join("`purchase_transaction_detail` `b` ","`b`.`pt` = `a`.`faktur_pt`)))");
	$this->db->join("`barang_satuan` `d` ","`b`.`id_barang` = `d`.`id_barang`)))");
	$this->db->join("`barang` `c` ","`b`.`id_barang` = `c`.`id`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_purchase_return(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pr` AS `faktur_pr`,`c`.`faktur_pt` AS `pt`,`a`.`tgl_pr` AS `tgl_pr`,if((`a`.`tipe_retur` = 1),'Berdasarkan Supplier','Dari Transaksi Pembelian') AS `tipe_retur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`totalretur` AS `totalretur`,`a`.`bayar` AS `bayar`,`a`.`biayakirim` AS `biayakirim`,`c`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`a`.`keterangan` AS `keterangan`,`a`.`id_supplier` AS `id_supplier`");
	$this->db->from("`purchase_return` `a`");
	$this->db->join("`supplier` `b` ","`b`.`id` = `a`.`id_supplier`)))");
	$this->db->join("purchase_transaction c ","`a`.`id_pt` = `c`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_detail_return(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur_pr` AS `faktur_pr`,`a`.`id_pr` AS `id_pr`,`a`.`jumlah` AS `jumlah`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_beli`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("(`purchase_return_detail` `a`");
	$this->db->join("`barang` `b` ","`b`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_satuan` `c` ","`c`.`id_barang` = `a`.`id_barang`)))");
	$this->db->join("`barang_harga` `d` ","`d`.`id_barang` = `a`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_kas_masuk_total(){
	$this->db->select(" `a`.`id_kas_masuk` AS `id_kas_masuk`,`a`.`faktur_kas` AS `faktur_kas`,sum(`a`.`nominal`) AS `kas_total`");
	$this->db->from("`kas_masuk_detail` `a`");
	$this->db->group_by("`a`.`faktur_kas`,`a`.`id_kas_masuk` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_kas_keluar_total(){
	$this->db->select(" `a`.`id_kas_keluar` AS `id_kas_keluar`,`a`.`faktur_kas` AS `faktur_kas`,sum(`a`.`nominal`) AS `kas_total`");
	$this->db->from("`kas_keluar_detail` `a`");
	$this->db->group_by("`a`.`faktur_kas`,`a`.`id_kas_keluar` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_kas_masuk(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_kas` AS `faktur_kas`,`a`.`tgl_kas` AS `tgl_kas`,`a`.`akun_kas` AS `akun_kas`,`a`.`nominal` AS `nominal`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`b`.`Wilayah` AS `Wilayah`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("kas_masuk` `a`");
	$this->db->join("`customer` `b` ","`b`.`id` = `a`.`id_customer`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_kas_keluar(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_kas` AS `faktur_kas`,`a`.`tgl_kas` AS `tgl_kas`,`a`.`akun_kas` AS `akun_kas`,`a`.`nominal` AS `nominal`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("kas_keluar` `a`");
	$this->db->join("`supplier` `b` ","`b`.`id` = `a`.`id_supplier`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bank_kode(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti_bank`,`a`.`tipe_trx` AS `tipe_trx`,substr(`a`.`bukti_bank`,1,2) AS `first`");
	$this->db->from("`bank` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_total_detail_bank(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_trx_bank` AS `id_trx_bank`,`a`.`bukti_bank` AS `bukti_bank`,sum(`a`.`nominal_detail`) AS `total_nominal`");
	$this->db->from("`bank_detail` `a`");
	$this->db->group_by("`a`.`bukti_bank`,`a`.`id_trx_bank` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bank(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti_bank`,`a`.`tipe_trx` AS `tipe_trx`,`a`.`akun_bank` AS `akun_bank`,`a`.`tgl_bank` AS `tgl_bank`,`a`.`keterangan` AS `keterangan`,`a`.`total_bank` AS `total_bank`,`a`.`total_giro` AS `total_giro`,`a`.`ref` AS `ref`,`b`.`Kode` AS `kode_bank`,`b`.`Rekening` AS `Rekening`,`b`.`Keterangan` AS `ket_rek`,concat(`c`.`Nama`,' (',`c`.`Kode`,')') AS `supplier`,concat(`d`.`Nama`,' (',`d`.`Kode`,')') AS `customer`");
	$this->db->from("(`banks` `b`");
	$this->db->join("`bank` `a` ","`b`.`id` = `a`.`id_bank`)))");
	$this->db->join("supplier c ","`c`.`id` = `a`.`id_supplier`","left");
$this->db->join("customer d ","`d`.`id` = `a`.`id_customer`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_total_tt_giro(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`id_trx_bank` AS `id_trx_bank`,`a`.`bukti_bank` AS `bukti_bank`,sum(`a`.`nominal`) AS `total_tt_giro`");
	$this->db->from("`bank_giro` `a`");
	$this->db->group_by("`a`.`bukti_bank`,`a`.`id_trx_bank`");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_bank_masuk(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti`,`a`.`akun_bank` AS `akun`,`a`.`tipe_trx` AS `tipe_trx`");
	$this->db->from("`bank` `a` ");
		$this->db->where("`a`.`tipe_trx` = 'D') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_bank_keluar(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`bukti_bank` AS `bukti`,`a`.`akun_bank` AS `akun`,`a`.`tipe_trx` AS `tipe_trx`");
	$this->db->from("`bank` `a` ");
		$this->db->where("`a`.`tipe_trx` = 'K') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_kas_masuk(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_kas` AS `bukti`,`a`.`akun_kas` AS `akun`");
	$this->db->from("`kas_masuk` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_kas_keluar(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_kas` AS `bukti`,`a`.`akun_kas` AS `akun`");
	$this->db->from("`kas_keluar` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_pt(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pt` AS `bukti`,`a`.`akun_hutang` AS `akun`");
	$this->db->from("`purchase_transaction` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_purchase_return(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_pr` AS `bukti`,`a`.`akun_hutang` AS `akun`");
	$this->db->from("`purchase_return` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_sales_trx(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_piutang` AS `akun`");
	$this->db->from("`sales_trx` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_sales_return(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur_sr` AS `bukti`,`a`.`akun_piutang` AS `akun`");
	$this->db->from("`sales_return` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_recording_ayam(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun`");
	$this->db->from("`recording_ayam` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_recording_telur(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun`");
	$this->db->from("`recording_telur` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_recording_pakan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun`");
	$this->db->from("`recording_pakan` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_bukti_recording_medis(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `bukti`,`a`.`akun_perkiraan` AS `akun`");
	$this->db->from("`recording_medis` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_jurnal_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_jurnal` AS `id_jurnal`,`a`.`no_jurnal` AS `no_jurnal`,`a`.`akun_detail` AS `akun_detail`,`a`.`ket_detail` AS `ket_detail`,if((`a`.`tipe_detail` = 'D'),`a`.`nilai`,0) AS `debet`,if((`a`.`tipe_detail` = 'K'),`a`.`nilai`,0) AS `kredit`");
	$this->db->from("`jurnal_detail` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_total_jurnal(){
	$this->db->select(" `a`.`id_jurnal` AS `id_jurnal`,`a`.`no_jurnal` AS `no_jurnal`,sum(`a`.`debet`) AS `totdebet`,sum(`a`.`kredit`) AS `totkredit`");
	$this->db->from("`view_jurnal_detail` `a`");
	$this->db->group_by("`a`.`no_jurnal` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam1(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`b`.`Kode` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`d`.`nama` AS `recording`,`a`.`total` AS `total`,`a`.`jumlah` AS `jumlah`,date_format(`a`.`tanggal`,'%Y-%m') AS `tahunbulan`,substr(`a`.`faktur`,1,3) AS `kodefaktur`,substr(`a`.`faktur`,4,4) AS `blnthnfaktur`,year(`a`.`tanggal`) AS `tahun`,week(`a`.`tanggal`,3) AS `minggu`,`a`.`keterangan` AS `keterangan`,`a`.`datetime` AS `datetime`");
	$this->db->from("(`recording_ayam` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`)))");
$this->db->join("`jenis_recording` `d` ","`a`.`id_recording` = `d`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam2(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`a`.`usia` AS `usia`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("((`recording_ayam_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("recording_ayam x ","`x`.`id` = `a`.`id_recording_ayam`) or (`x`.`faktur` = `a`.`faktur_recording`))))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur_recording` AS `faktur`,`a`.`faktur_reff` AS `faktur_reff`,`b`.`Kode` AS `Kode`,`a`.`usia` AS `usia`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("((`recording_ayam_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("recording_ayam x ","`x`.`id` = `a`.`id_recording_ayam`) or (`x`.`faktur` = `a`.`faktur_recording`))))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_total(){
	$this->db->select(" `a`.`id_recording_ayam` AS `id_recording_ayam`,`a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`,`a`.`jumlah_satuan` AS `jumlah`,if((`a`.`id_satuan` = 1),`b`.`Satuan1`,`b`.`Satuan2`) AS `satuan`,if(((`a`.`id_satuan` = 1) and (`b`.`Isi2` > 0)),(`a`.`jumlah_satuan` * 100),`a`.`jumlah_satuan`) AS `jmlekor`,`b`.`Satuan1` AS `Satuan1`,`b`.`Satuan2` AS `Satuan2`,`b`.`Satuan3` AS `Satuan3`,`b`.`Isi2` AS `Isi2`,`b`.`Isi3` AS `Isi3`");
	$this->db->from("view_rekam_ayam_detail` `a`");
	$this->db->join("`barang_satuan` `b` ","`b`.`kode` = `a`.`Kode`)))");
	$this->db->group_by("`a`.`faktur`");
	$this->db->order_by( `a`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_mati_kartustok(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording`");
	$this->db->from("kartustok` `a`");
	$this->db->join("recording_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(left(`a`.`faktur_ref`,3) = 'RAM') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_afkir_kartustok(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording`");
	$this->db->from("kartustok` `a`");
	$this->db->join("recording_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(left(`a`.`faktur_ref`,3) = 'RAA') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_ayam_perkandang(){
	$this->db->select(" `a`.`kandang` AS `kandang`,sum(if((substr(`a`.`faktur`,3,1) = 'I'),`a`.`jumlah`,0)) AS `isi`,sum(if((substr(`a`.`faktur`,3,1) = 'T'),`a`.`jumlah`,0)) AS `tambah`,sum(if((substr(`a`.`faktur`,3,1) = 'A'),`a`.`jumlah`,0)) AS `afkir`,sum(if((substr(`a`.`faktur`,3,1) = 'M'),`a`.`jumlah`,0)) AS `mati`,sum(if((substr(`a`.`faktur`,3,1) = 'K'),`a`.`jumlah`,0)) AS `kosong`");
	$this->db->from("`view_rekam_ayam` `a` ");
		$this->db->where("`a`.`kandang` ",!null);
		$this->db->group_by("`a`.`kandang` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_isi_kartustok(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording`");
	$this->db->from("kartustok` `a`");
	$this->db->join("recording_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(left(`a`.`faktur_ref`,3) = 'RAI') and (`a`.`tipe` = 'D') and (`a`.`tipe_kartustok` = 'Ayam')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_tambah_kartustok(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording`");
	$this->db->from("kartustok` `a`");
	$this->db->join("recording_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(left(`a`.`faktur_ref`,3) = 'RAT') and (`a`.`tipe` = 'D') and (`a`.`tipe_kartustok` = 'Ayam')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_kosong_kartustok(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`kredit` AS `kredit`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,`b`.`tanggal` AS `tgl_fak`,`b`.`id_kandang` AS `id_kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`id_recording` AS `id_recording`");
	$this->db->from("kartustok` `a`");
	$this->db->join("recording_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(left(`a`.`faktur_ref`,3) = 'RAK') and (`a`.`tipe` = 'K') and (`a`.`tipe_kartustok` = 'Ayam') and (`b`.`id_kandang` is not null) and (`b`.`id_mitra` is not null)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_is_lama(){
	$this->db->select(" `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,0) AS `weekyear`,`a`.`Kandang` AS `Kandang`,`a`.`Kandang` AS `kd_kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Qty` AS `Qty`,`a`.`QtyReal` AS `QtyReal`,`a`.`Customer` AS `kd_mitra`,`a`.`NmCustomer` AS `nm_mitra`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`Kode` AS `KodeBarang`,`a`.`Nmbarang` AS `Nmbarang`");
	$this->db->from("`isilayer` `a` ");
		$this->db->where("left(`a`.`Faktur`,2) = 'IS')");
		$this->db->order_by( `a`.`Tgl`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_mtaf_lama(){
	$this->db->select(" `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,3) AS `weeks`,sum(`a`.`Qty`) AS `total`,sum(`a`.`QtyReal`) AS `qtyasli`,`a`.`Umur` AS `Umur`,`a`.`Customer` AS `Customer`,`a`.`NmCustomer` AS `NmCustomer`,`a`.`Kandang` AS `Kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Satuan` AS `Satuan`,`a`.`User` AS `User`,`a`.`Time` AS `Time`");
	$this->db->from("`isilayer` `a` ");
		$this->db->where("(left(`a`.`Faktur`,2) = 'AM') or (left(`a`.`Faktur`,2) = 'PJ'))");
		$this->db->group_by("`a`.`Kandang`,`a`.`Tgl`");
		$this->db->order_by( `a`.`Tgl`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_ta_lama(){
	$this->db->select(" `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,3) AS `weeks`,year(`a`.`Tgl`) AS `yearnum`,sum(`a`.`Qty`) AS `total`,sum(`a`.`QtyReal`) AS `qtyasli`,`a`.`Customer` AS `Customer`,`a`.`NmCustomer` AS `NmCustomer`,`a`.`Kandang` AS `Kandang`,`a`.`NmKandang` AS `NmKandang`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`User` AS `User`,`a`.`Time` AS `Time`");
	$this->db->from("`isilayer` `a` ");
		$this->db->where("left(`a`.`Faktur`,2) = 'TA')");
		$this->db->group_by("`a`.`Kandang`,`a`.`Faktur`");
		$this->db->order_by( `a`.`Tgl`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_lama(){
	$this->db->select(" `a`.`Kandang` AS `Kandang`,`a`.`Kandang` AS `kd_kandang`,`a`.`Tgl` AS `Tgl`,week(`a`.`Tgl`,0) AS `weekyear`,`a`.`NmKandang` AS `NmKandang`,`a`.`Customer` AS `kd_mitra`,`a`.`NmCustomer` AS `nm_mitra`,sum(if((left(`a`.`Faktur`,2) = 'IS'),`a`.`Qty`,0)) AS `isi`,sum(if((left(`a`.`Faktur`,2) = 'TA'),`a`.`Qty`,0)) AS `tambah`,sum(if((left(`a`.`Faktur`,2) = 'AM'),`a`.`Qty`,0)) AS `mati`,sum(if((left(`a`.`Faktur`,2) = 'PJ'),`a`.`Qty`,0)) AS `afkir`,`a`.`Satuan` AS `Satuan`,`a`.`Umur` AS `Umur`,`a`.`Kode` AS `KodeBarang`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`User` AS `User`,`a`.`Time` AS `Time`");
	$this->db->from("`isilayer` `a`");
	$this->db->group_by("`a`.`Kandang`,`a`.`Tgl`");
	$this->db->order_by( `a`.`Tgl`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_baru(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`minggu` AS `weekyear`,`b`.`Kode` AS `kdbarang`,`b`.`Nama` AS `nama`,`b`.`jumlah_satuan` AS `jumlah`,`b`.`usia` AS `usia`,floor((`b`.`usia` / 7)) AS `weekolds`,(`b`.`usia` % 7) AS `weeksdays`,`a`.`datetime` AS `datetime`");
	$this->db->from("view_rekam_ayam` `a`");
	$this->db->join("view_rekam_ayam_detail b","`a`.`faktur` = `b`.`faktur`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_isi_ayam_baru(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`tanggal` AS `Tgl`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`jumlah` AS `Qty`,`a`.`usia` AS `usia`,`a`.`usia` AS `Umur`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y-%m-%d') AS `datestamp`");
	$this->db->from("`view_rekam_ayam_baru` `a` ");
		$this->db->where("`a`.`kodefaktur` = 'RAI') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_tambah_ayam_baru(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y-%m-%d') AS `datestamp`");
	$this->db->from("`view_rekam_ayam_baru` `a` ");
		$this->db->where("`a`.`kodefaktur` = 'RAT') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_mati_baru(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`,date_format(`a`.`datetime`,'%Y-%m-%d') AS `datestamp`");
	$this->db->from("`view_rekam_ayam_baru` `a` ");
		$this->db->where("`a`.`kodefaktur` = 'RAM') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_afkir(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`");
	$this->db->from("`view_rekam_ayam_baru` `a` ");
		$this->db->where("`a`.`kodefaktur` = 'RAA') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_ayam_kosong(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`id_kandang` AS `id_kandang`,`a`.`kandang` AS `kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`gudang` AS `gudang`,`a`.`namagudang` AS `namagudang`,`a`.`id_mitra` AS `id_mitra`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`id_recording` AS `id_recording`,`a`.`recording` AS `recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`tahun` AS `tahun`,`a`.`weekyear` AS `weekyear`,`a`.`kdbarang` AS `kdbarang`,`a`.`nama` AS `nama`,`a`.`jumlah` AS `jumlah`,`a`.`usia` AS `usia`,`a`.`weekolds` AS `weekolds`,`a`.`weeksdays` AS `weeksdays`");
	$this->db->from("`view_rekam_ayam_baru` `a` ");
		$this->db->where("`a`.`kodefaktur` = 'RAK') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_telur(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`reff` AS `faktur_reff`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`jumlah` AS `jumlah`,`a`.`total` AS `total`,`a`.`id_kandang` AS `id_kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_recording` AS `id_recording`,`a`.`id_mitra` AS `id_mitra`,date_format(`a`.`tanggal`,'%Y-%m') AS `tahunbulan`,substr(`a`.`faktur`,1,3) AS `kodefaktur`,substr(`a`.`faktur`,4,4) AS `blnthnfaktur`,`a`.`keterangan` AS `keterangan`,`a`.`total_butir` AS `total_butir`,`a`.`total_kg` AS `total_kg`");
	$this->db->from("(`recording_telur` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`)))");
$this->db->join("`jenis_recording` `d` ","`a`.`id_recording` = `d`.`id`","left");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_telur_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_recording_telur` AS `id_recording_telur`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_butir` AS `jumlah_butir`,`a`.`jumlah_total` AS `jumlah_total`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_total`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("((`recording_telur_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("recording_telur x ","`x`.`id` = `a`.`id_recording_telur`) or (`x`.`faktur` = `a`.`faktur_recording`))))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_telur_total(){
	$this->db->select(" `a`.`id_recording_telur` AS `id_recording_telur`,`a`.`faktur` AS `faktur`,`a`.`harga_satuan` AS `harga_satuan`,`a`.`jumlah_total` AS `jumlah`,`a`.`jumlah_butir` AS `butir`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("`view_rekam_telur_detail` `a`");
	$this->db->group_by("`a`.`faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_telur(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan`");
	$this->db->from("`view_rekam_telur_detail` `a` ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_stok_telur(){
	$this->db->select(" sum(if(((`a`.`Nama` = 'Telur') or (`a`.`Kode` = '010001')),`a`.`jumlah_total`,0)) AS `Telur`,sum(if(((`a`.`Nama` = 'Retak') or (`a`.`Kode` = '010002')),`a`.`jumlah_total`,0)) AS `Retak`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan`");
	$this->db->from("`view_rekam_telur_detail` `a` ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTS') and (`a`.`satuan` = 'KG')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_rusak_telur(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan`");
	$this->db->from("`view_rekam_telur_detail` `a` ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTR') and (`a`.`satuan` = 'KG')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_pakai_telur(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`jumlah_total`) AS `jml`,sum(`a`.`subtotal`) AS `total`,`a`.`satuan` AS `satuan`");
	$this->db->from("`view_rekam_telur_detail` `a` ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTP') and (`a`.`satuan` = 'KG')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_harian(){
	$this->db->select(" `b`.`tanggal` AS `tanggal`,month(`b`.`tanggal`) AS `bulan`,year(`b`.`tanggal`) AS `tahun`,sum(`a`.`jumlah_total`) AS `jml`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG'))");
		$this->db->group_by("`b`.`tanggal` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_telur_perbulan_kandang(){
	$this->db->select(" `b`.`tanggal` AS `tanggal`,month(`b`.`tanggal`) AS `bulan`,year(`b`.`tanggal`) AS `tahun`,sum(`a`.`jumlah_total`) AS `jml`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`,`b`.`kandang` AS `kandang`,`b`.`gudang` AS `gudang`,`b`.`namagudang` AS `namagudang`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG'))");
		$this->db->group_by("`bulan`,`b`.`kandang`");
		$this->db->order_by( `b`.`tanggal`,`b`.`kandang`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_bulanan(){
	$this->db->select(" year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y-%m') AS `bulanan`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now())))");
		$this->db->group_by("`tahun`,`bulan` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_matriks_hasil_bulanan(){
	$this->db->select(" year(`b`.`tanggal`) AS `tahun`,sum(if((month(`b`.`tanggal`) = 1),`a`.`jumlah_total`,0)) AS `jan`,sum(if((month(`b`.`tanggal`) = 2),`a`.`jumlah_total`,0)) AS `feb`,sum(if((month(`b`.`tanggal`) = 3),`a`.`jumlah_total`,0)) AS `mar`,sum(if((month(`b`.`tanggal`) = 4),`a`.`jumlah_total`,0)) AS `apr`,sum(if((month(`b`.`tanggal`) = 5),`a`.`jumlah_total`,0)) AS `mei`,sum(if((month(`b`.`tanggal`) = 6),`a`.`jumlah_total`,0)) AS `jun`,sum(if((month(`b`.`tanggal`) = 7),`a`.`jumlah_total`,0)) AS `jul`,sum(if((month(`b`.`tanggal`) = 8),`a`.`jumlah_total`,0)) AS `ags`,sum(if((month(`b`.`tanggal`) = 9),`a`.`jumlah_total`,0)) AS `sep`,sum(if((month(`b`.`tanggal`) = 10),`a`.`jumlah_total`,0)) AS `okt`,sum(if((month(`b`.`tanggal`) = 11),`a`.`jumlah_total`,0)) AS `nov`,sum(if((month(`b`.`tanggal`) = 12),`a`.`jumlah_total`,0)) AS `des`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG'))");
		$this->db->group_by("`tahun` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_stok_bulanan(){
	$this->db->select(" year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y-%m') AS `bulanan`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`,sum(if((`a`.`Kode` = '010001'),`a`.`jumlah_total`,0)) AS `telur`,sum(if((`a`.`Kode` = '010002'),`a`.`jumlah_total`,0)) AS `retak`,(sum(if((`a`.`Kode` = '010001'),`a`.`jumlah_total`,0)) + sum(if((`a`.`Kode` = '010002'),`a`.`jumlah_total`,0))) AS `stok`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTS') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now())))");
		$this->db->group_by("`tahun`,`bulan` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_bulanan_kandang(){
	$this->db->select(" year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y-%m') AS `bulanan`,`b`.`kandang` AS `kandang`,sum(`a`.`jumlah_total`) AS `hasil`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now())))");
		$this->db->group_by("`bulan`,`b`.`kandang` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_hasil_bulanan_permitra(){
	$this->db->select(" year(`b`.`tanggal`) AS `tahun`,month(`b`.`tanggal`) AS `bulan`,date_format(`b`.`tanggal`,'%Y-%m') AS `bulanan`,sum(if((`b`.`mitra` = 'B0027'),`a`.`jumlah_total`,0)) AS `bakalan`,sum(if((`b`.`mitra` = 'R0020'),`a`.`jumlah_total`,0)) AS `peletrenteng`,sum(if((`b`.`mitra` = 'W0008'),`a`.`jumlah_total`,0)) AS `wagir`,`a`.`satuan` AS `satuan`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("view_rekam_telur_detail` `a`");
	$this->db->join("`view_rekam_telur` `b` ","`a`.`faktur` = `b`.`faktur`))) ");
		$this->db->where("(substr(`a`.`faktur`,1,3) = 'RTH') and (`a`.`satuan` = 'KG') and (year(`b`.`tanggal`) = year(now())))");
		$this->db->group_by("`bulan` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_hasil_telur(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,week(`a`.`tanggal`,0) AS `minggu`,year(`a`.`tanggal`) AS `tahun`,`a`.`kandang` AS `kandang`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`a`.`recording` AS `recording`,`a`.`jumlah` AS `jumlah`,`a`.`id_kandang` AS `id_kandang`,`a`.`id_recording` AS `id_recording`,`a`.`tahunbulan` AS `tahunbulan`,`a`.`kodefaktur` AS `kodefaktur`,`a`.`blnthnfaktur` AS `blnthnfaktur`,`a`.`keterangan` AS `keterangan`,`view_rekam_telur_detail`.`jumlah_butir` AS `jumlah_butir`,`view_rekam_telur_detail`.`jumlah_total` AS `jumlah_total`");
	$this->db->from("view_rekam_telur` `a`");
	$this->db->join("`view_rekam_telur_detail` ","`view_rekam_telur_detail`.`faktur` = `a`.`faktur`))) ");
		$this->db->where("left(`a`.`faktur`,3) = 'RTH') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_pakan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`total` AS `total`");
	$this->db->from("(`recording_pakan` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`)))");
$this->db->join("`jenis_recording` `d` ","`a`.`id_recording` = `d`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_pakan_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_recording_pakan` AS `id_recording_pakan`,`a`.`faktur_recording` AS `faktur_recording`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("((`recording_pakan_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("recording_pakan x ","`x`.`id` = `a`.`id_recording_pakan`) or (`x`.`faktur` = `a`.`faktur_recording`))))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_pakan_total(){
	$this->db->select(" `a`.`id_recording_pakan` AS `id_recording_pakan`,`a`.`faktur_recording` AS `faktur`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("`view_rekam_pakan_detail` `a`");
	$this->db->group_by("`a`.`faktur_recording` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_pakan_lama_kandang(){
	$this->db->select(" `a`.`cNoJrn` AS `cNoJrn`,date_format(`a`.`dTanggal`,'%Y-%m-%d') AS `dTanggal`,`a`.`cNoBukti` AS `cNoBukti`,trim(right(`a`.`cKeterangan`,(length(`a`.`cKeterangan`) - locate(':',`a`.`cKeterangan`,22)))) AS `kandang`,year(`a`.`dTanggal`) AS `yearnum`,week(`a`.`dTanggal`,3) AS `minggu`,`b`.`Kode` AS `Kode`,`b`.`NmBarang` AS `NmBarang`,`b`.`Qty` AS `Qty`,`b`.`Satuan` AS `Satuan`,`b`.`Gudang` AS `Gudang`");
	$this->db->from("tbjurnal` `a`");
	$this->db->join("pakan b","`b`.`Faktur` = `a`.`cNoBukti`","left");
	$this->db->where("(left(`a`.`cNoBukti`,2) = 'PT') and (`b`.`Kode` = '020078'))");
	$this->db->order_by( `a`.`dTanggal`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_pakan_baru(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,left(`a`.`faktur`,2) AS `kd`,`a`.`tanggal` AS `tanggal`,year(`a`.`tanggal`) AS `tahun`,week(`a`.`tanggal`,0) AS `weekyear`,`a`.`kandang` AS `kandang`,`a`.`mitra` AS `mitra`,`a`.`namamitra` AS `namamitra`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`jumlah_satuan` AS `jumlah`,`b`.`satuan` AS `satuan`");
	$this->db->from("view_rekam_pakan` `a`");
	$this->db->join("`view_rekam_pakan_detail` `b` ","`a`.`faktur` = `b`.`faktur_recording`))) ");
		$this->db->where("left(`a`.`faktur`,2) = 'RP') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_summary_rekam_pakan_kandang(){
	$this->db->select(" `a`.`cNoJrn` AS `cNoJrn`,date_format(`a`.`dTanggal`,'%Y-%m-%d') AS `dTanggal`,`a`.`cNoBukti` AS `cNoBukti`,trim(right(`a`.`cKeterangan`,(length(`a`.`cKeterangan`) - locate(':',`a`.`cKeterangan`,22)))) AS `kandang`,year(`a`.`dTanggal`) AS `yearnum`,week(`a`.`dTanggal`,3) AS `minggu`,`b`.`Kode` AS `Kode`,`b`.`NmBarang` AS `NmBarang`,sum(`b`.`Qty`) AS `Qty`,`b`.`Satuan` AS `Satuan`,`b`.`Gudang` AS `Gudang`");
	$this->db->from("tbjurnal` `a`");
	$this->db->join("pakan b","`b`.`Faktur` = `a`.`cNoBukti`","left");
	$this->db->where("(left(`a`.`cNoBukti`,2) = 'PT') and (`b`.`Kode` = '020078'))");
	$this->db->group_by("`yearnum`,`kandang`,`minggu`");
	$this->db->order_by( `a`.`dTanggal`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_pakan_jadi(){
	$this->db->select(" `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Gudang` AS `Gudang`,`a`.`Kode` AS `Kode`,`a`.`NmBarang` AS `NmBarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan`");
	$this->db->from("`pakan` `a` ");
		$this->db->where("`a`.`Kode` = '020078') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_medis(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`d`.`nama` AS `recording`,`a`.`total` AS `total`");
	$this->db->from("(`recording_medis` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`)))");
$this->db->join("`jenis_recording` `d` ","`a`.`id_recording` = `d`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_medis_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`id_recording_medis` AS `id_recording_medis`,`a`.`faktur_recording` AS `faktur`,`b`.`Kode` AS `Kode`,`a`.`umur` AS `umur`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("((`recording_medis_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("recording_medis x ","`x`.`id` = `a`.`id_recording_medis`) or (`x`.`faktur` = `a`.`faktur_recording`))))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_medis_total(){
	$this->db->select(" `a`.`id_recording_medis` AS `id_recording_medis`,`a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("`view_rekam_medis_detail` `a`");
	$this->db->group_by("`a`.`faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_assembly(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`kd_gudang` AS `kd_gudang`,`b`.`nama` AS `nama`,`c`.`faktur` AS `formula`,`c`.`tanggal` AS `tgl_formula`,`a`.`jumlah` AS `jumlah`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_formulasi` AS `id_formulasi`");
	$this->db->from("`assembly_pakan` `a`");
	$this->db->join("`gudang` `b` ","`a`.`id_gudang` = `b`.`id`)))");
	$this->db->join("formulasi c ","`a`.`id_formulasi` = `c`.`id`","left");
	$this->db->order_by( `a`.`id`,"desc");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_assembly_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah_satuan` AS `jumlah_satuan`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,if(((`a`.`id_satuan` = 1) and ((`c`.`Satuan1` = 'ZK') or (`c`.`Satuan1` = 'zk'))),(`c`.`Isi2` * `a`.`jumlah_satuan`),if(((`a`.`id_satuan` = 2) and ((`c`.`Satuan2` = 'KG') or (`c`.`Satuan2` = 'kg'))),`a`.`jumlah_satuan`,`a`.`jumlah_satuan`)) AS `satuan_real`,(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah_satuan`) AS `subtotal`,`b`.`Keterangan` AS `keterangan`,`a`.`urutan` AS `urutan`,`c`.`Isi2` AS `Isi2`,`c`.`Isi3` AS `Isi3`,`c`.`Satuan1` AS `Satuan1`,`c`.`Satuan2` AS `Satuan2`,`c`.`Satuan3` AS `Satuan3`");
	$this->db->from("((`assembly_pakan_detail` `a`");
	$this->db->join("`barang_satuan` `c` ","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b` ","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d` ","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("assembly_pakan x ","`x`.`faktur` = `a`.`faktur`)))");
	$this->db->group_by("`a`.`id_detail`","left");
	$this->db->order_by( `a`.`urutan`,`a`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekam_assembly_total(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`,sum(`a`.`satuan_real`) AS `jumlah`,round((sum(`a`.`subtotal`) / sum(`a`.`satuan_real`)),3) AS `harga_jadi`");
	$this->db->from("`view_rekam_assembly_detail` `a`");
	$this->db->group_by("`a`.`faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_purchase_request(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`is_approved` AS `is_approved`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("`purchase_request` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_purchase_request_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`keterangan` AS `keterangan`,`c`.`kode` AS `kode`");
	$this->db->from("`purchase_request_detail` `a`");
	$this->db->join("`barang` `b` ","`b`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_satuan` `c` ","`c`.`id_barang` = `a`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_receive_item(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`b`.`Kode` AS `kandang`,`b`.`Gudang` AS `gudang`,`c`.`nama` AS `namagudang`,`b`.`Mitra` AS `mitra`,`b`.`NmMitra` AS `namamitra`,`a`.`is_approved` AS `is_approved`,`a`.`keterangan` AS `keterangan`,`a`.`faktur_reff` AS `faktur_reff`,`a`.`faktur_do` AS `faktur_do`,`a`.`id_kandang` AS `id_kandang`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_supplier` AS `id_supplier`,`a`.`tanggal_terima` AS `tanggal_terima`,`a`.`kirim_via` AS `kirim_via`,`a`.`nopol_pengirim` AS `nopol_pengirim`,`a`.`nama_pengirim` AS `nama_pengirim`");
	$this->db->from("`receive_item` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
$this->db->join("gudang c ","`a`.`id_gudang` = `c`.`id`","left");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_receive_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`keterangan` AS `keterangan`,`c`.`kode` AS `kode`,`a`.`jumlah_retur` AS `jumlah_retur`");
	$this->db->from("`receive_item_detail` `a`");
	$this->db->join("`barang` `b` ","`b`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_satuan` `c` ","`c`.`id_barang` = `a`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_order(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tgl` AS `tgl`,`b`.`Kode` AS `kdcustomer`,`b`.`Nama` AS `namacustomer`,`a`.`tgl_terima` AS `tgl_terima`,`a`.`tgl_kedaluarsa` AS `tgl_kedaluarsa`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`d`.`nama` AS `nama`,`a`.`grandtotal` AS `grandtotal`,`b`.`id` AS `idcustomer`,`e`.`faktur` AS `fakturtrx`");
	$this->db->from("((`sales_order` `a`");
	$this->db->join("customer b","`b`.`id` = `a`.`id_customer`","left");
$this->db->join("jenis_pembayaran c ","`c`.`id` = `a`.`id_bayar`","left");
$this->db->join("sales d ","`a`.`id_sales` = `d`.`id_karyawan`","left");
$this->db->join("sales_trx e ","`a`.`faktur` = `e`.`faktur_so`","left");
$this->db->order_by( `a`.`faktur`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_trx(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tgl` AS `tgl`,`b`.`id` AS `id_customer`,`b`.`Kode` AS `kdcustomer`,`b`.`Nama` AS `namacustomer`,`a`.`totalbayar` AS `totalbayar`,`c`.`jenis_pembayaran` AS `jenis_pembayaran`,`a`.`keterangan` AS `keterangan`,md5(`a`.`id`) AS `md5id`,`a`.`faktur_so` AS `faktur_so`,`a`.`id_so` AS `id_so`,`a`.`uangmuka` AS `uangmuka`,`a`.`biayakirim` AS `biayakirim`,`a`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`a`.`diskon` AS `diskon`,`a`.`sisa` AS `sisa`,`a`.`status` AS `status`,`a`.`tgl_jtempo` AS `tgl_jtempo`,`a`.`akun_piutang` AS `akun_piutang`,`s`.`nama` AS `namasales`,`a`.`islocked` AS `islocked`,`a`.`isactive` AS `isactive`,`a`.`isvalid` AS `isvalid`,`b`.`Golongan` AS `kdgolongan`,`g`.`Keterangan` AS `namagolongan`,`g`.`CaraJual` AS `CaraJual`");
	$this->db->from("((`sales_trx` `a`");
	$this->db->join("`customer` `b` ","`b`.`id` = `a`.`id_customer`)))");
	$this->db->join("jenis_pembayaran c ","`c`.`id` = `a`.`id_bayar`","left");
$this->db->join("sales s","`a`.`id_sales` = `s`.`id`)))");
$this->db->join("`golongancustomer` `g`","`b`.`Golongan` = `g`.`Kode`","left");
$this->db->order_by( `a`.`faktur`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_order_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,`a`.`harga_jual` AS `harga_jual`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) AS `harga_satuan`,if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`))) AS `harga`,if((`a`.`harga_jual` > 0),(`a`.`harga_jual` * `a`.`jumlah`),(if((`a`.`id_satuan` = 1),`d`.`hb1`,if((`a`.`id_satuan` = 2),`d`.`hb2`,`d`.`hb3`)) * `a`.`jumlah`)) AS `subtotal`,`b`.`id` AS `idbarang`");
	$this->db->from("((`sales_order_detail` `a`");
	$this->db->join("`barang_satuan` `c`","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d`","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("sales_order x","`x`.`faktur` = `a`.`faktur`)))");
	$this->db->group_by("`a`.`id_detail` ;","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_trx_detail(){
	$this->db->select(" `x`.`id` AS `id`,`a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`x`.`tgl` AS `tgl`,`x`.`id_customer` AS `id_customer`,`x`.`tgl_jtempo` AS `tgl_jtempo`,`b`.`id` AS `idbarang`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`jumlah` AS `jumlah`,`a`.`id_satuan` AS `id_satuan`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`)) AS `harga_satuan`,`a`.`harga_jual` AS `harga_jual`,if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`))) AS `harga`,(if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`))) * `a`.`jumlah`) AS `subtotal`,`c`.`Isi2` AS `Isi2`,`c`.`Isi3` AS `Isi3`,`c`.`Satuan1` AS `Satuan1`,`c`.`Satuan2` AS `Satuan2`,`c`.`Satuan3` AS `Satuan3`,if((`a`.`id_satuan` = 1),`a`.`jumlah`,0) AS `jml1`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,0) AS `sat1`,if((`a`.`id_satuan` = 2),`a`.`jumlah`,0) AS `jml2`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,0) AS `sat2`,if((`a`.`id_satuan` = 3),`a`.`jumlah`,0) AS `jml3`,if((`a`.`id_satuan` = 3),`c`.`Satuan3`,0) AS `sat3`,`a`.`isactive` AS `isactive`,`f`.`Golongan` AS `kdgolongan`,`g`.`Keterangan` AS `golongan`");
	$this->db->from("((((`sales_trx_detail` `a`");
	$this->db->join("`barang_satuan` `c`","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d`","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("sales_trx x","`x`.`faktur` = `a`.`faktur`)))");
	$this->db->join("`barang_golongan` `f`","`b`.`id` = `f`.`id_barang`)))");
	$this->db->join("`golongan` `g`","`f`.`Golongan` = `g`.`Kode`","left");
	$this->db->order_by( `x`.`id`,`a`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_order_total(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("`view_sales_order_detail` `a`");
	$this->db->group_by("`a`.`faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_sales_trx_total(){
	$this->db->select(" `a`.`faktur` AS `faktur`,sum(`a`.`subtotal`) AS `total`");
	$this->db->from("`view_sales_trx_detail` `a` ");
		$this->db->where("`a`.`isactive` = 1)");
		$this->db->group_by("`a`.`faktur` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_per_transaksi_jual_detail(){
	$this->db->select(" `x`.`id` AS `id`,`a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`x`.`tgl` AS `tgl`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`jumlah` AS `jumlah`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`)) AS `harga_satuan`,`a`.`harga_jual` AS `harga_jual`,if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`))) AS `harga`,(if((`a`.`harga_jual` > 0),`a`.`harga_jual`,if((`a`.`id_satuan` = 1),`d`.`HJ1R`,if((`a`.`id_satuan` = 2),`d`.`HJ2R`,`d`.`HJ3R`))) * `a`.`jumlah`) AS `subtotal`,`x`.`id_customer` AS `id_customer`,`a`.`id_barang` AS `id_barang`");
	$this->db->from("((`sales_trx_detail` `a`");
	$this->db->join("`barang_satuan` `c`","`a`.`id_barang` = `c`.`id_barang`)))");
	$this->db->join("`barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`barang_harga` `d`","`b`.`id` = `d`.`id_barang`)))");
	$this->db->join("`sales_trx` `x`","`x`.`faktur` = `a`.`faktur`)))");
	$this->db->order_by( `a`.`id_detail`,`x`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_transaksi_jual_detail(){
	$this->db->select(" `a`.`id` AS `id`,`b`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`faktur_so` AS `faktur_so`,`a`.`tgl` AS `tgl`,`a`.`id_customer` AS `id_customer`,`b`.`id_barang` AS `id_barang`,`c`.`Kode` AS `Kode`,`c`.`Nama` AS `Nama`,`b`.`jumlah` AS `jumlah`,`b`.`id_satuan` AS `id_satuan`,if((`b`.`id_satuan` = 1),`d`.`Satuan1`,if((`b`.`id_satuan` = 2),`d`.`Satuan2`,`d`.`Satuan3`)) AS `satuan`,if((`b`.`id_satuan` = 1),`e`.`HJ1R`,if((`b`.`id_satuan` = 2),`e`.`HJ2R`,`e`.`HJ3R`)) AS `harga_table`,`b`.`harga_jual` AS `harga_jual`,if((`b`.`harga_jual` > 0),`b`.`harga_jual`,if((`b`.`id_satuan` = 1),`e`.`HJ1R`,if((`b`.`id_satuan` = 2),`e`.`HJ2R`,`e`.`HJ3R`))) AS `harga`,`a`.`totalbayar` AS `totalbayar`,`a`.`uangmuka` AS `uangmuka`,`a`.`biayakirim` AS `biayakirim`,`a`.`ppn` AS `ppn`,`a`.`grandtotal` AS `grandtotal`,`a`.`diskon` AS `diskon`,`a`.`sisa` AS `sisa`,`d`.`Isi2` AS `Isi2`,`d`.`Isi3` AS `Isi3`,`d`.`Satuan1` AS `Satuan1`,`d`.`Satuan2` AS `Satuan2`,`d`.`Satuan3` AS `Satuan3`,`e`.`HJ1R` AS `hj1r`,`e`.`HJ2R` AS `hj2r`,`e`.`HJ3R` AS `hj3r`");
	$this->db->from("((`sales_trx` `a`");
	$this->db->join("`sales_trx_detail` `b`","`a`.`faktur` = `b`.`faktur`)))");
	$this->db->join("`barang` `c`","`b`.`id_barang` = `c`.`id`)))");
	$this->db->join("`barang_satuan` `d`","`c`.`id` = `d`.`id_barang`)))");
	$this->db->join("`barang_harga` `e`","`c`.`id` = `e`.`id_barang`)))");
	$this->db->order_by( `a`.`id`,`b`.`id_detail`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_penyesuaian_barang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_reff` AS `faktur_reff`,`a`.`akun` AS `akun`,`a`.`tanggal` AS `tanggal`,`c`.`nama` AS `namagudang`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("penyesuaian` `a`");
	$this->db->join("gudang c","`a`.`id_gudang` = `c`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_penyesuaian_barang_detail(){
	$this->db->select(" `a`.`id_detail` AS `id_detail`,`a`.`faktur` AS `faktur`,`a`.`jumlah` AS `jumlah`,`b`.`Nama` AS `Nama`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`jumlah_baru` AS `jumlah_baru`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`ket_detail` AS `keterangan`,`c`.`kode` AS `kode`");
	$this->db->from("`penyesuaian_detail` `a`");
	$this->db->join("`barang` `b`","`b`.`id` = `a`.`id_barang`)))");
	$this->db->join("`barang_satuan` `c`","`c`.`id_barang` = `a`.`id_barang`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_armada(){
	$this->db->select(" `a`.`id` AS `id`,`b`.`nama` AS `nama`,`c`.`nama_supir` AS `nama_supir`,`b`.`kode` AS `kode`,`b`.`nopol` AS `nopol`,`c`.`id_karyawan` AS `id_karyawan`");
	$this->db->from("`armada` `a`");
	$this->db->join("`kendaraan` `b`","`b`.`id` = `a`.`kendaraan_id`)))");
	$this->db->join("`supir_armada` `c`","`c`.`id` = `a`.`supir_id`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_formula(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`tanggal` AS `tanggal`,`a`.`nama` AS `nama`,`a`.`keterangan` AS `keterangan`,`a`.`id_kandang` AS `id_kandang`,`b`.`Kode` AS `Kode`,`b`.`Gudang` AS `Gudang`,`b`.`NmGudang` AS `NmGudang`,`b`.`Mitra` AS `Mitra`,`b`.`NmMitra` AS `NmMitra`,`a`.`jml_hasil_jadi` AS `jml_hasil_jadi`,`a`.`satuan_jadi` AS `satuan_jadi`");
	$this->db->from("formulasi` `a`");
	$this->db->join("kandang b","`a`.`id_kandang` = `b`.`id`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_kandang_isi(){
	$this->db->select(" `a`.`Faktur` AS `Faktur`,`a`.`Tgl` AS `Tgl`,`a`.`Customer` AS `Customer`,`a`.`Kandang` AS `Kandang`,`a`.`Gudang` AS `Gudang`,`a`.`NmGudang` AS `NmGudang`,`a`.`Keterangan` AS `Keterangan`,`a`.`Kode` AS `Kode`,`a`.`Nmbarang` AS `Nmbarang`,`a`.`Qty` AS `Qty`,`a`.`Satuan` AS `Satuan`,`a`.`QtyReal` AS `QtyReal`,`a`.`Umur` AS `Umur`,`a`.`NmCustomer` AS `NmCustomer`");
	$this->db->from("`isilayer` `a` ");
		$this->db->where("left(`a`.`Faktur`,2) = 'IS')");
		$this->db->order_by( `a`.`Tgl`,"desc");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_customer(){
	$this->db->select(" `c`.`id` AS `id`,`c`.`faktur` AS `faktur`,`c`.`faktur_ref` AS `faktur_ref`,`c`.`tanggal` AS `tanggal`,`c`.`akun_hutang` AS `akun_hutang`,`c`.`mutasidebet` AS `mutasidebet`,`c`.`mutasikredit` AS `mutasikredit`,`c`.`saldodebet` AS `saldodebet`,`c`.`saldokredit` AS `saldokredit`,`c`.`keterangan` AS `keterangan`,`d`.`Kode` AS `Kode`,`d`.`Nama` AS `Nama`,`d`.`JthTempo` AS `JthTempo`,(`c`.`tanggal` + interval `d`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`c`.`tanggal` + interval `d`.`JthTempo` day)) AS `warningtempo`,`c`.`id_customer` AS `idcs`");
	$this->db->from("kartuhutang` `c`");
	$this->db->join("`customer` `d`","`d`.`id` = `c`.`id_customer`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_pembelian_supplier(){
	$this->db->select(" `c`.`id` AS `id`,`c`.`faktur` AS `faktur`,`c`.`faktur_ref` AS `faktur_ref`,`c`.`tanggal` AS `tanggal`,`c`.`akun_hutang` AS `akun_hutang`,`c`.`mutasidebet` AS `mutasidebet`,`c`.`mutasikredit` AS `mutasikredit`,`c`.`saldodebet` AS `saldodebet`,`c`.`saldokredit` AS `saldokredit`,`c`.`keterangan` AS `keterangan`,`d`.`Kode` AS `Kode`,`d`.`Nama` AS `Nama`,`d`.`JthTempo` AS `JthTempo`,(`c`.`tanggal` + interval `d`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`c`.`tanggal` + interval `d`.`JthTempo` day)) AS `warningtempo`,`c`.`id_supplier` AS `idsp`");
	$this->db->from("kartuhutang` `c`");
	$this->db->join("`supplier` `d`","`d`.`id` = `c`.`id_supplier`))) ");
		$this->db->where("left(`c`.`faktur_ref`,2) = 'PT') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_supplier2(){
	$this->db->select(" `c`.`id` AS `id`,`c`.`faktur` AS `faktur`,`c`.`faktur_ref` AS `faktur_ref`,`c`.`tanggal` AS `tanggal`,`c`.`akun_hutang` AS `akun_hutang`,`c`.`mutasidebet` AS `mutasidebet`,`c`.`mutasikredit` AS `mutasikredit`,`c`.`saldodebet` AS `saldodebet`,`c`.`saldokredit` AS `saldokredit`,`c`.`keterangan` AS `keterangan`,`d`.`Kode` AS `Kode`,`d`.`Nama` AS `Nama`,`d`.`JthTempo` AS `JthTempo`,(`c`.`tanggal` + interval `d`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`c`.`tanggal` + interval `d`.`JthTempo` day)) AS `warningtempo`,`c`.`id_supplier` AS `idsp`");
	$this->db->from("kartuhutang` `c`");
	$this->db->join("`supplier` `d`","`d`.`id` = `c`.`id_supplier`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_piutang_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,(`a`.`tanggal` + interval `b`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`a`.`tanggal` + interval `b`.`JthTempo` day)) AS `warningtempo`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`keterangan` AS `keterangan`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`JthTempo` AS `JthTempo`,`a`.`id_customer` AS `id_customer`,`b`.`Plafond` AS `Plafond`,`b`.`Subsidi` AS `Subsidi`");
	$this->db->from("kartupiutang` `a`");
	$this->db->join("`customer` `b`","`b`.`id` = `a`.`id_customer`))) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_piutang_sum_saldodebet(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(`a`.`mutasidebet`) AS `mutasidebet`,sum(`a`.`mutasikredit`) AS `mutasikredit`,if((sum(`a`.`mutasikredit`) > 0),(sum(`a`.`mutasidebet`) - sum(`a`.`mutasikredit`)),sum(`a`.`mutasidebet`)) AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`id_customer` AS `id_customer`");
	$this->db->from("`kartupiutang` `a`");
	$this->db->group_by("`a`.`akun_hutang`");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_piutang_sum_saldokredit(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(`a`.`saldokredit`) AS `saldokredit`");
	$this->db->from("`kartupiutang` `a`");
	$this->db->group_by("`a`.`akun_hutang` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_rekap_piutang_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(`a`.`mutasidebet`) AS `mutasidebet`,sum(`a`.`mutasikredit`) AS `mutasikredit`,if((sum(`a`.`mutasikredit`) > 0),(sum(`a`.`mutasidebet`) - sum(`a`.`mutasikredit`)),sum(`a`.`mutasidebet`)) AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`id_customer` AS `id_customer`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`b`.`JthTempo` AS `JthTempo`,`b`.`Plafond` AS `Plafond`,`b`.`Golongan` AS `Golongan`,`b`.`Subsidi` AS `Subsidi`,`b`.`Kota` AS `Kota`");
	$this->db->from("kartupiutang` `a`");
	$this->db->join("customer b","`a`.`id_customer` = `b`.`id`)))");
	$this->db->group_by("`a`.`akun_hutang`","left");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_pelunasan_piutang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `fakturlunas`,`b`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`b`.`tanggal` AS `tglunas`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`id_customer` AS `id_customer`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`b`.`plafon` AS `plafon`,`b`.`piutang` AS `piutang`,`b`.`bayar` AS `bayar`,`b`.`sisa` AS `sisa`,`a`.`keterangan` AS `keterangan`,`c`.`Kode` AS `Kode`,`c`.`Golongan` AS `Golongan`,`c`.`Nama` AS `Nama`,`c`.`Alamat` AS `Alamat`,`c`.`Kota` AS `Kota`");
	$this->db->from("`kartupiutang` `a`");
	$this->db->join("pelunasan_piutang b","`a`.`faktur_ref` = `b`.`faktur`","left");
$this->db->join("customer c","`a`.`id_customer` = `c`.`id`","left");
$this->db->where("left(`a`.`faktur_ref`,2) = 'PP') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_status_penjualan(){
	$this->db->select(" `a`.`id_customer` AS `id_customer`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`Plafond` AS `Plafond`,`a`.`Golongan` AS `Golongan`,`a`.`Subsidi` AS `Subsidi`,if((`a`.`saldodebet` <= `a`.`Plafond`),1,0) AS `bawahplafon`,if(((`a`.`saldodebet` <= `a`.`Plafond`) and (`a`.`Golongan` = 'TK')),1,0) AS `tokotrx`");
	$this->db->from("`view_rekap_piutang_customer` `a`");
	$this->db->order_by( `a`.`id_customer`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_piutang_lunas(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`saldodebet` AS `saldodebet`,`a`.`Plafond` AS `Plafond`,`a`.`keterangan` AS `keterangan`,`a`.`id_customer` AS `id_customer`,`b`.`id` AS `idlunas`,`b`.`fakturlunas` AS `fakturlunas`,if((`b`.`fakturlunas` is not null),'lunas','belum lunas') AS `statlunas`,`a`.`JthTempo` AS `JthTempo`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`Subsidi` AS `Subsidi`,`a`.`jatuhtempo` AS `jatuhtempo`,`a`.`warningtempo` AS `warningtempo`,`b`.`tanggal` AS `tgllunas`");
	$this->db->from("view_piutang_customer` `a`");
	$this->db->join("view_pelunasan_piutang b","`a`.`faktur_ref` = `b`.`faktur_ref`","left");
	$this->db->where("`a`.`mutasidebet` ",!null);
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_summary_piutang_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(if((left(`a`.`faktur_ref`,2) = 'SA'),`a`.`saldodebet`,0)) AS `saldoawal`,sum(`a`.`mutasidebet`) AS `mutasidebet`,sum(`a`.`mutasikredit`) AS `mutasikredit`,if((sum(`a`.`mutasikredit`) > 0),(sum(`a`.`mutasidebet`) - sum(`a`.`mutasikredit`)),sum(`a`.`mutasidebet`)) AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`id_customer` AS `id_customer`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,`b`.`Alamat` AS `Alamat`,`b`.`JthTempo` AS `JthTempo`,`b`.`Plafond` AS `Plafond`,`b`.`Golongan` AS `Golongan`,`b`.`Subsidi` AS `Subsidi`,`b`.`Kota` AS `Kota`");
	$this->db->from("kartupiutang` `a`");
	$this->db->join("customer b","`a`.`id_customer` = `b`.`id`)))");
	$this->db->group_by("`a`.`akun_hutang`","left");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_piutang_jatuhtempo(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`jatuhtempo` AS `jatuhtempo`,`a`.`warningtempo` AS `warningtempo`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`tgllunas` AS `tgllunas`,`a`.`JthTempo` AS `JthTempo`,`a`.`fakturlunas` AS `fakturlunas`,`a`.`id_customer` AS `id_customer`,`a`.`Plafond` AS `Plafond`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`keterangan` AS `keterangan`");
	$this->db->from("`view_piutang_lunas` `a` ");
		$this->db->where("(left(`a`.`faktur_ref`,2) = 'ST') and isnull(`a`.`fakturlunas`)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_sum_saldokredit(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(if((left(`a`.`faktur_ref`,2) = 'SA'),`a`.`mutasikredit`,0)) AS `saldoawal`,sum(`a`.`mutasidebet`) AS `mutasidebet`,sum(`a`.`mutasikredit`) AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,if((sum(`a`.`mutasidebet`) > 0),(sum(`a`.`mutasikredit`) - sum(`a`.`mutasidebet`)),sum(`a`.`mutasikredit`)) AS `saldokredit`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),sha(md5('sp')),sha(md5('cs'))) AS `type`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`id`,`c`.`id`) AS `idvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Kode`,`c`.`Kode`) AS `kdvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Nama`,`c`.`Nama`) AS `namavendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Alamat`,`c`.`Alamat`) AS `alamatvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),'Supplier','Customer') AS `jenisvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`JthTempo`,`c`.`JthTempo`) AS `tempovendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Kota`,'') AS `kotavendor`,`b`.`id` AS `idsp`,`c`.`id` AS `idcs`");
	$this->db->from("`kartuhutang` `a`");
	$this->db->join("supplier b","`a`.`id_supplier` = `b`.`id`","left");
$this->db->join("customer c","`c`.`id` = `a`.`id_customer`","left");
$this->db->where("(`a`.`id_customer` is not null) or (`a`.`id_supplier` is not null))");
$this->db->group_by("`a`.`akun_hutang`");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_summary(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`akun_hutang` AS `akun_hutang`,sum(if((left(`a`.`faktur_ref`,2) = 'SA'),`a`.`mutasikredit`,0)) AS `saldoawal`,sum(`a`.`mutasidebet`) AS `mutasidebet`,sum(if((left(`a`.`faktur_ref`,2) <> 'SA'),`a`.`mutasikredit`,0)) AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,if((sum(`a`.`mutasidebet`) > 0),(sum(`a`.`mutasikredit`) - sum(`a`.`mutasidebet`)),sum(`a`.`mutasikredit`)) AS `saldokredit`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),sha(md5('sp')),sha(md5('cs'))) AS `type`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`id`,`c`.`id`) AS `idvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Kode`,`c`.`Kode`) AS `kdvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Nama`,`c`.`Nama`) AS `namavendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Alamat`,`c`.`Alamat`) AS `alamatvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),'Supplier','Customer') AS `jenisvendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`JthTempo`,`c`.`JthTempo`) AS `tempovendor`,if(((`a`.`id_supplier` <> NULL) or (`a`.`id_supplier` > 0)),`b`.`Kota`,'') AS `kotavendor`,`b`.`id` AS `idsp`,`c`.`id` AS `idcs`");
	$this->db->from("`kartuhutang` `a`");
	$this->db->join("supplier b","`a`.`id_supplier` = `b`.`id`","left");
$this->db->join("customer c","`c`.`id` = `a`.`id_customer`","left");
$this->db->where("(`a`.`id_customer` is not null) or (`a`.`id_supplier` is not null))");
$this->db->group_by("`a`.`akun_hutang`");
$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_pelunasan_hutang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`tgltempo` AS `tgltempo`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`id_customer` AS `id_customer`,`a`.`id_supplier` AS `id_supplier`,`a`.`id_mitra` AS `id_mitra`,`a`.`id_gudang` AS `id_gudang`,`a`.`id_kandang` AS `id_kandang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`keterangan` AS `keterangan`,`b`.`hutang` AS `hutang`,`b`.`bayar` AS `bayar`,(`b`.`hutang` - `b`.`bayar`) AS `sisahutang`,`b`.`faktur` AS `fakturlunas`,`b`.`id` AS `idlunas`,`b`.`tempohari` AS `tempohari`,(`a`.`tanggal` + interval `b`.`tempohari` day) AS `jatuhtempo`,(curdate() - (`a`.`tanggal` + interval `b`.`tempohari` day)) AS `warningtempo`");
	$this->db->from("kartuhutang` `a`");
	$this->db->join("pelunasan_hutang b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("left(`a`.`faktur_ref`,2) = 'PH') ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_customer_lunas(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`keterangan` AS `keterangan`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`JthTempo` AS `JthTempo`,(`a`.`tanggal` + interval `a`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`a`.`tanggal` + interval `a`.`JthTempo` day)) AS `warningtempo`,`a`.`idcs` AS `idcs`,`b`.`hutang` AS `hutang`,`b`.`bayar` AS `bayar`,`b`.`sisahutang` AS `sisahutang`,`b`.`fakturlunas` AS `fakturlunas`,`b`.`idlunas` AS `idlunas`,if((`b`.`fakturlunas` is not null),'lunas','belum lunas') AS `statlunas`");
	$this->db->from("view_hutang_customer` `a`");
	$this->db->join("view_pelunasan_hutang b","`a`.`faktur_ref` = `b`.`faktur_ref`","left");
	$this->db->order_by( `a`.`id`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_beli_supplier_lunas(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`keterangan` AS `keterangan`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`JthTempo` AS `JthTempo`,(`a`.`tanggal` + interval `a`.`JthTempo` day) AS `jatuhtempo`,(curdate() - (`a`.`tanggal` + interval `a`.`JthTempo` day)) AS `warningtempo`,`a`.`idsp` AS `idsp`,`b`.`hutang` AS `hutang`,`b`.`bayar` AS `bayar`,`b`.`sisahutang` AS `sisahutang`,`b`.`fakturlunas` AS `fakturlunas`,`b`.`idlunas` AS `idlunas`,if((`b`.`fakturlunas` is not null),'lunas','belum lunas') AS `statlunas`");
	$this->db->from("view_hutang_pembelian_supplier` `a`");
	$this->db->join("view_pelunasan_hutang b","`b`.`faktur_ref` = `a`.`faktur_ref`","left");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_usiapiutang_customer(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`JthTempo` AS `JthTempo`,`a`.`jatuhtempo` AS `jatuhtempo`,`a`.`warningtempo` AS `warningtempo`,(to_days(`a`.`jatuhtempo`) - to_days(curdate())) AS `usiapiutang`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`mutasidebet` AS `mutasidebet`,`a`.`mutasikredit` AS `mutasikredit`,`a`.`saldodebet` AS `saldodebet`,`a`.`saldokredit` AS `saldokredit`,`a`.`keterangan` AS `keterangan`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`id_customer` AS `id_customer`,`a`.`Plafond` AS `Plafond`,`a`.`Subsidi` AS `Subsidi`");
	$this->db->from("`view_piutang_customer` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_hutang_beli_supplier_macet(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun_hutang` AS `akun_hutang`,`a`.`Kode` AS `Kode`,`a`.`Nama` AS `Nama`,`a`.`JthTempo` AS `JthTempo`,`a`.`jatuhtempo` AS `jatuhtempo`,`a`.`warningtempo` AS `warningtempo`,(to_days(`a`.`jatuhtempo`) - to_days(curdate())) AS `usiahutang`,`a`.`idcs` AS `idcs`,if((((to_days(`a`.`jatuhtempo`) - to_days(curdate())) >= 356) and (`a`.`jatuhtempo` >= curdate())),1,0) AS `ismacet`");
	$this->db->from("`view_hutang_customer` `a` ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_rekam_ayam(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`b`.`id_kandang` AS `id_kandang`,`b`.`kandang` AS `kandang`,`b`.`id_gudang` AS `id_gudang`,`b`.`gudang` AS `gudang`,`b`.`namagudang` AS `namagudang`,`b`.`id_mitra` AS `id_mitra`,`b`.`namamitra` AS `namamitra`,`c`.`kode` AS `kode`,`c`.`nmbarang` AS `nmbarang`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,if(`a`.`id_satuan`,`c`.`Satuan3`,0))) AS `satuan`,`a`.`id_satuan` AS `id_satuan`,`a`.`id_barang` AS `id_barang`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("view_rekam_ayam b","`b`.`faktur` = `a`.`faktur_ref`","left");
$this->db->join("view_barang_satuan c","`c`.`id_barang` = `a`.`id_barang`","left");
$this->db->where("(`a`.`tipe_kartustok` = 'Ayam') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_rekam_pakan(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`keterangan` AS `keterangan`,`c`.`kode` AS `kode`,`c`.`nmbarang` AS `nmbarang`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,if(`a`.`id_satuan`,`c`.`Satuan3`,0))) AS `satuan`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("view_rekam_ayam n(`view_rekam_ayam`.`faktur` = `a`.`faktur_ref`","left");
$this->db->join("view_barang_satuan c","`c`.`id_barang` = `a`.`id_barang`","left");
$this->db->where("(`a`.`tipe_kartustok` = 'Pakan') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_rekam_telur(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`keterangan` AS `keterangan`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`");
	$this->db->from("kartustok` `a`");
	$this->db->join("view_rekam_telur b","`b`.`faktur` = `a`.`faktur_ref`","left");
	$this->db->where("(`a`.`tipe_kartustok` = 'Telur') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`keterangan` AS `keterangan`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`");
	$this->db->from("`kartustok` `a` ");
		$this->db->where("(`a`.`tipe_kartustok` = 'Barang') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null)) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_beli(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`keterangan` AS `keterangan`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,left(`a`.`faktur_ref`,2) AS `kd`,`b`.`tgl_pt` AS `tgl_pt`,`b`.`Nama` AS `Nama`,`b`.`Kode` AS `Kode`,`b`.`idsp` AS `idsp`,`b`.`id_customer` AS `id_customer`,`b`.`kdcs` AS `kdcs`,`b`.`namacs` AS `namacs`,`b`.`id_supplier` AS `id_supplier`");
	$this->db->from("kartustok` `a`");
	$this->db->join("`view_transaksi_beli` `b`","`a`.`faktur_ref` = `b`.`faktur_pt`))) ");
		$this->db->where("(`a`.`tipe_kartustok` = 'Barang') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null) and (left(`a`.`faktur_ref`,2) = 'PT')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_jual(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`faktur` AS `faktur`,`a`.`faktur_ref` AS `faktur_ref`,`a`.`tanggal` AS `tanggal`,`a`.`akun` AS `akun`,`a`.`tipe_kartustok` AS `tipe_kartustok`,`a`.`tipe` AS `tipe`,`a`.`jumlah` AS `jumlah`,`a`.`id_barang` AS `id_barang`,`a`.`id_satuan` AS `id_satuan`,`a`.`debet` AS `debet`,`a`.`kredit` AS `kredit`,`a`.`keterangan` AS `keterangan`,`a`.`user_id` AS `user_id`,`a`.`datetime` AS `datetime`,left(`a`.`faktur_ref`,2) AS `kd`");
	$this->db->from("`kartustok` `a` ");
		$this->db->where("(`a`.`tipe_kartustok` = 'Barang') and (`a`.`faktur_ref` <> '0') and (`a`.`faktur_ref` is not null) and (left(`a`.`faktur_ref`,2) = 'ST')) ;");
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_rekap(){
	$this->db->select(" `a`.`id_barang` AS `id_barang`,`b`.`id` AS `id`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) AS `Masuk`,sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0)) AS `Keluar`,sum(if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 1)),`a`.`jumlah`,0)) AS `awalsat1`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0)) AS `insat1`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat1`,(sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat1`,`c`.`Satuan1` AS `Satuan1`,sum(if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 2)),`a`.`jumlah`,0)) AS `awalsat2`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0)) AS `insat2`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat2`,(sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat2`,`c`.`Satuan2` AS `Satuan2`,sum(if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 3)),`a`.`jumlah`,0)) AS `awalsat3`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0)) AS `insat3`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat3`,(sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat3`,`c`.`Satuan3` AS `Satuan3`,(sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) - sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0))) AS `Saldo`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`id_satuan` AS `id_satuan`,`c`.`Isi2` AS `Isi2`,`c`.`Isi3` AS `Isi3`,`c`.`Max` AS `Max`,`c`.`SatuanMax` AS `SatuanMax`,`c`.`Min` AS `Min`,`c`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("`view_barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`view_barang_satuan` `c`","`b`.`id` = `c`.`id_barang`)))");
	$this->db->group_by("`a`.`id_barang`");
	$this->db->order_by( `a`.`id_barang`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_rekap_groupbysatuan(){
	$this->db->select(" `a`.`id_barang` AS `id_barang`,`b`.`id` AS `id`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) AS `Masuk`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat1`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat2`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat3`,sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0)) AS `Keluar`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat1`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat2`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat3`,(sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) - sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0))) AS `Saldo`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`id_satuan` AS `id_satuan`,`c`.`Satuan1` AS `Satuan1`,`c`.`Isi2` AS `Isi2`,`c`.`Satuan2` AS `Satuan2`,`c`.`Isi3` AS `Isi3`,`c`.`Satuan3` AS `Satuan3`,`c`.`Max` AS `Max`,`c`.`SatuanMax` AS `SatuanMax`,`c`.`Min` AS `Min`,`c`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("`view_barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`view_barang_satuan` `c`","`b`.`id` = `c`.`id_barang`)))");
	$this->db->group_by("`a`.`id_barang`,`a`.`id_satuan`");
	$this->db->order_by( `a`.`id_barang`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_rekap_groupbykartustok(){
	$this->db->select(" `a`.`id_barang` AS `id_barang`,`b`.`id` AS `id`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) AS `Masuk`,sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0)) AS `Keluar`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat1`,sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat1`,(sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat1`,`c`.`Satuan1` AS `Satuan1`,`c`.`Isi2` AS `Isi2`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat2`,sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat2`,(sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) + (sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) * `c`.`Isi2`)) AS `totinsat2`,(sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat2`,(((sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) * `c`.`Isi2`) + (sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)))) AS `saldo_dlm_sat2`,`c`.`Satuan2` AS `Satuan2`,`c`.`Isi3` AS `Isi3`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)) AS `outsat3`,sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) AS `insat3`,(sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) + (sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) * `c`.`Isi3`)) AS `totinsat3`,(sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat3`,(((sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) * `c`.`Isi3`) + (sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0)))) AS `saldo_dlm_sat3`,`c`.`Satuan3` AS `Satuan3`,(sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) - sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0))) AS `Saldo`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`id_satuan` AS `id_satuan`,`c`.`Max` AS `Max`,`c`.`SatuanMax` AS `SatuanMax`,`c`.`Min` AS `Min`,`c`.`SatuanMin` AS `SatuanMin`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("`view_barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`view_barang_satuan` `c`","`b`.`id` = `c`.`id_barang`)))");
	$this->db->group_by("`a`.`id_barang`");
	$this->db->order_by( `c`.`id_barang`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function kartustok_barang_nosum(){
	$this->db->select(" `a`.`id_barang` AS `id_barang`,`b`.`id` AS `id`,`a`.`faktur` AS `faktur`,`b`.`Kode` AS `Kode`,`b`.`Nama` AS `Nama`,if((`a`.`tipe` = 'D'),`a`.`jumlah`,0) AS `Masuk`,if((`a`.`tipe` = 'K'),`a`.`jumlah`,0) AS `Keluar`,if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 1)),`a`.`jumlah`,0) AS `awalsat1`,if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0) AS `insat1`,if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0) AS `outsat1`,(sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 1) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat1`,`c`.`Satuan1` AS `Satuan1`,if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 2)),`a`.`jumlah`,0) AS `awalsat2`,if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0) AS `insat2`,if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0) AS `outsat2`,(sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 2) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat2`,`c`.`Satuan2` AS `Satuan2`,if(((left(`a`.`faktur_ref`,2) = 'SA') and (`a`.`id_satuan` = 3)),`a`.`jumlah`,0) AS `awalsat3`,if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D') and (left(`a`.`faktur_ref`,2) <> 'SA')),`a`.`jumlah`,0) AS `insat3`,if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0) AS `outsat3`,(sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'D')),`a`.`jumlah`,0)) - sum(if(((`a`.`id_satuan` = 3) and (`a`.`tipe` = 'K')),`a`.`jumlah`,0))) AS `saldosat3`,`c`.`Satuan3` AS `Satuan3`,(sum(if((`a`.`tipe` = 'D'),`a`.`jumlah`,0)) - sum(if((`a`.`tipe` = 'K'),`a`.`jumlah`,0))) AS `Saldo`,if((`a`.`id_satuan` = 1),`c`.`Satuan1`,if((`a`.`id_satuan` = 2),`c`.`Satuan2`,`c`.`Satuan3`)) AS `satuan`,`a`.`id_satuan` AS `id_satuan`,`c`.`Isi2` AS `Isi2`,`c`.`Isi3` AS `Isi3`,`c`.`Max` AS `Max`,`c`.`SatuanMax` AS `SatuanMax`,`c`.`Min` AS `Min`,`c`.`SatuanMin` AS `SatuanMin`,`a`.`tanggal` AS `tanggal`");
	$this->db->from("`kartustok` `a`");
	$this->db->join("`view_barang` `b`","`a`.`id_barang` = `b`.`id`)))");
	$this->db->join("`view_barang_satuan` `c`","`b`.`id` = `c`.`id_barang`)))");
	$this->db->group_by("`a`.`id_barang`,`a`.`id`");
	$this->db->order_by( `a`.`id_barang`,`a`.`tanggal`,`a`.`faktur`);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
function view_child_menu(){
	$this->db->select(" `a`.`id` AS `id`,`a`.`title` AS `title`,`a`.`url` AS `url`,`a`.`parent` AS `parent`,`a`.`module` AS `module`,`a`.`data-remote` AS `data-remote`,`a`.`data-target` AS `data-target`,`a`.`levelid` AS `levelid`,`a`.`groupid` AS `groupid`,`a`.`is_ajax_url` AS `is_ajax_url`,`a`.`datetime` AS `datetime`,`a`.`icon` AS `icon`,`a`.`orders` AS `orders`,`a`.`is_active` AS `is_active`,`a`.`is_disabled` AS `is_disabled`");
	$this->db->from("`menu` `a` ");
		$this->db->where("`a`.`parent`",!0);
	$result=$this->db->get();
	if ($result->num_rows() > 0) {
	    return $result->result_array();
	} else {
		return array();
    }
}
}