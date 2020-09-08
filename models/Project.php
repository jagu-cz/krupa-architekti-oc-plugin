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

    public $rules = [
        'title' => 'required',
        'caption' => '',
        'description' => 'required',
        'cover_image' => 'required',
    ];

    public function getPhotosCountAttribute()
    {
        return $this->getMediaCountByContentType('image');
    }

    public function getVideoCountAttribute()
    {
        return $this->getMediaCountByContentType('video');
    }

    public function getTextCountAttribute()
    {
        return $this->getMediaCountByContentType('text');
    }

    public function beforeSave()
    {
        $this->slug = null;
        $this->slugAttributes();
    }

    private function getMediaCountByContentType($contentType)
    {
        $count = 0;

        foreach ($this->data as $row) {
            foreach ($row['columns'] as $column) {
                if ($column['content_type'] === $contentType) {
                    $count += 1;
                }
            }
        }

        return $count;
    }
}
