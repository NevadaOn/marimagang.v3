@extends('layouts.superadmin')

@section('content')
			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Ringkasan</strong> Dashboard</h1>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total User</h5>
													</div>

													{{-- <div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div> --}}
												</div>
												<h1 class="mt-1 mb-3">{{ $totalUser }}</h1>
												{{-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Since last week</span>
												</div> --}}
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Pengajuan</h5>
													</div>

													<div class="col-auto">
														{{-- <div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div> --}}
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{ $totalPengajuan }}</h1>
												{{-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Since last week</span>
												</div> --}}
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total Bidang</h5>
													</div>

													{{-- <div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div> --}}
												</div>
												<h1 class="mt-1 mb-3">{{ $totalBidang }}</h1>
												{{-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Since last week</span>
												</div> --}}
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pending</h5>
													</div>

													{{-- <div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div> --}}
												</div>
												<h1 class="mt-1 mb-3">{{ $pengajuanPending }}</h1>
												{{-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Since last week</span>
												</div> --}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Data Statistik</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Presentase Pelamar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
                                                @foreach($userPerUniversitas as $univ)                                              
												<tr>
													<td>{{ $univ->nama_universitas }}</td>
													<td class="text-end">{{ $univ->total_user }}</td>
												</tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">
                                        <h5 class="card-title"><i class="fas fa-chart-bar"></i> Statistik Pengajuan per Bidang</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chart-pengajuan-bidang"></canvas>
                                        </div>
                                    </div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Kalender</h5>
								</div>
								<div class="card-body">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Pengajuan Terbaru</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>User</th>
											<th class="d-none d-xl-table-cell">Bidang</th>
											<th class="d-none d-xl-table-cell">Status</th>
											<th>Tanggal Pengajuan</th>
											{{-- <th class="d-none d-md-table-cell">Aksi</th> --}}
										</tr>
									</thead>
									<tbody>
                                        @foreach($pengajuanTerbaru as $pengajuan)
                                <tr>
                                    <td>{{ $pengajuan->user->nama }}</td>
                                    <td>{{ $pengajuan->databidang->nama }}</td>
                                    <td>
                                        @if($pengajuan->status == 'diproses')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($pengajuan->status == 'diterima')
                                            <span class="badge bg-success">Diterima</span>
                                        @elseif($pengajuan->status == 'diproses')
                                            <span class="badge bg-success">Diproses</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $pengajuan->created_at->format('d/m/Y') }}</td>
                                    {{-- <td>
                                        <button class="btn btn-primary" onclick="showUserDetails({{ $pengajuan->id }})">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                    </td> --}}
                                </tr>
                                @endforeach
										{{-- <tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr> --}}
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><i class="fas fa-chart-bar"></i> User Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Universitas</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userTerbaru as $user)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->universitas->nama_universitas ?? '-' }}</td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                                                <div class="mt-3">
                            <style>
.pagination {
    display: flex;
    gap: 5px;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    display: inline-block;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 6px 12px;
    text-decoration: none;
    color: #333;
    border-radius: 4px;
    font-size: 14px;
}

.pagination li.active span {
    background-color: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
}

