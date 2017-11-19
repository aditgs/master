 

                    <div id="form_input" class="">
                    <?php echo form_open(base_url().'pendapatan/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                        <div class="row clear-fix">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                    <?php echo form_label('StCust : ','StCust',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('StCust',set_value('StCust', isset($default['StCust']) ? $default['StCust'] : ''),'id="StCust" class="form-control" placeholder="Masukkan StCust"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('Alamat : ','Alamat',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('Alamat',set_value('Alamat', isset($default['Alamat']) ? $default['Alamat'] : ''),'id="Alamat" class="form-control" placeholder="Masukkan Alamat"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('NoAccCust : ','NoAccCust',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('NoAccCust',set_value('NoAccCust', isset($default['NoAccCust']) ? $default['NoAccCust'] : ''),'id="NoAccCust" class="form-control" placeholder="Masukkan NoAccCust"'); ?>
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
                                    <?php echo form_label('DiscLunas : ','DiscLunas',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('DiscLunas',set_value('DiscLunas', isset($default['DiscLunas']) ? $default['DiscLunas'] : ''),'id="DiscLunas" class="form-control" placeholder="Masukkan DiscLunas"'); ?>
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
                                    <?php echo form_label('userid : ','userid',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('userid',set_value('userid', isset($default['userid']) ? $default['userid'] : ''),'id="userid" class="form-control" placeholder="Masukkan userid"'); ?>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <?php echo form_label('User : ','User',array('class'=>'control-label')); ?>
                                    <div class="controls">
                                    <?php echo form_input('User',set_value('User', isset($default['User']) ? $default['User'] : ''),'id="User" class="form-control" placeholder="Masukkan User"'); ?>
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
                        </div> 
                    <?php echo form_close();?>
                    </div>
            


 