<?
$user_id= '001';
if(isset($_POST['submit'])){
    $isi = $_POST['isi'];
}    
function tambahArtikel($user_id, $isi){
    $articleName = 'wroteBy'.$user_id.'on'.date("Ymd-H:i:s");
    $urlartikel = $baseurl.'artikel/'.$articleName;
    $isi = escape($isi);
    $save = file_put_contents($urlartikel,$isi, FILE_APPEND | LOCK_EX);
    echo $save;
}

$run = tambahArtikel($user_id, $isi);?>