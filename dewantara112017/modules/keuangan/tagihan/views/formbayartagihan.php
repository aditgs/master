<?php //print_r($default[0]['id']) ?>
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihan/submitpay',array('id'=>'valform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <input type="hidden" value='<?php echo isset($default[0]['id'])?$default[0]['id']:'' ?>' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Kode Tagihan : ','kode',array('class'=>'control-label')); ?>
            <div class="controls input-group">
                <?php echo form_input('kode',set_value('kode', isset($default[0]['kodetagihan']) ? $default[0]['kodetagihan'] : ''),'id="kode" class="form-control" readonly placeholder="#Kode Tagihan"'); ?>
                <span class="input-group-btn">
                    <a class="genfaktur btn btn-primary disabled" data-toggle="" href='#'><i class="fa fa-cogs"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        
            <div class="form-group tagihan text-right">
                <label>Total Tagihan:</label>
                <div class="total"><input value="<?php echo !empty($default[0]['total'])?($default[0]['total']):0; ?>" type="text" name="total" id="total" readonly class="text-right input-lg form-control" style="font-size:24px"></div>
                
            </div>
          
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tarif</th>
                    <th class="text-right">Tagihan</th>
                    <th class="text-right">Bayar</th>
                    <th class="text-right">Cicilan</th>
                </tr>
            </thead>
        <tbody>
            
            
        <?php //(new tagihan)->getmultitem($default[0]['id'],true); 
        if(isset($default)):$i=1;$totarif=0;foreach ($default as $key => $value):?>
        <?php if($value['iscicilan']==1): ?>
                <tr class="alert alert-danger">
        <?php else: ?>
                <tr>
        <?php endif; ?>
                    <td><?= $i; ?></td>
                    <td><?= (new tagihan)->bacatarif($value['kodetarif'])?></td>
                    <td class="text-right">
                        <input type="text" readonly class="hidden form-control" name="kodetarif[]" value="<?= $value['kodetarif']?>" id="kodetarif"><?= rp($value['tarif'])?>
                    
                    </td>
                        <?php if($value['iscicilan']==1): ?>
                    <td class="alert alert-danger">
                            <input type="text" name="bayar[]" class="form-control text-right" value="<?= floatval($value['tarif'])?>" id="bayar">
                    </td>
                        <?php else: ?>
                    <td>
                            <div class="text-right"><?= $value['tarif'] ?></div>
                                <input type="text" class="hidden form-control" readonly name="bayar[]" value="<?= floatval($value['tarif'])?>" id="bayar">
                    </td>
                    <?php endif; ?>

                    <td><?= ($value['iscicilan']==1)?'Ya':'Tidak';?></td>
                    
                </tr>
            <?php 
            $totarif=$totarif+$value['tarif'];
            $i++;endforeach;?>
        <?php else: ?>
        <tr><td colspan="4">Data tidak ditemukan</td></tr>    
        <?php endif; ?>
        
        
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td class="text-right"><?= rp($totarif) ?></td>
            </tr>
        </tfoot>
        </table>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px">

        <button id="savepay " name="myButton" type="submit" class="btn btn-block btn-lg btn-primary">
            <icon class="fa fa-check"></icon> Bayar Tagihan</button>
      
    </div>
    <?php echo form_close();?>
</div>

