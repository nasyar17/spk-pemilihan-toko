<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <title>Cetak Laporan</title>
</head>

<body>
   <nav class="navbar navbar-light bg-dark justify-content-between">
      <a href="/testing/history" class="btn btn-danger">Kembali</a>
      <form class="form-inline">
         <a href="/testing/htmlToPDF/<?= $tgl_awal; ?>/<?= $tgl_akhir; ?>" class="btn btn-primary" type="submit">Cetak</a>
      </form>
   </nav>

   <div class="container">
      <div class="row">
         <div class="col text-center">
            <h1 class="mt-4">Laporan Data Perhitungan (Testing)</h1>
            <h6 class="mt-3">Tanggal Cetak : <?= date("d M Y"); ?></h6>
            <div class="table-responsive mt-4">
               <table class="table table-bordered">
                  <thead class="bg-dark text-white">
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
                           <td><?= $row['result']; ?></td>
                           <td><?= $row['created_at']; ?></td>
                           <td><?= $row['updated_at']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>


</html>