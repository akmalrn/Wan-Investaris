<?php

namespace App\Providers;

use App\Models\admin\ProjectNotification as AdminProjectNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::guard('employees')->check()) {
                $userId = Auth::guard('employees')->id();

                // Hitung notifikasi untuk pengguna saat ini
                $notificationsCount = AdminProjectNotification::where(function ($query) use ($userId) {
                    $query->where('team_member_id', $userId)
                        ->orWhere('leader_id', $userId);
                })->count();
            } else {
                $notificationsCount = 0;
            }

            // Bagikan data `notificationsCount` ke semua view
            $view->with('notificationsCount', $notificationsCount);
        });
    }
}
