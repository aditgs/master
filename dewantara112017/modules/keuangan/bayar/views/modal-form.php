<div class="modal fade" id="modal-form">
    <div class="modal-dialog modal-fullscreen">
        <!-- <div class="modal-content"> -->
        <div class="modal-content panel panel-info">
            <div class="modal-header panel-heading navy-bg">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="panel-title">Pembayaran</h3>
            </div>
            <div class="modal-body panel-body" style="padding:5px;">
                <?php $this->load->view('formbayar') ?>

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