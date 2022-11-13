<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory, SoftDeletes;

    protected $table   = 'posts';
    protected $guarded = false;


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function getDateToPostAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F j, Y');
    }

    public function likes()
    {
        return $this->hasMany(PostUserLikes::class, 'post_id', 'id');
    }

}
