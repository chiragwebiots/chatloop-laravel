<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            'site_name' => 'Chaloop',
            'site_tagline' => 'Mobile App Landing',
            'site_url' => 'http://localhost:8000/',
            'administration_email' => 'admin@chatloop.com',
            'timezone' => 'Asia/Kolkata',
            'display_homepage' => 'post',
            'post_show' => 20,
            'page_base' => 'page',
            'post_base' => 'blogs',
            'category_base' => 'category',
            'tag_base' => 'tag',
            'mail_transport' => 'smtp',
            'mail_host' => 'smtp.mailgun.org',
            'mail_port' => 587,
            'mail_encryption' => 'tls',
            'mail_username' => null,
            'mail_password' => null,
            'mail_from_address' => null,
            'mail_from_name' => null,
            'google_analytics' => 281678007,
            'facebook_pixel' => null,
            
        ]);
    }
}
