<?php

namespace Jagu\KrupaArchitekti\Components;

use Cms\Classes\ComponentBase;
use Jagu\KrupaArchitekti\Models\Project;
use Jagu\KrupaArchitekti\Models\Tag;

class Gallery extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Gallery',
            'description' => 'Gallery'
        ];
    }

    public function projects()
    {
        return Project::orderBy('sort_order', 'asc')
            ->get();
    }

    public function tags()
    {
        return Tag::has('projects')
            ->orderBy('name', 'asc')
            ->get();
    }
}
