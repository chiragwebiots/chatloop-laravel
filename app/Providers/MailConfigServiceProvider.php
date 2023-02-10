<?php

namespace App\Providers;

use App\Helpers\Helpers;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    // public function register()
    // {
    //     if (Helpers::installation()) {
    //         if (\Schema::hasTable('settings'))
    //         {
    //             $setting = \DB::table('settings')->first();
    //             if($setting)
    //             {
    //                 $mailConfig = [
    //                     'transport' => $setting->mail_transport,
    //                     'host' => $setting->mail_host,
    //                     'port' => $setting->mail_port,
    //                     'encryption' => $setting->mail_encryption,
    //                     'username' => $setting->mail_username,
    //                     'password' => $setting->mail_password,
    //                     'timeout' => null
    //                 ];

    //                 $mailFrom = [
    //                     'address' => $setting->mail_from_address,
    //                     'name' => $setting->mail_from_name
    //                 ];

    //                 // To set configuration values at runtime, pass an array to the config helper
    //                 config(['mail.mailers.smtp' => $mailConfig]);
    //                 config(['mail.from' => $mailFrom]);
    //             }
    //         }
    //     }
    // }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
