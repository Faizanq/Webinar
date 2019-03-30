<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebinarLike extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'webinar_id', 'user_id'
    ];

}
