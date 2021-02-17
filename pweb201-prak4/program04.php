<?php
  ini_set('display errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);

  require_once("Daftar_mahasiswa.php");
  require_once("Daftar_dosen.php");
  require_once("Mahasiswa.php");
  require_once("Dosen.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>Program 04</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col8">
          <?php
            if ( isset($_GET['nim'])){
              // pembentukan object $mahasiswa dari class Mahasiswa
              // berdasarkan NIM
              $mahasiswa = new Mahasiswa($_GET['nim']);
           ?>

           <h1>Mahasiswa</h1>
           <table>
             <tr>
               <td class="field">NIM</td>
               <td class="data"><?= $mahasiswa->nim ?></td>
             </tr>
             <tr>
               <td class="field">Nama Lengkap</td>
               <td class="data"><?= $mahasiswa->nama ?></td>
             </tr>
             <tr>
               <td class="field">Jenis Kelamin</td>
               <td class="data"><?= $mahasiswa->jk['gender'] ?></td>
             </tr>
             <tr>
               <td class="field">E-mail</td>
               <td class="data"><?= $mahasiswa->email ?></td>
             </tr>
             <tr>
               <td class="field">Tanggal masuk</td>
               <td class="data"><?=date('d F Y',strtotime($mahasiswa->tanggalmasuk)) ?></td>
             </tr>
             <tr>
               <td class="field">Pembimbing Akademik</td>
               <td class="data"><?=$mahasiswa->dosen_pa->namaLengkap() ?></td>
             </tr>
           </table>
        </div>
        <?php } ?>

        <div class="col4">
          <h3>Mahasiswa dengan PA yang sama</h3>
          <table>
            <thead>
              <tr>
                <th>NIM</th>
                <th>Mahasiswa</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $listMhsByPA = $mahasiswa->getMahasiswaFromPA();

                  foreach($listMhsByPA as $mhs) {
                  $link = $_SERVER['PHP_SELF'].'?nim='.$mhs->nim;
              ?>

              <tr>
                <td class="text-center">
                  <a href="<?= $link ?>"><?=$mhs->nim ?>
                </td>
                <td>
                  <a href="<?= $link ?>"><?= $mhs->nama?>
                </td>
              </tr>
            </tbody>
          <?php } ?>
          </table>

        </div>
      </div>
    </div>

</body>
</html>
