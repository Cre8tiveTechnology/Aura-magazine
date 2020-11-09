<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole(string $role)
    {
        return $this->role()->where('key', $role)->exists();
    }

    public function isSuperAdmin()
    {
        return $this->role()->where('name', 'Super Admin')->exists();
    }

    public function isEditor()
    {
        return $this->role()->where('name', 'Editor in Chief')->exists();
    }

    public function isMarketer()
    {
        return $this->role()->where('name', 'Marketer')->exists();
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->articles()->delete();
        });
    }
}
