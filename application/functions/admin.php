<?php


//function untuk menampilkan semua kategori dari database
function getAllKategori() {
    $query = "SELECT * FROM kategori ORDER BY nm_kategori ASC";
    return result($query);
}
 
//function untuk menampilkan kategori dari database berdasarkan id kategori
function getKategoriPerId($id) {
    $query = "SELECT * FROM kategori WHERE id_kategori='$id'";
    return result($query);
}
 
//function untuk menambahkan kategori kedalam database
function tambahKategori($kategori){
    $query = "INSERT INTO kategori(nm_kategori) VALUES('$kategori')";
    return run($query);
}
 
//function untuk menghapus kategori dari database
function hapusKategori($id){
    $query = "DELETE FROM kategori WHERE id_kategori='$id'";
    return run($query);
}
 
//function untuk mengupdate data kategori
function updateKategori($id, $kategori){
    $query = "UPDATE kategori SET nm_kategori='$kategori' WHERE id_kategori='$id'";
    return run($query);
}
function cek_data($nama, $pass){
    $nama = escape($nama);
    $pass = escape($pass);
    // $pass = md5($pass);
    $query = "SELECT * FROM users WHERE username='$nama' AND password='$pass'";
    global $link;
 
    if($result = mysqli_query($link, $query)){
        if(mysqli_num_rows($result) != 0) return true;
        else return false;
    }
}
 
function getUserData($username) {
    $username = escape($username);
    $query = "SELECT * FROM users WHERE username='$username'";
    return result($query);
}


//function untuk menambahkan artikel kedalam database
function tambahArtikel($user_id, $judul, $tanggal, $kategori, $isi, $file, $tempat){
    //move_uploaded_file berguna untuk mengupload gambar dari form kedalam folder gambar
    move_uploaded_file($file,$tempat);
    //str_replace berguna untuk mengganti nama ../ menjadi url web kita
    $baseurl = 'http://localhost/project/';
    $adminurl = 'http://localhost/project/admin/';

    $tempat = str_replace('../', $baseurl, $tempat);
    $judul  = escape($judul);
    $isi = escape($isi);
    $query  = "INSERT INTO konten (id_user, id_kategori, judul, date, gambar, isi) VALUES ('$user_id', '$kategori', '$judul', '$tanggal', '$tempat', '$isi')";
    return run($query);
}
 
 
//function untuk memperbarui artikel database
function updateArtikel($id_konten, $judul, $tanggal, $kategori, $isi, $file, $tempat, $url){
    //jika file kosong maka akan dilakukan upload file
    $baseurl = 'http://localhost/project/';
    $adminurl = 'http://localhost/project/admin/';
    if(!empty($file)){
        move_uploaded_file($file,$tempat);
        $tempat = str_replace('../', $baseurl, $tempat);
    } else {
        //jika file gambar masih ada, maka value variabel $tempat sama dengan value dari variabel $url
        $tempat = $url;
    }
    $judul  = escape($judul);
    $isi = escape($isi);
    $query  = "UPDATE konten SET id_kategori='$kategori' , judul='$judul', gambar='$tempat', isi='$isi' WHERE id_konten='$id_konten'";
    return run($query);
}
 
//menampilkan artikel berdasarkan idnya
function getArtikelPerId($id){
    $query = "SELECT * FROM konten a INNER JOIN kategori b ON a.id_kategori = b.id_kategori WHERE a.id_konten = '$id'";
    return result($query);
}
 
 
//menampilkan semua artikel
function getAllArtikel(){
    $query = "SELECT * FROM konten a INNER JOIN users b ON a.id_user = b.id_user INNER JOIN kategori c ON a.id_kategori = c.id_kategori ORDER BY a.id_konten DESC";
    return result($query);
}
 
//menghapus artikel
function hapusArtikel($id) {
    $query = "DELETE FROM konten WHERE id_konten='$id'";
    return run($query);
}

//function untuk menambahkan anggota kedalam database
function tambahAnggota($nama, $jabatan, $universitas, $ttl, $alamat, $file, $tempat, $divisi){
    //move_uploaded_file berguna untuk mengupload gambar dari form kedalam folder gambar
    move_uploaded_file($file,$tempat);
    //str_replace berguna untuk mengganti nama ../ menjadi url web kita
    $baseurl = 'http://localhost/project/';
    $adminurl = 'http://localhost/project/admin/';
    $tempat = str_replace('../', $baseurl, $tempat);
    $nama  = escape($nama);
    $jabatan = escape($jabatan);
    $query  = "INSERT INTO anggota (nama, jabatan , universitas, ttl, alamat, gambar, divisi) VALUES ('$nama', '$jabatan', '$universitas', '$ttl', '$alamat', '$tempat', '$divisi')";
    return run($query);
}
 
 
//function untuk memperbarui data anggota
function updateAnggota($id, $nama, $jabatan, $universitas, $ttl, $alamat, $divisi){
    $nama  = escape($nama);
    $jabatan = escape($jabatan);
    $query  = "UPDATE anggota SET nama='$nama' , jabatan='$jabatan', universitas ='$universitas', ttl='$ttl', alamat='$alamat', divisi='$divisi' WHERE id='$id'";
    return run($query);
}
 
 //menampilkan artikel berdasarkan idnya
