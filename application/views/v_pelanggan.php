<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div>
        <h1 class="text-gray-800 text-center"><B>DAFTAR PELANGGAN PDAM</B></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div><br>
    <h1 class="h3 mb-2 text-gray-800"><a class="btn btn-primary" href="<?= base_url('c_pelanggan/tambah/'); ?>"><i class="fas fa-user-plus"></i>&nbsp; <B>DATA PELANGGAN</B></a></h1>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr class="bg-primary text-white text-center">
                        <th><B>NO</B> </th>
                        <th><B>NAMA PELANGGAN</B></th>
                        <th><B>ALAMAT</B></th>
                        <th><B>NO HP</B></th>
                        <th><B>JUMLAH TAGIHAN</B></th>
                        <th><B>STATUS</B></th>
                        <th><B>ACTION</B></th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($pelanggan as $p) { ?>
                        <!--$pelanggan = variabel yang diparsing dari controller yang berisi array data user-->
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p->nama_pelanggan ?></td>
                            <td><?php echo $p->alamat ?></td>
                            <td><?php echo $p->no_hp ?></td>
                            <td><?php echo 'Rp. ' . number_format($p->jumlah_tagihan, 0, ".", "."); ?></td>
                            <?php $status = $p->status ?>
                            <td class="text-center"><?php
                                                    if ($status == 1) {
                                                        echo '<span class="badge badge-pill badge-danger px-2">Belum Dibayar</span>';
                                                    } elseif ($status == 2) {
                                                        echo '<span class="badge badge-pill badge-success px-2">Sudah Dibayar</span>';
                                                    } ?>
                            </td>
                            <?php $status = $p->status ?>
                            <td>
                                <?php echo anchor('c_pelanggan/edit/' . $p->id_pelanggan, '<i class="fas fa-edit"></i>'); ?> &nbsp;
                                <!--hyperlink untuk edit data-->
                                <?php echo anchor('c_pelanggan/hapus/' . $p->id_pelanggan, '<i class="fas fa-trash-alt"></i>', array('onclick' => "return confirm('Do you want delete this record')")) ?>
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