<?php

namespace Jagu\KrupaArchitekti\Components;

use Cms\Classes\ComponentBase;
use Jagu\KrupaArchitekti\Models\Project;

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
        return Project::all();
    }
}