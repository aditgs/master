<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Prodi</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php 
                        if(!empty($view)):
                            $this->load->view($view);
                        else:
                            $this->load->view('siakad_prodi_table');
                        endif;
                    ?>


                    </div>
                </div>
                </div>
            </div>
</div>

<?php $this->load->view('modal-id') ?>;
<?php $this->load->view('modal-form') ?>;
