<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class company_details extends Model
{
    protected $table = 'company_details';
    protected $fillable = [
        'company_id',
        'company_name',
        'address',
        'city',
        'state',
        'country',
        'taxNumber',
        'phone',
        'email',
        'site',
        'meta_description',
        'meta_keywords',
        'icon',
        'logo', 'logoblack'
    ];
}
