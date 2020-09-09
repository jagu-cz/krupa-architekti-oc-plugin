<?php

namespace Jagu\KrupaArchitekti\Models;

use Model;

class Tag extends Model
{
    public $table = 'jagu_krupaarchitekti_project_tags';

    public $belongsToMany = [
        'tags' => [
            Project::class,
            'table' => 'jagu_krupaarchitekti_project_tags_to_projects',
            'key' => 'project_id',
            'otherKey' => 'project_tag_id'
        ]
    ];
}
