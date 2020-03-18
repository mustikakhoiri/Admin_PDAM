<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-gray-800"><B>TAMBAH ADMIN</B></h1> <br>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <!-- Content Row -->
        <!-- Disini tempat membuat Edit Profil nya! -->
    </div>
    <div class="col-lg-10">

        <!--$admin = variabel yang diparsing dari controller yang berisi array data admin-->
        <form action="<?php echo base_url() . 'c_admin/tambah_aksi'; ?>" method="post">
            <!--fungsi update pada controller crud digunakan untuk menghandle update data-->
            <div class="form-group">
                <label for="username"><B>USERNAME :</B></label>
                <input type="text" class="form-control" name="username" required value="<?= set_value('username'); ?>">
            </div>
            <div class="form-group">
                <label for="nama"><B>NAMA ADMIN :</B></label>
                <input type="text" class="form-control" name="nama_admin" required pattern="[a-zA-Z\s]+" value="<?= set_value('nama_admin'); ?>">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><B>JENIS KELAMIN :</B></label>
                <select class="custom-select" name="jenis_kelamin" value="<?php echo $p->jenis_kelamin ?>">>
                    <option selected>Pilih Jenis Kelamin</option>
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat"><B>ALAMAT :</B></label>
                <textarea type="text" class="form-control" name="alamat" required value="<?= set_value('alamat'); ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="no_hp"><B>NO HP :</B></label>
                <input type="number" class="form-control" name="no_hp" required value="<?= set_value('no_hp'); ?>"></<input>
            </div>
            <div class="form-group">
                <label for="password"><B>PASSWORD :</B></label>
                <input type="password" class="form-control" name="password" minlength="6" required value="<?= set_value('password'); ?>"></<input>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-user btn-block"><B>SIMPAN</B></button>
        </form>
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