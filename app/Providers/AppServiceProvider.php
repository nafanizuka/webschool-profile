<?php

namespace App\Providers;

use App\Models\PengaturanWebsite;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Make the site-wide settings (name, logo, contact info, social
        // links) available to every view, e.g. the shared header/footer.
        View::composer('*', function ($view) {
            static $pengaturan = null;

            if ($pengaturan === null) {
                try {
                    $pengaturan = Schema::hasTable('pengaturan_website')
                        ? PengaturanWebsite::allSettings()
                        : [];
                } catch (\Throwable $e) {
                    $pengaturan = [];
                }
            }

            $view->with('pengaturan', $pengaturan);
        });
    }
}
