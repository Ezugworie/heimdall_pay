<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use EloquentFilter\QueryFilter\ModelFilters\Filterable;


class Wallet extends Model
{

    use Filterable;

    private static $whiteListFilter =[
        'account_balace',
        'user_id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_balace', 'user_id',
    ];


    /**
     * The owner of the wallet.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
