<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

   <style>
      * {
         font-family: sans-serif;
      }

      h1 {
         color: #000;
         text-align: center;
         font-size: 30px;
      }

      table {
         border-collapse: collapse;
         width: 90%;
      }

      th {
         height: 40px;
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

      .center {
         margin-left: auto;
         margin-right: auto;
      }

      .tgl {
         font-size: 16px;
         /* margin-left: 130px; */
         margin-top: 20px;
      }

      .judul {
         margin-bottom: 40px;
      }
   </style>

   <title>Cetak Laporan</title>
</head>

<body>
   <h1 class="center judul">Laporan Data Perhitungan (Testing)</h1>
   <h6 class="tgl">Tanggal Cetak : <?= date("d M Y"); ?></h6>
   <table class="center">
      <thead>
         <tr>
            <th>#</th>
            <th>Test ID</th>
            <th>Toko ID</th>
            <th>Nama Toko</th>
            <th>Alamat</th>
            <th>Result</th>
            <th>Created at</th>
            <th>Updated at</th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1 ?>
         <?php foreach ($testing as $row) : ?>
            <tr>
               <td><?= $i++; ?></td>
               <td><?= $row['testing_id']; ?></td>
               <td><?= $row['toko_id']; ?></td>
               <td><?= $row['toko_nama']; ?></td>
               <td><?= $row['alamat']; ?></td>
               <td>
                  <div>
                     <?= $row['result']; ?>
                  </div>
               </td>
               <td><?= $row['created_at']; ?></td>
               <td><?= $row['updated_at']; ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>

</body>

</html>