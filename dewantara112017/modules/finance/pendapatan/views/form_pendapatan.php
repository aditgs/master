
                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'pendapatan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                        <div class="row clear-fix">

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <input type="hidden" value='' id="id" name="id">
                                
                                <div class="form-group">
                                    <?php echo form_label('Faktur : ','Faktur',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Faktur',set_value('Faktur', isset($default['Faktur']) ? $default['Faktur'] : ''),'id="Faktur" class="form-control" placeholder="Masukkan Faktur"'); ?>
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
                                    <?php echo form_label('Kode Vendor : ','Customer',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Customer',set_value('Customer', isset($default['Customer']) ? $default['Customer'] : ''),'id="Customer" class="form-control" placeholder="Masukkan Customer"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('Nama Vendor : ','NmCustomer',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('NmCustomer',set_value('NmCustomer', isset($default['NmCustomer']) ? $default['NmCustomer'] : ''),'id="NmCustomer" class="form-control" placeholder="Masukkan NmCustomer"'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                             
                            
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
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                
                                <div class="form-group">
                                    <?php echo form_label('Piutang : ','Piutang',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Piutang',set_value('Piutang', isset($default['Piutang']) ? $default['Piutang'] : ''),'id="Piutang" class="form-control" placeholder="Masukkan Piutang"'); ?>
                                    </div>
                                </div>
                            
                     
                                <div class="form-group">
                                    <?php echo form_label('Sisa : ','Sisa',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Sisa',set_value('Sisa', isset($default['Sisa']) ? $default['Sisa'] : ''),'id="Sisa" class="form-control" placeholder="Masukkan Sisa"'); ?>
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
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                 <table id="data" class="tabeldetail table table-bordered table-condensed table-striped" style="">
                                    <thead class="">
                                        <tr>
                                                       
                                                        <th>faktur</th>
                                                        <th>tanggal</th>
                                                        <th>kode</th>
                                                        <th>keterangan</th>
                                                        <th>rekening</th>
                                                        <th>ket</th>
                                                        <th>jumlah</th>
                                                        <th>status</th>
                                                        <th>isdeleted</th>
                                                        <th>datedeleted</th>
                                                        <th>islocked</th>
                                                        <th>isactive</th>
                                                        <th>userid</th>
                                                        <th>datetime</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                    </thead>

                                    <tbody class="table-bordered">
                                        <tr>
                                            <td colspan="15" class="text-center dataTables_empty"><img src="<?php echo assets_url('images/loader.gif');  ?>" title="Loading" alt="Loading">&nbsp;&nbsp; Loading data, please wait....</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 style3 navy-bg" style="">
                                
                                <div class="form-group">
                                    <?php echo form_label('KodeBank : ','KodeBank',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('KodeBank',set_value('KodeBank', isset($default['KodeBank']) ? $default['KodeBank'] : ''),'id="KodeBank" class="form-control" placeholder="Masukkan KodeBank"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('NoAccBank : ','NoAccBank',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('NoAccBank',set_value('NoAccBank', isset($default['NoAccBank']) ? $default['NoAccBank'] : ''),'id="NoAccBank" class="form-control" placeholder="Masukkan NoAccBank"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('JenisBayar : ','JenisBayar',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('JenisBayar',set_value('JenisBayar', isset($default['JenisBayar']) ? $default['JenisBayar'] : ''),'id="JenisBayar" class="form-control" placeholder="Masukkan JenisBayar"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('NoBukti : ','NoBukti',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('NoBukti',set_value('NoBukti', isset($default['NoBukti']) ? $default['NoBukti'] : ''),'id="NoBukti" class="form-control" placeholder="Masukkan NoBukti"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('JthTmpGiro : ','JthTmpGiro',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('JthTmpGiro',set_value('JthTmpGiro', isset($default['JthTmpGiro']) ? $default['JthTmpGiro'] : ''),'id="JthTmpGiro" class="form-control" placeholder="Masukkan JthTmpGiro"'); ?>
                                    </div>
                                </div>
                            
                              
                            
                            </div>
                    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                                <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                            </div>
                        </div>    
                    <?php echo form_close();?>
                    </div>
            


 