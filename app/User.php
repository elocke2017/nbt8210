<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Log;

class User extends Authenticatable
{

    // ToDo: This needs to checked to remove the below SoftDelete comment once the traits clash is fixed.
//    use SoftDeletes;
    use EntrustUserTrait; // Entrust Package requires this trait

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'created_by', 'updated_by'
    ];
    /**

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get a List of roles ids associated with the current user.
     *
     * @return array
     */
    public function getRoleListAttribute()
    {
        return $this->roles->lists('id')->all();
    }

    /**
     * Returns if the user is active or not (true/false)
     *
     * @return mixed
     */
    public function isActive()
    {
        return $this->active;
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
