<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview</span></li>
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
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Preview Arsip</h3>
                </div>
                <div class="panel-body">

                    <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM arsip,kategori,petugas WHERE arsip_petugas=petugas_id and arsip_kategori=kategori_id and arsip_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Nama Debitur</th>
                                        <td><?php echo $d['arsip_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Referensi</th>
                                        <td><?php echo $d['arsip_kode']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. Box</th>
                                        <td><?php echo $d['box']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TTL</th>
                                        <td><?php echo $d['tempatlahir']; ?>, <?php echo $d['tgllahir']?></td>
                                    </tr>
                                    <tr>
                                        <th>Tgl. Awal Kredit</th>
                                        <td><?php echo $d['tglkredit']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tgl. Akhir Kredit</th>
                                        <td><?php echo $d['tglakhir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Dinas/Instansi</th>
                                        <td><?php echo $d['pekerjaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>KC/KCP</th>
                                        <td><?php echo $d['kckcp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?php echo $d['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon</th>
                                        <td><?php echo $d['notlp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Upload</th>
                                        <td><?php echo date('H:i:s  d-m-Y',strtotime($d['arsip_waktu_upload'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td><?php echo $d['kategori_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Petugas Pengupload</th>
                                        <td><?php echo $d['petugas_nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?php echo $d['arsip_keterangan']; ?></td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-lg-8">
                            <h2>Sekat A</h2>
                                <?php 
                                if($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg"){
                                    ?>
                                    <img src="../arsip/<?php echo $d['arsip_file']; ?>">
                                    <?php
                                }elseif($d['arsip_jenis'] == "pdf"){
                                    ?>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../arsip/<?php echo $d['arsip_file']; ?>"></a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['arsip_file']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                             <div class="col-lg-8">
                                <br><br>
                                <h2>Sekat B</h2>
                                <?php 
                                if($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg"){
                                    ?>
                                    <img src="../arsip/<?php echo $d['arsip_fileB']; ?>">
                                    <?php
                                }elseif($d['arsip_jenis'] == "pdf"){
                                    ?>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../arsip/<?php echo $d['arsip_fileB']; ?>"></a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['arsip_fileB']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                             <div class="col-lg-8">
                                <br><br>
                                <h2>Sekat C</h2>
                                <?php 
                                if($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg"){
                                    ?>
                                    <img src="../arsip/<?php echo $d['arsip_fileC']; ?>">
                                    <?php
                                }elseif($d['arsip_jenis'] == "pdf"){
                                    ?>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../arsip/<?php echo $d['arsip_fileC']; ?>"></a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['arsip_fileC']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                            </div>
                             <div class="col-lg-8">
                                <br><br>
                                <h2>Sekat D</h2>
                                <?php 
                                if($d['arsip_jenis'] == "png" || $d['arsip_jenis'] == "jpg" || $d['arsip_jenis'] == "gif" || $d['arsip_jenis'] == "jpeg"){
                                    ?>
                                    <img src="../arsip/<?php echo $d['arsip_fileD']; ?>">
                                    <?php
                                }elseif($d['arsip_jenis'] == "pdf"){
                                    ?>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../arsip/<?php echo $d['arsip_fileD']; ?>"></a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <p>Preview tidak tersedia, silahkan <a target="_blank" style="color: blue" href="../arsip/<?php echo $d['arsip_fileD']; ?>">Download di sini.</a></p>.
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>
<?php include 'footer.php'; ?>