<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;


class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, Filterable;


    private static $whiteListFilter =[
        'id',
        'lastname',
        'firstname',
        'email',
        'created_at',
        'updated_at',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'password',
        'api_token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function wallet()
    {
        // return $this->hasMany('App\Wallet', 'foreign_key', 'local_key');
        return $this->hasOne(Wallet::class);
    }

    // public function search($q){
    //     if($q == null) return $query;
    //     return $query
    //         ->where('firstname', 'LIKE', "%{$q}%")
    //         ->orWhere('lastname', 'LIKE', "%{$q}%")
    //         ->orWhere('email', 'LIKE', "%{$q}%");
    // }
}
