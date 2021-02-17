<div class="container">
<h3 class="center-align" style="color:black;margin-top:50px;"><?= $judul?></h3>
<hr style="color:red;">
<div class="row">
  <div class="col s3">
    <h6 class="center-align" style="color:red;"><?= $title ?></h6>
    <br>
    <ul>
      <?php
      for($l = 1; $l<= 12; $l++){
        ?>
        <li>
          <a class="red-text text-accent-4" href="<?= base_url() ?>guests/<?= $l ?>"> <?= date('F', mktime(0, 0, 0, $l, 10)) ?></a>
          <hr style="width:80%;margin-left:-10px;color:red;">
        </li>
      <?php
        }
       ?>
    </ul>
  </div>
  <div class="col s9">
    <table>
      <thead style="font-weight:bold;">
        <th class="center-align">Nama Tamu</th>
        <th class="center-align">Room</th>
        <th class="center-align">Type</th>
        <th class="center-align">Date In</th>
        <th class="center-align">Date Out</th>
        <th class="center-align">Negara</th>
      </thead>
      <tbody>
        <?php foreach ($guests as $guest): ?>
          <tr>
            <td><?= $guest['nama'] ?></td>
            <td><?= $guest['room'] ?></td>
            <td><?= $guest['rtype'] ?></td>
            <td><?= $guest['date_in'] ?></td>
            <td><?= $guest['date_out'] ?></td>
            <td><?= $guest['Country'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
