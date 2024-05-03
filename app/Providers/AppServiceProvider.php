<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Language;
use App\Models\Network;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Model::shouldBeStrict();

        $languages = Language::all();
        $contact = Contact::firstOrFail();
        $networks = Network::all();

        view()->share([
            'languages' => $languages,
            'contact' => $contact,
            'networks' => $networks,
        ]);
    }
}
