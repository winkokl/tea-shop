<?php

namespace App\Providers;

use App\Domains\Announcement\Services\AnnouncementService;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\Order;
use Modules\Product\Entities\Product;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @param  AnnouncementService  $announcementService
     */
    public function boot(AnnouncementService $announcementService)
    {
        View::composer('*', function ($view) {
            $view->with('logged_in_user', auth()->user());
        });

        View::composer(['frontend.index', 'frontend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForFrontend());
        });

        View::composer(['backend.layouts.app'], function ($view) use ($announcementService) {
            $view->with('announcements', $announcementService->getForBackend());
        });

        View::composer('backend.includes.header', function ($view) {

            // $no_deliver_order = Order::where('delivery_status',0)
            // ->where('created_at','<=', Carbon::today()->subDays(7))
            // ->select('id')
            // ->count();
            $no_deliver_order = 0;

            // $inactive_product = Product::where('active',0)
            // ->where('created_at','<=', Carbon::today()->subDays(7))
            // ->select('id')
            // ->count();
            $inactive_product = 0;

            $view->with('inactive_product', $inactive_product)
                ->with('no_deliver_order', $no_deliver_order);
        });
    }
}
