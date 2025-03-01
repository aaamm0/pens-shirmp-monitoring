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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
                        <a href="suhu.php">
                            <i class="bi bi-circle"></i><span>Temperature</span>
                        </a>
                    </li>
                    <li>
                        <a href="ph.php">
                            <i class="bi bi-circle"></i><span>pH</span>
                        </a>
                    </li>
                    <li>
                        <a href="salinitas.php">
                            <i class="bi bi-circle"></i><span>Salinity</span>
                        </a>
                    </li>
                    <li>
                        <a href="do.php">
                            <i class="bi bi-circle"></i><span>Dissolved Oxygen</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed " href="history.php">
                    <i class="bi bi-clock-history"></i>
                    <span>History</span>
                </a>
            </li>
        </ul>
    </aside>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>History</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dasboard.php">Home</a></li>
                    <li class="breadcrumb-item active">History</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Data</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="startDate" class="form-label">Start Date:</label>
                                <input type="date" id="startDate" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="endDate" class="form-label">End Date:</label>
                                <input type="date" id="endDate" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-primary w-100" onclick="filterData()">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button class="btn btn-primary me-2" onclick="exportToCSV()">Cetak CSV</button>
                        <button class="btn btn-primary" onclick="exportToPDF()">Cetak PDF</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered datatable" id="filteredData">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Temperature</th>
                                    <th>pH</th>
                                    <th>Salinity</th>
                                    <th>Dissolved Oxygen</th>
                                    <th>Start Date</th>
                                    <th>Aerator1</th>
                                    <th>Aerator2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ambil semua data saat halaman pertama kali dimuat
                                $sql = "SELECT * FROM sensor_data ORDER BY timestamp DESC";
                                $result = $conn->query($sql);
                                $no = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . $no++ . "</td>
                                            <td>" . $row["temperature"] . "</td>
                                            <td>" . $row["ph"] . "</td>
                                            <td>" . $row["salinity"] . "</td>
                                            <td>" . $row["dissolveOxygen"] . "</td>
                                            <td>" . $row["timestamp"] . "</td>
                                            <td>" . $row["aerator1"] . "</td>
                                            <td>" . $row["aerator2"] . "</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center text-danger'>No data available</td></tr>";
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
            &copy; Copyright <strong><span>Politeknik Elektronika Negeri Surabaya</span></strong>.  All Rights Reserved
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

    <script>
        function filterData() {
            var startDate = document.getElementById("startDate").value;
            var endDate = document.getElementById("endDate").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "filter.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("filteredData").innerHTML = xhr.responseText;
                }
            };

            // Jika tidak ada filter, ambil semua data
            var params = (startDate === "" || endDate === "") ? "allData=true" : `startDate=${startDate}&endDate=${endDate}`;
            xhr.send(params);
        }

        function exportToCSV() {
            let table = document.getElementById("filteredData");
            let rows = table.querySelectorAll("tr");
            let csvContent = "data:text/csv;charset=utf-8,";
            rows.forEach(row => {
                let cols = row.querySelectorAll("th, td");
                let rowData = [];
                cols.forEach(col => rowData.push(col.innerText));
                csvContent += rowData.join(",") + "\n";
            });
            let encodedUri = encodeURI(csvContent);
            let link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "history_data.csv");
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function exportToPDF() {
            let table = document.getElementById("filteredData");
            let printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html><head><title>History Data</title></head><body>');
            printWindow.document.write('<h2>History Data</h2>');
            printWindow.document.write(table.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

</body>

</html>