<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PageController;
use App\Services\MailtrapService;
use App\Models\Enquiry;

class AppServiceProvider extends ServiceProvider
{
    public function boot(PageController $pageController)
    {
        View::composer(['includes.header', 'includes.footer'], function ($view) use ($pageController) {
            $contactInfo = $pageController->getContactInfo();
            $view->with('contactInfo', $contactInfo);
        });

        // Pass unread enquiries only to the header view
        View::composer('includes.header', function ($view) {
            $unreadEnquiries = Enquiry::where('Status', 0)->count();
            $view->with('unreadEnquiries', $unreadEnquiries);
        });
    }

    public function register()
    {
        $this->app->singleton(MailtrapService::class, function ($app) {
            return new MailtrapService();
        });
    }
}
