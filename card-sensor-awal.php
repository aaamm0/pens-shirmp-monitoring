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
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Temperature</h5>
            <div id="temperature"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#temperature"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">pH</span></h5>

            <!-- Line Chart -->
            <div id="pH"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pH"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Salinity</h5>

            <!-- Line Chart -->
            <div id="salinitas"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#salinitas"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Dissolved Oxygen</h5>

            <!-- Line Chart -->
            <div id="do"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#do"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>

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
                        })
                        .catch(error => console.error('Error fetching data:', error));
                }

                // Panggil fungsi setiap 5 detik
                setInterval(updateCards, 5000);

                // Panggil pertama kali saat halaman dimuat
                updateCards();
            </script>
        </div>
    </div>
</div>


Card nyoba-nyoba
<div class="col-12">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        </div>
        <div class="card-body">
            <h5 class="card-title">Grafik Data</h5>
            <!-- Line Chart -->
            <div id="salinitas"><canvas id="liveChart">
                </canvas>
                <script>
                    // Variabel untuk menyimpan data terakhir yang tersedia
                    let lastData = {
                        labels: [],
                        suhu: [],
                        ph: [],
                        salinitas: [],
                        doxygen: []
                    };

                    // Inisialisasi grafik Chart.js
                    const ctx = document.getElementById('liveChart').getContext('2d');
                    const liveChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [], // Label sumbu X
                            datasets: [{
                                    label: 'Suhu (°C)',
                                    data: [],
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'pH',
                                    data: [],
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Salinitas (ppt)',
                                    data: [],
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Dissolved Oxygen (mg/L)',
                                    data: [],
                                    borderColor: 'rgba(255, 206, 86, 1)',
                                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Waktu'
                                    },
                                    ticks: {
                                        autoSkip: true,
                                        maxTicksLimit: 10
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Nilai'
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Fungsi untuk memperbarui grafik
                    function updateChart() {
                        fetch('get-card-data.php') // Mengambil data dari backend
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.history && data.history.length > 0) {
                                    // Jika ada data baru, perbarui grafik dan simpan data terakhir
                                    const labels = data.history.map((item) => item.timestamp); // Tanggal/Waktu
                                    const suhu = data.history.map((item) => item.temperature);
                                    const ph = data.history.map((item) => item.ph);
                                    const salinitas = data.history.map((item) => item.salinity);
                                    const doxygen = data.history.map((item) => item.dissolveOxygen);

                                    // Perbarui data terakhir
                                    lastData = {
                                        labels,
                                        suhu,
                                        ph,
                                        salinitas,
                                        doxygen
                                    };

                                    // Perbarui grafik
                                    liveChart.data.labels = labels.reverse();
                                    liveChart.data.datasets[0].data = suhu.reverse();
                                    liveChart.data.datasets[1].data = ph.reverse();
                                    liveChart.data.datasets[2].data = salinitas.reverse();
                                    liveChart.data.datasets[3].data = doxygen.reverse();
                                } else {
                                    // Jika tidak ada data baru, gunakan data terakhir yang tersedia
                                    liveChart.data.labels = lastData.labels;
                                    liveChart.data.datasets[0].data = lastData.suhu;
                                    liveChart.data.datasets[1].data = lastData.ph;
                                    liveChart.data.datasets[2].data = lastData.salinitas;
                                    liveChart.data.datasets[3].data = lastData.doxygen;
                                }
                                liveChart.update(); // Refresh grafik
                            })
                            .catch((error) => {
                                console.error('Error fetching data:', error);
                                // Jika terjadi kesalahan, tetap gunakan data terakhir
                                liveChart.data.labels = lastData.labels;
                                liveChart.data.datasets[0].data = lastData.suhu;
                                liveChart.data.datasets[1].data = lastData.ph;
                                liveChart.data.datasets[2].data = lastData.salinitas;
                                liveChart.data.datasets[3].data = lastData.doxygen;
                                liveChart.update();
                            });
                    }

                    // Panggil fungsi setiap 5 detik
                    setInterval(updateChart, 5000);

                    // Panggil pertama kali saat halaman dimuat
                    updateChart();
                </script>
            </div>
        </div>
    </div>
</div>
