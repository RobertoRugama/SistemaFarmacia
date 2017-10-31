<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $table='providers';
    protected $primarykey='id';
    public $timestamps=true;

    protected $fillable=[
    	'status',
    	'ruc',
    	'name',
    	'address',
        ];

        protected $guarded = [];
}
