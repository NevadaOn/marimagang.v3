<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index(Request $request)
    {
        $userId = auth()->id();
        $notifications = $this->notificationService->getLatestNotifications($userId, 20);
        $unreadCount = $this->notificationService->getUnreadCount($userId);

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    public function userNotifications()
    {
        $userId = auth()->id();
        $notifications = Notification::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();        

        return view('notifications', compact('notifications'));
    }

    public function adminNotifications()
    {
        $admin = auth()->user();
        $notifications = Notification::where('user_id', $admin->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.notifications', compact('notifications'));
    }


    public function markAsRead(Request $request, $id)
    {
        $userId = auth()->id();
        $this->notificationService->markAsRead($id, $userId);

        return redirect()->back();
    }

    public function markAllAsRead(Request $request)
    {
        $userId = auth()->id();
        $this->notificationService->markAllAsRead($userId);

        return response()->json(['message' => 'All notifications marked as read']);
    }

    public function getUnreadCount()
    {
        $userId = auth()->id();
        $count = $this->notificationService->getUnreadCount($userId);

        return response()->json(['unread_count' => $count]);
    }

    public function destroyAll()
    {
        $notification = Notification::where('user_id', auth()->id())->delete();
        return response()->json(['message' => 'Berhasil menghapus semua notifikasi']);
    }

    public function destroy($id)
    {
        $notification = Notification::where('user_id', auth()->id())->findOrFail($id);
        $notification->delete();

        return response()->json(['message' => 'Notifikasi dihapus']);
    }

    

}

