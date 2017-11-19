$(document).ready(function() {
    var $validator = $("#realisasi").validate({
        rules: {
            kd_rek_dpa: {required: true},
            kd_rek_dppa: {required: true},
            no_kontrak: {required: true},
            no_ba_pho_sertikerja: {required: true},
            no_spk: {required: true},
            infra_nama: {required: true},
            tgl_dpa: {required: true,date:true},
            tgl_dppa: {required: true,date:true},
            tgl_kontrak: {required: true,date:true},
            tgl_ba_pho_sertikerja: {required: true,date:true},
         
        }
    });
    var $valid_detail = $("#detail_realisasi").validate({
        rules: {
            infra_nama: {required: true},
         
        }
    });
    var $valid_dokumen = $("#dok_realisasi").validate({
        rules: {
            upload: {required: true},
         
        }
    });
 
    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-tabs',
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.progress-bar').css({width:$percent+'%'});
        },
        'onNext': function(tab, navigation, index) {
            var $valid = $("#realisasi").valid();
            var $valid_det = $("#detail_realisasi").valid();
            var $valid_dok = $("#dok_realisasi").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
            if(!$valid_det) {
                $valid_detail.focusInvalid();
                return false;
            }
            if(!$valid_dok) {
                $valid_dokumen.focusInvalid();
                return false;
            }
        },
        'onTabClick': function(tab, navigation, index) {
            var $valid = $("#realisasi").valid();
            var $valid_det = $("#detail_realisasi").valid();
           var $valid_dok = $("#dok_realisasi").valid();
            if(!$valid) {
                $validator.focusInvalid();
                return false;
            }
            if(!$valid_det) {
                $valid_detail.focusInvalid();
                return false;
            }
            if(!$valid_dok) {
                $valid_dokumen.focusInvalid();
                return false;
            }
        },
    });
    
    $('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true
    });
});