 <div id="genjenis" class="row no-gutter genjenis">
            
            <?php if(isset($jenis)):
                if(!empty($jenis)||$jenis!=null){?>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 text-center">
                    <h4>No.</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center">
                    <h4>Kode Jenis</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <h4>Jenis</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 text-center">
                    <h4>Nilai/Nominal</h4>
                </div>
                <?php   $i=1;
                foreach ($jenis as $key => $value) {?>
                         <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
                             <div class="form-group">
                                
                                <div class="controls form-control select2  input-md noborder disable">
                                    <?=$i.".";?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                             <div class="form-group">
                                
                                <div class="controls form-control select2 input-md noborder">
                                    <?= "(".$value['KodeJ'] .") ".$value['Jenis'] ?>
                                </div>
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <?php echo form_input('KodeT[]',set_value('KodeT', isset($default['KodeT']) ? $default['KodeT'] : ''),'id="KodeT" style="" data-tarif="'.$value['KodeJ'].'" class="form-control select2 input-md text-center kodetarif" placeholder="'.$value['KodeJ'].'" readonly'); ?>
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="form-group">
                                
                                <div class="controls">
                                    <?php echo form_input('Tarif[]',set_value('Tarif', isset($default['Tarif']) ? $default['Tarif'] : ''),'id="Tarif" style="" class="form-control input-md text-right nilaitarif" placeholder="Rp"'); ?>
                                </div>
                            </div>
                        </div>
                    <?php  $i++;} //endforeach
                }
                ?>
            <?php else:?>
            <?php endif;?>

        </div>