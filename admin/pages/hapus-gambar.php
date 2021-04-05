<?php
$fid = $_GET['fid'];
 
// mengambil url gambar pada tabel konten
$getUrl = getGambarPerId($fid);
while($row=mysqli_fetch_assoc($getUrl)) {
    $urlgambar = $row['link'];
    if(hapusGambar($fid)){
        //jika proses hapus konten berhasil, maka dilanjutkan dengan hapus file gambar dari folder gambar
        $urlgambar = '../gambar/'.basename($urlgambar);
        chown($urlgambar, 666);
            if (unlink($urlgambar)) {
            echo '<script>window.location="'.$adminurl.'"</script>';
            } else {
            echo "Gagal hapus gambar dari folder gambar";
            }
        }
     else {
        echo "Terjadi kesalahan saat menghapus data";
    }
}
 
