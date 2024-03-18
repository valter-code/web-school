<?php
    require("../koneksi.php");
    
    $id_siswa = $_GET["id_siswa"];

    if(delete($id_siswa) > 0){
        echo "<script>alert('Berhasil Hapus data siswa!'); document.location.href = 'data-siswa.php'</script>";
    }else{
        echo "<script>alert('Gagal Hapus data siswa!'); document.location.href = 'data-siswa.php'</script>";
    }
?>