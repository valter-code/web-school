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
        return mysqli_num_rows($result);
    }

    function totalGuru(){
        global $koneksi;
        $query = "SELECT id_guru FROM guru";
        $result = mysqli_query($koneksi, $query);
        return mysqli_num_rows($result);
    }

    function totalSiswa(){
        global $koneksi;
        $query = "SELECT id_siswa FROM siswa";
        $result = mysqli_query($koneksi, $query);
        return mysqli_num_rows($result);
    }

    function totalBerita(){
        global $koneksi;
        $query = "SELECT id FROM berita";
        $result = mysqli_query($koneksi, $query);
        return mysqli_num_rows($result);
    }


    //tambah siswa
    function tambahSiswa(){
        global $koneksi;
        $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_siswa"]));
        $jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan_siswa"]));
        $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password_siswa"]));
        $agama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["agama_siswa"]));
        $nis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nis_siswa"]));
        $nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn_siswa"]));
        $tempatLahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_siswa"]));
        $tanggalLahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_lahir_siswa"]));
        $kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelas_siswa"]));
        $gender = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["gender_siswa"]));

        if(isset($_FILES["gambar_siswa"]) && $_FILES["gambar_siswa"]["error"] !== 4){
            $gambar = uploadSiswa();

            if(!$gambar){
                return false;
            }
        }else{
            $gambar = "default-siswa.svg";
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //query
        $query = "INSERT INTO siswa VALUES ('', '$nama', '$jurusan', '$password', '$gender','$agama', '$nis', '$nisn', '$tempatLahir', '$tanggalLahir', '$gambar', '$kelas')";
        $result = mysqli_query($koneksi, $query);
        return mysqli_affected_rows( $koneksi );
    }

    //function edit siswa
    function editSiswa(){
        global $koneksi;
        $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_siswa"]));
        $jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan_siswa"]));
        $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password_siswa"]));
        $agama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["agama_siswa"]));
        $nis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nis_siswa"]));
        $nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn_siswa"]));
        $tempatLahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_siswa"]));
        $tanggalLahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_lahir_siswa"]));
        $kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelas_siswa"]));
        $gender = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["gender_siswa"]));

        if(isset($_FILES["gambar_siswa"]) && $_FILES["gambar_siswa"]["error"] !== 4){
            $gambar = uploadSiswa();

            if(!$gambar){
                return false;
            }
        }else{
            $gambar = "../src/img-siswa/default.JPG";
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        //query
        $query = "UPDATE siswa SET nama_siswa = '$nama', jurusan_siswa = '$jurusan', password_siswa = '$password', gender_siswa = '$gender', agama_siswa = '$agama', nis_siswa = '$nis', nisn_siswa '$nisn', tempat_lahir_siswa = '$tempatLahir', tanggal_lahir_siswa = '$tanggalLahir', gambar_siswa = '$gambar', kelas_siswa = '$kelas'";
        $result = mysqli_query($koneksi, $query);
        return mysqli_affected_rows( $koneksi );
    }

    function uploadSiswa(){
        global $koneksi;
        $nameFile = $_FILES["gambar_siswa"]["name"];
        $sizeFile = $_FILES["gambar_siswa"]["size"];
        $tmpName = $_FILES["gambar_siswa"]["tmp_name"];
        $error = $_FILES["gambar_siswa"]["error"];

        //cek ekstensi
        $ekstensiValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode(".", $nameFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiValid)){
            echo "<script>alert('ekstensi tidak valid')</script>";
            return false;
        }

        //cek size
        if($sizeFile > 2000000){
            echo "<script>alert('Ukuran terlalu besar')</script>";
            return false;
        }

        $newfileName = uniqid() . "." . $ekstensiGambar;
        move_uploaded_file($tmpName, "../src/img-siswa/" . $newfileName);
        return $newfileName;

    }

    //function delete
    function deleteSiswa( $id ){
        global $koneksi;

        $query = "SELECT foto_siswa FROM siswa WHERE id_siswa = ?";
        $statement = mysqli_prepare( $koneksi, $query );
        mysqli_stmt_bind_param( $statement,"i", $id );
        mysqli_stmt_execute( $statement );
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        if(file_exists("../src/img-siswa/" . $row["foto_siswa"])){
            unlink("../src/img-siswa/" . $row["foto_siswa"]);
        }

        $query = "DELETE FROM siswa WHERE id_siswa = ?";
        $statement = mysqli_prepare( $koneksi, $query );
        mysqli_stmt_bind_param( $statement,"i", $id );
        mysqli_stmt_execute( $statement );
        return mysqli_affected_rows( $koneksi );
    }

    function tambahBerita(){
        global $koneksi;
        $judul = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["judul_berita"]));
        $isi = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["isi_berita"]));
        $penulis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["penulis"]));
        $date = htmlspecialchars(mysqli_real_escape_string($koneksi, date('d-m-Y')));
        
        if(isset($_FILES["gambar_berita"]) && $_FILES["gambar_berita"]["error"] !== 4){
            $gambar = upload();
            
            if(!$gambar){
                return false;
            }
        }else{
            $gambar = "default.JPG";
        }
        
        //queury
        $query = "INSERT INTO berita VALUES (NULL, '$judul', '$isi', '$penulis', '$date', '$gambar')";
        mysqli_query( $koneksi, $query );
        return mysqli_affected_rows( $koneksi );

    }

    function upload(){
        global $koneksi;
        $nameGambar = $_FILES["gambar_berita"]["name"];
        $sizeGambar = $_FILES["gambar_berita"]["size"];
        $tmpName = $_FILES["gambar_berita"]["tmp_name"];
        $error = $_FILES["gambar_berita"]["error"];

        // if($error == 4){
        //     echo "<script>alert('Masukan gambar terlebih dahulu');</script>";
        //     return false;
        // }

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

        //ganti nama file
        $newnameFile = uniqid();
        $newnameFile .= ".";
        $newnameFile .= $ekstensiGambar;

        //lolos pengcekan
        move_uploaded_file( $tmpName, "../src/img-berita/" . $newnameFile );
        return $newnameFile;
    }

    function uploadAdmin($id){
        global $koneksi;
    
        // Unggah gambar baru
        $nameGambar = $_FILES["gambar_berita"]["name"];
        $sizeGambar = $_FILES["gambar_berita"]["size"];
        $tmpName = $_FILES["gambar_berita"]["tmp_name"];
        $error = $_FILES["gambar_berita"]["error"];
    
        // Pastikan gambar baru valid sebelum mengunggah
        if ($sizeGambar > 0 && $error === 0) {
            //cek ekstensi file
            $ekstensiValid = ["jpg", "jpeg", "png"];
            $ekstensiGambar = strtolower(pathinfo($nameGambar, PATHINFO_EXTENSION));
            if (!in_array($ekstensiGambar, $ekstensiValid)) {
                echo "<script>alert('Ekstensi tidak valid');</script>";
                return false;
            }
    
            //cek size
            if($sizeGambar > 2000000){
                echo "<script>alert('Size terlalu besar');</script>";
                return false;
            }
    
            //ganti nama file
            $newnameFile = uniqid() . "." . $ekstensiGambar;
    
            // Pindahkan gambar baru ke direktori tujuan
            move_uploaded_file($tmpName, "../src/img-admin/" . $newnameFile);
    
            // Update nama file gambar admin baru ke database
            $query = "UPDATE admin SET gambar_admin = ? WHERE id = ?";
            $statement = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($statement, "si", $newnameFile, $id);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
    
            return $newnameFile;
        }
    }
    

    function deleteBerita($id){
        global $koneksi;
        //hapus gambar
        $query = "SELECT * FROM berita WHERE id = ?";
        $statement = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($statement, "s", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $row = mysqli_fetch_assoc($result);
        if(file_exists("../src/img-berita/" . $row["gambar_berita"])){
            unlink("../src/img-berita/" . $row["gambar_berita"]);
        }


        $query = "DELETE FROM berita WHERE id = ?";
        $statement = mysqli_prepare( $koneksi, $query );
        mysqli_stmt_bind_param( $statement,"i", $id );
        mysqli_stmt_execute( $statement );
        return mysqli_affected_rows( $koneksi );
    }

    //function edit berita
    function editBerita(){
        global $koneksi;
        $id = $_POST["id"];
        $judul = htmlspecialchars(mysqli_real_escape_string( $koneksi, $_POST["judul_berita"]));
        $penulis = htmlspecialchars(mysqli_real_escape_string( $koneksi, $_POST["penulis"]));
        $isi = htmlspecialchars(mysqli_real_escape_string( $koneksi, $_POST["isi_berita"]));
    
        if(isset($_FILES["gambar_berita"]) && $_FILES["gambar_berita"]["error"] !== 4){
            $gambar = upload();

            if(!$gambar){
                return false;
            }
        }else{
            $query = "SELECT * FROM berita WHERE id = $id";
            $result = mysqli_query($koneksi, $query );
            $berita = mysqli_fetch_assoc($result);
            $gambar = $berita["gambar_berita"];
        }

        //query
        $query = "UPDATE berita SET judul_berita = '$judul', isi_berita = '$isi', penulis = '$penulis', gambar_berita = '$gambar' WHERE id = $id";
        mysqli_query( $koneksi, $query);

        return mysqli_affected_rows( $koneksi );
    }

    //function admin
    function gambarAdmin($koneksi, $username){
        $query = "SELECT gambar_admin FROM admin WHERE username_admin = ?";
        $statement = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_bind_result($statement, $gambarAdmin);
        mysqli_stmt_fetch($statement);
        return $gambarAdmin;
    }
?>