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
    
?>