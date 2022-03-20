<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compcategorie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'parent_id',
        'type',
        'title',
        'slug',
    ];
}
