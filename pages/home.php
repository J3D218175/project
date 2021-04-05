<?php
$glr = TampilkanGaleri();
$i = 1;
while($row=mysqli_fetch_assoc($glr)){
    ${'link'.$i} = $row['link'];
    ${'title'.$i} = $row['judul'];
    $i++;

}


?>

<!-- Slideshow container -->
<div class="main-lp">
        <div class="galeri">
            <p>Galeri:</p>
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <?php
                $s = 1;
                $i--;
                while($s<=$i){
                ?>
                <div class="mySlides">
                <?php if(isset($link2)){?><div class="numbertext"><?php echo $s;?> / <?php echo $i;?></div><?php } ?>
                    <img src="<?php echo ${'link'.$s};?>" width="547px" height="365px">
                    <div class="boxtext">
                        <div class="text"><?php echo ${'title'.$s};?></div>
                    </div>
                    </div>
                <?php 
                $s++;               
                }
                if (isset($link2)){
                ?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <div style="text-align:center">
                <?php
                $d = 1;
                while($d<=$i){
                ?>
                <span class="dot" onclick="currentSlide(<?php echo $d;?>)"></span>
                <?php 
                $d++;               
                }
                ?>
                </div>
                <?php }?>
                </div> 
            </div>
            <br>

        <!-- The dots/circles -->

        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }
    </script>

    <div class="rightside">
        <p class="p1">Selamat Datang di Website HMKI</p>
        <p class="p2" id="exp">HMKI adalah organisasi mahasiswa asal Kuningan yang menghimpun mahasiswa yang
sedang melakukan study di wilayah negara Indonesia.</p>
        <a class="slk" href="profil.php">Selengkapnya</a>
    </div>

    <div class="slicer">
        <div class="slicermain">Kegiatan</div>
    </div>
    <div class="wrap-kg">
        <?php
            $tgm = TampilkanGambar();
            $count = 1;
            while($row=mysqli_fetch_assoc($tgm)){
                ${'gambar'.$count} = $row['gambar'];
                ${'title'.$count}  = $row['judul'];
                ${'date'.$count}   = $row['date'];
                ${'id'.$count}     = $row['id_konten'];
                $count++;
            }
            $totalartikel = jumlahArtikel();
                $batas = 3;
                
                if($totalartikel > $batas){
                    $limit = $batas+1;
                }
                else{

                    $limit = $totalartikel+1;
                }
                $event_list = 1;
                while ($event_list < $limit) {
                    ?>
                     <div class="kegiatan">
                        <div class="kegiatan-pict">
                            <img src="<?php echo ${'gambar'.$event_list};?> " width="371px" height="415px">
                        </div>
                        <a class="kegiatan-kgname" href="<?=$baseurl;?>index.php?p=artikel&id=<?php echo ${'id'.$event_list};?>">
                            <p class="kg-title"><?php echo ${'title'.$event_list};?></p>
                            <p class="kg-date"><?php echo ${'date'.$event_list};?></p>
                        </a>
                    </div>
                    <?php
                    $event_list++;
                }
        ?>

        <div class = "kegiatan-more">
          <a class = "kegiatan-link" href = "kegiatan.php" >Selengkapnya</a>
        </div>
    </div>