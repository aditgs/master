$(document).ready(function(){
      // Dapatkan halaman dengan ajax
    $('body').on('click','[data-load-remote]',function(e) {
        e.preventDefault();
        
        var $this = $(this);
        var remote = $this.data('load-remote');
        var targets= $this.data('remote-target');
        var forms= $this.data('form');
        // var js=<?php echo assets_url('js/modules/ptrx.01.js');?>;
        // alert(js);
        if(remote) {
            // $(targets).load(remote);
            $.ajax({
                url:remote,
                type:"POST",
                dataType:"html",
                success:function(dt,status){
                    $(targets).html(dt);
                },
                complete:function(){
                    // $.getScripts()
                }

            });
           
        }


    });
   

  
    // Dapatkan Datatables dengan Ajax
    $('body').on('click','[data-sub-module]',function(e){
        e.preventDefault();
        var $this = $(this);
        var baseurl=$this.data('sub-module');
        // alert(baseurl);
    });
    $("body").on("click","#save1",function(e){
            e.preventDefault();
            save1(0);
        });
    function save1(id){
            var data = $('form#addform1').serializeArray();
            data.push({name: 'ajax', value: 1});
            // $.post(baseurl+"submit", data);
            
            $(this).ready(function(){
                $.ajax({
                    url:'http://sim.muriaps.com/inv/beli/submit',
                    data:data,
                    type:"POST",
                    success:function(){
                      
                    }
                });
            });
        }

  

    $('body').on('click','[data-load]',function(e){
   
        e.preventDefault();
        var $this = $(this);
        
        var tables = $this.data('table');
        var remote = $this.data('load');
       
        $($this.data('remote-target')).load(tables,function(){
             var mTable=$('body #datatables').dataTable({
                    "ajax":{
                        "url":remote,
                        "dataType": "json"
                        },
                        "sServerMethod": "POST",
                        "bServerSide": true,
                        // "lengthChange": false,
                        "scroll":true,
                        "sScrollX": true,
                        "bAutoWidth": false,
                        "bDeferRender": true,
                        "bSortClasses": false,
                        "bScrollCollapse": true,    
                        "bStateSave": true,
                        "responsive": true,
                        "buttons":false,
                       
                       
            });
        });
    });
    $(".nav li.disabled a").click(function() {
     return false;
    });

    $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });
    $("#modal-id").on("hidden.bs.modal",function(){
        // $("#datatables").DataTable().destroy();
        $("#modal-id .modal-body").html('')                

    });
    
    
});   

$(function()
{
    $('body').on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        // var controlForm = $('.controls form:first'),
        var controlForm = $('.controls .row.entry'),
            currentEntry = $(this).parents('.tambah'),
            // currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});
