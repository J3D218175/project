<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Anggota</h1>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Universitas</th>
                    <th>Tempat, Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Gambar</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $urutan      = 1;
                $dataAnggota = GetAllAnggota();
                while($row=mysqli_fetch_assoc($dataAnggota)){
                ?>
                <tr>
                    <td><?=$urutan++;?></td>
                    <td><?=$row['nama'];?></td>
                    <td><?=$row['jabatan'];?></td>
                    <td><?=$row['universitas'];?></td>
                    <td><?=$row['ttl'];?></td>
                    <td><?=$row['alamat'];?></td>
                    <td><img height="100px" width="100px" src="<?=$row['gambar'];?>"></td>
                    <td><?=$row['divisi'];?></td>
                    <td> <a href="<?=$adminurl;?>index.php?p=hapus-anggota&id=<?=$row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a><br><br><a href="<?=$adminurl;?>index.php?p=edit-anggota&id=<?=$row['id'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

