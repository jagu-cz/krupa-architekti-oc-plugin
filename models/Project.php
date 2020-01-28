<?php

namespace Jagu\KrupaArchitekti\Models;

use Model;

class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;

    public const SORT_ORDER = 'sort_order';

    public $table = 'jagu_krupaarchitekti_projects';

    protected $slugs = ['slug' => 'title'];

    protected $jsonable = ['data'];

    public $attachOne = [
        'cover_photo' => \System\Models\File::class
    ];

    public $rules = [
        'title' => 'required',
        'description' => 'required',
        'cover_image' => 'required',
    ];

    public function getPhotosCountAttribute()
    {
        $count = 0;

        foreach ($this->data as $row) {
            foreach ($row['columns'] as $column) {
                if ($column['content_type'] === 'image') {
                    $count += 1;
                }
            }
        }

        return $count;
    }

    public function getTextCountAttribute()
    {
        $count = 0;

        foreach ($this->data as $row) {
            foreach ($row['columns'] as $column) {
                if ($column['content_type'] === 'text') {
                    $count += 1;
                }
            }
        }

        return $count;
    }

    public function beforeSave()
    {
        $this->slug = null;
        $this->slugAttributes();
    }
}
