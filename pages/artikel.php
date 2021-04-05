<?php
$id = $_GET['id'];
$dataArtikel = TampilkanArtikelPerId($id);
while($row=mysqli_fetch_assoc($dataArtikel)) {
    $judul  = $row['judul'];
    $tanggal= $row['date'];
    $author = $row['username'];
    $gambar = $row['gambar'];
    $isi    = $row['isi'];
    $kategori= $row['nm_kategori'];
}
$isi = nl2br(str_replace('  ', ' &nbsp;', htmlspecialchars($isi)));
?>
<div class="main">
    <div class="con-header">
        <h1><?=$judul;?></h1>
        <p class="con-date"><?=$tanggal;?></p>
    </div>
    <div class="midpic">
    	<img width="371px" height="415px" src="<?=$gambar;?>"><br>
	</div>
    <hr>
    <div class="art-content">
        <p class="art-content"><?=$isi;?></p>
    </div>

    <?php
$tes = jumlahLampiranID($id);
if ($tes > 0){
    $lmp = TampilkanLampiran($id);
    $i = 1;
    while($row=mysqli_fetch_assoc($lmp)){
        ${'link'.$i} = $row['link'];
        $i++;

    }


    ?>

    <!-- Slideshow container -->
            <div class="lampiran">
                <div class="lampiran-p">Lampiran: </div>
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
    <?php }?>
    <hr>