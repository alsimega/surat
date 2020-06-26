<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Surat</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url()?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Fungsi
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kelola Surat</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Surat:</h6>
            <a class="collapse-item" href="<?=base_url('user/suratmasuk')?>">Surat Masuk</a>
            <a class="collapse-item" href="<?=base_url('user/suratkeluar')?>">Surat Keluar</a>
          </div>
        </div>
      </li>

<?php if ($_SESSION['level']=="1") { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuadmin" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Menu Admin</span>
        </a>
        <div id="menuadmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('admin/user')?>">Kelola User</a>
          </div>
        </div>
      </li>
<?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['username']?></span>
                <i class="fas fa-fw fa-cog"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Surat Masuk</h1>

<div class="row">
  <div class="col-sm-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Surat Masuk</h6>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nomor Surat</th>
              <th>Perihal</th>
              <th>Pengirim</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($table as $t) {
              $x=date_create($t['tanggal']);
              $y=date_format($x,"d-m-Y");
              echo "<tr>";              
                echo "<th>".$y."</th>";              
                echo "<th>".$t['nomor_surat']."</th>";              
                echo "<th>".$t['perihal']."</th>";              
                echo "<th>".$t['pengirim']."</th>";              
                echo "<th><button class='btn btn-primary' data-toggle='modal' data-target='#detailModal' onclick='getdetail(".$t['id_surat'].")'>Detail</button></th>";
              echo "</tr>";              
            }
          ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Tanggal</th>
              <th>Nomor Surat</th>
              <th>Perihal</th>
              <th>Pengirim</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk mengakhiri sesi ini.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="<?=base_url('user/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- detail Modal-->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        <table>
          <tr>
            <td>Nomor Surat</td>
            <td>:</td>
            <td><input style="width: 100%;" id="nomor_surat" readonly disabled></input></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input style="width: 100%;" id="tanggal" readonly disabled></input></td>
          </tr>
          <tr>
            <td>Perihal</td>
            <td>:</td>
            <td><input style="width: 100%;" id="perihal" readonly disabled></input></td>
          </tr>
          <tr>
            <td>Pengirim</td>
            <td>:</td>
            <td><input style="width: 100%;" id="pengirim" readonly disabled></input></td>
          </tr>
          <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td><div id="lampiran"></div></td>
          </tr>
        </table>

        </div>
        <div class="modal-footer">
          <!-- <a class="btn btn-primary" href="">OK</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>

<script type="text/javascript">
  
function getdetail(id_surat){
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById('nomor_surat').value = myObj.nomor_surat;
            document.getElementById('tanggal').value = myObj.tanggal;
            document.getElementById('perihal').value = myObj.perihal;
            document.getElementById('pengirim').value = myObj.pengirim;
            var lampiran = JSON.parse(myObj.lampiran)
            document.getElementById('lampiran').innerHTML="";
            for (i = 0; i < lampiran.length; i++) {
              $("#lampiran").append("<a href='<?=base_url('assets/uploads/')?>"+lampiran[i]+"'>"+lampiran[i]+"</a><br>");
            }
          }
        }
  xmlhttp.open("GET", "<?=base_url('user/getsurat/')?>" + id_surat, true);
  xmlhttp.send();
}

</script>

</body>

</html>
