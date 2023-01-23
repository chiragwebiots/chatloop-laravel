<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{

    private $sections = [
        'home',
        'about',
        'feature',
        'how-it-work',
        'screenshots',
        'team',
        'pricing-plan',
        'testimonial',
        'faq',
        'recent-blog',
        'download',
        'contact'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->sections as $key => $value) {
            Section::updateOrCreate(['section_name' => $value], ['section_name' => $value]);
        }
    }
}
