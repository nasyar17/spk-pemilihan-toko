<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
   <title><?= $title; ?></title>

   <!-- General CSS Files -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css"> -->
   <!-- <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

   <!-- CSS Libraries -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sp-1.2.1/datatables.min.css" />

   <!-- <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css"> -->
   <!-- <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css"> -->
   <!-- <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css"> -->
   <link rel="stylesheet" href="/assets/modules/codemirror/lib/codemirror.css">
   <link rel="stylesheet" href="/assets/modules/codemirror/theme/duotone-dark.css">
   <link rel="stylesheet" href="/assets/modules/jquery-selectric/selectric.css">

   <!-- Template CSS -->
   <link rel="stylesheet" href="/assets/css/style.css">
   <link rel="stylesheet" href="/assets/css/components.css">

</head>

<body>
   <div id="app">
      <div class="main-wrapper main-wrapper-1">
         <!-- NAVBAR -->
         <?= $this->include('layout/navbar'); ?>
         <!-- END NAVBAR -->

         <!-- SIDEBAR -->
         <?= $this->include('layout/sidebar'); ?>
         <!-- END SIDEBAR -->


         <!-- Main Content -->
         <div class="main-content">
            <?= $this->renderSection('content'); ?>

         </div>
         <!-- SIDEBAR -->
         <?= $this->include('layout/footer'); ?>
         <!-- END SIDEBAR -->
      </div>
   </div>

   <!-- General JS Scripts -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltip.js/1.3.1/tooltip.min.js"></script> -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <!-- <script src="/assets/modules/jquery.min.js"></script> -->
   <!-- <script src="/assets/modules/popper.js"></script> -->
   <!-- <script src="/assets/modules/tooltip.js"></script> -->
   <!-- <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script> -->
   <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
   <!-- <script src="/assets/modules/moment.min.js"></script> -->
   <script src="/assets/js/stisla.js"></script>

   <!-- JS Libraies -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/sp-1.2.1/datatables.min.js"></script>

   <!-- <script src="/assets/modules/datatables/datatables.min.js"></script> -->
   <!-- <script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script> -->
   <!-- <script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> -->
   <script src="/assets/modules/jquery-ui/jquery-ui.min.js"></script>
   <!-- <script src="/assets/modules/chart.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" integrity="sha512-HCG6Vbdg4S+6MkKlMJAm5EHJDeTZskUdUMTb8zNcUKoYNDteUQ0Zig30fvD9IXnRv7Y0X4/grKCnNoQ21nF2Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
   <!-- <script src="/assets/modules/summernote/summernote-bs4.js"></script> -->
   <script src="/assets/modules/codemirror/lib/codemirror.js"></script>
   <script src="/assets/modules/codemirror/mode/javascript/javascript.js"></script>
   <script src="/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
   <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
   <script src="/assets/modules/sweetalert/sweetalert.min.js"></script>

   <!-- Page Specific JS File -->
   <script src="/assets/js/page/modules-datatables.js"></script>

   <!-- Template JS File -->
   <script src="/assets/js/scripts.js"></script>
   <script src="/assets/js/custom.js"></script>


   <?php if (session()->getFlashdata('message')) : ?>
      <script>
         swal({
            title: "Notification",
            icon: "<?= session()->getFlashdata('icon'); ?>",
            text: "<?= session()->getFlashdata('message'); ?>",
            button: true,
            timer: 5000,
         });
      </script>
   <?php endif; ?>

   <!-- <script>
      function validateForm() {
         event.preventDefault(); // prevent form submit
         var id = this.id
         var formid = 'form' + this.id
         var form = document.forms[formid]; // storing the form
         swal({
               title: "Are you sure?",
               // text: "Once deleted, you will not be able to recover this imaginary file!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  $(form).submit();
               }
            });
      }
   </script> -->

   <script>
      $("#trainingTable").on("click", ".delete-btn", function() {
         event.preventDefault(); // prevent form submit
         var id = this.id
         var formid = 'form' + this.id
         var form = document.forms[formid]; // storing the form
         swal({
               title: "Are you sure?",
               // text: "Once deleted, you will not be able to recover this imaginary file!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  $(form).submit();
               }
            });
      });
   </script>
   <script>
      $("#tokoTable").on("click", ".active-btn", function() {
         event.preventDefault(); // prevent form submit
         var urlToRedirect = this.getAttribute('href');
         swal({
               title: "Are you sure?",
               text: "Data akan dinonaktifkan",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
                  window.location.href = urlToRedirect;
               }
            });
      });
   </script>

   <script>
      $("#tokoTesting").on("click", ".delete-btn", function() {
         event.preventDefault(); // prevent form submit
         var urlToRedirect = this.getAttribute('href');
         swal({
               title: "Are you sure?",
               text: "Data sudah pernah diuji, pengujian akan mengubah data lama !",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
                  window.location.href = urlToRedirect;
               }
            });
      });

      $("#tokoNotActiveTable").on("click", ".active-btn", function() {
         event.preventDefault(); // prevent form submit
         var urlToRedirect = this.getAttribute('href');
         swal({
               title: "Are you sure?",
               text: "Data toko akan dikembalikan menjadi aktif kembali",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
               if (willDelete) {
                  // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
                  window.location.href = urlToRedirect;
               }
            });
      });
   </script>

</body>

</html>