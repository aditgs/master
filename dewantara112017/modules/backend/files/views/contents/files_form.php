   <div class="panel panel-default">
                              <div class="panel-heading">
                                    <h3 class="panel-title"><i class="icon-table"></i> From Codeigniter Panel title</h3>
                              </div>
                              <div class="panel-body">
                                    <div class="row clearfix">
                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" style="display:none">
                                            <div id="form_input" class="">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        
                                                    
                                            <?php if(!empty($files)){ echo var_dump($files);}?>
                                            <?php echo form_open(base_url().'files/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                               
                                                <input type="hidden" value='' id="id" name="id">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <a class="btn btn-block btn-success reset" href="#" >Reset Form</a>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <a id="openBtn" class="btn btn-block btn-info" data-toggle="modal" href='#modal-id' data-url="<?php echo base_url(); ?>uploader/uploadmodal">Upload</a>
                                                    </div>
                                                    
                                                </div>
                                                    <div class="modal fade" id="modal-id">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                    <h4 class="modal-title">Upload File</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                <hr/>
                                                <div class="form-group">
                                                        <?php echo form_label('Nama File: ','filename',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('filename','','id="filename" class="form-control" placeholder="Enter filename"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <?php echo form_label('Judul: ','title',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('title','','id="title" class="form-control" placeholder="Enter title"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <?php echo form_label('URL : ','url',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('url','','id="url" class="form-control" placeholder="Enter url"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <?php echo form_label('Tipe : ','type',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('type','','id="type" class="form-control" placeholder="Enter type"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                            <div class="controls">
                                                                <?php echo form_label('Album : ','album_id',array('class'=>'control-label')); ?>
                                                                    <?php //$footer=array("0" => 'Tidak',"1" => 'Ya');?>
                                                                    <?php echo form_dropdown('album_id',$parent,set_value('album_id',isset($default['album_id'])?$default['album_id']:''),'id="album_id" class="" placeholder="Masukkan Jika Footer"'); ?>
                                                            </div>
                                                        </div>
                                                
                                                
                                                
                                                
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <button id="save" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                                                        <button id="save_edit" type="submit" class="btn btn-md btn-primary" style="display:none;"><icon class="fa fa-refresh"></icon> Perbaiki</button>
                                                        <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>

                                                        <?php echo form_close();?>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                 </div>
                        </div>