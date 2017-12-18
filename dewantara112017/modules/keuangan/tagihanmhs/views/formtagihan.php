<style type="text/css">
.datepicker {
    z-index: 2200 !important;
}

span.select2-container.select2-container--bootstrap.input-md.select2-container--open {
    z-index: 2200 !important;
}
</style>
<script type="text/javascript">
function checkForm(form) {
    //
    // validate form fields
    //

    form.myButton.disabled = true;
    return true;
}
var select = $('select');

function formatSelection(state) {
    return state.text;   
}

function formatResult(state) {
    console.log(state)
    if (!state.id) return state.text; // optgroup
    var id = 'state' + state.id.toLowerCase();
    var label = $('<label></label>', { for: id })
            .text(state.text);
    var checkbox = $('<input type="checkbox">', { id: id });
    
    return checkbox.add(label);   
}

select.select2({
    closeOnSelect: false,
    formatResult: formatResult,
    formatSelection: formatSelection,
    escapeMarkup: function (m) {
        return m;
    },
    matcher: function(term, text, opt){
         return text.toUpperCase().indexOf(term.toUpperCase())>=0 || opt.parent("optgroup").attr("label").toUpperCase().indexOf(term.toUpperCase())>=0
    }
});
</script>
<!-- Rounded switch -->
<div id="form_input" class="row gutter5">
    <?php echo form_open(base_url().'tagihanmhs/submit',array('id'=>'addform','role'=>'form','class'=>'form','onsubmit="checkForm(this)"')); ?>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <input type="hidden" value='' id="id" name="id">
        <div class="form-group">
            <?php echo form_label('Kode : ','kode',array('class'=>'control-label')); ?>
            <div class="controls input-group">
                <?php echo form_input('kode',set_value('kode', isset($default['kode']) ? $default['kode'] : ''),'id="kode" class="form-control" readonly placeholder="#Kode Tagihan"'); ?>
                <span class="input-group-btn">
                    <a class="genfaktur btn btn-primary disabled" data-toggle="" href='#'><i class="fa fa-cogs"></i></a>
                </span>
            </div>
        </div>
        <div class="form-group tanggal">
            <?php echo form_label('Tanggal: ','tanggal',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tanggal'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tanggal" value="<?php echo $default['tanggal']; ?>" type="text" onchange="" class="input-md form-control" name="tanggal" required />
                <?php else: ?>
                <input id="tanggal" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tanggal" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
        <div class="form-group tgltempo">
            <?php echo form_label('Tanggal Tempo: ','tgltempo',array('class'=>'control-label')); ?>
            <div class="input-daterange input-group controls" id="datepicker">
                <?php if(!empty($default['tgltempo'])): //print_r($default);?>
                <?php //rint_r($default); ?>
                <input id="tgltempo" value="<?php echo $default['tgltempo']; ?>" type="text" onchange="" class="input-md form-control" name="tgltempo" required />
                <?php else: ?>
                <input id="tgltempo" value="<?php echo date('Y-m-d') ?>" type="text" onchange="" class=" form-control" name="tgltempo" required />
                <?php endif; ?>
                <span class="input-group-btn">
                    <a href="#" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></a></span>
            </div>
        </div>
      
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
          <div class="form-group">
            <label class="control-label">
                Nama Mahasiswa
            </label>
            <div class="controls input-group">
                <?php $mhs = isset($default['mhs'])? $default['mhs'] : '0';  ?>
                <?php echo form_dropdown('mhs',$opt_mhs,$mhs,'id="mhs" class="rekening input-lg form-control select2 input-md" style="width:100%" placeholder="Mahasiswa"'); ?>
              
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group">
            <label class="control-label">
                Paket Tagihan
            </label>
            <div class="controls input-group">
                <?php $multipaket = isset($default['multipaket'])? $default['multipaket'] : '0';  ?>
                <?php echo form_dropdown('multipaket[]',$opt_paket,$multipaket,'id="paket" class="rekening input-lg form-control select2 input-md" style="width:100%;" multiple="multiple" placeholder="Multi Paket"'); ?>
              
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <select multiple style="width: 300px;" id="pilihan">
    <optgroup label="Alaskan/Hawaiian Time Zone">
        <option value="AK">Alaska</option>
        <option value="HI">Hawaii</option>
    </optgroup>
    <optgroup label="Pacific Time Zone">
        <option value="CA">California</option>
        <option value="NV">Nevada</option>
        <option value="OR">Oregon</option>
        <option value="WA">Washington</option>
    </optgroup>
    <optgroup label="Mountain Time Zone">
        <option value="AZ">Arizona</option>
        <option value="CO">Colorado</option>
        <option value="ID">Idaho</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NM">New Mexico</option>
        <option value="ND">North Dakota</option>
        <option value="UT">Utah</option>
        <option value="WY">Wyoming</option>
    </optgroup>
    <optgroup label="Central Time Zone">
        <option value="AL">Alabama</option>
        <option value="AR">Arkansas</option>
        <option value="IL">Illinois</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="OK">Oklahoma</option>
        <option value="SD">South Dakota</option>
        <option value="TX">Texas</option>
        <option value="TN">Tennessee</option>
        <option value="WI">Wisconsin</option>
    </optgroup>
    <optgroup label="Eastern Time Zone">
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="IN">Indiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="OH">Ohio</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WV">West Virginia</option>
    </optgroup>
</select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">
                Detail Paket Tagihan
            </label>
            <div class="controls input-group">
                <?php $detailpaket = isset($default['detailpaket'])? $default['detailpaket'] : '0';  ?>
                <?php echo form_dropdown('detailpaket[]',$opt_detailpaket,$detailpaket,'id="paket" class="rekening input-lg form-control select2 input-md" style="width:100%;" multiple="multiple" placeholder="Multi Paket"'); ?>
              
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="save" name="myButton" type="submit" class="btn btn-lg btn-success">
            <icon class="fa fa-floppy-o"></icon> Simpan</button>
        <button id="save_edit" type="submit" class="btn btn-lg btn-primary" style="display:none;">
            <icon class="fa fa-refresh"></icon> Perbaiki</button>
        <a href="#" id="cancel_edit" class="btn btn-lg btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
    </div>
    <?php echo form_close();?>
</div>