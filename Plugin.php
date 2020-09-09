<?php namespace Jagu\KrupaArchitekti;

use Event;
use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        Event::listen('cms.page.beforeDisplay', function ($controller, $action, $params) {
            $controller->addJs('/plugins/jagu/krupaarchitekti/assets/js/tags.js');
        });
    }

    public function registerComponents()
    {
        return [
            \Jagu\KrupaArchitekti\Components\Gallery::class => 'gallery'
        ];
    }

    public function registerNavigation()
    {
        return [
            'krupaarchitekti' => [
                'label' => 'jagu.krupaarchitekti::lang.plugin.name',
                'url' => Backend::url('jagu/krupaarchitekti/projects'),
                'icon' => 'icon-home',
                'sideMenu' => [
                    'projects' => [
                        'label' => 'Projekty',
                        'icon' => 'icon-book',
                        'code' => 'prjects',
                        'url' => Backend::url('jagu/krupaarchitekti/projects')
                    ]
                ]
            ],
            'customizetheme' => [
                'label' => 'Úprava šablony',
                'url' => Backend::url('/cms/themeoptions/update/jagu-krupa-architekti-jagu-oc-theme'),
                'icon' => 'icon-paint-brush'
            ]
        ];
    }
}
