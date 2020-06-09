<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $with = ['user_extra'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */

    protected $guarded = [];

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

    public function is_admin()
    {
        if ($this->admin) {
            return true;
        }
        return false;
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::created(function ($user) {
            $user_extra = new UserExtra();
            $user_extra->user_id = $user->id;
            $user_extra->emergency_contact = '';
            $user_extra->bio = 'Faltu ka Bio';
            $user_extra->hide_phone = 0;
            $user_extra->hide_address = 0;
            $user_extra->save();
        });
    }

    public function user_extra()
    {
        return $this->hasOne(UserExtra::class, 'user_id', 'user_extra_id');
    }

    public function family_members()
    {
        return $this->hasMany(FamilyMember::class, 'user_id', 'family_member_id');
    }

}
