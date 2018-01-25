
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitval',array('id'=>'passform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
  
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <input type="hidden" value='<?php echo isset($default['id'])?$default['id']:'' ?>' id="id" name="id">
             <?php if ($this->ion_auth->logged_in()): ?>
                    <?php $user = $this->ion_auth->user()->row(); ?>
            <?php if ( ! empty($user)): ?>
                <span class="clear"> <span class="text-muted text-xs block m-t-xs"><strong class="font-bold"><?php echo "Hai, ".$user->first_name." ".$user->last_name."!"; ?></strong></span>                <label class="">Masukkan Password Anda Untuk Verifikasi/Validasi</label>

            <div class="form-group password text-center">
                <div class="password"><input type="password" name="password" id="password" class="text-center input-lg input-warning form-control" style="font-size:24px"></div>
                
            </div>
            <?php endif;endif; ?>
            <div class="btn-group text-center btn-block">
                
                <button id="saveval" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-check "></icon> VerVal</button>
            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-remove"></i> Batal </button>
            </div>
      
    </div>
    <?php echo form_close();?>
</div>
