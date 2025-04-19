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

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Log Out</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dasboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">
        <?php
        // include "card-sensor.php";
        ?>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Temperature </h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-thermometer-half"></i>
                </div>
                <div class="ps-3">
                  <h6 id="temp">--°C</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">pH</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-droplet"></i>
                </div>
                <div class="ps-3">
                  <h6 id="ph">--</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Salinity</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-hexagon"></i>
                </div>
                <div class="ps-3">
                  <h6 id="salinity">--</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Dissolved Oxygen</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cloud"></i>
                </div>
                <div class="ps-3">
                  <h6 id="dissolveOxygen">--</h6>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-12">
          <div class="card">


            <div class="card-body">
              <h5 class="card-title">Data Sensor</h5>

              <!-- Line Chart -->
              <div id="datasensor"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const chart = new ApexCharts(document.querySelector("#datasensor"), {
                    series: [{
                        name: 'Suhu (°C)',
                        data: [0], // Default
                        borderColor: 'rgba(255, 0, 0, 1)', // Warna baru untuk Suhu
                        backgroundColor: 'rgba(255, 0, 0, 0.2)', // Warna baru untuk Suhu
                        borderWidth: 2
                      },
                      {
                        name: 'pH',
                        data: [0], // Default
                        borderColor: 'rgba(54, 162, 235, 1)', // Warna baru untuk pH
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna baru untuk pH
                        borderWidth: 2
                      },
                      {
                        name: 'Salinitas (ppt)',
                        data: [0], // Default
                        borderColor: 'rgba(255, 159, 64, 1)', // Warna oranye untuk Salinitas
                        backgroundColor: 'rgba(255, 159, 64, 0.2)', // Warna oranye     untuk Salinitas
                        borderWidth: 2
                      },
                      {
                        name: 'Dissolved Oxygen (mg/L)',
                        data: [0], // Default
                        borderColor: 'rgba(153, 102, 255, 1)', // Warna baru untuk Dissolved Oxygen
                        backgroundColor: 'rgba(153, 102, 255, 0.2)', // Warna baru untuk Dissolved Oxygen
                        borderWidth: 2
                      }
                    ],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: true,
                        tools: {
                          zoom: true,
                          zoomin: true,
                          zoomout: true,
                          reset: true
                        },
                        autoSelected: 'zoom'
                      },
                      zoom: {
                        enabled: true,
                        type: 'xy',
                        autoScaleYaxis: true
                      }
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#FF6384', '#36A2EB', '#4BC0C0', '#9966FF'], // Warna seri berbeda
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: []
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      }
                    }
                  });

                  // Fungsi untuk memperbarui data pada grafik secara real-time
                  function updateChart() {
                    fetch('get-chart-data.php') // Mengambil data dari backend
                      .then(response => response.json()) // Mengonversi respons menjadi JSON
                      .then(data => {
                        // Menyusun data untuk grafik
                        const temperatures = data.map(item => item.temperature);
                        const phs = data.map(item => item.ph);
                        const salinities = data.map(item => item.salinity);
                        const dissolvedOxygens = data.map(item => item.dissolveOxygen);
                        const timestamps = data.map(item => item.timestamp);

                        // Memperbarui data grafik dengan data terbaru
                        chart.updateOptions({
                          series: [{
                              name: 'Suhu (°C)',
                              data: temperatures
                            },
                            {
                              name: 'pH',
                              data: phs
                            },
                            {
                              name: 'Salinitas (ppt)',
                              data: salinities
                            },
                            {
                              name: 'Dissolved Oxygen (mg/L)',
                              data: dissolvedOxygens
                            }
                          ],
                          xaxis: {
                            categories: timestamps // Menambahkan 10 data terakhir
                          }
                        });

                      })
                      .catch(error => console.error('Error fetching data:', error));
                  }

                  // Panggil fungsi updateChart setiap 5 detik untuk memperbarui data
                  setInterval(updateChart, 5000);

                  // Render grafik pertama kali
                  chart.render();
                });
              </script>

            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Aerator 1</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-toggles"></i>
                </div>
                <div class="ps-3">
                  <h6 id="aerator1">--</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Aerator 2</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-toggles"></i>
                </div>
                <div class="ps-3">
                  <h6 id="aerator2">--</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-6 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Kondisi</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-textarea"></i>
                </div>
                <div class="ps-3">
                  <h6 id="kondisi">--</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          // Fungsi untuk memperbarui data pada card secara real-time
          function updateCards() {
            fetch('get-card-data.php') // Mengambil data dari backend
              .then(response => response.json()) // Mengonversi respons menjadi JSON
              .then(data => {
                // Debugging: cek data di console
                console.log(data);
                document.getElementById("temp").innerHTML = `${data.temperature} °C`;
                document.getElementById("ph").innerHTML = `${parseFloat(data.ph).toFixed(2)}`;
                document.getElementById("salinity").innerHTML = `${parseFloat(data.salinity).toFixed(2)} ppt`;
                document.getElementById("dissolveOxygen").innerHTML = `${data.dissolveOxygen} mg/L`;
                document.getElementById("aerator1").innerHTML = `${data.aerator1} `;
                document.getElementById("aerator2").innerHTML = `${data.aerator2} `;

                // Update the Kondisi based on Aerator status
                let kondisi = "Baik"; // Default condition if both are off

                // Check if aerator1 or aerator2 is on
                if (parseInt(data.aerator1) === 1 || parseInt(data.aerator2) === 1) {
                  kondisi = "Normal"; // One of the aerators is on
                }

                // If both aerators are on, set condition to "Buruk"
                if (parseInt(data.aerator1) === 1 && parseInt(data.aerator2) === 1) {
                  kondisi = "Buruk"; // Both aerators are on
                }

                // Set the Kondisi text content
                document.getElementById("kondisi").innerHTML = kondisi;

              })
              .catch(error => console.error('Error fetching data:', error));
          }

          // Panggil fungsi setiap 5 detik
          setInterval(updateCards, 5000);

          // Panggil pertama kali saat halaman dimuat
          updateCards();
        </script>

        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th>
                  <b>No</b>
                </th>
                <th>Temperature</th>
                <th>pH</th>
                <th>Salinitas</th>
                <th>Dissolve Oxygen</th>
                <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                <th>Aerator1</th>
                <th>Aerator2</th>

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