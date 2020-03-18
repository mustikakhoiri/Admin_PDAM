<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-gray-800"><B>EDIT DATA ADMIN</B></h1> <br>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <!-- Content Row -->
        <!-- Disini tempat membuat Edit Profil nya! -->
    </div>
    <div class="col-lg-10">

        <?php foreach ($admin as $p) { ?>
            <!--$admin = variabel yang diparsing dari controller yang berisi array data admin-->
            <form action="<?php echo base_url() . 'c_admin/update'; ?>" method="post">
                <!--fungsi update pada controller crud digunakan untuk menghandle update data-->
                <div class="form-group">
                    <input type="hidden" name="id_admin" value="<?php echo $p->id_admin ?>">
                    <label for="username"><B>USERNAME :</B></label>
                    <input type="text" class="form-control" name="username" required value="<?php echo $p->username ?>">
                </div>
                <div class="form-group">
                    <label for="nama_admin"><B>NAMA ADMIN :</B></label>
                    <input type="text" class="form-control" name="nama_admin" required pattern="[a-zA-Z\s]+" value="<?php echo $p->nama_admin ?>">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin"><B>JENIS KELAMIN :</B></label>
                    <select class="custom-select" name="jenis_kelamin" value="<?php echo $p->jenis_kelamin ?>">
                        <?php
                        if ($p->jenis_kelamin == 'Laki-Laki') { ?>
                            <option selected>Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        <?php } elseif ($p->jenis_kelamin == 'Perempuan') { ?>
                            <option selected>Perempuan</option>
                            <option value="1">Laki-Laki</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat"><B>ALAMAT ADMIN :</B></label>
                    <textarea class="form-control" name="alamat" required> <?php echo $p->alamat ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_hp"><B>NO HP :</B></label>
                    <input type="number" class="form-control" name="no_hp" required value="<?php echo $p->no_hp ?>"></input>
                </div>
                <div class="form-group">
                    <label for="password"><B>PASSWORD :</B></label>
                    <input type="password" class="form-control" name="password" minlength="6" required value="<?php echo $p->password ?>"></input>
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