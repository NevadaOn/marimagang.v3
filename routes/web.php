<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\{
    AuthController,
    DashboardController,
    PengajuanController,
    LogbookController,
    ProfileController,
    SkillController,
    NotificationController,
    Auth\ForgotPasswordController,
    Auth\ResetPasswordController,
    Admin\AdminDashboardController,
    Admin\AdminPengajuanController,
    Admin\AdminUserController,
    Admin\AdminController,
    Admin\AdminBidangController,
    Admin\ReportController,
    BidangController,
    LandingDocumentationController,
    Admin\DocumentationController
};

Route::prefix('dokumentasi')->name('landing.documentation.')->group(function () {
    Route::get('/', [LandingDocumentationController::class, 'index'])->name('index');
    Route::get('/{id}', [LandingDocumentationController::class, 'show'])->name('show');
});

// Route::get('/', fn () => view('welcome'));

Route::get('/', [BidangController::class, 'index'])->name('welcome');
Route::get('/bidang/{slug}', [BidangController::class, 'show'])->name('bidang.show');


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('email')->group(function () {
    Route::get('/verify', fn () => view('auth.verify-email'))
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/verify/{id}/{hash}', function (Request $request, $id, $hash) {
        Session::put('pending_verification', [
            'id' => $id,
            'hash' => $hash,
            'expires' => $request->query('expires'),
            'signature' => $request->query('signature'),
        ]);

        return redirect()->route('login')->with('status', 'Silakan login untuk menyelesaikan verifikasi email Anda.');
    })->middleware('signed')->name('verification.verify');

    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi telah dikirim ulang!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::get('/user/check-verification', function () {
    return response()->json([
        'verified' => auth()->user()->hasVerifiedEmail(),
    ]);
})->middleware('auth')->name('user.check-verification');

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
     Route::get('/notifikasi', [NotificationController::class, 'userNotifications'])->name('notifications.page');

    Route::post('/notifikasi/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifikasi/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        
        // === PROFILE MANAGEMENT ===
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::put('/update', 'updateProfile')->name('profile.update'); // Khusus untuk profile saja
        
        // === SKILLS MANAGEMENT ===
        Route::post('/skills', 'storeSkill')->name('profile.skills.store');
        Route::put('/skills/{userSkillId}', 'updateSkill')->name('profile.skills.update');
        Route::delete('/skills/{userSkillId}', 'destroySkill')->name('profile.skills.destroy');
        
        // === PROJECTS MANAGEMENT ===
        // Project data tersimpan di Skill model sesuai struktur existing
        Route::delete('/skills/{userSkillId}/project', 'destroyProject')->name('profile.projects.destroy');
        
        // === UTILITIES ===
        Route::post('/search-nim', 'searchByNIM')->name('profile.search-nim');
    });

    Route::controller(PengajuanController::class)->group(function () {
        Route::get('/pengajuan/tipe', 'tipe')->name('pengajuan.tipe');
        Route::post('/pengajuan/tipe', 'selectType')->name('pengajuan.selectType');
        Route::get('/pengajuan/{pengajuan}/manage-anggota', 'editAnggota')->name('pengajuan.anggota.edit');
        Route::post('/pengajuan/{pengajuan}/manage-anggota', 'storeAnggota')->name('pengajuan.anggota.store');
    });

    Route::get('/user/search-nim', [ProfileController::class, 'searchByNIM'])->name('user.search-nim');

    Route::controller(NotificationController::class)->prefix('notifications')->group(function () {
        Route::get('/', 'userNotifications')->name('notifications.user'); 
        Route::get('/json', 'index')->name('notifications.json'); 
        Route::post('/{id}/read', 'markAsRead');
        Route::post('/read-all', 'markAllAsRead');
        Route::get('/unread-count', 'getUnreadCount');
    });


    Route::post('/invitation/accept/{anggotaId}', [DashboardController::class, 'acceptInvitation'])->name('invitation.accept');
    Route::post('/invitation/reject/{anggotaId}', [DashboardController::class, 'rejectInvitation'])->name('invitation.reject');
    Route::post('/notification/{notificationId}/read', [DashboardController::class, 'markNotificationRead'])->name('notification.read');

    Route::resource('pengajuan', PengajuanController::class);
    Route::resource('logbook', LogbookController::class);
});

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('documentation', DocumentationController::class);

    Route::controller(AdminPengajuanController::class)->prefix('pengajuan')->name('pengajuan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/bidang', 'bidang')->name('bidang');
        Route::put('/{id}/status', 'updateStatus')->name('updateStatus');
        Route::get('/{id}', 'show')->name('show');
        Route::get('bidang/{id}', 'showbidang')->name('showbidang');
        Route::post('/{id}/catatan', 'kirimCatatan')->name('kirimCatatan');
        Route::patch('/{id}/update-bidang', 'updateBidang')->name('updateBidang');
        Route::post('/{id}/approve', 'approve')->name('approve');
        Route::post('/{id}/reject', 'reject')->name('reject');
        Route::put('/{pengajuan}/update-tanggal', 'updateTanggal')->name('updateTanggal');
        Route::get('/{id}/download/{document}', 'downloadDocument')->name('download');
        Route::post('/{id}/upload-surat', 'uploadSurat')->name('uploadSurat');
        Route::post('/{id}/generate-surat', 'generateSurat')->name('generateSurat');
        Route::post('/{id}/generate-kesediaan', 'generateSuratKesediaan')->name('kesediaan.generate');
    });

    Route::get('/user-details/{pengajuanId}', [AdminDashboardController::class, 'getUserDetails'])
        ->name('user.details');

    Route::middleware('superadmin')->group(function () {
        Route::controller(AdminUserController::class)->prefix('users')->name('users.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}/status', 'updateStatus')->name('updateStatus');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::controller(AdminBidangController::class)->prefix('bidang')->name('bidang.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-management')->name('admin.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('index');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            Route::post('/', [AdminController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/pengajuan', [ReportController::class, 'pengajuan'])->name('pengajuan');
            Route::get('/users', [ReportController::class, 'users'])->name('users');
            Route::get('/statistik', [ReportController::class, 'statistik'])->name('statistik');
            Route::get('/export/pengajuan', [ReportController::class, 'exportPengajuan'])->name('export.pengajuan');
            Route::get('/export/users', [ReportController::class, 'exportUsers'])->name('export.users');
        });
    });
});


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/kontak', [App\Http\Controllers\LandingDocumentationController::class, 'kontak'])->name('kontak');
