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
  <link href="<?=base_url('assets/')?>vendor/datepicker/bootstrap-datepicker.css" rel="stylesheet">

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
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
          <h1 class="h3 mb-4 text-gray-800">Kelola User</h1>


<div class="row">
  <div class="col-sm-12">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
      </div>
      <div class="card-body">
<div class="row">
  <div class="col-sm-12">
    <button class="btn btn-primary" data-toggle='modal' data-target='#buatsuratModal'>Buat User Baru</button>
  </div>
</div>
<br>
        <table class="table table-bordered table-stripped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Username</th>
              <th>level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($table as $t) {
            if($t['level']=="1"){
              $t['level']="Admin";
            }elseif($t['level']=="2"){
              $t['level']="Member";
            }
              echo "<tr>";              
                echo "<th>".$t['username']."</th>";              
                echo "<th>".$t['level']."</th>";             
                echo "<th><button class='btn btn-primary' data-toggle='modal' data-target='#detailModal' onclick='getdetail(".$t['id_user'].")'>Detail</button> 
                </th>";
              echo "</tr>";
            }
          ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Username</th>
              <th>Level</th>
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
<form method="POST" action="<?=base_url('admin/edituser')?>">
        <table style="width: 100%;">
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><input style="width: 100%;" name="username" class="form-control form-control-user" id="username" required></input></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td><input style="width: 100%;" name="password" class="form-control form-control-user" id="password" placeholder="Biarkan kosong jika tidak ingin merubah"></input></td>
          </tr>
          <tr>
            <td>Level</td>
            <td>:</td>
            <td>
              <select name="level" class="form-control form-control-user" id="level" required>
                <option value="1">Admin</option>
                <option value="2">Member</option>
              </select>
            </td>
          </tr>
        </table>
  <input hidden id="id_user" name="id_user"></input>
        </div>
        <div class="modal-footer">
          <!-- <a class="btn btn-danger" id="hapus" onclick="return confirm('Anda yakin untuk menghapus user ini?')">Hapus</a> -->
          <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
          <input type="submit" class="btn btn-primary" value="Simpan"></input>
</form>
        </div>
      </div>
    </div>
  </div>


  <!-- buatuser Modal-->
  <div class="modal fade" id="buatsuratModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat User Baru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
      <form action="<?=base_url('admin/adduser')?>" method="POST" enctype="multipart/form-data">
        <table style="width: 100%;">
          <tr>
            <td>Username</td>
            <td>:</td>
            <td><input style="width: 100%;" name="username" class="form-control form-control-user" required></input></td>
          </tr>
          <tr>
            <td>Password</td>
            <td>:</td>
            <td><input style="width: 100%;" name="password" class="form-control form-control-user" required></input></td>
          </tr>
          <tr>
            <td>Level</td>
            <td>:</td>
            <td>
              <select name="level" class="form-control form-control-user" required>
                <option value="1">Admin</option>
                <option value="2">Member</option>
              </select>
            </td>
          </tr>
        </table>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-primary" value="Simpan">
      </form>
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
  <script src="<?=base_url('assets/')?>vendor/datepicker/bootstrap-datepicker.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#date').datepicker({
        language: "id",
        format: "yyyy-mm-dd",
        todayHighlight: true,
        autoclose: true
      });

  });

function getdetail(id_user){
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById('username').value = myObj.username;
            document.getElementById('level').value = myObj.level;
            document.getElementById('id_user').value = myObj.id_user;
            document.getElementById('hapus').setAttribute('href', "<?=base_url('admin/deluser/')?>"+myObj.id_user);
          }
        }
  xmlhttp.open("GET", "<?=base_url('admin/getuser/')?>" + id_user, true);
  xmlhttp.send();
}

function tambahfile(){
  $("#tambahfile").append("<input type='file' style='width: 100%;' name='lampiran[]'></input>")
}

</script>

</body>

</html>
