<?php
function result($query){
    global $link;
    if ($result = mysqli_query($link, $query) or die($query)){
        return $result;
    }
}
 
function run($query){
    global $link;
 
    if(mysqli_query($link, $query)) return true;
    else return false;
}
 
function excerpt($string){
    $string = substr($string, 0, 350);
    return $string . "...";
}
 
function escape($data){
    global $link;
    return mysqli_real_escape_string($link, $data);
}
function getClass(){
    $query = "SELECT * FROM jabatan ORDER BY id ASC";
    return result($query);
}
function ambilStruktur($tabel){
    $query = "SELECT * FROM $tabel ORDER BY id DESC";
    return result($query);    
}

function TampilkanSemuaKategori() {
    $query = "SELECT * FROM kategori ORDER BY nm_kategori ASC";
    return result($query);
}
 
function TampilkanArtikelPerId($id) {
    $query = "SELECT a.*, b.nm_kategori, c.username FROM konten a INNER JOIN kategori b ON a.id_kategori = b.id_kategori INNER JOIN users c ON a.id_user = c.id_user WHERE a.id_konten='$id'";
    return result($query);
}
 
function TampilkanSemuaArtikel() {
    $query = "SELECT * FROM konten ORDER BY id_konten DESC";
    return result($query);
}

function TampilkanSemuaArtikelPaging($halaman_awal, $batas) {
    $query = "SELECT * FROM konten ORDER BY id_konten DESC LIMIT $halaman_awal, $batas";
    return result($query);
}

function TampilkanSemuaArtikelByKategori($id) {
    $query = "SELECT * FROM konten WHERE id_kategori='$id' ORDER BY id_konten";
    return result($query);
}

function TampilkanSemuaArtikelByKategoriPaging($halaman_awal, $batas) {
    $query = "SELECT * FROM konten ORDER BY id_konten DESC LIMIT $halaman_awal, $batas";
    return result($query);
}

function TampilkanGambar(){
    $query = "SELECT id_konten, gambar, judul, date FROM konten ORDER BY id_konten DESC LIMIT 0,8";
    return result($query);
}

function TampilkanAnggotaPerId($id) {
    $query = "SELECT * FROM anggota WHERE id='$id'";
    return result($query);
}
 
function TampilkanSemuaAnggota() {
    $query = "SELECT * FROM anggota ORDER BY id ASC";
    return result($query);
}

function TampilkanAnggotaByDivisi($div){
    $query = "SELECT * FROM anggota WHERE divisi='$div'";
    return result($query);
}

function TampilkanSemuaAnggotaPaging($halaman_awal, $batas) {
    $query = "SELECT * FROM anggota ORDER BY id ASC LIMIT $halaman_awal, $batas";
    return result($query);
}

function TampilkanGaleri(){
    $query = "SELECT * FROM galeri ORDER BY fid DESC";
    return result($query);
}

function TampilkanLampiran($id_konten){
    $query = "SELECT * FROM lampiran WHERE id_konten = '$id_konten' ORDER BY id_lampiran DESC";
    return result($query);
}

function jumlahLampiranID($id_konten){
    $query = "SELECT COUNT(*) AS total FROM lampiran WHERE id_konten='$id_konten'";
    $jmlh = result($query);
    $totallampiran = $jmlh->fetch_assoc();
    return $totallampiran['total'];
}

function jumlahArtikel(){
    $query = "SELECT COUNT(*) AS jumlah FROM konten";
    $jmlh  = result($query);
    $totalartikel = $jmlh->fetch_assoc();
    return $totalartikel['jumlah'];
}
?>