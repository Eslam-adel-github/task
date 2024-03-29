<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function book(){
        return $this->hasMany('App\Book');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function roles(){
        return $this->belongsToMany('App\Role','roles_users');
    }
    public function HasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                return true;
            }
        }
           return false;

    }
    public function hasRole($role){
        if($this->roles()->where('name',$role)->first){
            return true;
        }
        return false;
    }

}
