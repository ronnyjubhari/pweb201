<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Struktur Algoritma</title>
  </head>
  <body>
   
    <?php
      if (isset($_GET['max'])){
        $max = $_GET['max'];
      }
      else {
        $max = 10;
      }

      if ($max > 10) {
        $max = 10; }
    ?>

    <h1>Tabel Perkalian</h1>

    <table border='1' cellspacing='0' cellpadding='5'>
      <tr>
        <?php
          for ($i=1; $i <= $max; $i++) {
        ?>
        <td>
          <table border='1' cellspacing='0' cellpadding='5'>
            <?php
              for ($n=1; $n <= 10; $n++) {
                echo "<tr>";
                echo "<td align='center'>" . $n . " x " . $i . " = " . $n * $i . "</td>";
                echo "</tr>";
              }
            ?>
          </table>
        </td>

        <?php
          }
        ?>
      </tr>
    </table>
  </body>
</html>
