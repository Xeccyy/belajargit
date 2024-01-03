<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Peserta Didik
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Data Utama</a>
                        </li>
                        <li class="breadcrumb-item active">Siswa</li>
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
                        Data Siswa
                    </h5>
                </div>
                <div class="card-body">
                    <button class="btn bg-blue mb-2" data-toggle="modal" data-target="#modalRecycleBin"> <i class="fas fa-recycle"></i> Recycle Bin</button>
                    <table id="example1" class="table table-hover">
                        <thead class="bg-blue">
                            <th>ID</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM siswa WHERE dihapus_pada IS NULL";
                        $query = mysqli_query($koneksi, $sql);
                        while ($kolom = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $kolom['id_siswa']; ?></td>
                                <td><?= $kolom['nis']; ?></td>
                                <td><?= $kolom['nama']; ?></td>
                                <td><?= $kolom['no_hp']; ?></td>
                                <td><?= $kolom['email']; ?></td>
                                <td>
                                    <!-- tombol edit-->
                                    <a href="aksi/siswa.php" data-toggle="modal" data-target="#modalUbah<?= $kolom['id_siswa']; ?>">
                                        <i class="fas fa-edit"></i></a>
                                    &nbsp;
                                    <!-- tombl hapus -->
                                    <a onclick="return confirm('Yakin akan menghapus data ini?')" href="aksi/siswa.php?aksi=hapus&id_siswa=<?= $kolom['id_siswa']; ?>">
                                        <i class="fas fa-trash"></i>
                                </td>
                            </tr>
                            <!-- modal ubah periode -->
                            <div class="modal fade" id="modalUbah<?= $kolom['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="aksi/siswa.php" method="post">
                                                <input type="hidden" name="aksi" value="ubah">
                                                <input type="hidden" name="id_siswa" value="<?=
                                                                                            $kolom['id_siswa']; ?>">

                                                <label for="nis">Nis</label>
                                                <input type="text" name="nis" value="<?=
                                                                                        $kolom['nis']; ?>" class="form-control" required>

                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" value="<?= $kolom['nama']; ?>" class="form-control" required>

                                                <label for="tingkst">Tingkat</label>
                                                <input type="text" name="tingkat" value="<?= $kolom['tingkat']; ?>" class="form-control" required>


                                                <label for="kelas">Kelas</label>
                                                <input type="text" name="kelas" value="<?= $kolom['kelas']; ?>" class="form-control" required>

                                                <label for="id_jurusan">Jurusan </label>
                                                <select name="id_jurusan" class="form-control">
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    <?php
                                                    $sql_jurusan = "SELECT * FROM jurusan WHERE dihapus_pada IS NULL ORDER BY jurusan ASC";
                                                    $query_jurusan = mysqli_query($koneksi, $sql_jurusan);
                                                    while ($jurusan = mysqli_fetch_array($query_jurusan)) {
                                                        if($kolom['id_jurusan']==$jurusan['id_jurusan']){
                                                            echo "<option value='$jurusan[id_jurusan]' selected>$jurusan[jurusan]</option>";
                                                        } else {
                                                        echo "<option value='$jurusan[id_jurusan]'>$jurusan[jurusan]</option>";
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="alamat">Alamat</label>
                                                <input type="text" name="alamat" value="<?= $kolom['alamat']; ?>" class="form-control" required>

                                                <label for="no_hp">No Hp</label>
                                                <input type="text" name="no_hp" value="<?= $kolom['no_hp']; ?>" class="form-control" required>

                                                <label for="email">Email </label>
                                                <input type="text" name="email" value="<?= $kolom['email']; ?>" class="form-control" required>
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

<!-- modal tanbah periode -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="aksi/siswa.php" method="post">
                    <input type="hidden" name="aksi" value="tambah">
                    <label for="nis">Nis</label>
                    <input type="text" name="nis" class="form-control" required>

                    <label for="nama">Nama </label>
                    <input type="text" name="nama" class="form-control" required>

                    <label for="tingkat"> Tingkat </label>
                    <input type="text" name="tingkat" class="form-control" required>

                    <label for="Kelas"> Kelas </label>
                    <input type="text" name="Kelas" class="form-control" required>

                    <label for="id_jurusan">Jurusan </label>
                    <select name="id_jurusan" class="form-control">
                        <option value="">-- Pilih Jurusan --</option>
                        <?php
                        $sql_jurusan = "SELECT * FROM jurusan WHERE dihapus_pada IS NULL ORDER BY jurusan ASC";
                        $query_jurusan = mysqli_query($koneksi, $sql_jurusan);
                        while ($jurusan = mysqli_fetch_array($query_jurusan)) {
                            echo "<option value='$jurusan[id_jurusan]'>$jurusan[jurusan]</option>";
                        }
                        ?>
                    </select>

                    <label for="alamat">Alamat </label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>

                    <label for="no_hp">No Hp </label>
                    <input type="number" name="no_hp" class="form-control" required>

                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" required>
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
                        <th>ID</th>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Dihapus pada</th>
                        <th>Aksi</th>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM siswa WHERE dihapus_pada IS NOT NULL";
                    $query = mysqli_query($koneksi, $sql);
                    while ($kolom = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $kolom['id_siswa']; ?></td>
                            <td><?= $kolom['nis']; ?></td>
                            <td><?= $kolom['nama']; ?></td>
                            <td><?= $kolom['dihapus_pada']; ?></td>
                            <td>
                                <a onclick="return confirm('Yakin akan Mengembalikan Data Ini?')" href="aksi/siswa.php?aksi=restore&id_siswa=<?= $kolom['id_siswa']; ?>">
                                    <i class="fas fa-trash-restore"></i>

                                    <a onclick="return confirm('Yakin akan menghapus data ini secara permanent ?')" href="aksi/siswa.php?aksi=hapus-permanen&id_siswa=<?= $kolom['id_siswa']; ?>">
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