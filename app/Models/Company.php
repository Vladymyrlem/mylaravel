<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'date',
        'address',
        'address_link',
        'contacts',
        'emails',
        'social_links',
        'about_company',
        'additional_information',
        'services_list',
        'links',
        'boss_initials',
        'boss_position',
        'loyalty_programs',
        'payments',
        'categories',
        'tags',
        'image'
    ];
}
