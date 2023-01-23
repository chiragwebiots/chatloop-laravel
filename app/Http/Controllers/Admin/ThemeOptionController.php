<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ThemeOptionController extends Controller
{
    private $theme;

    public function __construct()
    {
        $this->theme = ThemeOption::first();
    }

    public function index()
    {
        $theme = request()->name;

        if (view()->exists("admin.theme_options.{$theme}")) {

            return view("admin.theme_options.{$theme}", ['theme' => $this->theme]);

        }else {

            abort(404);
        }

        return view("admin.theme_options.{$theme}");
    }

    public function update(Request $request)
    {
        try {

            DB::commit();

            $this->theme->update($request->except(['_method', '_token']));

            return back()->with('message', 'Theme updated successfully.');

        }catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }
}
