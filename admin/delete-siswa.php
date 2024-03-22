<?php
    require("../koneksi.php");

    $id = $_GET["id_siswa"];
    if(deleteSiswa($id) > 0){
        echo "<script>alert('Berhasil Hapus Data Siswa!'); document.location.href = 'siswa.php'</script>";
        exit;
    }

?>