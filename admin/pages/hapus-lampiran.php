<?php
$id_lampiran = $_GET['id_lampiran'];
 
// mengambil url gambar pada tabel konten
$getUrl = getLampiranId($id_lampiran);
while($row=mysqli_fetch_assoc($getUrl)) {
    $urlgambar = $row['link'];
    if(hapusLampiran($id_lampiran)){
        //jika proses hapus konten berhasil, maka dilanjutkan dengan hapus file gambar dari folder gambar
        $urlgambar = '../gambar/'.basename($urlgambar);
        chown($urlgambar, 666);
            if (unlink($urlgambar)) {
            echo '<script>window.location="'.$adminurl.'index.php?p=lampiran"</script>';
            } else {
            echo "Gagal hapus gambar dari folder gambar";
            }
        }
     else {
        echo "Terjadi kesalahan saat menghapus data";
    }
}
 
