<?php
    $koneksi = mysqli_connect("localhost","root","","projekSekolah");

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

    //fitur hapus
    function delete($id_siswa){
        global $koneksi;
        $query = "DELETE FROM siswa WHERE id_siswa = $id_siswa";
        mysqli_query( $koneksi, $query);
        return mysqli_affected_rows( $koneksi );
    }
    
?>