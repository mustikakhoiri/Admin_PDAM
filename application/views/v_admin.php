<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div>
        <h1 class="text-gray-800 text-center"><B>DAFTAR ADMIN</B></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div><br>
    <h1 class="h3 mb-2 text-gray-800"><a class="btn btn-primary" href="<?= base_url('c_admin/tambah/'); ?>"><i class="fas fa-user-plus"></i>&nbsp; <B>DATA ADMIN</B></a></h1>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="bg-primary text-white text-center">
                        <th><B>NO</B> </th>
                        <th><B>USERNAME</B> </th>
                        <th><B>NAMA ADMIN</B></th>
                        <th><B>JENIS KELAMIN</B></th>
                        <th><B>ALAMAT</B></th>
                        <th><B>NO HP</B></th>
                        <th><B>ACTION</B></th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($admin as $a) { ?>
                        <!--$admin = variabel yang diparsing dari controller yang berisi array data admin-->
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $a->username ?></td>
                            <td><?php echo $a->nama_admin ?></td>
                            <td><?php echo $a->jenis_kelamin ?></td>
                            <td><?php echo $a->alamat ?></td>
                            <td><?php echo $a->no_hp ?></td>
                            <td>
                                <?php echo anchor('c_admin/edit/' . $a->id_admin, '<i class="fas fa-edit"></i>'); ?> &nbsp;
                                <!--hyperlink untuk edit data-->
                                <?php echo anchor('c_admin/hapus/' . $a->id_admin, '<i class="fas fa-trash-alt"></i>', array('onclick' => "return confirm('Do you want delete this record?')")) ?>
                                <!--hyperlink untuk hapus data-->
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->