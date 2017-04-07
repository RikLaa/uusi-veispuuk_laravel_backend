<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function byTag()
    {
      return static::where('tag', 'tag')->get();
    }
}
