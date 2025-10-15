<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'user_role',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'current_team_id',
        'email_verified_at'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // relation with news
    public function news()
    {
        return $this->hasMany(News::class);
    }


    // booted method
    protected static function booted() : void
    {
        //model event
        static::deleted(function ($user) {
            $user->news()->delete();
        });

        //global scope
        static::addGlobalScope('userDetail', function ($query) {
            $query->withCount('news');
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function role(){
        return $this->belongsTo(Role::class, 'user_role', 'id');
    }
}
