<?php

namespace Database\Seeders;

use App\Models\ThemeOption;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThemeOption::create([
            'primary_color' => '#5f57ea',
            'secondary_color' => '#9647db',
            'copyright'=> 'Copyright 2021 © Chatloop All rights reserved.',
            'language'=> 'en',
            'meta_title'=> 'chatloop',
            'meta_description'=> 'chatloop-Mobile App Landing' ,
            'meta_keywords' => 'chatloop',
            'meta_author_name' => 'chatloop',
            'required_name_email' => '1',
            'required_login' => '1',
            'comment_approved' => '0',
        ]);
    }
}
