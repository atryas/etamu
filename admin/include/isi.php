<?php

    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    if ($page == "pengguna") {
      if ($aksi == "") {
        include "page/pengguna/pengguna.php";
      }
      if ($aksi == "tambah") {
        include "page/pengguna/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/pengguna/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/pengguna/hapus.php";
      }
    }


    if ($page == "spk") {
      if ($aksi == "") {
        include "page/spk/spk.php";
      }
      
      
    }

    if ($page == "register") {
      if ($aksi == "") {
        include "page/register/register.php";
      }
      
      
    }

    if ($page == "tamu_peg") {
      if ($aksi == "") {
        include "page/tamu_peg/tamu_peg.php";
      }

      if ($aksi == "hapus") {
        include "page/tamu_peg/hapus.php";
      }

       if ($aksi == "keluar") {
        include "page/tamu_peg/keluar.php";
      }
      
      
    }

     if ($page == "qrtamu") {
      if ($aksi == "") {
        include "page/qrcode/index.php";
      }
      
      
    }

    if ($page == "cektamuumum") {
      if ($aksi == "") {
        include "page/qrcode/cektamuumum.php";
      }
      
      
    }

    

    
    
    if ($page == "tanya") {
      if ($aksi == "") {
        include "page/tanya/tanya.php";
      }
      
      if ($aksi == "ubah") {
        include "page/tanya/ubah.php";
      }
      
      
    }

    if ($page == "pegawai") {
      if ($aksi == "") {
        include "page/pegawai/pegawai.php";
      }
      if ($aksi == "tambah") {
        include "page/pegawai/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/pegawai/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/pegawai/hapus.php";
      }
    }

    if ($page == "text") {
      if ($aksi == "") {
        include "page/text/text.php";
      }
      if ($aksi == "tambah") {
        include "page/text/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/text/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/text/hapus.php";
      }
    }

    if ($page == "u_kerja") {
      if ($aksi == "") {
        include "page/u_kerja/u_kerja.php";
      }
      if ($aksi == "tambah") {
        include "page/u_kerja/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/u_kerja/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/u_kerja/hapus.php";
      }
    }

    if ($page == "tamu") {
      if ($aksi == "") {
        include "page/tamu/capture.php";
      }
      if ($aksi == "tambah") {
        include "page/tamu/tambah.php";
      }
      if ($aksi == "ubah") {
        include "page/tamu/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/tamu/hapus.php";
      }

    }

    if ($page == "d_tamu") {
      if ($aksi == "") {
        include "page/tamu/d_tamu.php";
      }
      if ($aksi == "detail") {
        include "page/tamu/detail.php";
      }
      if ($aksi == "ubah") {
        include "page/tamu/ubah.php";
      }
      if ($aksi == "hapus") {
        include "page/tamu/hapus.php";
      }

      if ($aksi == "keluar") {
        include "page/tamu/keluar.php";
      }

      if ($aksi == "upload") {
        include "upload.php";
      }

    }

    if ($page == profile) {
      if ($aksi == "") {
      include "page/profile/profile.php";
      }
    }

     if ($page == "") {
      include "home.php";
    }


 ?>
