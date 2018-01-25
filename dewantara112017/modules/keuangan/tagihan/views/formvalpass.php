
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitval',array('id'=>'passform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
  
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='<?php echo isset($default['id'])?$default['id']:'' ?>' id="id" name="id">
     
            <div class="form-group password text-center">
                <label class="">Masukkan Password Anda!</label>
                <div class="password"><input type="password" name="password" id="password" class="text-center input-lg input-warning form-control" style="font-size:24px"></div>
                
            </div>
    
            <div class="btn-group text-center btn-block">
                
                <button id="saveval" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-check "></icon> Validasi</button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-remove"></i> Batal </button>
            </div>
      
    </div>
    <?php echo form_close();?>
</div>
