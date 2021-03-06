<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function articles(){
        return $this->hasMany(Article::class); // Select * from articles where user_id = $this->id
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        //return $this->phone_number;
        return 'can hard code phone number here';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // $user->assignRole();
    public function assignRole($role)
    {

        if (is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }

        // Will add new records if necessary but will not drop anything
        $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        // Get a collection of roles
        // Map over each item in the collection and return the abilities for each
        // Flatten out into one collection
        // Only pull the 'name' column from the ability table
        // Filter to unique values
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

}

// $user = User::find(1); // select * from user where id = 1
// $user->projects; // select * from projects where user_id = $user->id
// $user->projects->first()/last()/find()/split(3)/groupBy()
