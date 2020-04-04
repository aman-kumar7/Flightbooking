<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'client_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'date',
        'from_city',
        'from_country',
        'to_city',
        'to_country'          
    ];


}
