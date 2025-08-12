<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Chat;
use App\Models\Pengajuan; // ✅ tambahkan
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Carbon::setLocale('id');
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $view->with('notifications', Notification::latest()->take(10)->get());
        });

        View::composer('layouts.superadmin', function ($view) {
            $adminId = auth()->id();

            if ($adminId) {
                $latestChats = Chat::select('chats.*')
                    ->join(DB::raw('(SELECT MAX(id) as id FROM chats WHERE receiver_id = '.$adminId.' AND read_at IS NULL GROUP BY sender_id) latest'), 'chats.id', '=', 'latest.id')
                    ->with('sender')
                    ->orderBy('chats.created_at', 'desc')
                    ->get();

                $view->with('latestChats', $latestChats);
            } else {
                $view->with('latestChats', collect());
            }
        });

        View::composer('layouts.superadmin', function ($view) {
            $notifikasiPengajuan = Pengajuan::whereIn('status', ['diproses', 'diteruskan'])
                ->orWhereDate('created_at', Carbon::today())
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            $view->with('notifikasiPengajuan', $notifikasiPengajuan);
        });
    }
}
