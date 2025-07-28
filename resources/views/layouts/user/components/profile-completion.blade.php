<div class="card mt-24 overflow-hidden">
    <div class="card-header">
        <div class="mb-0 flex-between flex-wrap gap-8">
            <h4 class="mb-0">Profile Completion</h4>
            <a href="{{ route('profile.edit') }}"
                class="text-13 fw-medium text-main-600 hover-text-decoration-underline">Lihat/Edit Profile</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Overall Progress -->
        <div class="mb-24">
            <div class="flex-between mb-8">
                <span class="text-15 fw-medium text-gray-900">Overall Progress</span>
                <span class="text-15 fw-medium text-main-600" id="overall-percentage">33%</span>
            </div>
            <div class="progress bg-main-100 rounded-pill h-8" role="progressbar">
                <div class="progress-bar bg-main-600 rounded-pill" style="width: 33%" id="overall-progress"></div>
            </div>
        </div>
    </div>

    <!-- Profile Steps Table -->
    <div class="card-body p-0 overflow-x-auto scroll-sm scroll-sm-horizontal">
        <table class="table style-two mb-0">
            <thead>
                <tr>
                    <th>Profile Section</th>
                    <th>Progress</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Personal Information Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-main-600 flex-center flex-shrink-0"
                                id="personal-icon-bg">
                                <i class="ph ph-user text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Personal Information</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">University & Contact</span>
                                    <span class="text-13 text-gray-600">Required</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%"
                                    id="personal-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium"
                                id="personal-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span
                                class="text-13 py-2 px-8 bg-danger-50 text-danger-600 d-inline-flex align-items-center gap-8 rounded-pill"
                                id="personal-status-badge">
                                <span class="w-6 h-6 bg-danger-600 rounded-circle flex-shrink-0"></span>
                                Incomplete
                            </span>
                        </div>
                    </td>
                </tr>

                <!-- Skills & Expertise Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-purple-600 flex-center" id="skills-icon-bg">
                                <i class="ph ph-gear text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Skills & Expertise</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Technical Skills</span>
                                    <span class="text-13 text-gray-600">Required</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%"
                                    id="skills-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium" id="skills-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span
                                class="text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill"
                                id="skills-status-badge">
                                <span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>
                                Not Started
                            </span>
                        </div>
                    </td>
                </tr>

                <!-- Profile Complete Row -->
                <tr>
                    <td>
                        <div class="flex-align gap-8">
                            <div class="w-40 h-40 rounded-circle bg-warning-600 flex-center" id="complete-icon-bg">
                                <i class="ph ph-check-circle text-white"></i>
                            </div>
                            <div class="">
                                <h6 class="mb-0">Profile Complete</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Ready for Internship</span>
                                    <span class="text-13 text-gray-600">Final Step</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align gap-8 mt-12">
                            <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
                                <div class="progress-bar bg-main-600 rounded-pill" style="width: 0%"
                                    id="complete-progress"></div>
                            </div>
                            <span class="text-main-600 flex-shrink-0 text-13 fw-medium"
                                id="complete-percentage">0%</span>
                        </div>
                    </td>
                    <td>
                        <div class="flex-align justify-content-center gap-16">
                            <span
                                class="text-13 py-2 px-8 bg-gray-100 text-gray-600 d-inline-flex align-items-center gap-8 rounded-pill"
                                id="complete-status-badge">
                                <span class="w-6 h-6 bg-gray-600 rounded-circle flex-shrink-0"></span>
                                Pending
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Action Button -->
    <div class="card-body pt-0">
        <button class="btn btn-main-600 btn-sm w-100" id="completion-action">
            Complete Personal Information
        </button>
    </div>
</div>