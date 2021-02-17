<div class="container">
<h3 class="center-align" style="color:black;margin-top:50px;"><?= $judul?></h3>
<hr style="color:red;">
<div class="row">
  <div class="col s3">
    <h6 class="center-align" style="color:red;"><?= $title ?></h6>
    <br>
    <ul>
      <?php
      for($l = 1; $l<= 15; $l++){
        ?>
        <li>
          <a class="red-text text-accent-4" href="<?= base_url() ?>rooms/<?= $l ?>">Lantai <?= $l ?></a>
          <hr style="width:80%;margin-left:-10px;color:red">
        </li>
      <?php
        }
       ?>
    </ul>
  </div>
  <div class="col s9">
    <table>
      <thead style="font-weight:bold;">
        <th class="center-align">No. Kamar</th>
        <th class="center-align">Type</th>
        <th class="center-align">View</th>
        <th class="center-align">Rate</th>
        <th class="center-align">Date In</th>
        <th class="center-align">Date Out</th>
        <th class="center-align">Informasi</th>
      </thead>
      <tbody>
        <?php foreach ($rooms as $room): ?>
          <tr>
            <td><?= $room['room'] ?></td>
            <td><?= $room['rtype'] ?></td>
            <td><?= $room['dview'] ?></td>
            <td><?= $room['frate'] ?></td>
            <td><?= $room['date_in'] ?></td>
            <td><?= $room['date_out'] ?></td>
            <td><?= $room['Informasi'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
