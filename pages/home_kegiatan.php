<div class="main">
<?php 
				$batas = 4;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = TampilkanSemuaArtikel();
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$nomor = $halaman_awal+1;
                $dataArtikel = TampilkanSemuaArtikelByKategoriPaging($halaman_awal, $batas);
                while($row=mysqli_fetch_assoc($dataArtikel)){
                ?>
                <div class="article">
                    <div class="art-title">
                        <p class="p1"><?=$row['judul'];?></p>
                        <p class="p2"><?=$row['date'];?></p>
                    </div>
                    <div class="art-main">
                        <img class="pict" src="<?=$row['gambar'];?>" width="268.19px" height="300px">
                        <p class="art-spo"><?=excerpt($row['isi']);?></p>
                        <a class="art-more" href="<?=$baseurl;?>index.php?p=artikel&id=<?=$row['id_konten'];?>">Lebih banyak</a>
                        <hr>
                    </div>
                </div>
                <?php } ?>
			</tbody>
		</table>
		<nav>
			<ul class="pagination justify-content-center" style="margin-bottom: 0px">
                <div class="<?php if($halaman > 1){ echo "art-nav"; }else{echo "art-nav-dead";}?>">
                    <li class="art-nav">
                        <a class="art-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Kembali</a>
                    </li>			
                </div>
                <div class="<?php if($halaman < $total_halaman){ echo "art-nav"; }else{echo "art-nav-dead";}?>">
                    <li class="art-nav">
                        <a class="art-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Lanjut</a>
                    </li>
                </div>
			</ul>
        </nav>