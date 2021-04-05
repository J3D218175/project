<?php
$i_head = array('Pengurus HMKI', 'HMKI Bidang Internal', 'HMKI Bidang Hub. Antar Lembaga', 'HMKI Bidang Pendidikan dan Budaya', 'HMKI Bidang Sosial dan Kepemudaan', 'HMKI Bidang Komunikasi dan Informasi', 'Pengurus Istimewa (Internal)');

?>
    <div class="main">
    <div class="struktur-container">
                <?php
                $p = 0;
                while ($p <7){
                    ?>
        <div class="struktur-wrapper"><a class="struktur-divisi" href="<?=$baseurl;?>index.php?p=home_div&id=<?php echo $p?>">
		    <table  class="struktur-table" border="1" bordercolor="black" cellpadding="15">
            <?php        echo '<h4 align="center">'.$i_head[$p].'</h4>';?>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                    </tr>
                <?php
                        $urutan       = 1;
                        $dataKategori = TampilkanAnggotaByDivisi($i_head[$p]);
                        while($row=mysqli_fetch_assoc($dataKategori)){
                        ?>
                        <tr>
                            <td><?=$urutan++;?></td>
                            <td><?=$row['nama'];?></td>
                            <td><?=$row['jabatan'];?></td>
                        </tr>
                    <?php }?>
                </table> </a>
            </div>
                <?php
                $p++;
                } ?>
    </div>