<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="Content-Type" content="text/html" ; charset="UTF-8">
   <style>
      * {
         font-family: sans-serif;
      }

      table {
         border-collapse: collapse;
         width: 90%;
      }

      .center {
         margin-left: auto;
         margin-right: auto;
      }

      th {
         height: 30px;
         background-color: #4f4c4c;
         color: white;
      }

      td {
         text-align: center;
      }

      th,
      td {
         padding: 5px;
      }

      table,
      th,
      td {
         border: 1px solid black;
      }
   </style>
   <title>Cetak Perhitungan</title>
</head>

<body>
   <h2>Hasil Hitung</h2>
   <h3>Nama Toko : <?= $toko['toko_nama']; ?></h3>
   <h3>Alamat : <?= $toko['alamat']; ?></h3>
   <?php if ($rekapNilai['Profit']['nilaiakhir'] > $rekapNilai['Rugi']['nilaiakhir']) : ?>
      <h3>Kesimpulan : Profit</h3>
   <?php else : ?>
      <h3>Kesimpulan : Rugi</h3>
   <?php endif; ?>

   <br>
   <table class="center">
      <tr>
         <th colspan="6">Kriteria</th>
      </tr>
      <tr>
         <td>Jenis Toko</td>
         <td>Lokasi</td>
         <td>Ukuran Toko</td>
         <td>Keramaian Toko</td>
         <td>Keramaian Sekitar</td>
         <td>Jam Operasional</td>
      </tr>
      <tr>
         <?php foreach ($selectedCriteria as $st) : ?>
            <td><?= str_replace('<', '&lt;', $st); ?></td>
         <?php endforeach; ?>
      </tr>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Class</th>
      </tr>
      <tr>
         <td>PROFIT</td>
         <td>RUGI</td>
         <td>TOTAL DATA</td>
      </tr>
      <tr>
         <td><?= $quantityByLabel['Profit']; ?></td>
         <td><?= $quantityByLabel['Rugi']; ?></td>
         <td><?= $quantityByLabel['Total']; ?></td>
      </tr>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Jenis Toko</th>
      </tr>
      <tr>
         <td>JENIS TOKO</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qJenisToko as $atribut => $jt) : ?>
         <tr>
            <td><?= $atribut; ?></td>
            <td><?= $jt['Profit']; ?></td>
            <td><?= $jt['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Lokasi</th>
      </tr>
      <tr>
         <td>LOKASI</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qLokasi as $atribut => $l) : ?>
         <tr>
            <td><?= $atribut; ?></td>
            <td><?= $l['Profit']; ?></td>
            <td><?= $l['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Ukuran Toko</th>
      </tr>
      <tr>
         <td>UKURAN TOKO</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qUkuranToko as $atribut => $ut) : ?>
         <tr>
            <td><?= $atribut; ?></td>
            <td><?= $ut['Profit']; ?></td>
            <td><?= $ut['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Keramaian Toko</th>
      </tr>
      <tr>
         <td>KERAMAIAN TOKO</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qKeramaianToko as $atribut => $kt) : ?>
         <tr>
            <td><?= $atribut; ?></td>
            <td><?= $kt['Profit']; ?></td>
            <td><?= $kt['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Keramaian Sekitar</th>
      </tr>
      <tr>
         <td>KERAMAIAN SEKITAR</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qKeramaianSekitar as $atribut => $ks) : ?>
         <tr>
            <td><?= $atribut; ?></td>
            <td><?= $ks['Profit']; ?></td>
            <td><?= $ks['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="3">Frekuensi Jam Operasional</th>
      </tr>
      <tr>
         <td>JAM OPERASIONAL</td>
         <td>PROFIT</td>
         <td>RUGI</td>
      </tr>
      <?php foreach ($qJamOperasional as $atribut => $jo) : ?>
         <tr>

            <td><?= str_replace('<', '&lt;', $atribut); ?></td>
            <td><?= $jo['Profit']; ?></td>
            <td><?= $jo['Rugi']; ?></td>
         </tr>
      <?php endforeach; ?>
   </table>

   <br>
   <table class="center">
      <tr>
         <th colspan="9">Perhitungan</th>
      </tr>
      <tr>
         <td></td>
         <?php foreach ($criteria as $c) : ?>
            <td><?= $c['criteria_name']; ?></td>
         <?php endforeach; ?>
         <td>Prior</td>
         <td>Nilai Akhir</td>
      </tr>
      <?php $label = ['Profit', 'Rugi']; ?>
      <?php foreach ($label as $l) : ?>
         <?php foreach ($rekapNilai as $key => $rn) : ?>
            <?php if ($key == $l) : ?>
               <tr>
                  <td><?= $key; ?></td>
                  <?php foreach ($criteria as $c) : ?>
                     <td><?= $rn[$c['criteria_code']]; ?></td>
                  <?php endforeach; ?>
                  <td><?= $rn['prior']; ?></td>
                  <td><?= $rn['nilaiakhir']; ?></td>
               </tr>
            <?php endif; ?>
         <?php endforeach; ?>
      <?php endforeach; ?>
   </table>
</body>

</html>