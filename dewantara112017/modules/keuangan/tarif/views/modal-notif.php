<div class="modal fade" id="modal-notif">
    <div class="modal-dialog modal-md">
        <!-- <div class="modal-content"> -->
        <div class="modal-content panel panel-success">
            <div class="modal-header panel-heading navy-bg">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="panel-title"><?= (!empty($title_form)||isset($title_form))?$title_form:'Tarif';  ?></h3>
            </div>
            <div class="modal-body panel-body" style="padding:5px;">
               <div class="alert alert-success">
                        <strong>Berhasil!</strong> Tarif berhasil disimpan ...
                    </div>
                   
                
            </div>
            <div class="panel-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->