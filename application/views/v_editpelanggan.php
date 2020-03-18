<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-gray-800"><B>EDIT DATA PELANGGAN</B></h1> <br>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <!-- Content Row -->
        <!-- Disini tempat membuat Edit Profil nya! -->
    </div>
    <div class="col-lg-10">

        <?php foreach ($pelanggan as $p) { ?>
            <!--$pelanggan = variabel yang diparsing dari controller yang berisi array data pelanggan-->
            <form action="<?php echo base_url() . 'c_pelanggan/update'; ?>" method="post">
                <!--fungsi update pada controller crud digunakan untuk menghandle update data-->
                <div class="form-group">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $p->id_pelanggan ?>">
                    <label for="nama"><B>NAMA PELANGGAN :</B></label>
                    <input type="text" class="form-control" name="nama_pelanggan" required pattern="[a-zA-Z\s]+" value="<?php echo $p->nama_pelanggan ?>">
                </div>
                <div class="form-group">
                    <label for="alamat"><B>ALAMAT PELANGGAN :</B></label>
                    <textarea class="form-control" name="alamat" required> <?php echo $p->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp"><B>NO HP :</B></label>
                    <input type="number" class="form-control" name="no_hp" required value="<?php echo $p->no_hp ?>"></input>
                </div>
                <div class="form-group">
                    <label for="jumlah_tagihan"><B>JUMLAH TAGIHAN :</B></label>
                    <input type="number" class="form-control" name="jumlah_tagihan" required value="<?php echo $p->jumlah_tagihan ?>"></input>
                </div>
                <div class="form-group">
                    <label for="status"><B>STATUS PEMBAYARAN :</B></label>
                    <select class="custom-select" name="status" value="<?php echo $p->status ?>">
                        <?php
                        if ($p->status == 1) { ?>
                            <option value="1" selected>Belum Dibayar</option>
                            <option value="2">Sudah Dibayar</option>
                        <?php } elseif ($p->status == 2) { ?>
                            <option value="1">Belum Dibayar</option>
                            <option value="2" selected>Sudah Dibayar</option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block"><B>SIMPAN</B></button>
            </form>
        <?php } ?>
        <br>
        <div class="text-center">
            <div class="row">

            </div>
            <!-- Batas edit profil -->
            <!-- Content Row -->
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">

                </div>

            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->