<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
/*
 * Class Post
 * @package App
 * @mixin builder
 * */
class Post extends Model
{
//    protected $table = 'posts';
//    use HasFactory;
//    protected $fillable = ['title', 'content'];
    protected $connection = 'wordpress_db';
    protected $table = 'posts';
    protected $primaryKey = 'ID';
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('post_type', function (Builder $builder) {
            $builder->where('post_type','post');

        });
    }

}
