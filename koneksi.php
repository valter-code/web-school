<?php
    //Untuk koneksi ke DB, harap ganti sesuai kredensial DB kalian
    $koneksi = mysqli_connect("localhost","root","","sekolah_db");


    //KODE DIBAWAH INI ADALAH FUNCTION DARI BERBAGAI FITUR, MOHON JANGAN DI UBAH KECUALI ANDA MENGERTI

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

    function totalAdmin(){
        global $koneksi;
        $query = "SELECT id FROM admin";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        return mysqli_num_rows($result);
    }

    function totalGuru(){
        global $koneksi;
        $query = "SELECT id_guru FROM guru";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        return mysqli_num_rows($result);
    }

    function totalSiswa(){
        global $koneksi;
        $query = "SELECT id_siswa FROM siswa";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        return mysqli_num_rows($result);
    }

    function totalBerita(){
        global $koneksi;
        $query = "SELECT id FROM berita";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        return mysqli_num_rows($result);
    }


    //tambah siswa
    function tambahSiswa(){
        global $koneksi;
        $nama = $_POST["nama_siswa"];
        $jurusan = $_POST["jurusan_siswa"];
        $password = $_POST["password_siswa"];

        //query
        $query = "INSERT INTO siswa VALUES ('', '$nama', '$jurusan', '$password')";
        $result = mysqli_query($koneksi, $query);
        return mysqli_affected_rows( $koneksi );
    }

    //function delete
    function deleteSiswa( $id ){
        global $koneksi;
        $query = "DELETE FROM siswa WHERE id_siswa = ?";
        $statement = mysqli_prepare( $koneksi, $query );
        mysqli_stmt_bind_param( $statement,"i", $id );
        mysqli_stmt_execute( $statement );
        return mysqli_affected_rows( $koneksi );
    }

    function tambahBerita(){
        global $koneksi;
        $judul = mysqli_real_escape_string($koneksi, $_POST["judul_berita"]);
        $isi = mysqli_real_escape_string($koneksi, $_POST["isi_berita"]);
        $penulis = mysqli_real_escape_string($koneksi, $_POST["penulis"]);
        $date = date('d-m-Y');
        
        $gambar = upload();
        if(!$gambar){
            return false;
        }
        
        //queury
        $query = "INSERT INTO berita VALUES ('', '$judul', '$isi', '$penulis', '$date', '$gambar')";
        mysqli_query( $koneksi, $query );
        return mysqli_affected_rows( $koneksi );

    }

    function upload(){
        global $koneksi;
        $nameGambar = $_FILES["gambar_berita"]["name"];
        $sizeGambar = $_FILES["gambar_berita"]["size"];
        $tmpName = $_FILES["gambar_berita"]["tmp_name"];
        $error = $_FILES["gambar_berita"]["error"];

        if($error == 4){
            echo "<script>alert('Masukan gambar terlebih dahulu');</script>";
            return false;
        }

        //cek ekstensi file
        $ekstensiValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode(".", $nameGambar);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar, $ekstensiValid)){
            echo "<script>alert('Ekstensi tidak valid');</script>";
            return false;
        }

        //cek size
        if($sizeGambar > 2000000){
            echo "<script>alert('Size terlalu besar');</script>";
            return false;
        }

        //lolos pengcekan
        move_uploaded_file( $tmpName, "../img-berita/" . $nameGambar );
        return $nameGambar;
    }

    function deleteBerita($id){
        global $koneksi;
        $query = "DELETE FROM berita WHERE id = ?";
        $statement = mysqli_prepare( $koneksi, $query );
        mysqli_stmt_bind_param( $statement,"i", $id );
        mysqli_stmt_execute( $statement );
        return mysqli_affected_rows( $koneksi );
    }
?>