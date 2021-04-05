<?php

$error = '';
if(isset($_POST['submit'])){
    $isi = $_POST['isi'];
    $user_id = '001';
    $create = fopen("wroteBy".$user_id."on".date("Ymd-H:i:s").".txt","w+")  or die("Unable to open file!");
    fwrite($create,$isi);
    
}
?>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="isi">Isi:</label>
                    <textarea name="isi" class="form-control" id="isi" placeholder="Isi artikel"></textarea>
                </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Tambah Artikel</button>
                </form>