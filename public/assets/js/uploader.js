function reloadFiles() {
    // alert(filesurl);
    $.ajax({
        url: baseurl+'filebrowse/',
        dataType: 'json',
        success: function(data) {
            var html = [];
            // var baseurl="http://localhost/ci-smpn203/admin/files/";
            for (var i = 0, len = data.files.length; i < len; i++) {
                var file = data.files[i];
                html.push('<tr>\
                        <td class="preview"><img class="img-reponsive img-thumbnail" src="' +filesurl+file.url + '" /><br><span class="label label-info label-xs">' + file.name + '</span><span class="label label-success">' + (file.size / 1024 / 1024).toFixed(2) + 'MB</span></td>\
                        <td class="name">\
                           <div class="btn-group pull-right"><a class="insert btn btn-success btn-xs" href="#" data-url="' +file.url+ '">Tambah ke Editor</a>\
                            <a class="delete btn btn-danger btn-xs" href="#" data-url="' + file.delete + '" data-file="' + file.name + '">Hapus</a></div>\
                        </td>\
                        <td class="action">\
                        </td>\
                    </tr>');
            };
            $('#FILEUPLOAD .files .table').html(html.join());
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('Masalah pada server.\nSilakan Coba lagi beberapa menit berikutnya.');
        }
    });
};



$(function() {
    // $('#FILEUPLOAD').css('width', '542px');
    
    $('#FILEUPLOAD input[type=file]').fileupload({
        dataType: 'json',
        start: function(e, data) {
            $('#FILEUPLOAD .fileupload-progress').toggleClass('in');
        },
        stop: function(e, data) {
            $('#FILEUPLOAD .fileupload-progress').toggleClass('in')
                .find('.progress').attr('aria-valuenow', '0')
                .find('.bar').css('width', '0%');
        },
        done: function(e, data) {
            reloadFiles();
        },
        progress: function(e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#FILEUPLOAD .progress .bar').css('width', progress + '%');
        }
    });
    
   
    
    $('#FILEUPLOAD').delegate('.files .delete', 'click', function(e) {
        e.preventDefault();
        
        var el = $(this);
        var url = el.attr('data-url');
        var file = el.attr('data-file');
        $.ajax({
            type: 'POST',
            url: url,
            contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            data: {'file': file},
            success: function(data) {
                el.parent().parent().remove();
                reloadFiles();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Masalah pada server.\nSilakan Coba lagi beberapa menit berikutnya.');
            }
        });
        
        return false;
    });
    
    reloadFiles();
});