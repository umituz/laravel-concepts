<?php

namespace App\Providers;

use App\Helpers\MacroHelper;
use App\Mixins\StatusMixin;
use App\Mixins\StrMixin;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Class MacroableServiceProvider
 * @package App\Providers
 */
class MacroableServiceProvider extends ServiceProvider
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
     * @return void
     */
    public function boot()
    {
        MacroHelper::macro('test',function(){
            return "test";
        });

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

        MacroHelper::mixin(new StatusMixin());
    }
}
