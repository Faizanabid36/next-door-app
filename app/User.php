<?php

namespace App;

use Chatify\Http\Models\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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

        // Creates User Extra Settings And Attact it with the created User
        static::created(function ($user) {
            $user_extra = new UserExtra();
            $user_extra->user_id = $user->id;
            $user_extra->emergency_contact = '';
            $user_extra->bio = '';
            $user_extra->hide_phone = 0;
            $user_extra->hide_address = 0;
            $user_extra->save();
            $user->notify(new \App\Notifications\UserRegisteredNotification($user));
        });

        // Deletes all the relations associated with user whenever a User is deleted via $user->delete()

        static::deleting(function ($user) { // delete Family Members
            $user->family_members()->each(function ($member) {
                $member->delete(); // <-- direct deletion
            });

            $user->posts()->each(function ($post) { // Delete Posts
                $post->delete(); // <-- direct deletion
            });

            $user->identities()->each(function ($identity) {
                $identity->delete();
            });

            $user->user_extra()->delete(); // Deletes User Extra Settings

            $user->going_to_events()->each(function ($evnt) {
                $evnt->delete();
            });
            $user->user_events()->each(function ($event) {
                $event->delete();
            });
            $user->reported_items()->each(function ($event) {
                $event->delete();
            });
            $user->comments()->each(function ($comment) {
                $comment->delete();
            });
        });
    }
    public function user_extra()
    {
        return $this->hasOne(UserExtra::class, 'user_id', 'id');
    }

    public function family_members()
    {
        return $this->hasMany(FamilyMember::class, 'user_id');
    }

    public function identities()
    {
        return $this->hasMany('App\SocialIdentity');
    }

    public function sale_items()
    {
        return $this->hasMany(SaleItems::class, 'user_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'to_id', 'id');
    }

    public function going_to_events()
    {
        return $this->hasMany(EventInterest::class, 'user_id', 'id');
    }

    public function user_events()
    {
        return $this->hasMany(Event::class, 'user_id', 'id');
    }

    public function reported_items()
    {
        return $this->hasMany(ReportedPost::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'user_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function listings()
    {
        return $this->hasMany(Properties::class, 'user_id', 'id');
    }


    public function scopeUserList($query, $user, $type)
    {
        return $query->
        when($type == 'neighbours', function ($q) {
            $q->whereNull('is_public_agent');
        })->when($type == 'agents', function ($q) {
            $q->whereNotNull('is_public_agent');
        })->where('id', '!=', $user->id)->whereAdmin(0)
            ->wherePostal($user->postal)
            ->orderBy('name', 'ASC');
    }
}
