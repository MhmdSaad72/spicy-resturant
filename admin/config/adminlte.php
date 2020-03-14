<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-logo
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image-xl',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => 'container-fluid',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/dashboard',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-menu
    |
    */

    'menu' => [
        // [
        //     'text' => 'search',
        //     'search' => true,
        //     'topnav' => true,
        // ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],

        ['header' => 'Website Details'],
        [
            'text'    => 'Bookings',
            'icon'    => 'fas fa-ticket-alt',
            'submenu' =>
            [
                [
                    'text'    => 'All Bookings',
                    'route'     => 'bookings.index',

                ],
                [
                    'text'    => 'Basic Reservation',
                    'route'     => 'reservation.view',

                ],
              ],
        ],
        [
            'text' => 'Clients',
            'route'  => 'clients',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'Contacts',
            'route'  => 'contact.all',
            'icon' => 'fas fa-fw fa-phone',
        ],
        ['header' => 'Pages Setting'],
        [
            'text' => 'Navabr',
            'route'  => 'nav-bar.index',
            'icon' => 'fas fa-fw fa-bars',
        ],
        [
            'text'    => 'Home Page',
            'icon'    => 'fas fa-fw fa-home',
            'submenu' => [
                [
                    'text'    => 'Food Service',
                    'route'     => 'service.index',

                ],
                [
                    'text'    => 'Main Dish',
                    'route'     => 'main-dish.index',

                ],
                [
                    'text' => 'Our Story',
                    'route'  => 'our-story.index',
                ],
                [
                    'text' => 'Availability',
                    'route'  => 'availability.index',
                ],
                [
                    'text'    => 'Our Services',
                    'icon'    => 'fas fa-fw fa-share',
                    'submenu' =>
                    [
                      [
                          'text' => 'Header',
                          'route'  => 'our-services-head.index',
                      ],
                      [
                          'text' => 'Body',
                          'route'  => 'our-services-body.index',
                      ],
                    ],
                ],
                [
                    'text'    => 'Featured Dishes',
                    'route'  => 'featur-dish-head.index',
                ],
            ],
        ],
        [
            'text' => 'About Us Page',
            'icon'    => 'fas fa-fw fa-address-book',
            'submenu' =>[
              [
                'text' => 'About Us Details',
                'route'  => 'about-us.index',
              ],
              [
                'text' => 'Statistic',
                'route'  => 'statistic.index',
              ],
              [
                'text' => 'About Services',
                'route'  => 'about-services.index',
              ],
              [
                'text' => 'Philosophy',
                'route'  => 'philosophy.index',
              ],
              [
                'text' => 'Awards',
                'route'  => 'award.index',
              ],
            ],
        ],
        [
            'text' => 'Food Menu Page',
            'icon'    => 'fas fa-fw fa-bars',
            'submenu' =>[
              [
                'text' => 'Food Menu',
                'route'  => 'food-menu.index',
              ],
              [
                'text' => 'Slide Menu',
                'route'  => 'slide-menu.index',
              ],
              [
                'text' => 'Categories',
                'route'  => 'category.index',
              ],
              [
                'text' => 'Tags',
                'route'  => 'tag.index',
              ],
            ],
        ],
        [
            'text' => 'Contact Us Page',
            'icon'    => 'fas fa-fw fa-phone',
            'submenu' =>[
              [
                'text' => 'Contact Us Details',
                'route'  => 'contact-us.index',
              ],
              [
                  'text'    => 'Branch',
                  'icon'    => 'fas fa-fw fa-share',
                  'submenu' =>
                  [
                    [
                        'text' => 'Header',
                        'route'  => 'branch-head.index',
                    ],
                    [
                        'text' => 'Body',
                        'route'  => 'branch-body.index',
                    ],
                  ],
              ],
            ],
        ],
        ['header' => 'Includes Setting'],
        [
          'text' => 'Gallary',
          'icon'    => 'fas fa-fw fa-images',
          'submenu' =>[
            [
              'text' => 'Header',
              'route'  => 'gallary.index',
            ],
            [
              'text' => 'Body',
              'route'  => 'album.index',
            ],
          ],
        ],
        [
          'text' => 'Master Chefs',
          'icon'    => 'fas fa-fw fa-share',
          'submenu' =>[
            [
              'text' => 'Header',
              'route'  => 'master-chefs.index',
            ],
            [
              'text' => 'Body',
              'route'  => 'chefs.index',
            ],
          ],
        ],
        [
          'text' => 'Basic Details',
          'icon'    => 'fas fa-database',
          'route' => 'basic-details.index'
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        [
            'name' => 'Select2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
