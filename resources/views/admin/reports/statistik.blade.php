@extends('layouts.superadmin')
@section('content')
<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Statistik Sistem</h1>
    
    <!-- Cards Statistik -->
    <div class="row g-4 mb-5">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-2x text-primary mb-2"></i>
                    <h6 class="card-title mb-1">Total Pengguna</h6>
                    <p class="h5 mb-0 counter" data-target="{{ $totalPengguna }}">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt fa-2x text-info mb-2"></i>
                    <h6 class="card-title mb-1">Total Pengajuan</h6>
                    <p class="h5 mb-0 counter" data-target="{{ $totalPengajuan }}">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-body text-center">
                    <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                    <h6 class="card-title mb-1">Disetujui</h6>
                    <p class="h5 mb-0 counter" data-target="{{ $pengajuanDisetujui }}">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm stat-card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-body text-center">
                    <i class="fas fa-times-circle fa-2x text-danger mb-2"></i>
                    <h6 class="card-title mb-1">Ditolak</h6>
                    <p class="h5 mb-0 counter" data-target="{{ $pengajuanDitolak }}">0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Charts -->
    <div class="row g-4">
        <!-- Pie Chart untuk Status Pengajuan -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" data-aos="fade-right">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">Status Pengajuan</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart untuk Perbandingan Data -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" data-aos="fade-left">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">Ringkasan Data</h5>
                </div>
                <div class="card-body">
                    <canvas id="summaryChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bars -->
    <div class="row g-4 mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" data-aos="fade-up">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">Tingkat Persetujuan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Pengajuan Disetujui</label>
                            <div class="progress mb-3" style="height: 20px;">
                                <div class="progress-bar bg-success progress-animated" 
                                     role="progressbar" 
                                     data-width="0" 
                                     aria-valuenow="0" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    <span class="progress-text"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pengajuan Ditolak</label>
                            <div class="progress mb-3" style="height: 20px;">
                                <div class="progress-bar bg-danger progress-animated" 
                                     role="progressbar" 
                                     data-width="0" 
                                     aria-valuenow="0" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    <span class="progress-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.stat-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.counter {
    font-weight: bold;
    color: #2c3e50;
}

.progress-animated {
    transition: width 2s ease-in-out;
}

.progress-text {
    font-weight: bold;
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.stat-card.pulse {
    animation: pulse 0.6s ease-in-out;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Data dari backend
    const totalPengguna = {{ $totalPengguna }};
    const totalPengajuan = {{ $totalPengajuan }};
    const pengajuanDisetujui = {{ $pengajuanDisetujui }};
    const pengajuanDitolak = {{ $pengajuanDitolak }};

    // Counter Animation
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target.toLocaleString('id-ID');
                clearInterval(timer);
                // Add pulse effect when counter finishes
                element.closest('.stat-card').classList.add('pulse');
                setTimeout(() => {
                    element.closest('.stat-card').classList.remove('pulse');
                }, 600);
            } else {
                element.textContent = Math.floor(start).toLocaleString('id-ID');
            }
        }, 16);
    }

    // Animate counters with delay
    const counters = document.querySelectorAll('.counter');
    setTimeout(() => {
        counters.forEach((counter, index) => {
            const target = parseInt(counter.getAttribute('data-target'));
            setTimeout(() => {
                animateCounter(counter, target);
            }, index * 200);
        });
    }, 500);

    // Pie Chart untuk Status Pengajuan
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Disetujui', 'Ditolak', 'Pending'],
            datasets: [{
                data: [
                    pengajuanDisetujui, 
                    pengajuanDitolak, 
                    totalPengajuan - pengajuanDisetujui - pengajuanDitolak
                ],
                backgroundColor: [
                    '#28a745',
                    '#dc3545',
                    '#ffc107'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                duration: 2000,
                delay: 1000
            }
        }
    });

    // Bar Chart untuk Ringkasan Data
    const summaryCtx = document.getElementById('summaryChart').getContext('2d');
    const summaryChart = new Chart(summaryCtx, {
        type: 'bar',
        data: {
            labels: ['Total Pengguna', 'Total Pengajuan', 'Disetujui', 'Ditolak'],
            datasets: [{
                label: 'Jumlah',
                data: [totalPengguna, totalPengajuan, pengajuanDisetujui, pengajuanDitolak],
                backgroundColor: [
                    'rgba(0, 123, 255, 0.8)',
                    'rgba(23, 162, 184, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(220, 53, 69, 0.8)'
                ],
                borderColor: [
                    'rgba(0, 123, 255, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(220, 53, 69, 1)'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            animation: {
                duration: 2000,
                delay: 1500,
                easing: 'easeInOutBounce'
            }
        }
    });

    // Progress Bar Animation
    setTimeout(() => {
        const totalProcessed = pengajuanDisetujui + pengajuanDitolak;
        if (totalProcessed > 0) {
            const approvedPercentage = (pengajuanDisetujui / totalProcessed) * 100;
            const rejectedPercentage = (pengajuanDitolak / totalProcessed) * 100;
            
            // Animate approved progress bar
            const approvedBar = document.querySelector('.bg-success.progress-animated');
            const rejectedBar = document.querySelector('.bg-danger.progress-animated');
            
            setTimeout(() => {
                approvedBar.style.width = approvedPercentage + '%';
                approvedBar.querySelector('.progress-text').textContent = approvedPercentage.toFixed(1) + '%';
            }, 2500);
            
            setTimeout(() => {
                rejectedBar.style.width = rejectedPercentage + '%';
                rejectedBar.querySelector('.progress-text').textContent = rejectedPercentage.toFixed(1) + '%';
            }, 3000);
        }
    }, 500);

    // Add hover effects to cards
    document.querySelectorAll('.stat-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Refresh charts when window is resized
    window.addEventListener('resize', function() {
        statusChart.resize();
        summaryChart.resize();
    });
});
</script>
@endsection