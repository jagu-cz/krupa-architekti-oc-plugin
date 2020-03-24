<?php namespace Jagu\KrupaArchitekti;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
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
            ]
        ];
    }
}
