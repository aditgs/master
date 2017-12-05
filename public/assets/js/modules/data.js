 $('input.input-toggle').change(function() {
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
 });