function getAnggotaPerId($id){
    $query = "SELECT * FROM anggota WHERE id = '$id'";
    return result($query);
}

//menampilkan semua anggota
function getAllAnggota(){
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    return result($query);
}
 
//menghapus anggota
function hapusAnggota($id) {
    $query = "DELETE FROM anggota WHERE id='$id'";
    return run($query);
}

function tambahStruktur($tabel, $nama, $jabatan){
    $nama  = escape($nama);
    $jabatan = escape($jabatan);
    $query = "INSERT INTO $tabel (nama, jabatan) VALUES ('$nama', '$jabatan')";
    return run($query);
}

function updateStruktur($tabel, $nama, $jabatan){
    $nama  = escape($nama);
    $jabatan = escape($jabatan);
    $query = "UPDATE $tabel SET nama='$nama', jabatan='$jabatan'";
    return run($query);
}

function getStruktur($tabel){
    $query = "SELECT * FROM $tabel ORDER BY id DESC";
    return result($query);    
}

function getStrukturById($tabel, $id){
    $query = "SELECT * FROM $tabel WHERE id = '$id'";
    return result($query);    
}

function delStruktur($tabel,$id){
    $query = "DELETE FROM $tabel WHERE id='$id'";
    return run($query);
}

function getTanggal($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
            );
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

//function untuk menambahkan gambar kedalam database
function tambahGambar($judul, $file, $tempat){
    //move_uploaded_file berguna untuk mengupload gambar dari form kedalam folder gambar
    move_uploaded_file($file,$tempat);
    //str_replace berguna untuk mengganti nama ../ menjadi url web kita
    $baseurl = 'http://localhost/project/';
    $adminurl = 'http://localhost/project/admin/';    
    $judul = escape($judul);
    $tempat = str_replace('../', $baseurl, $tempat);
    $query  = "INSERT INTO galeri (judul, link) VALUES ('$judul','$tempat')";
    return run($query);
}

//menampilkan semua gambar
function getAllGambar(){
    $query = "SELECT * FROM galeri ORDER BY fid DESC";
    return result($query);
}

function getGambarPerId($fid){
    $query = "SELECT * FROM galeri WHERE fid = '$fid'";
    return result($query);
}
 
function hapusGambar($fid) {
    $query = "DELETE FROM galeri WHERE fid='$fid'";
    return run($query);
}

function jumlahGambar(){
    $query = "SELECT COUNT(*) AS total FROM galeri";
    $jmlh = result($query);
    $totalgambar = $jmlh->fetch_assoc();
    return $totalgambar['total'];
}

//function untuk menambahkan gambar kedalam database
function tambahLampiran($id_konten, $file, $tempat){
    //move_uploaded_file berguna untuk mengupload gambar dari form kedalam folder gambar
    move_uploaded_file($file,$tempat);
    //str_replace berguna untuk mengganti nama ../ menjadi url web kita
    $baseurl = 'http://localhost/project/';
    $adminurl = 'http://localhost/project/admin/';    
    $tempat = str_replace('../', $baseurl, $tempat);
    $query  = "INSERT INTO lampiran (id_konten, link) VALUES ('$id_konten','$tempat')";
    return run($query);
}

//menampilkan semua gambar
function getLampiranId($id_lampiran){
    $query = "SELECT * FROM lampiran WHERE id_lampiran = '$id_lampiran'";
    return result($query);
}

function getLampiranPerId($id_konten){
    $query = "SELECT a.*, b.judul FROM lampiran a INNER JOIN konten b ON a.id_konten = b.id_konten WHERE a.id_konten = '$id_konten'";
    
    return result($query);
}
 
function hapusLampiran($id_lampiran) {
    $query = "DELETE FROM lampiran WHERE id_lampiran='$id_lampiran'";
    return run($query);
}

function jumlahLampiranPerID($id_konten){
    $query = "SELECT COUNT(*) AS total FROM lampiran WHERE id_konten='$id_konten'";
    $jmlh = result($query);
    $totallampiran = $jmlh->fetch_assoc();
    return $totallampiran['total'];
}
?>