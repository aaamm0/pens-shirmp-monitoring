<?php
include "koneksi.php";
// session_start();
// if ($_SESSION['user'] == NULL) {
//     header("Location: http://localhost/pens-shrimp-monitor/login.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/dasboard.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dasboard.php" class="logo d-flex align-items-center">
                <img src="assets/img/pens.png" alt="">
                <span>Shirmp Monitoring</span>
                <span style="color: #fd0000;">.</span>
            </a>

            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Log Out</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="dasboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-sliders"></i><span>Parameter</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link collapsed" href="suhu.php">
                            <i class="bi bi-circle"></i><span>Temperature</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed" href="ph.php">
                            <i class="bi bi-circle"></i><span>pH</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed" href="salinitas.php">
                            <i class="bi bi-circle"></i><span>Salinity</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed" href="do.php">
                            <i class="bi bi-circle"></i><span>Dissolved Oxygen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="history.php">
                    <i class="bi bi-clock-history"></i>
                    <span>History</span>
                </a>
            </li>
        </ul>
    </aside>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Parameter</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dasboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Salinity</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <?php
                include "card-salinitas.php";
                ?>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    <b>No</b>
                                </th>
                                <!-- <th>Temperature</th> -->
                                <!-- <th>pH</th> -->
                                <th>Salinitas</th>
                                <!-- <th>Dissolve Oxygen</th> -->
                                <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                                <!-- <th>Aerator1</th>
                            <th>Aerator2</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query untuk mengambil data dari tabel sensor_data
                            $sql = "SELECT * FROM sensor_data";
                            $result = $conn->query($sql);
                            $no = 1;

                            // Jika ada data, tampilkan dalam bentuk tabel
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                <td>" . $no++ . "</td> 
                                <td>" . $row["salinity"] . "</td> 
                                <td>" . $row["timestamp"] . "</td> 
                                </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No data available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <footer id="footer" class="footer ">
        <div class="copyright">
            &copy; Copyright <strong><span>Politeknik Elektronika Negeri Surabaya</span></strong>. get-sensor-data.phpAll Rights Reserved
        </div>
    </footer>End Footer

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/dasboard.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>