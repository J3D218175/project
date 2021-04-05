<?php
$error = '';
$i_head = array('Pengurus HMKI', 'HMKI Bidang Internal', 'HMKI Bidang Hub. Antar Lembaga', 'HMKI Bidang Pendidikan dan Budaya', 'HMKI Bidang Sosial dan Kepemudaan', 'HMKI Bidang Komunikasi dan Informasi', 'Pengurus Istimewa (Internal)');
if(isset($_POST['submit'])){
    $nama    = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $ttl     = $_POST['ttl'];
    $alamat  = $_POST['alamat'];
    $universitas      = $_POST['universitas'];
    $namafile = $_FILES['gambar']['name'];
    $pindah   = $_FILES['gambar']['tmp_name'];
    $folder   = "../gambar/";
    $lokbaru  = $folder.basename($namafile);
    $gagal    = $_FILES['gambar']['error'];
    $divisi   = $_POST['divisi'];
 
    if(!empty(trim($nama)) && !empty(trim($jabatan)) && !empty(trim($universitas)) && !empty(trim($divisi))){
        if(tambahAnggota($nama, $jabatan, $universitas, $ttl, $alamat, $pindah, $lokbaru, $divisi)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-anggota"</script>';
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }
 
    }else{
        $error = 'data penting wajib diisi';
    }
 
}
?>
 
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Anggota</h1>
            </div>
        </div>
 
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$userdata['id'];?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
 
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            
            <div class="form-group">
                <label for="universitas">Universitas:</label>
                <input type="text" class="form-control" id="universitas" name="universitas">
            </div>

            <div class="form-group">
                <label for="ttl">Tempat, Tanggal Lahir:</label>
                <input type="text" class="form-control" id="ttl" name="ttl">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>

            <div class="form-group">
                <label for="divisi">Divisi:</label>
                <select name="divisi" class="form-control" id="divisi">
                    <option value="" selected="">--Pilih Divisi Anggota--</option>
                    <?php
                    $datastruktur = getClass();
                    $count = 0;
                    while($row=mysqli_fetch_assoc($datastruktur)) {
                        ?>
                        <option value="<?php echo $i_head[$count];?>"><?=$row['jabatan'];?></option>
                        <?php $count++; } ?>
                    </select>
            </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Tambah Anggota</button>
            </form>
 
        </div>
    </div>