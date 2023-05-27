<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    protected $fillable = ['bio', 'personal_interests', 'contact_number', 'profile_picture'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
