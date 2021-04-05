<?php

$no_div = $_GET['id'];
$no_array = array('0','1','2','3','4','5','6');
$i_head = array('Pengurus HMKI', 'HMKI Bidang Internal', 'HMKI Bidang Hub. Antar Lembaga', 'HMKI Bidang Pendidikan dan Budaya', 'HMKI Bidang Sosial dan Kepemudaan', 'HMKI Bidang Komunikasi dan Informasi', 'Pengurus Istimewa (Internal)');

?>

<div class="main">
    <div class="cont-header">
        <?php
        $count = 0;
        while ($count<7){
            if ($no_array[$count] == $no_div){?>
                <h1><?php echo $i_head[$count]?></h1>
                </div>
                <div class="div-group">
                <?php
                $struktur = TampilkanAnggotaByDivisi($i_head[$no_array[$count]]);
                while($row=mysqli_fetch_assoc($struktur)){
                    $nama         = $row['nama'];
                    $jabatan      = $row['jabatan'];
                    $universitas  = $row['universitas'];
                    $ttl          = $row['ttl'];
                    $alamat       = $row['alamat'];
                    $gambar       = $row['gambar'];
                    $divisi       = $row['divisi'];
                    ?>
                    <div class="div-data">
                        <div class="div-title">
                            <?php echo $jabatan?>
                        </div>    
                        <div class="div-member">
                            <img src="<?php echo $gambar;?>">
                            <div class="details">
                                <h4><?php echo $nama; ?></h4>
                                <p><?php echo $ttl;?></p>
                                <p><?php echo $alamat;?></p>
                                <br>
                                <p><?php echo $universitas;?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            $count++;
        }

        ?>
    </div>