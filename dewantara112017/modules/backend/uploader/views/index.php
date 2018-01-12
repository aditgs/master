    <div class="container">
    <div class="row">
    <h2>Uploader Test</h2>
    
    <form class="form-horizontal" action="<?php echo base_url() ?>uploader/save" method="post" enctype="multipart/form-data">
        <fieldset>

                <div id="FILEUPLOAD" class="controls">
                    <div class="uploader">
                        <span class="btn btn-block btn-success fileinput-button">
                            <i class="icon-plus icon-white"></i>
                            <span>Upload Foto</span>
                            <input type="file" name="image" data-url="<?php echo base_url() ?>uploader/fileupload" multiple="multiple" />
                        </span> 
                        <div class="fileupload-progress fade">
                            <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="bar" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                                            <a href="<?php echo base_url(); ?>files" class="btn btn-danger">Kelola Foto</a>     
                        <a href="<?php echo base_url(); ?>album" class="btn btn-danger">Kelola Album Foto</a>     
                     
                    <div class="files">
                        <table class="table table-striped table-bordered">
                        </table>
                    </div>
                </div>
            </div>
            
           <!--  <div class="control-group">
                <div class="controls">
                    <input class="btn btn-large" type="reset" data-dismiss="modal" value="Cancel" />
                    <input class="btn btn-large btn-primary" type="submit" value="Simpan" />
                </div>
            </div> -->
        </fieldset>
    </form>
    </div>
</div>

