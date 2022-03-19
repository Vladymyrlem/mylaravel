<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csvdata extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'date',
        'address',
        'contacts',
        'about_company'
    ];
}
