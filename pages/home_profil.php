<div class="table-responsive">
		<table  class="table" align="center" border="1" style="border-collapse: collapse" bgcolor="green" bordercolor="black" cellpadding="15">
			<tr>
				<th scope="col" align="center">
					No.
				</th>
				<th scope="col" align="center">
					Nama
				</th>
				<th scope="col" align="center">
					Jabatan
				</th>
				<th scope="col" align="center">
					Universitas
				</th>
				<th scope="col" align="center">
					Instagram
				</th>
				<th scope="col" align="center">
					Foto Profil
				</th>
			</tr>
<?php 
				$batas = 3;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = TampilkanSemuaAnggota();
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$nomor = $halaman_awal+1;
                $dataAnggota = TampilkanSemuaAnggotaPaging($halaman_awal, $batas);
                while($row=mysqli_fetch_assoc($dataAnggota)){
                    echo '<tr scope="row">
                        <td align="center">
                            '.$nomor++.'
                        </td>
                        <td align="center">
                            '.$row["nama"].'
                        </td>
                        <td align="center">
                            '.$row["jabatan"].'
                        </td>
                        <td align="center">
                            '.$row["universitas"].'
                        </td>
                        <td align="center">
                            '.$row["instagram"].'
                        </td>
                        <td align="center">
                            <img height="250px" width="250px" src="'.$row["gambar"].'">
                        </td>
                    </tr>';
                }
                ?>
                </table>
		<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>