<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Traits\Scope\PostScope;

class Post extends Model
{
    use PostScope;
    protected $fillable = ['title', 'content'];
}
