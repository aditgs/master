function switchtoggle(id) {

    $('#datatoggle .input-toggle').unbind().bind('change',function(e) {
        e.preventDefault();
        // $('#mytext').val(($(this).attr('id')) + " " + ($(this).is(':checked')));
            // var stat=$(this).is(':checked');
        if ($(this).is(':checked') === true) {
            // $('#mytext1').val(($(this).attr('id')) + " " + ($(this).is(':checked')));
            updstatus(id,'open');
        } else {
            updstatus(id,'close');

            // $('#mytext1').val("");
        }
    });
}

function updstatus(id, stat) {
    $.post(baseurl + 'updstatus', { id: id, stat: stat }, function(data, status) {
        // if (status == 'success') {
        //     alert('sukses');
        // }
    });
    // $('#datatables').DataTable().clear(0).draw();
    console.clear();
}
/*$(document).ready(function() {
    //set initial state.
    $('#textbox1').val($(this).is(':checked'));
    if($('#checkbox1').is(':checked')==true){
        $('#textbox1').val('benar');
    }else{
        $('#textbox1').val('salah');
    }
     $('#checkbox1').change(function() {
        $('#textbox1').val($(this).is(':checked'));
        if($(this).is(':checked')==true){
        $('#textbox1').val('benar');
    }else{
        $('#textbox1').val('salah');
    }
    });*/
/*$('input.input-toggle').change(function() {
     id = $(this).prop('id');
     if ($(this).is(':checked') == true) {
         // alert('benar');
         // $.post(baseurl + 'updstatus', { id: id, stat: 'open' }, function(data, status) {
         //     if (status == 'success') {
         //         alert('buka sukses');
         //     }
         // });
     } else {
         // $.post(baseurl + 'updstatus', { id: id, stat: 'close' }, function(data, status) {
         //     if (status == 'success') {
         //         alert('tutup sukses');
         //     }
         // });
     }
 });*/

// $('label.switchtoggle').click(function(){
//               var dataid=$(this).data('id');
//               alert(dataid);
//               $(input.input-toggle).trigger('change');
//               id=$(this).prop('id');
//               switchtoggle(id);
//           });
//       function switchtoggle(id){

//               if($('label.switchtoggle input.input-toggle').is(':checked')==true){
//                   // alert('benar');
//                   $.post(baseurl+'updstatus',{id:id,stat:'open'},function(data,status){
//                       if(status=='success'){
//                           alert('buka sukses');
//                       }
//                   });
//               }else{
//                   $.post(baseurl+'updstatus',{id:id,stat:'close'},function(data,status){
//                       if(status=='success'){
//                           alert('tutup sukses');
//                       }
//                   });
//               }
//       }