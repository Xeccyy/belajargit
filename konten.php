<?php
 if (empty($_GET {'p'})){
    $title="Sistem Informasi Biaya Pendidikan";
    $konten="konten/home.php";
}
else if($_GET['p']=='periode'){
    $title='Data Periode Pendidikan';
    $konten="konten/periode.php";
} else if($_GET['p']=='biaya'){
    $title='Data Biaya Pendidikan';
    $konten="konten/biaya.php";
}else if($_GET['p']=='siswa'){
    $title='Data Siswa Pendidikan';
    $konten="konten/siswa.php";
}else if($_GET['p']=='user'){
    $title='Data User ';
    $konten="konten/user.php";
}

// manu tagihan

else if($_GET['p']=='tagihan'){
    $title='Data tagihan ';
    $konten="konten/tagihan.php";
}
else if($_GET['p']=='tagihan-info'){
    $title='Informasi Riwayat Transaksi Tgaihan ';
    $konten="konten/tagihan-info.php";
}
else if($_GET['p']=='tagihan-edit'){
    $title='Ubah Data Tagihan ';
    $konten="konten/tagihan-edit.php";
}
// Akhir Menu Tagihan

// Menu Transaksi
else if($_GET['p']=='bayar'){
    $title='Data Pembayaran ';
    $konten="konten/bayar.php";
}
else if($_GET['p']=='bayar-tambah'){
    $title='Input Pembayaran Siswa ';
    $konten="konten/bayar-tambah.php";
}
else if($_GET['p']=='bayar-konfirmasi'){
    $title='Konfirmasi Pembayaran Siswa ';
    $konten="konten/bayar-konfirmasi.php";
}
else if($_GET['p']=='bayar-alokasi'){
    $title='Alokasi Pembayaran Siswa ';
    $konten="konten/bayar-alokasi.php";
}
else if($_GET['p']=='laporan'){
    $title='Laporan sistem ';
    $konten="konten/laporan.php";
}
else if($_GET['p']=='backup'){
    $title='Backup Sistem ';
    $konten="konten/backup.php";
}
else if($_GET['p']=='restore'){
    $title='Restore Sistem ';
    $konten="konten/restore.php";
}
// Akhir Menu Transakasi

// Menu Untuk Siswa
else if($_GET['p']=='input-bayar'){
    $title='Input Pembayaran Siswa ';
    $konten="konten/siswa-input-bayar.php";
}
else if($_GET['p']=='tagihan-info-siswa'){
    $title='Informasi Riwayat Transaksi Tgaihan ';
    $konten="konten/tagihan-info-siswa.php";
}
else if($_GET['p']=='bayar-alokasi-siswa'){
    $title='Informasi Riwayat Transaksi Tgaihan ';
    $konten="konten/bayar-alokasi-siswa.php";
}
else if($_GET['p']=='riwayat'){
    $title='Riwayat Pembayaran Siswa ';
    $konten="konten/siswa-riwayat.php";
}
else if($_GET['p']=='siswa-laporan'){
    $title='Laporan Siswa ';
    $konten="konten/siswa-laporan.php";
}
// Akhir Menu UNtuk Siswa
else {
    $title="Halaman Tidak Ditemukan";
    $konten= "konten/404.php";
}