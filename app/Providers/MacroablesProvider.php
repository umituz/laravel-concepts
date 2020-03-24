<?php

namespace App\Providers;

use App\Mixins\StrMixin;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class MacroablesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @throws \ReflectionException
     */
    public function boot()
    {
        Str::macro('partNumber', function ($part) {
            return 'PROVIDER-' . substr($part, 0, 3) . '-' . substr($part, 3);
        });

        Str::mixin(new StrMixin(),true);

        ResponseFactory::macro('errorJson', function ($message = 'Default Message') {
            return [
                'message' => $message,
                'error_code' => 123
            ];
        });
    }
}
