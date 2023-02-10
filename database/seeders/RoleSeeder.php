<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{

    private $modules = [
        'roles' => [
            'actions' => [
                'index'   => 'admin.role.index',
                'create'  => 'admin.role.create',
                'edit'    => 'admin.role.edit',
                'destroy' => 'admin.role.destroy'
            ]
        ],
        'users' => [
            'actions' => [
                'index'   => 'admin.user.index',
                'create'  => 'admin.user.create',
                'edit'    => 'admin.user.edit',
                'destroy' => 'admin.user.destroy'
            ]
        ],
        'media' => [
            'actions' => [
                'index'   => 'admin.media.index',
                'create'  => 'admin.media.create',
                'destroy' => 'admin.media.destroy'
            ]
        ],
        'pages' => [
            'actions' => [
                'index'   => 'admin.page.index',
                'create'  => 'admin.page.create',
                'edit'    => 'admin.page.edit',
                'destroy' => 'admin.page.destroy'
            ]
        ],
        'blogs' => [
            'actions' => [
                'index'   => 'admin.blog.index',
                'create'  => 'admin.blog.create',
                'edit'    => 'admin.blog.edit',
                'destroy' => 'admin.blog.destroy'
            ]
        ],
        'comments' => [
            'actions' => [
                'index'   => 'admin.comment.index',
                'edit'    => 'admin.comment.edit',
                'destroy' => 'admin.comment.destroy'
            ]
        ],
        'category' => [
            'actions' => [
                'index'   => 'admin.category.index',
                'create'  => 'admin.category.create',
                'edit'    => 'admin.category.edit',
                'destroy' => 'admin.category.destroy'
            ]
        ],
        'tag' => [
            'actions' => [
                'index'   => 'admin.tag.index',
                'create'  => 'admin.tag.create',
                'edit'    => 'admin.tag.edit',
                'destroy' => 'admin.tag.destroy'
            ]
        ],
        'team' => [
            'actions' => [
                'index'   => 'admin.team.index',
                'create'  => 'admin.team.create',
                'edit'    => 'admin.team.edit',
                'destroy' => 'admin.team.destroy'
            ]
        ],
        'pricing-plan' => [
            'actions' => [
                'index'   => 'admin.pricing-plan.index',
                'create'  => 'admin.pricing-plan.create',
                'edit'    => 'admin.pricing-plan.edit',
                'destroy' => 'admin.pricing-plan.destroy'
            ]
        ],
        'testimonials' => [
            'actions' => [
                'index'   => 'admin.testimonial.index',
                'create'  => 'admin.testimonial.create',
                'edit'    => 'admin.testimonial.edit',
                'destroy' => 'admin.testimonial.destroy'
            ]
        ],
        'faq' => [
            'actions' => [
                'index'   => 'admin.faq.index',
                'create'  => 'admin.faq.create',
                'edit'    => 'admin.faq.edit',
                'destroy' => 'admin.faq.destroy'
            ]
        ],
        'section' => [
            'actions' => [
                'index'    => 'admin.section.index'
            ]
        ],
        'settings' => [
            'actions' => [
                'index' => 'admin.settings.index'
            ]
        ],
        'theme-options' => [
            'actions'=> [
                'index' => 'admin.theme-options.index'
            ]
        ],
        'social-links' => [
            'actions' => [
                'index' => 'admin.social-links.index',
                'create' => 'admin.social-links.create',
                'edit' => 'admin.social-links.edit',
                'destroy' => 'admin.social-links.destroy'
            ]
        ]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->modules as $key => $value) {
            Module::updateOrCreate(['name' => $key],['name' => $key, 'actions' => $value['actions']]);
            foreach ($value['actions'] as $key => $permission) {
                if(!Permission::where('name', $permission)->first())
                    Permission::create(['name' => $permission]);
            }
        }
    
    }
}
