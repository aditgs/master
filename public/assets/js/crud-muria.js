/*
	Ajax Semi CRUD JS --> MURIA PS
	===================
	Digunakan untuk crud standar berbasis codeigniter
	Dibuat: 2015
	Pengembang: Syahroni Wahyu Iriananada - roniwahyu@gmail.com 
    Update: 
    27 November 2015 - Dibuat untuk menyesuaikan dengan proyek MURIA PS
*/
$(document).ready(function(){
	$("body").on("click","#save",function(e){
        e.preventDefault();
    	save(0);
	});
	$("body").on("click","#save_edit",function(e){
    	e.preventDefault();
        var id=$(this).attr("id");
        save(id);
	});    
	$("body").on("click",'.reset',function(e){
            e.preventDefault();
             // $(".reset").click(function() {
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").val("");
            // $(this).closest('form').find("input[type=text],input[type=hidden], textarea").reset();
             $('button#save_edit').hide(200);
            $('button#save').fadeIn(200);
            $('form').clearForm();
           
            var id=null;
        });

         $('#modal-id').on('close.bs.modal', function () {
            // do something…
            alert('ok');
             $('.modal-body form').clearForm();
        })
   /* $("body").on("click",'.batal',function(e){
            e.preventDefault();
            // save(0);
            $('.form').trigger("reset");
            // $('.form').clearForm();
            //sembunyikan div class kelola dan form didalamnya      
            $('.kelola').fadeOut(100);
            $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                         $('#datatables').DataTable().clear(0).draw();
    }); */
    $("body").on("click",".edit",function(e){ 
            e.preventDefault();
            $('#outside').addClass('active in');
            $('li.baru').addClass('active');
            $('li.daftar').removeClass('active');
            $('#inside').removeClass('active');
            $('.kelola').show(200);
           
            var id=$(this).attr("id");
            $(this).ready(function(){
                    $.ajax({
                        url:baseurl+"get/"+id,
                        type:"get",
                        dataType:"json",
                        success:function(data){

                            for (var i in data) {
                                // alert(data.id_penyakit);
                                $('input[name="'+i+'"]').val(data[i]);

                                //gunakan ini untuk repopulate select option ke form dengan ajax
                                $("select#"+i+"").find('option').selectit(i,data[i]);
                                $(".checkbox").find('input[type="checkbox"]').checkit(i,data[i]);
                                $(".radio").find('input[type="radio"]').checkit(i,data[i]);
                            }
                            $('#body').val(data.body);
                            $('button#save').hide(200);
                            $('button#save_edit').fadeIn(200);
                           
                        }
                    });
                   
            });
            
    });
	$("body").on("click",".delete",function(e){
            e.preventDefault();
                var del_data={
                    id:$(this).attr("id"),
                    ajax:1
                }
                if(confirm('Anda Yakin Ingin Menghapus?')){
                    $(this).ready(function(){
                            
                        $.ajax({
                            url: baseurl+"delete/",
                            type: 'POST',
                            data: del_data,
                            success:function(msg){
                                 $('#datatables').DataTable().clear(0).draw();                      
                            }
                        });
                    });
                }
        });
        
        function save(id){
            var data = $('body form#addform').serializeArray();
            data.push({name: 'ajax', value: 1});
            // $.post(baseurl+"submit", data);
            
            $(this).ready(function(){
                $.ajax({
                    url:baseurl+"submit"+"/"+enkrip,
                    data:data,
                    type:"POST",
                    success:function(){
                        $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        // $('.kelola').fadeOut(200);

                       
                        
                        $('#inside').addClass('active in');
                        $('li.daftar').addClass('active');
                        $('li.baru').removeClass('active');
                        $('#outside').removeClass('active');
                        $('#modal-notif').modal('show');
                        $('#datatables').DataTable().clear(0).draw();
                      
                        // va/r id=0;
                        //$('.id').trigger("reset");
                        // alert(data);
                    }
                });
            });
        }
});