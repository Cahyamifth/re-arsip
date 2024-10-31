<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Edit Arsip</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>


                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from arsip where arsip_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="arsip_update.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Kode. Referensi</label>
                                  <input type="hidden" name="id" value="<?php echo $d['arsip_id']; ?>">
                                <input type="text" class="form-control" name="kode" required="required" value="<?php echo $d['arsip_kode']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Debitur</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['arsip_nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label>No Box</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['box']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tgl. Awal Kredit</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['tglkredit']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tgl. Akhir Kredit</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['tglakhir']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['tempatlahir']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['tgllahir']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Dinas/Instansi</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['pekerjaan']; ?>">
                            </div>
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['notlp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>KC/KCP</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['kckcp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['alamat']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori" required="required">
                                    <option value="">Pilih kategori</option>
                                    <?php 
                                    $kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
                                    while($k = mysqli_fetch_array($kategori)){
                                        ?>
                                        <option <?php if($k['kategori_id'] == $d['arsip_kategori']){echo "selected='selected'";} ?> value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" required="required"><?php echo $d['arsip_keterangan']; ?></textarea>
                            </div>
                            <br>
                            <h7>*Diharapkan untuk mengupload dengan jenis file yang sama, direkomendasikan jenis file PDF!</h7>
                            <br>
                            <br>
                            <div class="form-group">
                                <label>Sekat A</label>
                                <input type="file" name="file">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>
                            <div class="form-group">
                                <label>Sekat B</label>
                                <input type="file" name="arsip_fileB">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>
                            <div class="form-group">
                                <label>Sekat C</label>
                                <input type="file" name="arsip_fileC">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>
                            <div class="form-group">
                                <label>Sekat D</label>
                                <input type="file" name="arsip_fileD">
                                <small>Kosongkan jika tidak ingin mengubah file</small>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Upload">
                            </div>

                        </form>

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>