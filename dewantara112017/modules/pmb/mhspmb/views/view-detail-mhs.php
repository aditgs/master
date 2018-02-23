
    <section class=""  style="">
        <!-- Write HTML just like a web page -->
        <article>
            <?php if(isset($data)||!empty($data)):
            $detail=$this->pmbdb->getpmbgel($data['gelid'])?>
            <div class="row" style="">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <strong>No Pendaftaran</strong><br>
               <?php echo "#".$data['noreg_pmb'] ?>
                </div>
                 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <strong>Tanggal Daftar</strong><br>
                    <?php echo tanggalindo($data['tgl_reg_pmb'],true)?>
                </div>
              
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong>DATA PRIBADI</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 kiri">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Nama Calon Mahasiswa
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['nm_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            NIK
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['nik_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Jenis Kelamin
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['kelamin_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Pilihan Kelas
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php 
                            $kelas=$this->pmbdb->getpmbkelas($data['id_siakad_kelas']);

                            // echo $data['id_siakad_kelas'] 
                            echo isset($kelas['inisial_kelas'])?"(".$kelas['inisial_kelas'].") ".$kelas['nm_kelas']:'';
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Tempat Tanggal Lahir
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['tmp_cmhs'].", ". thedate($data['tgl_cmhs']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Agama
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['agama_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Alamat
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['almt_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Nama Ibu
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['nm_ibu_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Kode Pos
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['kodepos_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Kota
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['kota_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            No Telp Rumah
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['telp_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            No HP
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['hp_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Email
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['email_cmhs'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <strong>DATA PENDIDIKAN</strong>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Asal SMU / PT
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['asal_pend'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Program / Jurusan
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['jurusan_pend'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            No Ijazah
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['no_ijazah_pend'] ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Tanggal Lulus
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo tanggalindo($data['tgl_ijazah_pend']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            Nilai Ijazah
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            : <?php echo $data['nil_ijazah_pend'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 kanan">
                    <img style="width-max:40mm;width:100%" src="<?php echo !empty($data['img_pasfoto'])?domain().'uploads/files/images/'.$data['img_pasfoto']:'' ?>" data-id="<?php echo !empty($data['img_id'])?$data['img_id']:'' ?>" title="foto mahasiswa" alt="foto mhs">
                </div>
            </div>
            

         
        
                

            <?php else: ?>
            <h2>Data tidak ditemukan</h2>
            <?php endif; ?>
        </article>
    </section>
