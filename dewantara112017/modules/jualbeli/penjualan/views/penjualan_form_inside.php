 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'penjualan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Faktur',set_value('Faktur', isset($default['Faktur']) ? $default['Faktur'] : ''),'id="Faktur" class="form-control" placeholder="Masukkan Faktur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('FakturAsli : ','FakturAsli',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('FakturAsli',set_value('FakturAsli', isset($default['FakturAsli']) ? $default['FakturAsli'] : ''),'id="FakturAsli" class="form-control" placeholder="Masukkan FakturAsli"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tgl : ','Tgl',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tgl',set_value('Tgl', isset($default['Tgl']) ? $default['Tgl'] : ''),'id="Tgl" class="form-control" placeholder="Masukkan Tgl"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Jthtmp : ','Jthtmp',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Jthtmp',set_value('Jthtmp', isset($default['Jthtmp']) ? $default['Jthtmp'] : ''),'id="Jthtmp" class="form-control" placeholder="Masukkan Jthtmp"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Term : ','Term',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Term',set_value('Term', isset($default['Term']) ? $default['Term'] : ''),'id="Term" class="form-control" placeholder="Masukkan Term"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Customer : ','Customer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Customer',set_value('Customer', isset($default['Customer']) ? $default['Customer'] : ''),'id="Customer" class="form-control" placeholder="Masukkan Customer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmCustomer : ','NmCustomer',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmCustomer',set_value('NmCustomer', isset($default['NmCustomer']) ? $default['NmCustomer'] : ''),'id="NmCustomer" class="form-control" placeholder="Masukkan NmCustomer"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cAccPiutang : ','cAccPiutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cAccPiutang',set_value('cAccPiutang', isset($default['cAccPiutang']) ? $default['cAccPiutang'] : ''),'id="cAccPiutang" class="form-control" placeholder="Masukkan cAccPiutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Gudang : ','Gudang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Gudang',set_value('Gudang', isset($default['Gudang']) ? $default['Gudang'] : ''),'id="Gudang" class="form-control" placeholder="Masukkan Gudang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cKeterangan : ','cKeterangan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cKeterangan',set_value('cKeterangan', isset($default['cKeterangan']) ? $default['cKeterangan'] : ''),'id="cKeterangan" class="form-control" placeholder="Masukkan cKeterangan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Salesman : ','Salesman',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Salesman',set_value('Salesman', isset($default['Salesman']) ? $default['Salesman'] : ''),'id="Salesman" class="form-control" placeholder="Masukkan Salesman"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Mitra : ','Mitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Mitra',set_value('Mitra', isset($default['Mitra']) ? $default['Mitra'] : ''),'id="Mitra" class="form-control" placeholder="Masukkan Mitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmMitra : ','NmMitra',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmMitra',set_value('NmMitra', isset($default['NmMitra']) ? $default['NmMitra'] : ''),'id="NmMitra" class="form-control" placeholder="Masukkan NmMitra"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('GudangMT : ','GudangMT',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('GudangMT',set_value('GudangMT', isset($default['GudangMT']) ? $default['GudangMT'] : ''),'id="GudangMT" class="form-control" placeholder="Masukkan GudangMT"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmGudangMT : ','NmGudangMT',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmGudangMT',set_value('NmGudangMT', isset($default['NmGudangMT']) ? $default['NmGudangMT'] : ''),'id="NmGudangMT" class="form-control" placeholder="Masukkan NmGudangMT"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kandang : ','Kandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kandang',set_value('Kandang', isset($default['Kandang']) ? $default['Kandang'] : ''),'id="Kandang" class="form-control" placeholder="Masukkan Kandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('NmKandang : ','NmKandang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('NmKandang',set_value('NmKandang', isset($default['NmKandang']) ? $default['NmKandang'] : ''),'id="NmKandang" class="form-control" placeholder="Masukkan NmKandang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('PersPPn : ','PersPPn',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('PersPPn',set_value('PersPPn', isset($default['PersPPn']) ? $default['PersPPn'] : ''),'id="PersPPn" class="form-control" placeholder="Masukkan PersPPn"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('PersDiscount : ','PersDiscount',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('PersDiscount',set_value('PersDiscount', isset($default['PersDiscount']) ? $default['PersDiscount'] : ''),'id="PersDiscount" class="form-control" placeholder="Masukkan PersDiscount"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('PersDiscount2 : ','PersDiscount2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('PersDiscount2',set_value('PersDiscount2', isset($default['PersDiscount2']) ? $default['PersDiscount2'] : ''),'id="PersDiscount2" class="form-control" placeholder="Masukkan PersDiscount2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('PersDiscount3 : ','PersDiscount3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('PersDiscount3',set_value('PersDiscount3', isset($default['PersDiscount3']) ? $default['PersDiscount3'] : ''),'id="PersDiscount3" class="form-control" placeholder="Masukkan PersDiscount3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SubTotal : ','SubTotal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SubTotal',set_value('SubTotal', isset($default['SubTotal']) ? $default['SubTotal'] : ''),'id="SubTotal" class="form-control" placeholder="Masukkan SubTotal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('PPn : ','PPn',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('PPn',set_value('PPn', isset($default['PPn']) ? $default['PPn'] : ''),'id="PPn" class="form-control" placeholder="Masukkan PPn"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Discount : ','Discount',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Discount',set_value('Discount', isset($default['Discount']) ? $default['Discount'] : ''),'id="Discount" class="form-control" placeholder="Masukkan Discount"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Discount2 : ','Discount2',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Discount2',set_value('Discount2', isset($default['Discount2']) ? $default['Discount2'] : ''),'id="Discount2" class="form-control" placeholder="Masukkan Discount2"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Discount3 : ','Discount3',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Discount3',set_value('Discount3', isset($default['Discount3']) ? $default['Discount3'] : ''),'id="Discount3" class="form-control" placeholder="Masukkan Discount3"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Pembulatan : ','Pembulatan',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Pembulatan',set_value('Pembulatan', isset($default['Pembulatan']) ? $default['Pembulatan'] : ''),'id="Pembulatan" class="form-control" placeholder="Masukkan Pembulatan"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Ongkos : ','Ongkos',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Ongkos',set_value('Ongkos', isset($default['Ongkos']) ? $default['Ongkos'] : ''),'id="Ongkos" class="form-control" placeholder="Masukkan Ongkos"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Total : ','Total',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Total',set_value('Total', isset($default['Total']) ? $default['Total'] : ''),'id="Total" class="form-control" placeholder="Masukkan Total"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Tunai : ','Tunai',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Tunai',set_value('Tunai', isset($default['Tunai']) ? $default['Tunai'] : ''),'id="Tunai" class="form-control" placeholder="Masukkan Tunai"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Kas : ','Kas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Kas',set_value('Kas', isset($default['Kas']) ? $default['Kas'] : ''),'id="Kas" class="form-control" placeholder="Masukkan Kas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Bank : ','Bank',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Bank',set_value('Bank', isset($default['Bank']) ? $default['Bank'] : ''),'id="Bank" class="form-control" placeholder="Masukkan Bank"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Piutang : ','Piutang',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Piutang',set_value('Piutang', isset($default['Piutang']) ? $default['Piutang'] : ''),'id="Piutang" class="form-control" placeholder="Masukkan Piutang"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Lunas : ','Lunas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Lunas',set_value('Lunas', isset($default['Lunas']) ? $default['Lunas'] : ''),'id="Lunas" class="form-control" placeholder="Masukkan Lunas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Retur : ','Retur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Retur',set_value('Retur', isset($default['Retur']) ? $default['Retur'] : ''),'id="Retur" class="form-control" placeholder="Masukkan Retur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('DiscLunas : ','DiscLunas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('DiscLunas',set_value('DiscLunas', isset($default['DiscLunas']) ? $default['DiscLunas'] : ''),'id="DiscLunas" class="form-control" placeholder="Masukkan DiscLunas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Biaya : ','Biaya',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Biaya',set_value('Biaya', isset($default['Biaya']) ? $default['Biaya'] : ''),'id="Biaya" class="form-control" placeholder="Masukkan Biaya"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Sisa : ','Sisa',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Sisa',set_value('Sisa', isset($default['Sisa']) ? $default['Sisa'] : ''),'id="Sisa" class="form-control" placeholder="Masukkan Sisa"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SLunas : ','SLunas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SLunas',set_value('SLunas', isset($default['SLunas']) ? $default['SLunas'] : ''),'id="SLunas" class="form-control" placeholder="Masukkan SLunas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SRetur : ','SRetur',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SRetur',set_value('SRetur', isset($default['SRetur']) ? $default['SRetur'] : ''),'id="SRetur" class="form-control" placeholder="Masukkan SRetur"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('SDiscLunas : ','SDiscLunas',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('SDiscLunas',set_value('SDiscLunas', isset($default['SDiscLunas']) ? $default['SDiscLunas'] : ''),'id="SDiscLunas" class="form-control" placeholder="Masukkan SDiscLunas"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Status : ','Status',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Status',set_value('Status', isset($default['Status']) ? $default['Status'] : ''),'id="Status" class="form-control" placeholder="Masukkan Status"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('cNoJrn : ','cNoJrn',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('cNoJrn',set_value('cNoJrn', isset($default['cNoJrn']) ? $default['cNoJrn'] : ''),'id="cNoJrn" class="form-control" placeholder="Masukkan cNoJrn"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('lVoid : ','lVoid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('lVoid',set_value('lVoid', isset($default['lVoid']) ? $default['lVoid'] : ''),'id="lVoid" class="form-control" placeholder="Masukkan lVoid"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('lPosted : ','lPosted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('lPosted',set_value('lPosted', isset($default['lPosted']) ? $default['lPosted'] : ''),'id="lPosted" class="form-control" placeholder="Masukkan lPosted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isdeleted : ','isdeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isdeleted',set_value('isdeleted', isset($default['isdeleted']) ? $default['isdeleted'] : ''),'id="isdeleted" class="form-control" placeholder="Masukkan isdeleted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datedeleted : ','datedeleted',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datedeleted',set_value('datedeleted', isset($default['datedeleted']) ? $default['datedeleted'] : ''),'id="datedeleted" class="form-control" placeholder="Masukkan datedeleted"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('islocked : ','islocked',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('islocked',set_value('islocked', isset($default['islocked']) ? $default['islocked'] : ''),'id="islocked" class="form-control" placeholder="Masukkan islocked"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('isactive : ','isactive',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('isactive',set_value('isactive', isset($default['isactive']) ? $default['isactive'] : ''),'id="isactive" class="form-control" placeholder="Masukkan isactive"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('User',set_value('User', isset($default['User']) ? $default['User'] : ''),'id="User" class="form-control" placeholder="Masukkan User"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('userid : ','userid',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('userid',set_value('userid', isset($default['userid']) ? $default['userid'] : ''),'id="userid" class="form-control" placeholder="Masukkan userid"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('datetime',set_value('datetime', isset($default['datetime']) ? $default['datetime'] : ''),'id="datetime" class="form-control" placeholder="Masukkan datetime"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('Time : ','Time',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('Time',set_value('Time', isset($default['Time']) ? $default['Time'] : ''),'id="Time" class="form-control" placeholder="Masukkan Time"'); ?>
                                </div>
                            </div>
                        
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            


 