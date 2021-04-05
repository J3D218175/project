<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Lampiran</h1>
            </div>
        </div>
 
        <div class="form-group">
        <form action="" method="post" enctype="multipart/form-data" id="cb">
                <label for="artikel">Artikel:</label>
                <select name="artikel" class="form-control" id="artikel">
                    <option value="" selected="">--Pilih Artikel--</option>
                    <?php
                    $dataartikel= getAllArtikel();
                    while($row=mysqli_fetch_assoc($dataartikel)) {
                        ?>
                        <option value="<?=$row['id_konten'];?>"><?=$row['judul'];?></option>
                        <?php } ?>
                    </select>
            </div>
            <button name="ok" value="oke"class="btn btn-default">OK</button>            
            </form>
            <br>
            <br>

<?php

if(isset($_POST['ok'])){
    $id_konten    = $_POST['artikel'];

    $tes = jumlahLampiranPerID($id_konten);
    if ($tes > 0){
        ?>

        <table class="table table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th style="text-align:center;">No</th>
                    <th style="text-align:center;">Judul Artikel</th>
                    <th style="text-align:center;">Gambar Lampiran</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan      = 1;
                $lampiran = GetLampiranPerId($id_konten);
                while($row=mysqli_fetch_assoc($lampiran)){
                ?>
                <tr>
                    <td><?=$urutan++;?></td>
                    <td><?=$row['judul'];?></td>
                    <td><img height="100px" width="100px" src="<?=$row['link'];?>"></td>
                    <td> <a href="<?=$adminurl;?>index.php?p=hapus-lampiran&id_lampiran=<?=$row['id_lampiran'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
    }
    ?>
                    <div id="wrap-lampiran">
                        <br>
                        <div id="lampiran">
                        <form action="" method="post" enctype="multipart/form-data" id="cb">
                            <div id="form_lampiran">
                                <label for="lampiran">Lampiran:</label>
                                <input type="file" class="form-control" name="lampiran"><br>
                                <input type="hidden" name="id_konten" value="<?php echo $id_konten?>">
                            </div>
                        </div>
                        <button type="submit" name="submit" id="upload_lampiran" class="btn btn-default">Tambahkan Lampiran</button>
                        </div>
            </div>
        </div>
<?php
}



$error = '';
if(isset($_POST['submit'])){
    $id_konten    = $_POST['id_konten'];
    $namafile = $_FILES['lampiran']['name'];
    $pindah   = $_FILES['lampiran']['tmp_name'];
    $folder   = "../gambar/";
    $lokbaru  = $folder.basename($namafile);
    $gagal    = $_FILES['lampiran']['error'];
 
    if(!empty(trim($namafile))){
        if(tambahLampiran($id_konten,  $pindah, $lokbaru)){
            echo '<script>window.location="'.$adminurl.'index.php?p=lampiran"</script>';
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }
 
    }else{
        $error = 'data penting wajib diisi';
    }
 
}

?>