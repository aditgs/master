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
                                                        
                                                    
                                            <?php if(!empty($album)){ echo var_dump($album);}?>
                                            <?php echo form_open(base_url().'album/submit',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                                               
                                                <input type="hidden" value='' id="album_id" name="album_id">
                                                <a class="btn btn-block btn-lg btn-info reset" href="#" >Reset Form</a>

                                                
                                                <div class="form-group">
                                                        <?php echo form_label('name : ','name',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('name','','id="name" class="form-control" placeholder="Enter name"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                        <?php echo form_label('description : ','description',array('class'=>'control-label')); ?>
                                                        <div class="controls">
                                                            <?php echo form_input('description','','id="description" class="form-control" placeholder="Enter description"'); ?>
                                                        </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                            <div class="controls">
                                                                <?php echo form_label('Induk Album : ','parent',array('class'=>'control-label')); ?>
                                                                    <?php //$footer=array("0" => 'Tidak',"1" => 'Ya');?>
                                                                    <?php echo form_dropdown('parent',$parent,set_value('parent',isset($default['parent'])?$default['parent']:''),'id="parent" class="" placeholder="Masukkan Jika Footer"'); ?>
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