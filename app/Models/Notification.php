<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'notification_text', 'user_id', 'is_admin', 'created_at',
        'link'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
