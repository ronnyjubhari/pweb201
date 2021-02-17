<div class="container">
<h3 class="center-align" style="color:black;margin-top:50px;"><?= $judul?></h3>
<hr style="color:red;">
<div class="row">
  <div class="col m2 s12">
    <h6 class="center-align" style="color:red;"><?= $title ?></h6>
    <br>
    <ul>
      <?php foreach ($kota as $k): ?>
        <li>
          <a class="red-text text-accent-4" href="<?= base_url() ?>wisata/<?= $k['City'] ?>"> <?= $k['nama_kota'] ?></a>
          <hr style="width:100%;margin-left:-10px;color:red">
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col m10 s12">
    <table>
      <thead style="font-weight:bold;">
        <th class="center-align">Nama Wisata</th>
        <th class="center-align">Lokasi</th>
        <th class="center-align">Operasional</th>
        <th class="center-align">Tiket</th>
        <th class="center-align">Fasilitas</th>
        <th class="center-align">Deskripsi</th>
      </thead>
      <tbody>
        <?php foreach ($wisata as $wisataa): ?>
          <tr>
            <td><?= $wisataa['nama_wisata'] ?></td>
            <td><?= $wisataa['lokasi'] ?></td>
            <td><?= $wisataa['operasional'] ?></td>
            <td><?= $wisataa['tiket'] ?></td>
            <td><?= $wisataa['fasilitas'] ?></td>
            <td><?= $wisataa['deskripsi'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
