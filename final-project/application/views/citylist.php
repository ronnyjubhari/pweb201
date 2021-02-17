<div class="container">
<h3 class="center-align" style="color:black;margin-top:50px;"><?= $judul?></h3>
<hr style="color:red;">
<div class="row">
  <div class="col s12">
    <table>
      <tbody>
        <?php foreach ($kota as $city): ?>
          <tr>
            <td class="center-align"><?= $city['nama_kota'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
