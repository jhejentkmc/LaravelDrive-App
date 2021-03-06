<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'status',
        // 'permissions',
        'avatar',
        'last_loged_in',
        'ip'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setPermissionsAttribute( $value ) {
    //     if ( ! empty($value) ) {
    //         $this->attributes['permissions'] = serialize( $value );
    //     }
    // }

    // public function getPermissionsAttribute( $value ) {
    //     $permissions = unserialize( $value );
        
    //     $roles = $this->roles();

    //     foreach ( $roles as $role ) {
    //         $permissions = array_merge($permissions, $role->permissions);
    //     }

    //     return $permissions;
    // }

    public function hasPermission( $permission ) {
        if ( in_array($permission, $this->permissions) ){
            return true;
        }

        return false;
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**
     * Get the comments for the blog post.
     */
    public function meta()
    {
        return $this->hasMany('App\UserMeta');
    }

    
}
