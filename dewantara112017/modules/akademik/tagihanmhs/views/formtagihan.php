 

                    <div id="form_input" class="row gutter5">
                    <?php echo form_open(base_url().'tagihanmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                                   
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <input type="hidden" value='' id="id" name="id">
                            
                            <div class="form-group">
                                <?php echo form_label('kode : ','kode',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" placeholder="Masukkan kode"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('tanggal : ','tanggal',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('tanggal',set_value('tanggal', isset($default['tanggal']) ? $default['tanggal'] : ''),'id="tanggal" class="form-control" placeholder="Masukkan tanggal"'); ?>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <?php echo form_label('mhs : ','mhs',array('class'=>'control-label')); ?>
                                <div class="controls">
                                <?php echo form_input('mhs',set_value('mhs', isset($default['mhs']) ? $default['mhs'] : ''),'id="mhs" class="form-control" placeholder="Masukkan mhs"'); ?>
                                </div>
                            </div>
                        
                          
                        
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <?php $this->load->view('detailtagihan') ?>
                        </div>
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save" type="submit" class="btn btn-lg btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                            <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                   
                    <?php echo form_close();?>
                    </div>
            

<script type="text/javascript">
   
        

       

</script>
 