<?php
    $koneksi = mysqli_connect("localhost","root","","sekolah_db");

    //function query
    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //fitur hapus siswa
    function delete($id_siswa){
        global $koneksi;
        $query = "DELETE FROM siswa WHERE id_siswa = ?";
        $statement = mysqli_prepare( $koneksi, $query);
        mysqli_stmt_bind_param( $statement,"i", $id_siswa);
        mysqli_stmt_execute($statement);
        return mysqli_affected_rows( $koneksi );
    }

    //fitur hapus berita
    function delete_berita($id_berita){
        global $koneksi;
        $query = "DELETE FROM berita WHERE id = ?";
        $statement = mysqli_prepare( $koneksi, $query);
        mysqli_stmt_bind_param( $statement,"i", $id_berita);
        mysqli_stmt_execute($statement);
        return mysqli_affected_rows( $koneksi );
    }
    

    //function tambah siswa
    function tambahSiswa($data){
        global $koneksi;
        $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_siswa"]));
        $jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan_siswa"]));
        $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password_siswa"]));

        //enkripsi password
        // $password = password_hash($password, PASSWORD_DEFAULT);

        //query insert
        $query = "INSERT INTO siswa VALUES ('', '$nama', '$jurusan', '$password')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows( $koneksi );
    }

    //function tambah berita
    function tambahBerita($data){
        global $koneksi;
        $judul = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["judul_berita"]));
        $isi = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["isi_berita"]));
        $penulis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["penulis"]));
        $date = $_POST["date"];
        $gambar = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["gambar_berita"]));

        //query insert
        $query = "INSERT INTO berita VALUES ('', '$judul', '$isi', '$penulis', '$date', '$gambar')";
        mysqli_query( $koneksi, $query);
        return mysqli_affected_rows( $koneksi );
        
    }

    //function total admin
    function totalAdmin( $data ){
        global $koneksi;
        $query = "SELECT * FROM admin";
        $result = mysqli_query( $koneksi, $query );
        return mysqli_num_rows( $result );
    }

    //function total guru
    function totalGuru( $data ){
        global $koneksi;
        $query = "SELECT * FROM guru";
        $result = mysqli_query( $koneksi, $query );
        return mysqli_num_rows( $result );
    }

    //function total siswa
    function totalSiswa( $data ){
        global $koneksi;
        $query = "SELECT * FROM siswa";
        $result = mysqli_query( $koneksi, $query );
        return mysqli_num_rows( $result );
    }

    //function total berita
    function totalberita( $data ){
        global $koneksi;
        $query = "SELECT * FROM berita";
        $result = mysqli_query( $koneksi, $query );
        return mysqli_num_rows( $result );
    }
?>