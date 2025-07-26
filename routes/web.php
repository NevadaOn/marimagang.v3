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

Route::get('/', fn () => view('welcome'));

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

    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/edit', 'edit')->name('profile.edit');
        Route::put('/update', 'update')->name('profile.update');
    });

    Route::controller(SkillController::class)->group(function () {
        Route::get('/skills/edit', 'edit')->name('skills.edit');
        Route::post('/skills/update', 'update')->name('skills.update');
        Route::delete('/skills/{id}', 'destroy')->name('skills.destroy');
        Route::delete('/skills/{id}/project', 'destroyProject')->name('skills.destroyProject');
        Route::get('/abilities', 'index')->name('abilities.index');
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
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('documentation', DocumentationController::class);
    
    Route::get('/user-details/{pengajuanId}', [AdminDashboardController::class, 'getUserDetails'])
        ->name('admin.user.details');

    Route::post('/pengajuan/{id}/generate-kesediaan', [AdminPengajuanController::class, 'generateSuratKesediaan'])
        ->name('admin.pengajuan.kesediaan.generate');
    
    Route::controller(AdminPengajuanController::class)->prefix('pengajuan')->group(function () {
        Route::get('/', 'index')->name('admin.pengajuan.index');
        Route::get('/pengajuan/bidang', 'bidang')->name('admin.pengajuan.bidang');
        Route::put('/{id}/status', 'updateStatus')->name('admin.pengajuan.updateStatus');
        Route::get('/{id}', 'show')->name('admin.pengajuan.show');
        Route::get('bidang/{id}', 'showbidang')->name('admin.pengajuan.showbidang');
        Route::post('/{id}/catatan', 'kirimCatatan')->name('admin.pengajuan.kirimCatatan');
        Route::patch('/admin/pengajuan/{id}/update-bidang', [AdminPengajuanController::class, 'updateBidang'])->name('admin.pengajuan.updateBidang');
        Route::post('/{id}/approve', 'approve')->name('admin.pengajuan.approve');
        Route::post('/{id}/reject', 'reject')->name('admin.pengajuan.reject');
        Route::put('/admin/pengajuan/{pengajuan}/update-tanggal', [AdminPengajuanController::class, 'updateTanggal'])->name('admin.pengajuan.updateTanggal');
        Route::get('/{id}/download/{document}', 'downloadDocument')->name('admin.pengajuan.download');
        Route::post('/admin/pengajuan/{id}/upload-surat', [AdminPengajuanController::class, 'uploadSurat'])->name('admin.pengajuan.uploadSurat');
        Route::post('/admin/pengajuan/{id}/generate-surat', [AdminPengajuanController::class, 'generateSurat'])->name('admin.pengajuan.generateSurat');
        // Route::post('/pengajuan/{id}/generate-kesediaan', [AdminPengajuanController::class, 'generateSuratKesediaan'])->name('admin.pengajuan.kesediaan.generate');
    });
    
    Route::middleware('superadmin')->group(function () {
        Route::controller(AdminUserController::class)->prefix('users')->group(function () {
            Route::get('/', 'index')->name('admin.users.index');
            Route::get('/{id}', 'show')->name('admin.users.show');
            Route::put('/{id}/status', 'updateStatus')->name('admin.users.updateStatus');
            Route::delete('/{id}', 'destroy')->name('admin.users.destroy');
        });
        
        Route::controller(AdminBidangController::class)->prefix('bidang')->group(function () {
            Route::get('/', 'index')->name('admin.bidang.index');
            Route::get('/create', 'create')->name('admin.bidang.create');
            Route::post('/', 'store')->name('admin.bidang.store');
            Route::get('/{id}', 'show')->name('admin.bidang.show');
            Route::get('/{id}/edit', 'edit')->name('admin.bidang.edit');
            Route::put('/{id}', 'update')->name('admin.bidang.update');
            Route::delete('/{id}', 'destroy')->name('admin.bidang.destroy');
        });
        
        Route::prefix('admin-management')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.admin.index');
            Route::get('/create', [AdminController::class, 'create'])->name('admin.admin.create');
            Route::post('/', [AdminController::class, 'store'])->name('admin.admin.store');
            Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('admin.admin.edit');
            Route::put('/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
            Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.admin.destroy');
        });

        Route::prefix('reports')->group(function () {
            Route::get('/pengajuan', [ReportController::class, 'pengajuan'])->name('admin.reports.pengajuan');
            Route::get('/users', [ReportController::class, 'users'])->name('admin.reports.users');
            Route::get('/statistik', [ReportController::class, 'statistik'])->name('admin.reports.statistik');
            Route::get('/export/pengajuan', [ReportController::class, 'exportPengajuan'])->name('admin.reports.export.pengajuan');
            Route::get('/export/users', [ReportController::class, 'exportUsers'])->name('admin.reports.export.users');
        });
    });
});


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});