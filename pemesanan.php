<?php
session_start();
  include_once('koneksi.php');
  $pemesanan = mysqli_query($db, "SELECT * FROM pemesanan");
  $nama = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DAS Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/shrimp.png" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/seapood.svg"  alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Menu</li>
                        <li class="sidebar-item active ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Olah Data</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                <a href="penawaran.php">Data Penawaran</a>
                                </li>

                                <li>
                                    <a href="pemesanan.php">Pembayaran</a>
                                </li>

                                <li>
                                    <a href="pengiriman.php">Pengiriman</a>
                                </li>
        
                            </ul>

                        </li>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">
                                   <?php
                                   
                                        if (isset($_SESSION['username'])) {
                                         $username = $_SESSION['username'];

                                         $query = mysqli_query($db, "SELECT nama_pegawai FROM pegawai WHERE email_pegawai = '$username'"); 
                                         foreach ($query as $cf) {
                                             if($query->num_rows > 0) {
                                              echo "Hai, " . $cf['nama_pegawai'];
                                            }
                                          }
                                        }
                                      ?>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

      <div class="main-content container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Tabel pembayaran</h3>
            </div>
          </div>

          <div class="container-fluid py-4">
       <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">ID pemesanan</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">ID Penewaran</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                      <th  class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">pembayaran</th>
            
                    </tr>
                  </thead>
                 <tbody>

                    <?php
                     foreach ($pemesanan as $data) : 
                     $id      = $data['id_pemesanan']; 
                     $user   = mysqli_query($db, "SELECT * FROM pembayaran WHERE id_pemesanan = '$id'");
                     $row    = $user->fetch_assoc();
                     $status = $row['status_pembayaran'];
                    ?>
                    <tr>

                    
                      <td class="align-middle text-center text-sm">
                      <span class="text-s font-weight-bold mb-0">
                      <?php echo $data['id_pemesanan'];  ?> 
                     </span>
                    </td>

                      <td class="align-middle text-center text-sm">
                        <span class="text-s font-weight-bold mb-0">
                        <?php echo $data['id_penawaran'];  ?> 
                        </span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-s font-weight-bold">
                        <?php if($status == 0){ //line atas
                                echo "BELUM KONFIRMASI" ;  
                        }else{
                          echo "SUDAH KONFIRMASI" ; 
                        }  ?> 
                        </span>
                      </td>

                      <td class="align-middle text-center">
                      <?php if($status == 0){
                        ?>
                        <a href="konfirmasi.php?id=<?php echo $id; ?>" class="btn" style="background-color: green;color:white;">konfirmasi</a>
                             
                       <?php
                              }else{
                          ?>
                         
                          <a  class="btn" style="background-color:grey;color:white;">terkonfirmasi</a>
                       <?php
                        }  ?> 
                   
                      </td>
              
                    </tr>
                  </tbody>
                  <?php
                       endforeach
                 ?>
                </table>          
              </div>          
            </div>          
          </div>         
        </div>
      </div>


  <script src="assets/js/feather-icons/feather.min.js"></script>
  <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/app.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>