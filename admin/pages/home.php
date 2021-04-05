<div id="page-wrapper">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Galeri</h1>
                </div>
            </div>

<?php
$error = '';
if(isset($_POST['submit'])){
    $judul    = $_POST['judul'];
    $namafile = $_FILES['gambar']['name'];
    $pindah   = $_FILES['gambar']['tmp_name'];
    $folder   = "../gambar/";
    $lokbaru  = $folder.basename($namafile);
    $gagal    = $_FILES['gambar']['error'];
 
    if(!empty($namafile) && !empty($judul)){
        $tes = jumlahGambar();
        if ($tes >= 6){
            $error = '<script>alert("Galeri sudah mencapai batas, silahkan hapus gambar lain terlebih dahulu")</script>';
        }
        else{
            if(tambahGambar($judul, $pindah, $lokbaru)){
                echo '<script>window.location="'.$adminurl.'"</script>';
            } else {
                $error = 'ada masalah saat menambah data '.mysqli_error($link);
            }
        }
 
    }else{
        $error = 'gambar wajib diisi';
    }
 
}
?>

        <table class="table table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Judul</th>
                    <th style="text-align:center;">Gambar</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan      = 1;
                $galeri = GetAllGambar();
                while($row=mysqli_fetch_assoc($galeri)){
                ?>
                <tr>
                    <td><?=$urutan++;?></td>
                    <td><?=$row['judul'];?></td>
                    <td><img height="100px" width="100px" src="<?=$row['link'];?>"></td>
                    <td> <a href="<?=$adminurl;?>index.php?p=hapus-gambar&fid=<?=$row['fid'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Judul Gambar:</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>

                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
 
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Tambah Gambar</button>
            </form>
 
        </div>
    </div>