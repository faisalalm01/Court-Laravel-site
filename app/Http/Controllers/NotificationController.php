<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = Notification::where('id_user', $user->id_user)->get();
        return view('dashboard.notifications', [
            'title' => 'Dashboard | Notifikasi',
            'data' => $notifications
        ]);
    }
    public function markNotifRead($id_notification)
    {
        $user = auth()->user();
        $notif = Notification::where('id_notification', $id_notification)
            ->where('id_user', $user->id_user)
            ->firstOrFail();

        $notif->update(['dibaca' => true]);

        // Hitung ulang jumlah notifikasi belum dibaca
        $notifCount = Notification::where('id_user', auth()->id())
            ->where('dibaca', false)
            ->count();

        return response()->json([
            'success' => true,
            'notifCount' => $notifCount
        ]);
    }
    public function markAllRead()
    {
        $user = Auth::user();
        Notification::where('id_user', $user->id_user)
            ->where('dibaca', false)
            ->update(['dibaca' => true]);

        $notifCount = Notification::where('id_user', $user->id_user)
            ->where('dibaca', false)
            ->count();

        return response()->json([
            'success' => true,
            'notifCount' => $notifCount
        ]);
    }
    public function check()
    {
        $user = auth()->user();
        $notifications = Notification::where('id_user', $user->id_user)
            ->latest()
            ->take(10)
            ->get()
            ->map(function ($notif) {
                return [
                    'id' => $notif->id_notification,
                    'pesan' => $notif->pesan,
                    'dibaca' => $notif->dibaca,
                    'time' => $notif->created_at->diffForHumans()
                ];
            });

        $notifCount = Notification::where('id_user', $user->id_user)
            ->where('dibaca', false)
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'notifCount' => $notifCount
        ]);
    }
}
