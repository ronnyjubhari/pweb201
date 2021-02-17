<div class="container">
<h3 class="center-align" style="color:black;margin-top:50px;"><?= $judul?></h3>
<hr style="color:red;">
<div class="row">
  <div class="col m3 s12">
    <h6 class="center-align" style="color:red;"><?= $title ?></h6>
    <br>
    <ul>
      <?php foreach ($negara as $c): ?>
        <li>
          <a class="red-text text-accent-4" href="<?= base_url() ?>members/<?= $c['negara'] ?>"> <?= $c['Country'] ?></a>
          <hr style="width:100%;margin-left:-10px;color:red">
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="col m9 s12">
    <table>
      <thead style="font-weight:bold;">
        <th class="center-align">Member_ID</th>
        <th class="center-align">Nama Tamu</th>
        <th class="center-align">Kota Asal</th>
        <th class="center-align">Negara</th>
        <th class="center-align">Telepon</th>
        <th class="center-align">Hp</th>
      </thead>
      <tbody>
        <?php foreach ($members as $member): ?>
          <tr>
            <td><?= $member['member_ID'] ?></td>
            <td><?= $member['nama'] ?></td>
            <td><?= $member['kota'] ?></td>
            <td><?= $member['Country'] ?></td>
            <td><?= $member['telepon'] ?></td>
            <td><?= $member['hp'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
