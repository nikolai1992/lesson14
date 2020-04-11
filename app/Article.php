<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded=[];

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tag', 'article_id', 'tag_id');
    }
}
