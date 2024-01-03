<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Tagihan
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Transaksi</a>
                        </li>
                        <li class="breadcrumb-item active">Tagihan</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card">
                <div class="card-header">
                    <h5>
                        Data Tagihan
                    </h5>
                </div>
                <div class="card-body">
                    <button class="btn bg-blue mb-2" data-toggle="modal" data-target="#modalRecycleBin"> <i class="fas fa-recycle"></i> Recycle Bin</button>
                    <table id="example1" class="table table-hover table-sm">
                        <thead class="bg-blue">
                            <th>ID</th>
                            <th>Periode </th>
                            <th>NIS Siswa </th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Deksripsi Bahaya</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Jumlah Biaya</th>
                            <th>Terbayar</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
                        $sql = "SELECT tagihan.*,siswa.nis,siswa.nama,biaya.deskripsi_biaya,biaya.jumlah_biaya,biaya.tanggal_jatuh_tempo,periode.periode FROM tagihan,siswa,biaya,periode WHERE tagihan.dihapus_pada IS NULL AND tagihan.id_siswa=siswa.id_siswa AND tagihan.id_biaya=biaya.id_biaya AND biaya.id_periode=periode.id_periode";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $kolom['id_tagihan']; ?></td>
                                <td><?= $kolom['periode']; ?></td>
                                <td><?= $kolom['nis']; ?></td>
                                <td><?= $kolom['nama']; ?></td>
                                <td><?= $kolom['kelas']; ?></td>
                                <td><?= $kolom['deskripsi_biaya']; ?></td>
                                <td><?= $kolom['tanggal_jatuh_tempo']; ?></td>
                                <td><?= number_format($kolom['jumlah_biaya']); ?></td></td>
                                <td><?= number_format($kolom['total_terbayar']); ?></td>
                                <td>
                                    <!-- tombol infromasi-->
                                    <a title="Informasi Penagihan Pembayaran" href="index.php?p=tagihan-info&id_tagihan=<?= $kolom['id_tagihan']; ?>"><i class="fas fa-search"></i></a>
                                    &nbsp;
                                    <!-- tombl edit -->
                                    <a title="Ubah Tagihan" href="index.php?p=tagihan-edit&id_tagihan=<?= $kolom['id_tagihan']; ?>">
                                        <i class="fas fa-edit"></i>
                                </td>
                            </tr>
                            
                        <?php
                        } // Akhir While 
                        ?>
                    </table>
                    <button type="button" class="btn bg-blue btn-block mt-3" data-toggle="modal" data-target="#modalTambah">
                        <i class="fas fa-plus"></i>Tambah Siswa Baru</button>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal tanbah tagihan -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tagihan Per Jurusan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/tagihan.php" method="post">
                    <input type="hidden" name="aksi" value="tambah-berdasarkan-kelas">
                    <label for="id_periode">Periode</label>
                    <select name="id_periode" class="form-control" required>
                        <option value="">-- Pilih Periode --</option>
                        <?php
                        $sql = "SELECT * FROM periode WHERE id_periode IS NOT NULL";
                        $query = mysqli_query($koneksi, $sql);
                        while ($periode = mysqli_fetch_array($query)) {
                            echo "<option value='$periode[id_periode]'>$periode[periode]</option>";
                        }
                        ?>
                    </select>

                    <label for="tingkat">Tingkat </label>
                    <select class="form-control" name="tingkat" required>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                    </select>
                    <br>

                    <label for="id_jurusan">Jurusan</label>
                    <select name="id_jurusan" class="form-control" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <?php
                        $sql_jurusan = "SELECT * FROM jurusan WHERE dihapus_pada IS NULL ORDER BY jurusan ASC";
                        $query_jurusan = mysqli_query($koneksi,$sql_jurusan);
                        while ($jurusan = mysqli_fetch_array($query_jurusan)) {
                            echo "<option value='$jurusan[id_jurusan]'>$jurusan[jurusan]</option>";
                        }
                        ?>

                    </select>
                    <br>
                    <button type="sumbit" class="btn btn-block bg-blue"><i class="fas fa-save"></i></button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Recycle Bin -->
<div class="modal fade" id="modalRecycleBin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Penghapusan Sementara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead class="bg-blue">
                        <th>ID Biaya</th>
                        <th>Biaya </th>
                        <th>Di Hapus Pada</th>
                        <th>Aksi</th>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM biaya WHERE dihapus_pada IS NOT NULL";
                    $query = mysqli_query($koneksi, $sql);
                    while ($kolom = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $kolom['id_biaya']; ?></td>
                            <td><?= $kolom['jumlah_biaya']; ?></td>
                            <td><?= $kolom['dihapus_pada']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin akan Mengembalikan Data Ini?')" href="aksi/biaya.php?aksi=restore&id_biaya=<?= $kolom['id_biaya']; ?>">
                                    <i class="fas fa-trash-restore"></i>

                                    <a onclick="return confirm('Yakin akan menghapus data ini secara permanent ?')" href="aksi/biaya.php?aksi=hapus-permanen&id_biaya=<?= $kolom['id_biaya']; ?>">
                                        <i class="fas fa-eraser"></i>
                            </td>
                        </tr>
                    <?php
                    } // Akhir While 
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-blue" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>