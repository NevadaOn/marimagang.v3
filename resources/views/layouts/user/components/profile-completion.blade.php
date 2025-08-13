<div class="card mt-24 overflow-hidden">
    <div class="card-header">
        <div class="mb-0 flex-between flex-wrap gap-8">
            <h4 class="mb-0">bar Progres</h4>
            <a href="{{ route('profile.edit') }}"
                class="text-13 fw-medium text-main-600 hover-text-decoration-underline">Lihat/Edit Profile</a>
        </div>
    </div>
<div class="card-body">
  <div class="mb-24 position-relative">
    <!-- Popup info muncul di atas progress bar -->
    <div id="profile-popup" class="popup-info" style="display:none; position:absolute; top:-30px; left:0; right:0; text-align:center; font-size:14px; color:#2f855a; font-weight:600;">
      Profil lengkap, silahkan melakukan pengajuan untuk menaikkan status bar
    </div>

    <div class="flex-between mb-8">
      <span class="text-15 fw-medium text-gray-900">Kelengkapan Profile dan status Pengajuan</span>
      <span class="text-15 fw-medium text-main-600" id="overall-percentage">33%</span>
    </div>

    <div class="progress bg-main-100 rounded-pill h-8" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="33">
      <div id="overall-progress" class="progress-bar bg-main-600 rounded-pill" style="width: 33%"></div>
      <!-- Bar penolakan merah -->
      <div id="overall-progress-reject" class="progress-bar bg-danger-600 rounded-pill" style="width: 0; position: absolute; top: 0; left: 50%; height: 100%; transition: width 0.3s;"></div>
    </div>
  </div>
</div>

    <div class="card-body p-0 overflow-x-auto scroll-sm scroll-sm-horizontal">
        <table class="table style-two mb-0">
            <thead>
                <tr>
                    <th>Bagian Profil</th>
                    <th>Kelengkapan</th>
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
                                <h6 class="mb-0">Informasi Pribadi</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Universitas & Kontak</span>
                                    <span class="text-13 text-gray-600">Diperlukan</span>
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
                                <h6 class="mb-0">Keterampilan & Keahlian</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Keterampilan Teknis</span>
                                    <span class="text-13 text-gray-600">Diperlukan</span>
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
                                <h6 class="mb-0">Profil Lengkap</h6>
                                <div class="table-list">
                                    <span class="text-13 text-gray-600">Siap Magang</span>
                                    <span class="text-13 text-gray-600">Langkah Terakhir</span>
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
                                Tertunda
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
  <td>
    <div class="flex-align gap-8">
      <div class="w-40 h-40 rounded-circle bg-info-600 flex-center flex-shrink-0" id="submission-icon-bg">
        <i class="ph ph-file-text text-white"></i>
      </div>
      <div>
        <h6 class="mb-0">Status Pengajuan</h6>
        <div class="table-list">
          <span class="text-13 text-gray-600">Pengajuan Magang</span>
          <span class="text-13 text-gray-600">Proses</span>
        </div>
      </div>
    </div>
  </td>
  <td>
    <div class="flex-align gap-8 mt-12">
      <div class="progress w-100px bg-main-100 rounded-pill h-4" role="progressbar">
        <div class="progress-bar bg-info-600 rounded-pill" style="width: 0%" id="submission-progress"></div>
      </div>
      <span class="text-info-600 flex-shrink-0 text-13 fw-medium" id="submission-percentage">0%</span>
    </div>
  </td>
  <td>
    <div class="flex-align justify-content-center gap-16">
      <span class="text-13 py-2 px-8 bg-info-100 text-info-600 d-inline-flex align-items-center gap-8 rounded-pill" id="submission-status-badge">
        <span class="w-6 h-6 bg-info-600 rounded-circle flex-shrink-0"></span>
        Belum Ajukan
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
            Informasi Pribadi Lengkap
        </button>
    </div>
</div>
