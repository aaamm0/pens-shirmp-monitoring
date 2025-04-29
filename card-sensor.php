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
                        options: {
                            scales: {
                                x: {
                                    type: 'time',
                                    time: {
                                        unit: 'hour', // atau 'day', 'minute', sesuaikan
                                        tooltipFormat: 'yyyy-MM-dd HH:mm:ss'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Timestamp'
                                    }
                                }
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
                const aerator1Status = parseInt(data.aerator1) === 1 ? "ON" : "OFF";
                const aerator2Status = parseInt(data.aerator2) === 1 ? "ON" : "OFF";
                document.getElementById("aerator1").innerHTML = aerator1Status;
                document.getElementById("aerator2").innerHTML = aerator2Status;

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