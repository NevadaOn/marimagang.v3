@extends('layouts.user.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-9">
            @include('layouts.user.components.greeting-box ')
             @include('layouts.user.components.ajukan-magang')
            @include('layouts.user.components.profile-completion')
        </div>
        <div class="col-lg-3">
            @include('layouts.user.components.calendar')
            
        </div>
    </div>
@endsection

@push('scripts')
   <script>
document.addEventListener('DOMContentLoaded', function () {
    const completionData = @json($completionStatus);

    function safeGetElement(id) {
        return document.getElementById(id);
    }

    function updateProfileCompletion(data) {
        const personalIconBg = safeGetElement('personal-icon-bg');
        const skillsIconBg = safeGetElement('skills-icon-bg');
        const completeIconBg = safeGetElement('complete-icon-bg');

        const personalProgress = safeGetElement('personal-progress');
        const skillsProgress = safeGetElement('skills-progress');
        const completeProgress = safeGetElement('complete-progress');

        const personalPercentage = safeGetElement('personal-percentage');
        const skillsPercentage = safeGetElement('skills-percentage');
        const completePercentage = safeGetElement('complete-percentage');

        const personalStatusBadge = safeGetElement('personal-status-badge');
        const skillsStatusBadge = safeGetElement('skills-status-badge');
        const completeStatusBadge = safeGetElement('complete-status-badge');

        const overallProgress = safeGetElement('overall-progress');
        const overallPercentage = safeGetElement('overall-percentage');
        const actionButton = safeGetElement('completion-action');

        if (!personalIconBg || !skillsIconBg || !completeIconBg
            || !personalProgress || !skillsProgress || !completeProgress
            || !personalPercentage || !skillsPercentage || !completePercentage
            || !personalStatusBadge || !skillsStatusBadge || !completeStatusBadge
            || !overallProgress || !overallPercentage || !actionButton) {
            console.warn('Some profile completion elements not found.');
            return;
        }

        if (data.level === 'incomplete') {
            // Personal Info - Incomplete (30%)
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-danger-600 flex-center flex-shrink-0';
            personalProgress.style.width = '30%';
            personalPercentage.textContent = '30%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>Incomplete';

            // Skills - Not Started
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            skillsProgress.style.width = '0%';
            skillsPercentage.textContent = '0%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Not Started';

            // Complete - Not Started / Diproses
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            completeProgress.style.width = '0%';
            completePercentage.textContent = '0%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Diproses';

            actionButton.classList.remove('btn-success-600');
            actionButton.classList.add('btn-main-600');

        } else if (data.level === 'profile-complete') {
            // Personal Info - Complete
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
            personalProgress.style.width = '100%';
            personalPercentage.textContent = '100%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';

            // Skills - In Progress (30%)
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-warning-600 flex-center';
            skillsProgress.style.width = '30%';
            skillsPercentage.textContent = '30%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-warning-50 text-warning-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-warning-600 rounded-circle flex-shrink-0"></span>In Progress';

            // Complete - Not Started / Diproses
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
            completeProgress.style.width = '0%';
            completePercentage.textContent = '0%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Diproses';

            actionButton.classList.remove('btn-success-600');
            actionButton.classList.add('btn-main-600');

        } else if (data.level === 'skills-complete') {
            // Personal Info - Complete
            personalIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
            personalProgress.style.width = '100%';
            personalPercentage.textContent = '100%';
            personalStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';

            // Skills - Complete
            skillsIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center';
            skillsProgress.style.width = '100%';
            skillsPercentage.textContent = '100%';
            skillsStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';

            // Complete - Complete
            completeIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center';
            completeProgress.style.width = '100%';
            completePercentage.textContent = '100%';
            completeStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';

            actionButton.classList.remove('btn-main-600');
            actionButton.classList.add('btn-success-600');
        }

        // Update overall progress bar and percentage
        overallProgress.style.width = data.percentage + '%';
        overallPercentage.textContent = data.percentage + '%';

        // Update action button text
        actionButton.textContent = data.next_step;
    }

    function updateSubmissionStatus(data) {
    const submissionProgress = safeGetElement('submission-progress');
    const submissionPercentage = safeGetElement('submission-percentage');
    const submissionStatusBadge = safeGetElement('submission-status-badge');
    const submissionIconBg = safeGetElement('submission-icon-bg');

    if (!submissionProgress || !submissionPercentage || !submissionStatusBadge || !submissionIconBg) {
        console.warn('Some submission status elements not found.');
        return;
    }

    switch(data.submissionStatus) {
        case 'none':
            submissionProgress.style.width = '0%';
            submissionPercentage.textContent = '0%';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-info-600 rounded-circle flex-shrink-0"></span>Belum Ajukan';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-info-100 text-info-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-info-600 flex-center flex-shrink-0';
            break;

        case 'pending':
            submissionProgress.style.width = '75%';
            submissionPercentage.textContent = '75%';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-warning-600 rounded-circle flex-shrink-0"></span>Dalam Proses';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-warning-50 text-warning-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-warning-600 flex-center flex-shrink-0';
            break;

        case 'progressed': 
            submissionProgress.style.width = '85%';
            submissionPercentage.textContent = '85%';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-primary-600 rounded-circle flex-shrink-0"></span>Diteruskan';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-primary-50 text-primary-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-primary-600 flex-center flex-shrink-0';
            break;

        case 'rejected':
            submissionProgress.style.width = '50%';
            submissionPercentage.textContent = '50%';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>Ditolak';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-danger-600 flex-center flex-shrink-0';
            break;

        case 'accepted':
            submissionProgress.style.width = '100%';
            submissionPercentage.textContent = 'Diterima';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Diterima';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
            break;

        default:
            submissionProgress.style.width = '0%';
            submissionPercentage.textContent = '0%';
            submissionStatusBadge.innerHTML = '<span class="w-6 h-6 bg-secondary-600 rounded-circle flex-shrink-0"></span>Unknown';
            submissionStatusBadge.className = 'text-13 py-2 px-8 bg-secondary-100 text-secondary-600 d-inline-flex align-items-center gap-8 rounded-pill';
            submissionIconBg.className = 'w-40 h-40 rounded-circle bg-secondary-600 flex-center flex-shrink-0';
    }
}


  function updateOverallProgress(data) {
    const overallProgress = document.getElementById('overall-progress');
    const overallPercentage = document.getElementById('overall-percentage');
    const popup = document.getElementById('profile-popup');

    if (popup) popup.style.display = 'none';

    if (!data.profileComplete) {
        overallProgress.style.width = data.percentage + '%';
        overallPercentage.textContent = data.percentage + '%';
    } else {
        switch(data.submissionStatus) {
            case 'none':
                overallProgress.style.width = '50%';
                overallPercentage.textContent = '50%';
                if (popup) popup.style.display = 'block';
                break;
            case 'pending':
                overallProgress.style.width = '75%';
                overallPercentage.textContent = '75%';
                break;
            case 'progressed':
                overallProgress.style.width = '85%';
                overallPercentage.textContent = '85%';
                break;
            case 'rejected':
                overallProgress.style.width = '50%';
                overallPercentage.textContent = '50%';
                // Bar merah dihapus jadi tidak tampil apa-apa khusus untuk rejected
                break;
            case 'accepted':
                overallProgress.style.width = '100%';
                overallPercentage.textContent = '100%';
                break;
            default:
                overallProgress.style.width = '0%';
                overallPercentage.textContent = '0%';
        }
    }
}


    // Jalankan update
    updateProfileCompletion(completionData);
    updateSubmissionStatus(completionData);
    updateOverallProgress(completionData);

    // Event listener tombol aksi
    const actionButton = safeGetElement('completion-action');
    if (actionButton) {
        actionButton.addEventListener('click', function () {
            // default ke route profile.edit, bisa disesuaikan jika ada action lain
            window.location.href = '{{ route("profile.edit") }}';
        });
    }

    // Fungsi buat chart dengan ApexCharts
    function createChart(chartId, chartColor) {
        let currentYear = new Date().getFullYear();

        var options = {
            series: [{
                name: 'series1',
                data: [18, 25, 22, 40, 34, 55, 50, 60, 55, 65],
            }],
            chart: {
                type: 'area',
                width: 80,
                height: 42,
                sparkline: { enabled: true },
                toolbar: { show: false },
                padding: { left: 0, right: 0, top: 0, bottom: 0 }
            },
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 1,
                colors: [chartColor],
                lineCap: 'round'
            },
            grid: {
                show: true,
                borderColor: 'transparent',
                strokeDashArray: 0,
                position: 'back',
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: false } },
                padding: { top: 0, right: 0, bottom: 0, left: 0 }
            },
            fill: {
                type: 'gradient',
                colors: [chartColor],
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: [`${chartColor}00`],
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0.3,
                    stops: [0, 100]
                }
            },
            markers: {
                colors: [chartColor],
                strokeWidth: 2,
                size: 0,
                hover: { size: 8 }
            },
            xaxis: {
                labels: { show: false },
                categories: [`Jan ${currentYear}`, `Feb ${currentYear}`, `Mar ${currentYear}`, `Apr ${currentYear}`, `May ${currentYear}`, `Jun ${currentYear}`, `Jul ${currentYear}`, `Aug ${currentYear}`, `Sep ${currentYear}`, `Oct ${currentYear}`, `Nov ${currentYear}`, `Dec ${currentYear}`],
                tooltip: { enabled: false }
            },
            yaxis: { labels: { show: false } },
            tooltip: { x: { format: 'dd/MM/yy HH:mm' } }
        };

        var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
        chart.render();
    }

    // Contoh pemanggilan chart
    createChart('complete-course', '#2FB2AB');
    createChart('earned-certificate', '#27CFA7');
    createChart('course-progress', '#6142FF');
    createChart('community-support', '#FA902F');
});
</script>


@endpush