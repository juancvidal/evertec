<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'customer_address',
        'status',
        'request_id',
        'process_url',
        'total',
        'reference'
    ];
}
