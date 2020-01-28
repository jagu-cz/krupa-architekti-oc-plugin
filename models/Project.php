<?php

namespace Jagu\KrupaArchitekti\Models;

use Model;

class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    public $table = 'jagu_krupaarchitekti_projects';

    protected $slugs = ['slug' => 'title'];

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
        return 123; // FIXME
    }

    public function beforeSave()
    {
        $this->slug = null;
        $this->slugAttributes();
    }
}
