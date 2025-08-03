@extends('layouts.user.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row gy-4">
        <div class="col-lg-9">
            @include('layouts.user.components.greeting-box ')
             @include('layouts.user.components.ajukan-magang')
            <div class="row gy-4 mb-26 mt-10">
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2">155+</h4>
                            <span class="text-gray-600">Completed Courses</span>
                            <div class="flex-between gap-8 mt-16">
                                <span
                                    class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i
                                        class="ph-fill ph-book-open"></i></span>
                                <div id="complete-course" class="remove-tooltip-title rounded-tooltip-value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2">39+</h4>
                            <span class="text-gray-600">Earned Certificate</span>
                            <div class="flex-between gap-8 mt-16">
                                <span
                                    class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i
                                        class="ph-fill ph-certificate"></i></span>
                                <div id="earned-certificate" class="remove-tooltip-title rounded-tooltip-value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2">25+</h4>
                            <span class="text-gray-600">Course in Progress</span>
                            <div class="flex-between gap-8 mt-16">
                                <span
                                    class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl">
                                    <i class="ph-fill ph-graduation-cap"></i></span>
                                <div id="course-progress" class="remove-tooltip-title rounded-tooltip-value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-2">18k+</h4>
                            <span class="text-gray-600">Community Support</span>
                            <div class="flex-between gap-8 mt-16">
                                <span
                                    class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-warning-600 text-white text-2xl"><i
                                        class="ph-fill ph-users-three"></i></span>
                                <div id="community-support" class="remove-tooltip-title rounded-tooltip-value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
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
            // Ambil data dari controller Laravel
            const completionData = @json($completionStatus);

            function updateProfileCompletion(data) {
                // Icon backgrounds
                const personalIconBg = document.getElementById('personal-icon-bg');
                const skillsIconBg = document.getElementById('skills-icon-bg');
                const completeIconBg = document.getElementById('complete-icon-bg');

                // Progress bars
                const personalProgress = document.getElementById('personal-progress');
                const skillsProgress = document.getElementById('skills-progress');
                const completeProgress = document.getElementById('complete-progress');

                // Percentages
                const personalPercentage = document.getElementById('personal-percentage');
                const skillsPercentage = document.getElementById('skills-percentage');
                const completePercentage = document.getElementById('complete-percentage');

                // Status badges
                const personalStatusBadge = document.getElementById('personal-status-badge');
                const skillsStatusBadge = document.getElementById('skills-status-badge');
                const completeStatusBadge = document.getElementById('complete-status-badge');

                // Overall progress
                const overallProgress = document.getElementById('overall-progress');
                const overallPercentage = document.getElementById('overall-percentage');
                const actionButton = document.getElementById('completion-action');

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

                    // Complete - Pending
                    completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
                    completeProgress.style.width = '0%';
                    completePercentage.textContent = '0%';
                    completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
                    completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Pending';

                } else if (data.level === 'profile-complete') {
                    // Personal Info - Complete
                    personalIconBg.className = 'w-40 h-40 rounded-circle bg-success-600 flex-center flex-shrink-0';
                    personalProgress.style.width = '100%';
                    personalPercentage.textContent = '100%';
                    personalStatusBadge.className = 'text-13 py-2 px-8 bg-success-50 text-success-600 d-inline-flex align-items-center gap-8 rounded-pill';
                    personalStatusBadge.innerHTML = '<span class="w-6 h-6 bg-success-600 rounded-circle flex-shrink-0"></span>Complete';

                    // Skills - In Progress
                    skillsIconBg.className = 'w-40 h-40 rounded-circle bg-warning-600 flex-center';
                    skillsProgress.style.width = '30%';
                    skillsPercentage.textContent = '30%';
                    skillsStatusBadge.className = 'text-13 py-2 px-8 bg-warning-50 text-warning-600 d-inline-flex align-items-center gap-8 rounded-pill';
                    skillsStatusBadge.innerHTML = '<span class="w-6 h-6 bg-warning-600 rounded-circle flex-shrink-0"></span>In Progress';

                    // Complete - Pending
                    completeIconBg.className = 'w-40 h-40 rounded-circle bg-gray-400 flex-center';
                    completeProgress.style.width = '0%';
                    completePercentage.textContent = '0%';
                    completeStatusBadge.className = 'text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill';
                    completeStatusBadge.innerHTML = '<span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>Pending';

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

                // Update overall progress - menggunakan data dari controller
                overallProgress.style.width = data.percentage + '%';
                overallPercentage.textContent = data.percentage + '%';
                actionButton.textContent = data.next_step;
            }

            updateProfileCompletion(completionData);

            document.getElementById('completion-action').addEventListener('click', function () {
                const action = completionData.next_action;
                if (action === 'profile-edit') {
                    window.location.href = '{{ route("profile.edit") }}';
                } else if (action === 'skills-edit') {
                    window.location.href = '{{ route("profile.edit") }}';
                } else {
                    window.location.href = '{{ route("profile.edit") }}';
                }
            });
        });

        function createChart(chartId, chartColor) {

            let currentYear = new Date().getFullYear();

            var options = {
                series: [
                    {
                        name: 'series1',
                        data: [18, 25, 22, 40, 34, 55, 50, 60, 55, 65],
                    },
                ],
                chart: {
                    type: 'area',
                    width: 80,
                    height: 42,
                    sparkline: {
                        enabled: true // Remove whitespace
                    },

                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
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
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: false
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.5
                    },
                    padding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                },
                fill: {
                    type: 'gradient',
                    colors: [chartColor], // Set the starting color (top color) here
                    gradient: {
                        shade: 'light', // Gradient shading type
                        type: 'vertical',  // Gradient direction (vertical)
                        shadeIntensity: 0.5, // Intensity of the gradient shading
                        gradientToColors: [`${chartColor}00`], // Bottom gradient color (with transparency)
                        inverseColors: false, // Do not invert colors
                        opacityFrom: .5, // Starting opacity
                        opacityTo: 0.3,  // Ending opacity
                        stops: [0, 100],
                    },
                },
                // Customize the circle marker color on hover
                markers: {
                    colors: [chartColor],
                    strokeWidth: 2,
                    size: 0,
                    hover: {
                        size: 8
                    }
                },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: [`Jan ${currentYear}`, `Feb ${currentYear}`, `Mar ${currentYear}`, `Apr ${currentYear}`, `May ${currentYear}`, `Jun ${currentYear}`, `Jul ${currentYear}`, `Aug ${currentYear}`, `Sep ${currentYear}`, `Oct ${currentYear}`, `Nov ${currentYear}`, `Dec ${currentYear}`],
                    tooltip: {
                        enabled: false,
                    },
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }
        createChart('complete-course', '#2FB2AB');
        createChart('earned-certificate', '#27CFA7');
        createChart('course-progress', '#6142FF');
        createChart('community-support', '#FA902F');
    </script>
@endpush