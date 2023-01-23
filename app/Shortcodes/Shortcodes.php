<?php
namespace App\Shortcodes;

class Shortcodes{

  public function register($shortcode)
  {
    $view = 'frontend.sections.'.$shortcode->name;

    if (view()->exists($view)) {

      return view($view)->render();
      
    }else {

      return $shortcode->name.' Section Not Exists';

    }

  }

}
