<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    protected static function boot()
    {
        parent::boot();

        // Attach an event listener to the "created" event
        static::created(function ($user) {
            $user->createProfile();
        });
    }

    public function createProfile()
    {
        $this->profile()->create([
            'bio' => '',
            'personal_interests' => '',
            'contact_number' => '',
            'profile_picture' => '',
        ]);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
