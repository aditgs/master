<div class="modal fade" id="modal-password">
    <div class="modal-dialog modal-sm">
        <div class="modal-content panel panel-warning">
            <div class="modal-header panel-heading navy-bg">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="panel-title"><?= (!empty($title_form)||isset($title_form))?$title_form:'Tagihan';  ?></h3>
            </div>
            <div class="modal-body panel-body" style="padding:5px;">
                <?php if(isset($form_view)&&!empty($form_view)):
                    $this->load->view($form_view);
                else: ?>
                <?php 
                // $this->load->view('formval');
                endif;
                ?>
            </div>
          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->