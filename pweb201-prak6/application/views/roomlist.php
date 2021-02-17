<table border="1">
  <thead>
    <tr>
      <th>Room</th>
        <th>rtype</th>
        <th>dview</th>
        <th>Total_harga</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rooms as $room): ?>
    <tr>
      <td><?= $room['room']  ?></td>
      <td><?= $room['rtype']  ?></td>
      <td><?= $room['dview']  ?></td>
      <td><?= $room['Total_harga']  ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
