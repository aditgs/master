$(document).ready(function(){
$( 'textarea.ckeditor' ).ckeditor();

        
        oTable=$('#datatables').dataTable({
            "ajax":{
                "url":baseurl+"getdatatables",
                "dataType": "json"
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "responsive": true,
            "aoColumns": [
                { "sClass": "id","sName": "id","sWidth": "20px", "aTargets": [0] } ,
                { "sClass": "filename", "sName": "filename", "sWidth": "80px", "aTargets": [ 1 ] },
               
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "50px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<img class='file-list img-responsive thumbnails' alt='"+data[1]+"' src='"+data[3]+"'/>";
                }},
                { "sClass": "url", "sName": "url", "sWidth": "180px", "aTargets": [ 1 ] },
                { "sClass": "album", "sName": "album", "sWidth": "80px", "aTargets": [ 1 ] },
                
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "150px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><a href='#outside' class='edit btn btn-xs btn-success' id='"+data[0]+"'><i class='glyphicon glyphicon-edit'></i> Edit</a><button class='delete btn btn-xs btn-danger'id='"+data[0]+"'><i class='glyphicon glyphicon-remove'></i> Hapus</button></div>";
                }}
               
            ],
        });
    
    $('#openBtn').on('click', function(e) {
    e.preventDefault();
    var url = $('#openBtn').attr('data-url');
        $(".modal-body").html('<iframe width="100%" height="100%" frameborder="0"  allowtransparency="true" src="'+url+'"></iframe>');
    });
    $('#modal-id').on('show.bs.modal', function () {
 
        $(this).find('.modal-dialog').css({
                  width:'60%', //choose your width
                  height:'100%', 
                  'padding':'0'
           });
         $(this).find('.modal-content').css({
                  height:'80%', 
                  'border-radius':'5',
                  'padding':'0'
           });
         $(this).find('.modal-body').css({
                  width:'auto',
                  height:'75%', 
                  'padding':'0'
           }); 
         /*$(this).find('.modal-footer').css({
                  // width:'auto',
                  // height:'100%', 'border-radius':'5',
                  'padding':'10'
           });*/
    })

   /* $('#FILEUPLOAD').delegate('.files .delete', 'click', function(e) {
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
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('서버에 문제가 생겼습니다.\n잠시후에 다시 시도해 주세요.');
            }
        });
        
        return false;
    });*/
      
});   


  