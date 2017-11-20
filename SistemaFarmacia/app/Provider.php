<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    
protected $table = 'providers';
protected $primaryKey='id';
public $timestamps = false;
protected $fillable = ['ruc', 'name', 'address','url'];
protected $guarded = [];
}