.pagination li.disabled span {
    color: #aaa;
}
</style>

                                            {{ $userTerbaru->links() }}
                                        </div>
                                </div>
								{{-- <div class="card-header">

									<h5 class="card-title mb-0">Presentase Bulanan</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div> --}}
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Diskominfo Kab.Malang</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

        const statistikData = @json($statistikBulanan); 

        const labels = statistikData.map(item => {
            const bulanNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            return `${bulanNames[item.bulan - 1]} ${item.tahun}`;
        });

        const dataValues = statistikData.map(item => item.total);

        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: labels,
                datasets: [{
                    label: "Pengajuan",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: dataValues
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: false, 
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {

                            beginAtZero: true
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>
	<script>
    document.addEventListener("DOMContentLoaded", function() {
        const labels = [
            @foreach($userPerUniversitas as $univ)
                "{{ $univ->nama_universitas }}", 
            @endforeach
        ];
        const dataValues = [
            @foreach($userPerUniversitas as $univ)
                {{ $univ->total_user }}, 
            @endforeach
        ];

        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues, 
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>
	<script>
    document.addEventListener("DOMContentLoaded", function() {
        // --- Bar Chart for Pengajuan per Bidang ---
        // Assuming 'pengajuanPerBidangData' is passed from your backend in a JSON format
        // Example structure:
        // const pengajuanPerBidangData = [
        //     { nama: "Pendidikan", total_pengajuan: 150, pending: 20, diterima: 100, ditolak: 30 },
        //     { nama: "Kesehatan", total_pengajuan: 120, pending: 10, diterima: 90, ditolak: 20 },
        //     // ... more data
        // ];

        const bidangLabels = [];
        const totalPengajuanData = [];
        const pendingData = [];
        const diterimaData = [];
        const ditolakData = [];

        // Populate the arrays from your backend data (e.g., @json($pengajuanPerBidang))
        // For demonstration, let's use the data from your HTML table
        @foreach($pengajuanPerBidang as $bidang)
            bidangLabels.push("{{ $bidang->nama }}");
            totalPengajuanData.push({{ $bidang->total_pengajuan }});
            pendingData.push({{ $bidang->diproses }});
            diterimaData.push({{ $bidang->diterima }});
            ditolakData.push({{ $bidang->ditolak }});
        @endforeach

        new Chart(document.getElementById("chart-pengajuan-bidang"), { // Use a different ID for this chart
            type: "bar",
            data: {
                labels: bidangLabels,
                datasets: [
                    {
                        label: "Total Pengajuan",
                        backgroundColor: "rgba(75, 192, 192, 0.6)", // Example color
                        borderColor: "rgba(75, 192, 192, 1)",
                        data: totalPengajuanData
                    },
                    {
                        label: "diproses",
                        backgroundColor: "rgba(255, 206, 86, 0.6)", // Example color
                        borderColor: "rgba(255, 206, 86, 1)",
                        data: pendingData
                    },
                    {
                        label: "Diterima",
                        backgroundColor: "rgba(153, 102, 255, 0.6)", // Example color
                        borderColor: "rgba(153, 102, 255, 1)",
                        data: diterimaData
                    },
                    {
                        label: "Ditolak",
                        backgroundColor: "rgba(255, 99, 132, 0.6)", // Example color
                        borderColor: "rgba(255, 99, 132, 1)",
                        data: ditolakData
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        stacked: false // Set to true for stacked bars if desired
                    }],
                    xAxes: [{
                        stacked: false // Set to true for stacked bars if desired
                    }]
                },
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }
        });

        // The existing monthly chart (if you want to keep it)
        new Chart(document.getElementById("chartjs-dashboard-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "This year",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/flatpickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/l10n/id.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Data libur nasional Indonesia untuk tahun 2025 (ini harus diupdate setiap tahun)
        const nationalHolidays = [
            // --- 2025 ---
            "2025-01-01", // Tahun Baru Masehi
            "2025-01-29", // Isra Mikraj Nabi Muhammad SAW*
            "2025-03-29", // Hari Suci Nyepi Tahun Baru Saka 1947
            "2025-04-18", // Wafat Isa Al Masih
            "2025-05-01", // Hari Buruh Internasional
            "2025-05-12", // Idul Fitri 1446 H (1 Syawal)*
            "2025-05-13", // Cuti Bersama Idul Fitri*
            "2025-05-14", // Kenaikan Isa Al Masih
            "2025-05-29", // Hari Raya Waisak*
            "2025-06-01", // Hari Lahir Pancasila
            "2025-06-16", // Idul Adha 1446 H (10 Dzulhijjah)*
            "2025-08-17", // HUT Kemerdekaan RI
            "2025-09-02", // Tahun Baru Islam 1447 H (1 Muharram)*
            "2025-12-14", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2025-12-25", // Hari Raya Natal

            // --- 2026 ---
            "2026-01-01", // Tahun Baru Masehi
            "2026-01-19", // Isra Mikraj Nabi Muhammad SAW*
            "2026-03-19", // Hari Suci Nyepi Tahun Baru Saka 1948
            "2026-04-03", // Wafat Isa Al Masih
            "2026-04-30", // Idul Fitri 1447 H (1 Syawal)*
            "2026-05-01", // Hari Buruh Internasional
            "2026-05-14", // Kenaikan Isa Al Masih
            "2026-05-20", // Hari Raya Waisak*
            "2026-06-01", // Hari Lahir Pancasila
            "2026-06-06", // Idul Adha 1447 H (10 Dzulhijjah)*
            "2026-08-17", // HUT Kemerdekaan RI
            "2026-08-22", // Tahun Baru Islam 1448 H (1 Muharram)*
            "2026-12-03", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2026-12-25", // Hari Raya Natal

            // --- 2027 ---
            "2027-01-01", // Tahun Baru Masehi
            "2027-01-08", // Isra Mikraj Nabi Muhammad SAW*
            "2027-03-09", // Hari Suci Nyepi Tahun Baru Saka 1949
            "2027-03-26", // Wafat Isa Al Masih
            "2027-04-20", // Idul Fitri 1448 H (1 Syawal)*
            "2027-05-01", // Hari Buruh Internasional
            "2027-05-06", // Kenaikan Isa Al Masih
            "2027-05-10", // Hari Raya Waisak*
            "2027-06-01", // Hari Lahir Pancasila
            "2027-05-27", // Idul Adha 1448 H (10 Dzulhijjah)*
            "2027-08-17", // HUT Kemerdekaan RI
            "2027-08-11", // Tahun Baru Islam 1449 H (1 Muharram)*
            "2027-11-23", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2027-12-25", // Hari Raya Natal

            // --- 2028 ---
            "2028-01-01", // Tahun Baru Masehi
            "2028-01-26", // Imlek (Tahun Baru Imlek)*
            "2028-02-09", // Isra Mikraj Nabi Muhammad SAW*
            "2028-02-28", // Hari Suci Nyepi Tahun Baru Saka 1950
            "2028-04-13", // Wafat Isa Al Masih
            "2028-04-09", // Idul Fitri 1449 H (1 Syawal)*
            "2028-05-01", // Hari Buruh Internasional
            "2028-05-24", // Kenaikan Isa Al Masih
            "2028-05-29", // Hari Raya Waisak*
            "2028-06-01", // Hari Lahir Pancasila
            "2028-05-15", // Idul Adha 1449 H (10 Dzulhijjah)*
            "2028-08-17", // HUT Kemerdekaan RI
            "2028-07-31", // Tahun Baru Islam 1450 H (1 Muharram)*
            "2028-11-12", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2028-12-25", // Hari Raya Natal

            // --- 2029 ---
            "2029-01-01", // Tahun Baru Masehi
            "2029-02-13", // Imlek (Tahun Baru Imlek)*
            "2029-01-28", // Isra Mikraj Nabi Muhammad SAW*
            "2029-03-20", // Hari Suci Nyepi Tahun Baru Saka 1951
            "2029-03-30", // Wafat Isa Al Masih
            "2029-03-30", // Idul Fitri 1450 H (1 Syawal)*
            "2029-05-01", // Hari Buruh Internasional
            "2029-05-10", // Kenaikan Isa Al Masih
            "2029-05-19", // Hari Raya Waisak*
            "2029-06-01", // Hari Lahir Pancasila
            "2029-05-04", // Idul Adha 1450 H (10 Dzulhijjah)*
            "2029-08-17", // HUT Kemerdekaan RI
            "2029-07-20", // Tahun Baru Islam 1451 H (1 Muharram)*
            "2029-11-01", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2029-12-25", // Hari Raya Natal

            // --- 2030 ---
            "2030-01-01", // Tahun Baru Masehi
            "2030-02-03", // Imlek (Tahun Baru Imlek)*
            "2030-01-17", // Isra Mikraj Nabi Muhammad SAW*
            "2030-03-10", // Hari Suci Nyepi Tahun Baru Saka 1952
            "2030-04-18", // Wafat Isa Al Masih
            "2030-03-20", // Idul Fitri 1451 H (1 Syawal)*
            "2030-05-01", // Hari Buruh Internasional
            "2030-05-30", // Kenaikan Isa Al Masih
            "2030-06-08", // Hari Raya Waisak*
            "2030-06-01", // Hari Lahir Pancasila
            "2030-04-24", // Idul Adha 1451 H (10 Dzulhijjah)*
            "2030-08-17", // HUT Kemerdekaan RI
            "2030-07-09", // Tahun Baru Islam 1452 H (1 Muharram)*
            "2030-10-21", // Maulid Nabi Muhammad SAW (12 Rabiul Awal)*
            "2030-12-25", // Hari Raya Natal
        ];

        var date = new Date(); // Ambil tanggal hari ini
        var defaultDate = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            locale: "id",
            prevArrow: "<span title=\"Bulan sebelumnya\">&laquo;</span>",
            nextArrow: "<span title=\"Bulan berikutnya\">&raquo;</span>",
            defaultDate: defaultDate,
            // Tambahkan hook onDayCreate untuk menyoroti hari libur
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                // Format tanggal elemen menjadi YYYY-MM-DD
                const dayFormatted = dayElem.dateObj.getFullYear() + "-" +
                                     String(dayElem.dateObj.getMonth() + 1).padStart(2, '0') + "-" +
                                     String(dayElem.dateObj.getDate()).padStart(2, '0');

                if (nationalHolidays.includes(dayFormatted)) {
                    dayElem.classList.add("flatpickr-holiday");
                    dayElem.title = "Hari Libur Nasional"; 
                }
            }
        });
    });
</script>

<style>
    .flatpickr-holiday {
        background-color: #ffcccc !important;
        font-weight: bold;
        color: #d9534f !important; 
    }
</style>
@endsection