<?php
namespace App\Helpers;

use App\Models\Media;
use App\Models\Module;
use Illuminate\Support\Facades\Storage;

class Helpers
{

    public static function modules()
    {
        return Module::get();
    }

    public static function media($id)
    {
        return Media::find($id);
    }

    public static function installation() {

        if (Storage::disk('local')->exists(config('config.installation'))) {

            $install = json_decode(Storage::get(config('config.installation')));

            if ($install->application_installation === 'Completed') {

                return true;
            }

            return true;
        }

        return false;
    }

    public static function migration() {

        if (Storage::disk('local')->exists(config('config.migration')) === true) {

            $install = json_decode(Storage::get(config('config.migration')));

            if ($install->application_migration == 'true') {

                return true;
            }

            return true;
        }

        return false;
    }

}



