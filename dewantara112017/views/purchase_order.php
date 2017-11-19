<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class purchase_order extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('purchase_order_model','podb',TRUE);
        $this->load->model('purchase_transaction/purchase_transaction_model','belidb',TRUE);
        $this->load->model('supplier_model','spdb',TRUE);
        $this->load->model('harga_barang_model','pricedb',TRUE);
        

        $this->load->model('sales_trx/sales_trx_model','salesdb',TRUE);

        $this->session->set_userdata('lihat','purchase_order');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        $this->load->library('encrypt');
       
        // $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css','cdn');
        // $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js','cdn');

        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
       
        
       
        // $this->template->add_js('muria.js');
        $this->template->add_js('muria.obs.min.js');
        // $this->template->add_js('crud-muria.js');
        $this->template->add_js('crud-muria.obs.min.js');
        $this->template->set_layout('dashboard');
    }

    public function data() { 
        
        $this->template->add_js('datatables.js');
        $this->template->set_title('Kelola Order Pembelian (PO)');
        
        $this->template->add_js('var baseurl="'.base_url().'purchase_order/";','embed');  
        $this->template->add_js('var enkrip="'.$this->enkrip().'";','embed');  
        

        // $this->template->add_js('jquery.maskMoney.min.js');
        $this->template->add_js('accounting.min.js');

        
        $this->template->load_view('purchase_order_view',array(
            'view'=>'purchase_order_table',
            'title'=>'Kelola Data Order Pembelian (PO)',
            'subtitle'=>'Pengelolaan Order Pembelian (PO)',
            'breadcrumb'=>array(
                'Order Pembelian (PO)',),
            ));
        
    }
     
    public function index($edit=null,$enkrip=null,$po=null){
        // $this->template->add_js('https://cdn.jsdelivr.net/select2/4.0.3/js/select2.min.js','cdn');
        // $this->template->add_css('https://cdn.jsdelivr.net/select2/4.0.3/css/select2.min.css','cdn');        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.4/select2-bootstrap.min.css','cdn');
        // $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.4/select2-bootstrap.min.css','cdn');
        // $this->template->add_js('https://cdn.jsdelivr.net/jquery.maskmoney/3.0.2/jquery.maskMoney.min.js','cdn');
        // $this->template->add_js('https://cdn.jsdelivr.net/accounting.js/0.3.2/accounting.min.js','cdn');
        // $this->template->add_js('jquery.session.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
         $this->template->add_js('
            var baseurl="'.base_url('purchase_order').'/"; 
            var pturl="'.base_url('purchase_transaction').'/"; 
            var spurl="'.base_url('supplier').'/"; 
            var jnsbrgurl="'.base_url('jenis_barang').'/"; 
            var brgurl="'.base_url('barang').'/"; 
            var brgsatuurl="'.base_url('barang_satuan').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap"
            });
            $("#Kode").select2({
                 theme: "bootstrap input-lg"
            });
           
            ','embed');  
        
        // print_r($edit);
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('modules/purchase_order.js');

        if($edit==FALSE || empty($edit) || $edit==null){
            $po=$this->genfaktur_po();
            $title='Edit Order Pembelian (PO)';
            $subtitle='Edit Order Pembelian (PO)';
            // $this->session->set_userdata('new',TRUE);
            // $this->session->set_userdata('edit',FALSE);
            $session=array('new'=>true,'edit'=>false);
            $default=null;
        }else{
            // $po=$this->input->post('faktur_po');
            $subtitle='Order Pembelian (PO) Baru';
            $title='Order Pembelian (PO) Baru';
            $session=array('new'=>false,'edit'=>true);
            // $this->session->set_userdata('new',FALSE);
            // $this->session->set_userdata('edit',TRUE);
            // print_r($po);
            $default=$this->podb->get_onebyfaktur($po);
            // print_r($default);
        }
        $this->session->set_userdata($session);
        $this->template->load_view('purchase_order_view',array(
                'nopo'=>$po,
                'opt_supplier'=>$this->podb->dropdown_supplier(),
                'opt_customer'=>$this->salesdb->dropdown_customer(),
                'opt_barang'=>array(),
                'opt_satuan'=>array('0'=>'Pilih Satuan'),
                'view'=>'purchase_order_form',
                'title'=>$title,
                'subtitle'=>$subtitle,
                'default'=>$default,
               
            ));
        // return $this->output->set_output($html);
        // return $html;
    }
    

     public function getdatatables(){
        $enkrip=$this->enkrip();
        $this->datatables->select('faktur_po,tgl_po,tgl_jatuhtempo,kd,nm,namasupplier,totalbayar,status,nama_supir,nopol,idpo,md5id')
            ->from('00-00-03-00-view-purchase-order')
            ->where('faktur_pt',null);
        $this->datatables->edit_column('nm','$1 ($2)','nm,kd');           
        $this->datatables->edit_column('status','<div class="text-center">$1</div>','status');           
        $this->datatables->edit_column('nopol','<div class=""><strong>$1</strong> ($2)</div>','nopol, nama_supir');           
        $this->datatables->edit_column('totalbayar','<div class="text-right">$1</div>','rp(totalbayar)');    
            $this->datatables->add_column('edit',"<div class='btn-group'>

                <a href='".base_url('purchase_order/index/'.md5(TRUE).'/'.$enkrip.'/$2')."' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('purchase_order/getonepo/'.$enkrip.'/$1')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> Info</a>
                <a href='".base_url('purchase_order/cetak_po/'.$enkrip.'/$1/pdf')."' class='btn btn-warning btn-xs'><i class='fa fa-download'></i> PDF</a>
           
                </div>" , 'idpo,faktur_po,md5id');
    

        $this->datatables->unset_column('idpo,md5id,nama_supir,namasupplier,kd,status');
        echo $this->datatables->generate();
    }
    function getonepo($enkrip=null,$id=null){
        $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->podb->getonepo($id);
            // print_r($data);
            $div='';
            $div.='<div class="btn-group pull-right" style="margin-bottom:20px">';
            $div.='<a class="btn btn-danger btn-md" target="blank" href="'.base_url('purchase_order/cetak_po/'.$enkrip.'/'.$id.'/pdf').'"><i class="fa fa-download"></i> Download PDF </a>';
            $div.='<a class="btn btn-success btn-md" target="blank" href="'.base_url('purchase_order/cetak_po/'.$enkrip.'/'.$id.'/').'"><i class="fa fa-print"></i> Cetak Order Pembelian </a>';
            $div.='<a class="btn btn-info btn-md" href="'.base_url('purchase_transaction/use_po/'.$enkrip.'/'.$id.'/').'"> Proses Transaksi Pembelian <i class="fa fa-arrow-right"></i></a>';
            $div.='</div>';
            $div.='<table class="table table-condensed table-striped table-bordered">';
            $div.='<tbody>';
            // $div.='<tr>';
            $div.='<tr><th>Faktur PO:</th><td>'.$data['faktur_po'].'</td><th>Tanggal PO</th><td>'.$data['tgl_po'].'</td></tr>';
            $div.='<tr><th>Supplier:</th><td>'.$data['namasupplier'].' ('.$data['kdsupplier'].')</td><th>Tanggal Jatuh Tempo</th><td>'.$data['tgl_jatuhtempo'].'</td></tr>';
            $div.='<tr><th>Status PO:</th><td colspan="3">'.$data['status'].'</td>';
            // $div.='<tr><th>Status PO:</th><td>'.$data['status'].'</td><td>Tanggal Kedaluarsa</td><td>'.$data['tgl_jatuhtempo'].'</td></tr>';
            // $div.='<tr><th>Total:</th><td>'.rp($data['totalbayar']).'</td><th>Pembayaran:</th><td>'.$data['jenis_pembayaran'].'</td></tr>';
     
            $div.="</tbody></table><table class='table table-condesed table-striped'><tbody>";
            $div.='<tr><th class="text-center">No</th><th class="text-center">Kode</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
      
            </tr>';
            $detail=$this->podb->get_detail_po($data['faktur_po']);
            // print_r($detail);
            $jdetail=count($detail);
            $j=1;
            for ($i=0; $i <$jdetail ; $i++) { 
                # code...
                
                $div.='<tr ><td class="text-center">'.$j.'</td><td class="text-center">'
                .$detail[$i]['Kode'].'</td><td>'
                .$detail[$i]['Nama'].'</td><td class="text-center">'
                .$detail[$i]['jumlah'].'</td><td class="text-center">'.$detail[$i]['satuan'].'</td></tr>';
               
               
            $j++;

            }
            // $div.="<tr><td colspan='3'></td><th class='text-right'><h3>Total</h3></th><th class='text-right'><h3>".rp($data['totalbayar'])."</h3></th></tr>";
            
            $div.="</tbody></table>";
            echo $div;
        }
    }
    function cetak_po($enkrip=null,$id=null,$pdf=null){
        // $enkrip=$this->enkrip();
        if($id!=null){
            $data=$this->podb->getonepo($id);
            $supplier=$data['idsupplier'];
            
            $detail=$this->podb->get_detail_po($data['faktur_po']);
          
            $this->template->set_layout('cetak');
            $html=$this->load->view('cetak_po_baru-pdf',array(
                'supplier'=>$this->podb->get_onesp($supplier),
                'data'=>$data,
                'detail'=>$detail,
                ),TRUE);
        }
        if(!empty($pdf)||$pdf!=null){
            $this->load->helper(array('dompdf', 'file'));
            // $html1=$datax;
            /*$html2=$this->load->view('template_cetak',array(
                'html'=>$html1,
                'title'=>$judul
            ),TRUE);*/
            // savepdf($html1, 'laporan-pembelian-'.date('d-m-Y-H-m-s'));
            buildpdf($html, 'laporan-pembelian-'.date('d-m-Y-Hms'),TRUE);
                    // }
        }else{          
            
            echo ($html);
            
        }
    }
    function getsp($id){
        $spdetail=$this->spdb->get_one($id);
        return $spdetail;
    }
    function getdatasp($id,$enkrip=null){
        $data['supplier']=json_encode($this->getsp($id));
        $data['jatuhtempo']=$this->get_jatuh_tempo($enkrip,$id);
        $data['dropdown_barang']=$this->get_drop_barang($enkrip,$id);
        // echo "<pre>";    
        print_r($data);
        // echo "</pre>";

    }
    function get_tempo_hari($id,$enkrip=null){
        $data=$this->getsp($id);
        $tempo=$data['JthTempo'];
        echo $tempo;
    }
    function get_jatuh_tempo($enkrip=null,$id,$now){
        $tglini=strtotime($now);
        $tgltempo=date("Y-m-d",$tglini);
        // print_r($tgltempo);
        $data=$this->getsp($id);
        $jmlhari=$data['JthTempo'];
        // $jatuhtempo=date('Y-m-d', strtotime("+".$jmlhari." days"));
        $jatuhtempo=date('Y-m-d', strtotime($tgltempo."+".$jmlhari." days"));
        //seharusnya tanggal jatuh tempo ditangani javascript supaya bisa lebih real
        //karena seharusnya pada saat tanggal berubah, maka jatuh tempo juga berubah...
        echo $jatuhtempo;

    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".userid()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }

    function genfaktur_po(){
        $last=$this->podb->get_last_po();
        // print_r($last);
        if(!empty($last)):
            $faktur=genfaktur($last['faktur_po'],"PO");
        else:
            $faktur="PO".date('ym')."00001";
        endif;
        return ($faktur);
    }
    function get_drop_barang($enkrip=null,$id_supplier=null){
        echo $this->dropdown_barang($id_supplier);
    }
    private function dropdown_barang($id_supplier=null){
        $result = array();
        if(!empty($id_supplier)):
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` where id_supplier='.$id_supplier.' order by Kode asc');
        else:
            $array_keys_values = $this->db->query('select id,Kode,Nama from `00-00-01-05-drop-barang-supplier` order by Kode asc');
        endif;
        $result[0]="-- Pilih Barang --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Kode." (".$row->Nama.")";
        }
      return json_encode($result);
    }
    function dropdown_satuan($id_barang){
        $result = array();
        $sql="select idsatuan,value,descrip,kode
            from(
            select id, id_barang,kode,'1' idsatuan,Satuan1 VALUE,'Satuan1' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'2' idsatuan,Satuan2 VALUE,'Satuan2' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            union all
            select id, id_barang,kode,'3' idsatuan,Satuan3 VALUE,'Satuan3' descrip from `00-00-01-05-view-barang-satuan` where id_barang='$id_barang'
            ) src group by descrip ";
        // $array_keys_values = $this->db->query('select id,Kode,Nama from supplier order by id asc');
        $array_keys_values = $this->db->query($sql);
        $result[0]="-- Pilih Satuan --";
        $i=1;
        // print_r($array_keys_values->result_array());
        // foreach ($array_keys_values->result_array() as $key => $row)
        foreach ($array_keys_values->result() as $row)
        {
            if($row->value!=null):
                /*$result=array(
                    $row['idsatuan']=>$row['value']." (".$row['descrip'].")",
                    );*/
                // $result[$i]=$row['value']." (".$row['descrip'].")";
                $result[$row->idsatuan]= $row->value." (".$row->descrip.")";
            endif;
            $i++;
        }
        if(count($result)==2){
            unset($result[0]);
        }
        echo json_encode($result);
    }
    private function po_detail($po=null){
               $this->datatables->select('id_detail,Kode,Nama,jumlah,satuan,harga,subtotal,po')
                            ->from('00-00-03-04-view-detail-po');
                $this->datatables->where("po",$po);
                $this->datatables->edit_column('harga','<div class="text-right harga">$1</div>','rp(harga)');
                $this->datatables->edit_column('subtotal','<div class="text-right subtotal">$1</div>','rp(subtotal)');
                $this->datatables->add_column('edit',"<div class='btn-group'>
               <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete_temp btn btn-xs btn-danger' id='$1'><i class='fa fa-minus'></i></button>
                </div>" , 'id_detail');
            $this->datatables->unset_column('po');
        return $this->datatables->generate();
    }
    function get_po_detail($md5=null,$po=null){
        if($md5==$this->enkrip()):
            $output=$this->po_detail($po);

        endif;
        $this->output->set_output($output);
    }
    function get_po_detail_total($enkrip=null,$po=null){

        $total=$this->podb->get_detail_total($po);
        // print_r($total);
        if($total!=null):
            echo ($total['total']);
        else:
            echo "0";
        endif;
    }

    function get_barang_customer($enkrip){
        echo json_encode($this->belidb->dropdown_barang_customer());
    }
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function submit($enkrip){
        if(!empty($enkrip)):
            if($enkrip==$this->enkrip()):
                if ($this->input->post('ajax')){
                  if ($this->input->post('id')){
                    $this->podb->update($this->input->post('id'));
                  }else{
                    $this->podb->save();
                  }

                }else{
                  if ($this->input->post('submit')){
                      if ($this->input->post('id')){
                        $this->podb->update($this->input->post('id'));
                      }else{
                        $this->podb->save();
                      }
                  }
                }
            endif;
        endif;
    }
    public function submit_temp(){
         $data = array(
        
            'id_po' => $this->input->post('faktur_po', TRUE),
           
            'id_barang' => $this->input->post('id_barang', TRUE),
           
            'jumlah' => $this->input->post('jumlah', TRUE),
           
            'id_satuan' => $this->input->post('id_satuan', TRUE),
        
            'id_user' =>userid(),
           
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->podb->update($this->input->post('id'));
          }else{
            $this->podb->save_temp($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->podb->update($this->input->post('id'));
              }else{
                $this->podb->save_temp($data);
              }
          }
        }
    }
    public function submit_detail(){
         $this->load->module('Muria');
         $hargabeli=$this->input->post('harga_beli', TRUE);
        $id_supplier=$this->input->post('id_supplier', TRUE);
        $idsat=$this->input->post('id_satuan', TRUE);
        $idbrg=$this->input->post('id_barang', TRUE);
            if(!empty($hargabeli)||$hargabeli!=null){
                $harga=$hargabeli;
            }else{
                $harganya=$this->muria->cekbeli_hargalama($idbrg,$idsat);
                $harga=$harganya['harga_baru'];
                print_r($harganya);
            }
         $data = array(
        
            'po' => $this->input->post('faktur_po', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
            'harga_beli' => $harga,
            'id_satuan' => $this->input->post('id_satuan', TRUE),
            'id_user' =>userid(),
            'datetime' => date('Y-m-d H:m:s'),
           
        );
        if(!empty($hargabeli)||$hargabeli>0){
            $hargalama=$this->muria->cekbeli_hargalama($data['id_barang'],$data['id_satuan']);
            // print_r($hargalama);
            $dataharga=array(
                'faktur' =>$data['po'],
                'id_barang' =>$data['id_barang'],
                'harga_lama'=>$hargalama['harga_baru'],
                'harga_baru' =>$data['harga_beli'],
                'jenis_harga' =>'beli',
                'id_satuan' =>$data['id_satuan'],
                'id_supplier' =>$id_supplier,
                'userid' => userid(),
                'datetime' => date('Y-m-d H:m:s'),
                );
            // print_r($dataharga);
            $hargabaru=$this->muria->submit_hargabelitable($data['id_barang'],$data['harga_beli']);
                // print_r($hargabaru);
        }
            

      
        // $this->muria->index();
        // $harga=$this->muria->cek_hargasatuan($id);
        
        // print_r($harga);
        // print_r($harga1);
    
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->podb->update($this->input->post('id'));
          }else{
            $this->podb->save_detail($data);
            if(!empty($hargabeli)||$hargabeli>0){
                $this->pricedb->save_harga($dataharga);
                $this->pricedb->update_hargatable($data['id_barang'],$hargabaru);
                // print_r($dataharga);
                // print_r($hargabaru);
            }
            // $this->session->set_userdata(array('temp'=>$data));
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->podb->update($this->input->post('id'));
              }else{
                $this->podb->save_detail($data);
                if(!empty($hargabeli)||$hargabeli>0){
                    $this->pricedb->save_harga($dataharga);
                    $this->pricedb->update_hargatable($data['id_barang'],$hargabaru);
                    // print_r($hargabaru);
                    // print_r($dataharga);
                }
                // $this->session->set_userdata(array('temp'=>$data));
              }
          }
        }
    }

    public function delete_temp(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete_temp($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->podb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    public function reset_temp(){
        if(isset($_POST['ajax'])){
           
                $this->podb->reset_temp();
                echo "Form Reset";
           
        }
    }
    
    function laporan_po(){
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        $this->template->add_js('
            var baseurl="'.base_url('purchase_order').'/"; 
            var spurl="'.base_url('supplier').'/"; 
            var jnsbrgurl="'.base_url('jenis_barang').'/"; 
            var brgurl="'.base_url('barang').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap input-lg"
            });
           
          ','embed');  
        $this->template->add_js('modules/purchase_order.js');
        $this->template->load_view('form_view',array(
                'nopo'=>$this->genfaktur_po(),
                'opt_supplier'=>$this->podb->dropdown_supplier(),
                'opt_customer'=>$this->salesdb->dropdown_customer(),
                'opt_barang'=>array(),
                'opt_satuan'=>array(),
                'view'=>'form_laporan_po',
                'title'=>'Laporan Order Pembelian',
                'subtitle'=>'Laporan Order Pembelian',
               
            ));
    }
    function get_laporan_po(){
        $data['end']=$this->input->post('end');
        $data['start']=$this->input->post('start');
        $data['id_supplier']=$this->input->post('id_supplier');
        $data['id_barang']=$this->input->post('id_barang');
        $lap=$this->input->post('laporan');
        $result=$this->podb->get_laporan_po($data);
        if(!empty($lap)){
            switch ($lap) {
                case '1':
                    $view='tabel_po';
                    break;
                case '2':
                    $view='tabel_history_po';
                    break;
                default:
                    $view='tabel_po';
                    break;
            }
        }else{
            $view='tabel_po';
        }
        $output=$this->load->view($view,
            array(
                'data'=>$result,
                'detail'=>$this->get_detail_pox(0)
            ),TRUE);
        $this->output->set_output($output); 
        // print_r($result);
        // echo json_encode($result);
    }
    // function cetak_laporan_po($id_supplier=null,$start=null,$lap=null,$end=null){
    function cetak_laporan_po($pdf=null){
        // if(!empty($pdf)||$pdf!=null){
             $this->load->helper(array('dompdf', 'file'));
             // $this->load->helper('file' );
            // $this->load->library('dompdf');
        // $this->load->view('pdf',$data);
        // }
        $data['end']=$this->input->post('endx');
        $data['start']=$this->input->post('startx');
        $data['id_supplier']=$this->input->post('id_supplierx');
        $data['id_barang']=$this->input->post('id_barangx'); 
        $lap=$this->input->post('laporanx'); 
        if(empty($data['end'])){
            $data['end']=date("Y-m-d");
        }
        if(empty($data['start'])){
            $data['start']=date("Y-m-d");
        }

        // $lap=$this->input->post('laporan');
        $result=$this->podb->get_laporan_po($data);
        $this->template->set_layout('cetak');
         if(!empty($lap)){
            switch ($lap) {
                case '1':
                    $view='tabel_po';
                    $judul='LAPORAN ORDER (PO)';
                    break;
                case '2':
                    $view='tabel_history_po';
                    $judul='LAPORAN HISTORY ORDER (PO)';
                    break;
                default:
                    $view='tabel_po';
                    $judul='LAPORAN ORDER (PO)';
                    break;
            }
        }else{
            $view='tabel_po';
            $judul='LAPORAN ORDER (PO)';
        }
        // print_r($judul);
        $html1=$this->load->view('cetak_laporan_po',array(
                'data'=>$result,
                'detail'=>$this->get_detail_pox(0),
                'view'=>$view,
                
            ),TRUE);
        if(!empty($pdf)||$pdf!=null){
            
            $html2=$this->load->view('template_cetak',array(
                'html'=>$html1,
                'title'=>$judul,
                // 'filename'=>'laporan-po-'.date('d-m-Y-Hms'),
                ),TRUE);
            // $html=$this->output->set_output($html2);
            // print_r($html);
            // savepdf($html2, 'laporan-po-'.date('d-m-Y-H-m-s'));
            buildpdf($html2, 'laporan-po-'.date('d-m-Y-Hms'),TRUE);
        }else{
            
            $html2=$this->load->view('template_cetak',array(
                'html'=>$html1,
                'title'=>$judul,

                ),TRUE);
            $htmlx=$this->output->set_output($html2);
        }        
        // $html = $this->load->view('sample_view', $data, true);
        
        // $this->output->set_output($output); 
        // print_r($result);
        // echo json_encode($result);
    }
    function get_detail_po($faktur){
         $detail=$this->podb->get_detail_po($faktur); 
         $output=$this->load->view('tabel__detail_po',
            array(
                'data'=>$detail
            ),TRUE);
        $this->output->set_output($output); 
    }   

    function get_detail_pox($faktur){
        $detail=$this->podb->get_detail_po($faktur); 
        
        // print_r($detail);
        $output=$this->load->view('tabel_detail_po',
            array(
                'data'=>$detail
            ),TRUE);
        // $result=$this->output->set_output($output); 
        return $output;
    }
    function get_history_po($faktur){

    }


   

}

/** Module purchase_order Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
