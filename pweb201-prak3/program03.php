<?php
  require_once("program03.data.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Program 03</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col6">
          <table rules="rows">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Mahasiswa</th>
              </tr>
            </thead>

            <tbody>
              <?php

              $listmhs = array();
              if (isset( $_GET['pa'])) {
                foreach ($mahasiswa as $mhspa) {
                  if ($mhspa[dosen_pa][nidn] == $_GET['pa']) {
                    $listmhs[] = $mhspa;
                  }
                }
              }
              else {
                $listmhs = $mahasiswa;
              }
              ?>

              <?php foreach ($listmhs as $mhs){
                $link = $_SERVER['PHP_SELF'] . '?nim=' . $mhs['nim'];
              ?>
                <tr>
                  <td class="text-center">
                    <a href="<?= $link ?>"><span><?= $mhs['nim'] ?></span></a>
                  </td>
                  <td>
                    <a href="<?= $link ?>"><span><?= $mhs['nama'] ?></span></a>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>

          <a class="posisi" href="<?php if(isset($_SERVER['HTTP_REFERER'])) {
            echo $_SERVER['HTTP_REFERER'];
          } ?>"><span>Kembali</span>
          </a>
        </div>

        <div class="col6">
            <?php
              if ( isset( $_GET['nim'] ) ) {
                foreach ($mahasiswa as $findmhs) {
                  if( $findmhs['nim'] == $_GET['nim'] ){
                    $find = $findmhs;
                    break;
                  }
                }
            ?>

          <table>
            <tr>
              <td class="field">N I M:</td>
              <td class="data"><?= $find['nim']?></td>
            </tr>
            <tr>
              <td class="field">Nama Lengkap:</td>
              <td class="data"><?= $find['nama']?></td>
            </tr>
            <tr>
              <td class="field">Jenis Kelamin:</td>
              
              <?php
              if($find['lp'] == 'L'){
                $find['lp'] = "Laki-Laki";
              }
              else if($find['lp'] == 'P'){
                $find['lp'] = "Perempuan";
              }
              ?>

              <td class="data"><?= $find['lp'] ?></td>
            </tr>
            <tr>
              <td class="field">E-mail:</td>
              <td class="data"><?= $find['email']?></td>
            </tr>
            <tr>
              <td class="field">Tanggal Masuk:</td>
              <td class="data"><?= $date = date('j F Y', strtotime($find['tanggal_masuk'])) ?></td>
            </tr>
            <tr>
              <td class="field">Pembimbing Akademik:</td>
              <td class="data">
                <a href="<?= $_SERVER['PHP_SELF'].'?pa='.$find['dosen_pa']['nidn'] ?>">
                  <span><?= $find['dosen_pa']['nama']. ", " . $find['dosen_pa']['gelar_depan'] . $find['dosen_pa']['gelar_belakang'] ?></span>
                </a>
              </td>
            </tr>
          <?php } ?>
        </table>
        </div>

      </div>
    </div>
  </body>
</html>
