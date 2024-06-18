<?php
    $konek = new mysqli("localhost", "root", "", "nwind");
    if($konek->connect_error){
        die('Maaf Koneksi Tidak Berhasil: '.$konek->connect_error);
    }
?>