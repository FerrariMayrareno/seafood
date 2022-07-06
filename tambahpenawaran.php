<?php
include_once ('koneksi.php');

//jika tombol simpan di klik
if(isset($_POST['btsubmit']))
{
$simpan = mysqli_query($db,"INSERT INTO penawaran(id_katalog,id_pegawai,id_calon_konsumen,tgl_penawaran)
VALUES (
        '$_POST[idkatalog]',
        '$_POST[idpegawai]',
        '$_POST[idcalonkonsumen]',
        '$_POST[tglpenawaran]')
");
if($simpan)
          {
            echo "<script>
            alert('simpan sukses');
            document.location='penawaran.php';
            </script>";  
          } else
          
          echo "<script>
          alert('simpan gagal');
          document.location='penawaran.php';
          </script>"; 
}
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
                    <img src="assets/images/seapood.svg" alt="" srcset="">
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
                                    <a href="penawaran.php">Penawaran</a>
                                    
                                </li>

                               

                                <li>
                                    <a href="pemesanan.php">Pembayaran</a>
                                </li>

                                <li>
                                    <a href="pengiriman.php">Pengiriman</a>
                                </li>
        
                            </ul>

                        </li>

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
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Datatable</h3>
                            <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can
                                check the full documentation <a
                                    href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                        </div>
                        
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable
                        </div>
                        <div class="card-body">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                    <th>id_penawaran</th>
                                    <th>id_katalog</th>
                                    <th>id_pegawai</th>
                                    <th>id_calon_konsumen</th>
                                    <th>tgl_penawaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                      foreach($table_penawaran as $data_penawaran):
                                    ?>
                                    <tr></tr>
                                    <td class="text-bold-500"><?php echo $data_penawaran ['id_penawaran']; ?></td>
                        <td><?php echo $data_penawaran ['id_katalog']; ?></td>
                        <td class="text-bold-500"><?php echo $data_penawaran ['id_pegawai']; ?></td>
                        <td><?php echo $data_penawaran ['id_calon_konsumen']; ?></td>
                        <td><?php echo $data_penawaran ['tgl_penawaran']; ?></td>
                        </tr>
                                </tbody>
                                <?php
                                endforeach
                                ?>
                            </table>
                        </div>
                    </div>

                </section>
            </div>



                        


                       

                       





                   
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
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Tambah Penawaran </h3>
                    <p class="text-subtitle text-muted">Dashboard Doa Ibu Seafood</p>
                  
                </div>
             
                
                <div class="card-body">                  
                       <form method="POST" action="">    
                          

                   
                          <div class="form-group">
                              <label for=""helpInputTop>ID katalog   </label>
                             
                          <fieldset class="form-group">
                              <select class="form-select" id="basicSelect" name="idkatalog" > 
                                  <!-- <option selected>ID katalog</option>
                                        <option>A00001</option>
                                          <option>B00002</option>
                                      <option>C00003</option>
                                      <option>D00003</option>
                                      <option>E00003</option>
                                       -->
                                       <option value="" disabled selected hidden>katalog</option>
                              <?php
                                $result          = "SELECT * FROM katalog_barang ";
                                $katalogs = mysqli_query($db, $result);

                                foreach ($katalogs as $katalog) :
                              ?>
                              <option value="<?php echo $katalog['id_katalog']; ?>"><?php echo $katalog['nama_katalog']; ?></option>
                              <?php endforeach; ?>
                                  </select>
                                 </fieldset>
                          </div> 
                          <div class="form-group">
                              <label for=""helpInputTop>ID pegawai  </label>
                          <fieldset class="form-group">
                              <select class="form-select" id="basicSelect" name="idpegawai" required > 
                              <option>303A Admin</option> 
                              </select>
                                 </fieldset>
                        </div>
                        <div class="form-group">
                              <label for=""helpInputTop>Calon Konsumen  </label>
                          <fieldset class="form-group">
                              <select class="form-select" id="basicSelect" name="idcalonkonsumen" required > 
                              <!-- <option>Id Calon Konsumen</option> 
                              <option>4002</option> 
                              <option>4041</option> 
                              <option>4052</option> 
                              <option>4075</option> 
                              <option>4085</option>  -->
                              <?php
                                $result          = "SELECT * FROM calon_konsumen ";
                                $calonkonsum = mysqli_query($db, $result);

                                foreach ($calonkonsum as $calonkonsumen) :
                              ?>
                              <option value="<?php echo $calonkonsumen['id_calon_konsumen']; ?>"><?php echo $calonkonsumen['nama_calon_konsumen']; ?></option>
                              <?php endforeach; ?>

                             </select>
                                 </fieldset>
                        </div>

                        <div class="form-group">
                          <label for="helpInputTop">Tanggal Penawaran </label>
                         
                            <input type="date" name="tglpenawaran" class="form-control"  placeholder="Input ID Penawaran Disini" required />
                          
                          </div>  
                          <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1" name="btsubmit">Submit</button>
                    </div>
                       </form>
                </section>
                <!-- Basic Inputs end -->
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Doa Ibu SEAFOOD</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="http://ahmadsaugi.com">Doa Ibu SEAFOOD</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>