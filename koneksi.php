<?php
    $koneksi = mysqli_connect("localhost","root","","sekolah_db");
    
    //function daftar
    function daftar($data){
        global $koneksi;
        $username = $data["username"];
        $jurusan = $data["jurusan"];
        $password = $data["password"];
        $password2 = $data["password2"];


        //cek password
        if($password !== $password2){
            echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //query insert
        $query = "INSERT INTO siswa VALUES ('', '$username', '$jurusan', '$password')";
        mysqli_query( $koneksi, $query);
        return mysqli_affected_rows($koneksi);

    }
?>